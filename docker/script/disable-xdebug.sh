#!/usr/bin/env bash

if grep -wq ";zend_extension=xdebug.so" '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini'; then
  echo "Xdebug is not enabled";
  exit
fi

echo ';zend_extension=xdebug.so' > '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini'
$(which php) -v
exit



