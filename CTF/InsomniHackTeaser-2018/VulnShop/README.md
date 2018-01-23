# VulnShop

# Description
```
We're preparing a website for selling some important vulnerabilities in the future. You can browse some static pages on it, waiting for the official release.

http://vulnshop.teaser.insomnihack.ch

Important : you don't need to use automated scanners or bruteforce for this challenge, and using some will result for your ip to be banned. Go on IRC to ask for being unbanned.
```

So the challenge give us phpinfo() information on http://vulnshop.teaser.insomnihack.ch/phpinfo.php and source code on http://vulnshop.teaser.insomnihack.ch/?hl

After a while looking at the source code, we can see if we call `verifyFromMatch` function, it will be `eval()`. Value of `$_SESSION['challenge']` will be random from `100000-999999`. Here the code server will use to call function
```
if(isset($_REQUEST['answer']) && isset($_REQUEST['method']) && function_exists($_REQUEST['method'])){

$_REQUEST['method']("./".$_SESSION['challenge'], $_REQUEST['answer']);

```

We can call any function as long as the function exist and have 2 arguments. This is the list function that disabled, i got from [phpinfo.php](http://vulnshop.teaser.insomnihack.ch/phpinfo.php)

```
pcntl_alarm,pcntl_fork,pcntl_waitpid,pcntl_wait,pcntl_wifexited,pcntl_wifstopped,pcntl_wifsignaled,pcntl_wifcontinued,pcntl_wexitstatus,pcntl_wtermsig,pcntl_wstopsig,pcntl_signal,pcntl_signal_dispatch,pcntl_get_last_error,pcntl_strerror,pcntl_sigprocmask,pcntl_sigwaitinfo,pcntl_sigtimedwait,pcntl_exec,pcntl_getpriority,pcntl_setpriority,proc_open,system,shell_exec,exec,passthru,mail
```

**I will use file_put_contents** function to inject our code to be eval.

All session variables stored as a file with format `sess_(PHPSESSID)` in folder `session.save_path` and the content stored as serialized string

In here,It will be store at `tmp` with format `challenge|i:rand_num_here`. In [here](http://php.net/manual/en/session.configuration.php#ini.session.save-path), it says `If you leave this set to a world-readable directory, such as /tmp (the default), other users on the server may be able to hijack sessions by getting the list of files in that directory.`. Which mean we can change the value of session file.

Session file also save at `/var/lib/php/sessions` in `session.save_path`. We will override the `session.save_path` using `copy()`

# In A Nutshell
* Get a session
* Rewrite that session with our payload
* Override `session.save_path` with our session in `/tmp/SESSIONID` using copy

# Input step when run script
* print_r(glob('/*'))
* print_r(file_get_contents('/flag'))

# Functions
* print_r is used to print an array
* glob to search for directory matches pattern
* file_get_contents used to get contents in a file

# Flag
**INS{4rb1tr4ry_func_c4ll_is_n0t_s0_fun}**
