#!/usr/bin/env bash

if grep -wq ";zend_extension=xdebug.so" '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini'; then
  echo "Enabling Xdebug";
  echo 'zend_extension=xdebug.so' > '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini' \
    && echo "xdebug.mode=debug" >> '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini' \
    && echo "xdebug.client_host=${LOCAL_IP}" >> '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini' \
    && echo "xdebug.idekey=PHPSTORM" >> '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini' \
    && echo "xdebug.log=/tmp/xdebug.log" >> '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini' \
    && echo "xdebug.discover_client_host=true" >> '/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini'

  $(which php) -v
  exit
fi

echo "Xdebug is already enabled"
