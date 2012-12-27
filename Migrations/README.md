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
To create the migration file manually skip the databse to schema comparison if asked.

### Syntax for creating Migrations ###

There are two main parts created in the migration file.
The 'up' and the 'down' part.
The up part is where you write the code for creating tables,adding columns,updating tables etc. and in the down part code to do exact opposite as in the up part is written like drop tables.

#### Syntax for Creating Table ####

    'up' => array(
	    'create_table' => array(
		    'user' => array(
			    'id' => array(
				    'type'    =>'integer',
				    'null'    => false,
				    'default' => NULL,
				    'length'  => 36,
				    'key'     => 'primary'),
			    'name' => array(
				    'type'    =>'string',
				    'null'    => false,
				    'default' => NULL),
			    'indexes' => array(
				    'PRIMARY' => array(
					    'column' => 'id',
					    'unique' => 1)
			        )
		        ),
		    'profile' => array(
			    'id' => array(
				    'type'    => 'integer',
				    'length ' => 36,
				    'null'    => false,
				    'key'     => 'primary'),
			    'user_id' => array(
				    'type'    => 'integer',
				    'null'    => false,
				    'default' => NULL),
			    'is_active' => array(
				    'type'    => 'boolean',
				    'null'    => false,
				    'default' => '0'),
			    'about' => array(
				    'type'    => 'text',
				    'default' => NULL),
			    'created' => array(
				    'type' => 'datetime'),
			    'modified' => array(
				    'type' => 'datetime'),
			    'indexes' => array(
				    'PRIMARY' => array(
					    'column' => 'id',
					    'unique' => 1)
			        )
		        )
	        );
        )