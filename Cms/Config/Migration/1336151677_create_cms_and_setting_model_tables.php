<?php
class CreateCmsAndSettingModelTables extends CakeMigration
{

    /**
     * Migration description
     *
     * @var string
     * @access public
     */
    public $description = '';

    /**
     * Actions to be performed
     *
     * @var array $migration
     * @access public
     */

    public $migration = array(
        'up' => array('create_table' => array(
            'pages' => array(
                'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
                'reference_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
                'language_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
                'meta_keywords' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                'meta_description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                'page_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
                'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
                'body' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                'is_active' => array('type' => 'integer', 'null' => false, 'default' => 0, 'length' => 1),
                'slug' => array('type' => 'string', 'null' => false, 'default' => 0, 'length' => 255),
                'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
                'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
                'indexes' => array(
                    'PRIMARY' => array('column' => 'id', 'unique' => 1),
                ),
                'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
            ))
        ),
        'down' => array(
            'drop_table' => array(
                'pages'
            )
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function before($direction)
    {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function after($direction)
    {
        return true;
    }
}
