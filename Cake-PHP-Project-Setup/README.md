Steps To setup new Project of cake php

------------------------XAMPP installation-----------------------------------------------------------------------------

XAMPP installation guide
Windows :
        http://www.dkszone.net/install-xampp-windows-step-step-guide
        http://sawmac.com/xampp/
        http://etuts.org/how-to-install-and-use-xampp-on-windows/

Linux :
        http://ubuntuforums.org/showthread.php?t=223410
        http://daksh21ubuntu.blogspot.in/2012/01/how-to-install-xampp-in-ubuntu.html
        http://freshtutorial.com/install-xamp-ubuntu/


Downloads :
 For windows    : http://www.apachefriends.org/en/xampp-windows.html
 For Linux      : http://www.apachefriends.org/en/xampp-linux.html
 For Mac        : http://www.apachefriends.org/en/xampp-macosx.html

XAMPP on github :https://github.com/XAMPP
------------------------------------------------------------------------------------------------------------------------




----------------------------------------------------------FIRST STEP----------------------------------------------------
Setting Up Virtual Host

Windows : http://austinpassy.com/tutorials/setting-up-virtual-hosts-wordpress-multisite-with-xampp-on-windows-7/

Linux : 1) https://help.ubuntu.com/10.04/serverguide/httpd.html
        2) http://blog.code4hire.com/2011/03/setting-up-virtual-hosts-for-apache-on-ubuntu-for-local-development/
        3)http://www.linode.com/wiki/index.php/Configure_apache_to_use_virtual_hosts_on_ubuntu_server

        Go through links you will get sufficient data
------------------------------------------------------------------------------------------------------------------------



----------------------------------------------------------SECOND STEP---------------------------------------------------
*Required XAMPP installed

1)Create new folder [Project_name] Ex.cd Crucible

2)cd <Project_name>  For Ex.cd Crucible

 step to set remote origin for git
  - git init
  - touch readme.md
  - git add .
  - git commit -m "First commit"
  - git add remote origin [SSH key of repository]
  - git pull origin master[*Create branch if necessary]
  - git push origin master



3)Download the latest Cake-PHP repository from

[Installation link :http://book.cakephp.org/2.0/en/installation.html]

git clone git://github.com/cakephp/cakephp.git

 [NOTE] : It should be same version of cakephp for all users thoroughly project

4) add .htaccess with mode rewrite (* if it is not present in Project directory)

5) Create database of project in http://localhost/phpmyadmin [NOTE: Locally]

6) cp database.php.default database.php
   set database configuration
  For example ,
   Database name: Sample
   username : root
   password :webonise6186

6) cp core.php.default core.php
   Setup the routing details

7) Save the changes

8)Done

------------------------------------------------------------------------------------------------------------------






-----------------------------THIRD STEP -------------------------------------------------------------------------
Run migration

1) cd <PATH TO UP TO THE PROJECT FOLDER>
2) cd app
3) Console/cake Migrations.migration run all
  # if there are plugin then
    - Console/cake Migrations.migration run all -p <Plugin Name>
4) Done
------------------------------------------------------------------------------------------------------------------------



        Hit the Project URL and you will start your application.............