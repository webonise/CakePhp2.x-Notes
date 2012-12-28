<?php
/**
 * PurchaseFixture
 *
 */
class PurchaseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'orderId' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'city' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'state' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'country' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pin_code' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'transaction_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1),
		'phone' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mode' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 1),
		'currency' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'amount' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ip' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'purpose' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 1),
		'product_description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'transaction_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '4fa3a2e8-c478-45d1-967e-4d60152c21d5',
			'user_id' => 'Lorem ipsum dolor sit amet',
			'orderId' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'transaction_type' => 1,
			'phone' => 'Lorem ipsum dolor ',
			'mode' => 1,
			'currency' => 'Lor',
			'amount' => 'Lorem ipsum dolor ',
			'ip' => 'Lorem ipsum dolor sit amet',
			'purpose' => 1,
			'product_description' => 'Lorem ipsum dolor sit amet',
			'transaction_date' => '2012-05-04',
			'created' => '2012-05-04 15:05:36',
			'modified' => '2012-05-04 15:05:36'
		),
	);
}
