#!/usr/bin/env bash

if grep -wq ";zend_extension=xdebug.so" '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini'; then
  ./docker/script/enable-xdebug.sh
  exit
fi

./docker/script/disable-xdebug.sh
exit
