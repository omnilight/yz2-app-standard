xdebug=`find / -name "xdebug.so" 2>/dev/null`
cat xdebug.conf # >> /etc/php5/apache2/php.ini
echo zend_extension="$xdebug" # >> /etc/php5/apache2/php.ini