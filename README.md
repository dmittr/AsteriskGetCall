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

Or get file placing 'recordingfile' field to request https://freebpx/AsteriskGetCall/?token=test123&date=2020-06-04&num=101&file=out-8765432-101-20200604-181129-1591258289.1415.wav

## JSON Example
````
[
   {
      "calldate":"2020-06-04 13:37:04",
      "clid":"\"\" <74230000000>",
      "src":"74230000000",
      "dst":"8765432",
      "dcontext":"from-internal",
      "channel":"SIP\/101-000001fa",
      "dstchannel":"SIP\/SOME_TRUNK_NAME-000001fb",
      "lastapp":"Dial",
      "lastdata":"SIP\/SOME_TRUNK_NAME\/8765432,300,Tb(func-apply-sipheaders^s^1,(4))M",
      "duration":"21",
      "billsec":"20",
      "disposition":"ANSWERED",
      "amaflags":"3",
      "accountcode":"",
      "uniqueid":"1591241824.1290",
      "userfield":"",
      "did":"",
      "recordingfile":"out-8765432-101-20200604-133704-1591241824.1290.wav",
      "cnum":"101",
      "cnam":"",
      "outbound_cnum":"74230000000",
      "outbound_cnam":"",
      "dst_cnam":"",
      "linkedid":"1591241824.1290",
      "peeraccount":"",
      "sequence":"920"
   },
   {
      "calldate":"2020-06-04 13:45:34",
      "clid":"\"\" <74230000000>",
      "src":"74230000000",
      "dst":"8765432",
      "dcontext":"from-internal",
      "channel":"SIP\/101-000001fc",
      "dstchannel":"SIP\/SOME_TRUNK_NAME-000001fd",
      "lastapp":"Dial",
      "lastdata":"SIP\/SOME_TRUNK_NAME\/8765432,300,Tb(func-apply-sipheaders^s^1,(4))M",
      "duration":"22",
      "billsec":"21",
      "disposition":"ANSWERED",
      "amaflags":"3",
      "accountcode":"",
      "uniqueid":"1591242334.1293",
      "userfield":"",
      "did":"",
      "recordingfile":"out-8765432-101-20200604-134534-1591242334.1293.wav",
      "cnum":"101",
      "cnam":"",
      "outbound_cnum":"74230000000",
      "outbound_cnam":"",
      "dst_cnam":"",
      "linkedid":"1591242334.1293",
      "peeraccount":"",
      "sequence":"922"
   }
]
````
