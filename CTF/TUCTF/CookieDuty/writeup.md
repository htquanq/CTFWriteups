# Writeup

### Challenge available at `http://cookieduty.tuctf.com`

# Solve
The first page ask we to sign up for Jury Duty. Just type in a name and submit. If you notice there are two values of cookies in this challenge, the first one is `not_admin` set to `1` which means we are not admin. The second one is `user`, I will ignore this.

Using burpsuite to set cookie `not_admin` value to `0` which means we are admin and the flag will be showed. 

# Flag 
TUCTF {D0nt_Sk1p_C00k13_Duty}
