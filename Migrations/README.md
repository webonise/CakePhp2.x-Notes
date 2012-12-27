# Cake DC Migrations Plugin

As an application is developed, changes to the database may be required, and managing that in teams can get extremely difficult. Migrations enables you to share and co-ordinate database changes in an iterative manner, removing the complexity of handling these changes.

## Downloading ##

To download the Migrations Plugin, [Go Here](https://github.com/CakeDC/migrations).

- Copy the Git Read-Only access.
- Clone the plugin into your app/Plugin folder.
- To use the Plugin,you have to load it by adding a line in your app/Config/bootstrap.php file.

    CakePlugin::load('Migrations');

### Creating a migration ###

Go to Project's app directory from the terminal and type the following command:

	Console/cake Migrations.migration generate

This will create a new file with the name that you specified in the app/Config/Migration folder.
To create the migration file manually skip the databse to schema comparison if asked.

### Syntax for creating Migrations ###

There are two main parts created in the migration file.
The 'up' and the 'down' part.
The up part is where you write the code for creating tables,adding columns,updating tables etc. and in the down part code to do exact opposite as in the up part is written like drop tables.

#### Syntax for Creating Tables ####

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
	        )
        )

#### Syntax for Dropping Tables ####

    'down' => array(
        'drop_table' => array(
            'users',
            'profiles'
            )
		)

#### Syntax for Rename Table ####

Changes the name of a table in the database.

	'rename_table' => array(
		'user' => 'users',
		'profile' => 'profiles'
	)

#### Syntax for Create Field ####

Create Field is used to add fields to an existing table in the schema.

	'create_field' => array(
		'users' => array(
			'created' => array(
				'type' => 'datetime'),
			'modified' => array(
				'type' => 'datetime')
		)
	)

#### Syntax for Drop Field ####

Drop field is used for removing fields from existing tables in the schema.
	'drop_field' => array(
		'users' => array(
			'created',
			'modified'),
	)

#### Syntax for Alter Field ####

Changes the field properties in an existing table.

	'alter_field' => array(
		'users' => array(
		    'id' => array(
			'length' => 11),
		)
	)

#### Syntax for Rename Field ####

Changes the name of a field on a specified table in the database.

	'rename_field' => array(
		'users' => array(
			'name' => 'user_name'
		),
	)

### Running the migrations ###

The migration you have created will haelp you to complete the task written in it through Cake console.
Go to the terminal and go to your Project's app/ directory.
Write the following command:

    Console/cake Migrations.migration run up

You will be asked which version to you want to run.
Give your migration version and press enter.

### Need more help? ###

Go to [Cake DC Migrations](https://github.com/CakeDC/migrations).