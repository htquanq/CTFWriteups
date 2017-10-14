# CTF Writeup
The challenge will be available on `http://challenges.at10a.net:8080/web06/`

# Source code can be found in: 
`http://challenges.at10a.net:8080/web06/index.bak`

# Source code:
```php
<?php
@require "flag.php";
if(!empty($_POST['user']) && !empty($_POST['password'])){
        if($_POST['user']==="adm1n" && !strcmp($flag,$_POST['password'])){
                echo $flag;
        }
}else{
?>

<html>
<head>
</head>
<body>
    <center><fieldset style="margin-top: 10px; padding: 10px;" width="60%">
        <legend><b>Login</b></legend><br/>
        <form name="login" method="POST" action="">
            Username : <input name="user" /><br/>
            Password : <input type="password" name="password" /></br></br>
            <input type="submit" value="login" name="button" />
        </form>
    </center></fieldset>
</body>
</html>
<?php
};
?>
```

# Solving:
As you can see user is `adm1n`, the vulnerability is in `!strcmp($flag,$_POST['password'])`.This can be solved by posting an array password: `user=adm1n&password[]=&button=login` (using Burpsuite).If we post data like this, it will make `if($_POST['user']==="adm1n" && !strcmp($flag,$_POST['password']))` return `true`

# The flag is: BMC{I_d0nt_lik3_strCmp}