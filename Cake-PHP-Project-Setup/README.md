Setting Up Virtual Host

On Windows

* REQUIREMENT before installation,
 XAMPP installed


Steps
1) Open the XAMPP control panel application and stop Apache.

2) Navigate to C:/xampp/apache/conf/extra or wherever your XAMPP files are located.

3) Open the file named httpd-vhosts.conf in editor(Run editor as administrator).

Add virtual host details,
    <VirtualHost *>
        ServerAdmin admin@localhost.com
        DocumentRoot "C:/xampp/htdocs" # change this line with your htdocs folder
        ServerName localhost
        ServerAlias localhost
        <Directory "C:/xampp/htdocs">
            Options Indexes FollowSymLinks Includes ExecCGI
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
4)Save the content.

5)Next your Windows host file to edit your HOSTS.
the file will be located at
    C:/Windows/System32/drivers/etc/hosts,
    where hosts is the file. Open it with notepad.