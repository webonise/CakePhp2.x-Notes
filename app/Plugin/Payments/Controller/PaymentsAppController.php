<?php
App::uses('Controller', 'Controller');

class PaymentsAppController extends AppController {

    public function beforeFilter()
    {
        parent::beforeFilter();
    }
    public function beforeRender(){
            parent::beforeRender();
        }
}