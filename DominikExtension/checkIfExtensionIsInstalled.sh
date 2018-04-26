#!/bin/bash
echo "------ checking if phpinfo() contains 'Dominik' ------- "
php -r "phpinfo();"  | grep Dominik
echo "-------- Checking <?php ds_hello(); ?> code "
php -r "ds_hello();"