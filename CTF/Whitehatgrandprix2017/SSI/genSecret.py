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


