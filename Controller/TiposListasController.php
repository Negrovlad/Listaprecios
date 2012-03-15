<?php
App::uses('AppController', 'Controller');
/**
 * TiposListas Controller
 *
 * @property TiposLista $TiposLista
 */
class TiposListasController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TiposLista->recursive = 0;
		$this->set('tiposListas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TiposLista->id = $id;
		if (!$this->TiposLista->exists()) {
			throw new NotFoundException(__('Invalid tipos lista'));
		}
		$this->set('tiposLista', $this->TiposLista->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TiposLista->create();
			if ($this->TiposLista->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos lista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos lista could not be saved. Please, try again.'));
			}
		}
		$tiposClientes = $this->TiposLista->TiposCliente->find('list');
		$this->set(compact('tiposClientes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TiposLista->id = $id;
		if (!$this->TiposLista->exists()) {
			throw new NotFoundException(__('Invalid tipos lista'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TiposLista->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos lista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos lista could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TiposLista->read(null, $id);
		}
		$tiposClientes = $this->TiposLista->TiposCliente->find('list');
		$this->set(compact('tiposClientes'));
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
		$this->TiposLista->id = $id;
		if (!$this->TiposLista->exists()) {
			throw new NotFoundException(__('Invalid tipos lista'));
		}
		if ($this->TiposLista->delete()) {
			$this->Session->setFlash(__('Tipos lista deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tipos lista was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
