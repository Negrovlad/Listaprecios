<?php
App::uses('AppController', 'Controller');
/**
 * TiposClientesTiposListas Controller
 *
 * @property TiposClientesTiposLista $TiposClientesTiposLista
 */
class TiposClientesTiposListasController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TiposClientesTiposLista->recursive = 0;
		$this->set('tiposClientesTiposListas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TiposClientesTiposLista->id = $id;
		if (!$this->TiposClientesTiposLista->exists()) {
			throw new NotFoundException(__('Invalid tipos clientes tipos lista'));
		}
		$this->set('tiposClientesTiposLista', $this->TiposClientesTiposLista->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TiposClientesTiposLista->create();
			if ($this->TiposClientesTiposLista->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos clientes tipos lista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos clientes tipos lista could not be saved. Please, try again.'));
			}
		}
		$tiposClientes = $this->TiposClientesTiposLista->TiposCliente->find('list');
		$tiposListas = $this->TiposClientesTiposLista->TiposListum->find('list');
		$this->set(compact('tiposClientes', 'tiposListas'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TiposClientesTiposLista->id = $id;
		if (!$this->TiposClientesTiposLista->exists()) {
			throw new NotFoundException(__('Invalid tipos clientes tipos lista'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TiposClientesTiposLista->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos clientes tipos lista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos clientes tipos lista could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TiposClientesTiposLista->read(null, $id);
		}
		$tiposClientes = $this->TiposClientesTiposLista->TiposCliente->find('list');
		$tiposListas = $this->TiposClientesTiposLista->TiposLista->find('list');
		$this->set(compact('tiposClientes', 'tiposListas'));
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
		$this->TiposClientesTiposLista->id = $id;
		if (!$this->TiposClientesTiposLista->exists()) {
			throw new NotFoundException(__('Invalid tipos clientes tipos lista'));
		}
		if ($this->TiposClientesTiposLista->delete()) {
			$this->Session->setFlash(__('Tipos clientes tipos lista deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tipos clientes tipos lista was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
