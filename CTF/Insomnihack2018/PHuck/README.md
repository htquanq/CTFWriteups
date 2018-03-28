# PHuck

# Source code 
[here]()
I edited the source code for easier debug

# Require of challenge
* Bypass `block()` function on line 9-17 to get `is_admin=1` to fulfill requirement on line 19.
* POST data must be JSON formatted , see line `22`.
* `userid` we post must not be equal to `0` but if we want flag we must access element 0th in the dataset.

# Solution

* Here block function will block `_`, `admin=`. We can bypass it with `.` and `%00`. So the get parameter will be like this `id.admin%00=1`
* `userid` must not equal to 0 but equal to 0 at the same time `$a['userid'] != 0`, we can use `0.1` to achieve this.

# Demo on local
![Demo]() 