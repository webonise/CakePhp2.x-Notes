1. Nginx installation --

     sudo apt-get install nginx

2. php-fpm installation --

    sudo apt-get install php5-fpm

3. Command to start nginx

    /etc/init.d/nginx start

4. Command to restart php-fpm

    /etc/init.d/php5-fpm restart

5. Configure nginx

     sudo nano sites-available/default

6. nginx root dir: /usr/share/nginx/www

Useful links:

http://www.howtoforge.com/installing-nginx-with-php5-and-php-fpm-and-mysql-support-lemp-on-debian-wheezy

http://wiki.nginx.org/Main

http://jetfar.com/apache-nginx-lighttpd-future-compared/

http://www.packtpub.com/article/configuring-apache-and-nginx

http://kbeezie.com/apache-with-nginx/

http://www.ondrejsimek.com/blog/nginx-php-php-fpm-apc-memcached-stack/


Nginx virtual host :

http://wiki.nginx.org/ServerBlockExample

Running multiple versions of php on nginx :
http://www.ondrejsimek.com/blog/running-multiple-php-versions-is-so-easy-with-fastcgi/
http://kovacsdaniel.blogspot.in/2012/12/ispconfig-nginx-php-fpm-multiple-php.html
http://www.howtoforge.com/how-to-use-multiple-php-versions-php-fpm-and-fastcgi-with-ispconfig-3-ubuntu-12.10

Cakephp + nginx

https://gist.github.com/pasela/3052624

http://www.euperia.com/linux/tools-and-utilities/speed-testing-your-website-with-siege-part-one/720