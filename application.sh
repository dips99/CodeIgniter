#!/bin/bash
if test -f selenium.sh
then
	echo "Set Environment..."
	export DISPLAY=:99.0
	sh -e /etc/init.d/xvfb start
	pyrus install http://pear.phpunit.de/get/PHPUnit_Selenium-1.2.6.tgz
	sudo apt-get -qq update
	echo "Environment OK"
	echo "Set Web Server..."
	sudo apt-get -y -qq install apache2
	sudo apt-get -y -qq install libapache2-mod-php5
	sudo /etc/init.d/apache2 restart
	echo "Web Server OK"
	echo "Set Up CodeIgniter on Root Directory..."
	sudo mkdir /var/www/codeigniter
	sudo chmod 777 /var/www/codeigniter -R
	sudo cp index.php /var/www/codeigniter/index.php
	sudo cp application/ /var/www/codeigniter/ -r
	sudo cp system/ /var/www/codeigniter/ -r
	echo "CodeIgniter OK"
	echo "Set Up Selenium..."
	wget http://selenium.googlecode.com/files/selenium-server-standalone-2.21.0.jar
	sudo mkdir /usr/lib/selenium
	sudo cp selenium-server-standalone-2.21.0.jar /usr/lib/selenium/selenium-server-standalone-2.21.0.jar
	sudo cp selenium.sh /etc/init.d/selenium
	sudo chmod 755 /etc/init.d/selenium
	sudo mkdir /var/log/selenium
	sudo chmod a+w /var/log/selenium
	/etc/init.d/selenium start
	/etc/init.d/selenium restart
	ps aux | grep 2.21
	sleep 5	
	echo "Selenium OK"
	echo "Application Test READY"
else
	echo "Application Test NOT READY"
fi
