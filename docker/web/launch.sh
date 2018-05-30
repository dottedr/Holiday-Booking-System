#!/bin/bash
#/usr/bin/tideways-daemon&
rm -f /var/run/httpd.pid
/usr/sbin/httpd -e info -DFOREGROUND