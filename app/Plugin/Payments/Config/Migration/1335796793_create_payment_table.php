<?php
class CreatePaymentTable extends CakeMigration
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
            'purchases' => array(
                'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
                'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                'song_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                'orderId' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
                'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
                'address' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                'city' => array('type' => 'string', 'null' => false, 'default' => 0, 'length' => 50),
                'state' => array('type' => 'string', 'null' => false, 'default' => 0, 'length' => 50),
                'country' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
                'pin_code' => array('type' => 'string', 'null' => false, 'default' => 0, 'length' => 50),
                'transaction_type' => array('type' => 'integer', 'null' => false, 'default' => 0, 'length' => 1),
                'phone' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
                'mode' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 1),
                'currency' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 5),
                'amount' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
                'ip' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30),
                'purpose' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 1),
                'product_description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 5),
                'response_code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                'transaction_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
                'zppoption' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1),
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
                'purchases'
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
