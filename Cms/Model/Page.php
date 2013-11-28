<?php

App::uses('CmsAppModel', 'Cms.Model');

/**
 * PageModel
 *
 * @property Reference $Reference
 * @property Language $Language
 */
class Page extends CmsAppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'meta_keywords' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'meta_description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//        'page_name' => array(
//            'notempty' => array(
//                'rule' => array('notempty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'body' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'is_active' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'slug' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
//	public $belongsTo = array(
//
//		'Language' => array(
//			'className' => 'Language',
//			'foreignKey' => 'language_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
//	);

    var $actsAs = array(
        'Sluggable' => array( 'Sluggable.Sluggable' => array(
            'label' => 'title',
            'slug' => 'slug',
            'separator' => '_',
            'overwrite' => false,
            'length' => '255',
            'translation' => 'utf-8'),
            'NamedScope' => '',
            'slug_max_length' => 255
        )
    );

    public function getPage() {
        return $this->find();
    }

}
