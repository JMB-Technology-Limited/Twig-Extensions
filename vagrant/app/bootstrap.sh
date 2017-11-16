
sudo apt-get update
sudo apt-get install -y php phpunit git zip

mkdir -p /bin
wget -q -O /bin/composer.phar https://getcomposer.org/composer.phar
wget -q -O /bin/phpunit.phar https://phar.phpunit.de/phpunit-6.2.phar

echo "display_errors = On"  > /etc/php/7.0/cli/conf.d/99-custom.ini
echo "error_reporting = E_ALL" >>  /etc/php/7.0/cli/conf.d/99-custom.ini


