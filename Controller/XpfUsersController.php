<?php
App::uses('AppController', 'Controller');
/**
 * XpfUsers Controller
 *
 * @property XpfUser $XpfUser
 */
class XpfUsersController extends AppController {


/*  Autenticaci�n */

public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add','login', 'logout'); // DO NOT Let users register themselves
}

public function login() {
    if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
    } else {
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

public function logout() {
    $this->redirect($this->Auth->logout());




/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->XpfUser->recursive = 0;
		$this->set('xpfUsers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->XpfUser->id = $id;
		if (!$this->XpfUser->exists()) {
			throw new NotFoundException(__('Invalid xpf user'));
		}
		$this->set('xpfUser', $this->XpfUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->XpfUser->create();
			if ($this->XpfUser->save($this->request->data)) {
				$this->Session->setFlash(__('The xpf user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The xpf user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->XpfUser->id = $id;
		if (!$this->XpfUser->exists()) {
			throw new NotFoundException(__('Invalid xpf user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->XpfUser->save($this->request->data)) {
				$this->Session->setFlash(__('The xpf user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The xpf user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->XpfUser->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->XpfUser->id = $id;
		if (!$this->XpfUser->exists()) {
			throw new NotFoundException(__('Invalid xpf user'));
		}
		if ($this->XpfUser->delete()) {
			$this->Session->setFlash(__('Xpf user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Xpf user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
