# Writeup

Challenge available at `http://iframeshame.tuctf.com`

# Solve
Oh well, this is os command injection challenge
After a while for trial, I try to add some characters to break format and I succeed

![IFrameAndShame](https://github.com/quanght55/CTFWriteups/blob/master/TUCTF/IFrameAndShame/images/image.png) 

As you can see it return `search.py`

My payload is `#|"|command-injection-here||x #`

It will get the result of the command we inject and put into the output
But the output we see is only 1 line, just like in the picture above. And what we need is `head` command with `-n` option to read line by line.

E.g `#|"|ls -lia|head -n1||x #` will output `search.py`. After read line by line I find out there's a `flag` file 

To read that file I use final payload `#|"|ls -lia | head -n1 flag||x #`

If you just use `cat flag` it will show you [this](https://www.youtube.com/watch?v=dQw4w9WgXcQ):clap::clap::clap:

# Flag
TUCTF{D0nt_Th1nk_H4X0r$_C4nt_3sc4p3_Y0ur_Pr0t3ct10ns}
