# Writeup
The page displays this message
```
what is my location? i think i hid a hex string there
i think i hid a flag at http://tinyurl.com/1st-16-chars-of-the-hex
put text in text box and hit submit
```
# Solve

When access to the [link](http://tinyurl.com/1st-16-chars-of-the-hex) above we will have the first part of the flag `tpctf{w4i7`

But where is the second part ?

Entering the `document.location.href` show me `https://replit.org/data/web_project/64df16458ba95e01f7f67706af4602ed/index.html`

If you notice the link in the decription above, it says `1st-16-chars-of-the-hex`, so let take the first 16 chars of the `64df16458ba95e01f7f67706af4602ed` => `64df16458ba95e01` [here](http://tinyurl.com/64df16458ba95e01)
# Flag
tpctf{w4i7_r3pl_d03s_7h15?}
