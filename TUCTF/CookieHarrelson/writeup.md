# Writeup

Challenge available at `http://cookieharrelson.tuctf.com`

# Solve
First time access into this challenge page, not thing was showed except a picture and `There's no way you can steal the flag from from Woody Harrelson's Cookies!!`

![CookieHarrelson](https://github.com/quanght55/CTFWriteups/blob/master/TUCTF/CookieHarrelson/images/cookieharrelson_hompage.png)

I got notice on the cookie, use Burpsuite to make a request and it shows there's a cookie value in HTTP header "Set-Cookie: tallahassee=Y2F0IGluZGV4LnR4dA%3D%3D", which `%3D` equals to `=`. So I think this is base64 encoded. After decode I get `cat index.txt`

`There's no way you can steal the flag from from Woody Harrelson's Cookies!!` is from `index.txt`
