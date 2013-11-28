<?php

App::uses('CmsAppController', 'Cms.Controller');

/**
 * PagesController
 *
 * @property Page $Page
 */
class PagesController extends CmsAppController
{
     //call back method
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }

    /**
     * index method
     * @return void
     * @scenario : this action will display the list of pages
     */
    public function index()
    {
        if ($this->isAdmin() == true) {
            $this->Page->recursive = 0;
            $this->set('pages', $this->paginate());
        } else {
            $this->redirect(array('plugin' => 'institutes', 'controller' => 'disciplines', 'action' => 'home'));
        }
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view()
    {

        $page = $this->Page->find('first', array('conditions' => array('Page.slug' => $this->request->params['pass'][0])));
        $title_for_layout = $page['Page']['title'];

        $this->set(compact('page', 'title_for_layout'));

    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->isAdmin() == true) {
            if ($this->request->is('post')) {
                $this->Page->create();
                if ($this->Page->save($this->request->data)) {
                    $this->Session->setFlash(__('The pagehas been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The pagecould not be saved. Please, try again.'));
                }
            }
        } else {
            $this->redirect(array('plugin' => 'institutes', 'controller' => 'disciplines', 'action' => 'home'));
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        $this->Page->id = $id;
        if (!$this->Page->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->isAdmin() == true) {
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Page->save($this->request->data)) {
                    $this->Session->setFlash(__('The pagehas been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The pagecould not be saved. Please, try again.'));
                }
            } else {
                $this->request->data = $this->Page->read(null, $id);
            }
        } else {
            $this->redirect(array('plugin' => 'institutes', 'controller' => 'disciplines', 'action' => 'home'));
        }
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Page->id = $id;
        if (!$this->Page->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->Page->delete()) {
            $this->Session->setFlash(__('Pagedeleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Pagewas not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
