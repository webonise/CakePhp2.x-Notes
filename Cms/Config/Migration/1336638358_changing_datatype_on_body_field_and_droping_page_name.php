<?php

class ChangingDatatypeOnBodyFieldAndDropingPageName extends CakeMigration {

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
        'up' => array(
            'alter_field' => array(
                'pages' => array(
                    'body' => array('type' => 'text', 'null' => false, 'default' => NULL),
                ),
            ),
            'drop_field' => array(
                'pages' => array(
                    'page_name'
                )
            )
        ),
        'down' => array(
            'alter_field' => array(
                'pages' => array(
                    'body' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                ),
            ),
            'create_field' => array(
                'pages' => array(
                    'page_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
                )
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
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function after($direction) {
        return true;
    }

}
