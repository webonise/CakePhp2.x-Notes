# Cake DC Migrations Plugin

As an application is developed, changes to the database may be required, and managing that in teams can get extremely difficult. Migrations enables you to share and co-ordinate database changes in an iterative manner, removing the complexity of handling these changes.
This is not a backup tool, however you can make use of callbacks if you want to backup data or execute extra queries. We highly recommend not to run Migrations in a production environment directly without doing a backup and running it first in a staging environment.

## Downloading ##

To download the Migrations Plugin, [Go Here](https://github.com/CakeDC/migrations).

- Clone the plugin into your app/Plugin folder.
- To use the Plugin,you have to load it by adding a line in your app/Config/bootstrap.php file.

    CakePlugin::load('Migrations');

### Creating a migration ###

	cake Migrations.migration generate

This will create a new file with the name that you specified in the app/Config/Migration folder.

