# AsteriskGetCall
Third party tool for Asterisk integrations

## Installation
````
ssh to your freepbx host
cd /opt
git clone https://github.com/dmittr/AsteriskGetCall
cp /opt/AsteriskGetCall/config.php_example /opt/AsteriskGetCall/config.php
cp /opt/AsteriskGetCall/AsteriskGetCall/.conf /etc/httpd/conf.d/
systemctl restart httpd
````

Do not forget to copy db password from /etc/freepbx.conf to /opt/AsteriskGetCall/config.php

## Usage
Add new token with extensions to config. 

Then you able to get JSON call information https://freebpx/AsteriskGetCall/?token=test123&date=2020-06-04&num=101
Or get file https://freebpx/AsteriskGetCall/?token=test123&date=2020-06-04&num=101&file=out-8765432-101-20200604-181129-1591258289.1415.wav
