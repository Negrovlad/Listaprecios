<?php
App::uses('AppController', 'Controller');
/**
 * TiposClientes Controller
 *
 * @property TiposCliente $TiposCliente
 */
class TiposClientesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TiposCliente->recursive = 0;
		$this->set('tiposClientes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TiposCliente->id = $id;
		if (!$this->TiposCliente->exists()) {
			throw new NotFoundException(__('Invalid tipos cliente'));
		}
		$this->set('tiposCliente', $this->TiposCliente->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TiposCliente->create();
			if ($this->TiposCliente->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos cliente has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos cliente could not be saved. Please, try again.'));
			}
		}
		$tiposListas = $this->TiposCliente->TiposLista->find('list',array('fields' => array('TiposLista.id', 'TiposLista.nombre')));
		$this->set(compact('tiposListas'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TiposCliente->id = $id;
		if (!$this->TiposCliente->exists()) {
			throw new NotFoundException(__('Invalid tipos cliente'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TiposCliente->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos cliente has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos cliente could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TiposCliente->read(null, $id);
		}
		$tiposListas = $this->TiposCliente->TiposLista->find('list', array('fields' => array('TiposLista.id', 'TiposLista.nombre')));
		//$nombreArchivo = $this->TiposCliente->TiposLista->TiposClientesTiposLista->nombre_archivo;
		$this->set(compact('tiposListas','nombreArchivo'));
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
		$this->TiposCliente->id = $id;
		if (!$this->TiposCliente->exists()) {
			throw new NotFoundException(__('Invalid tipos cliente'));
		}
		if ($this->TiposCliente->delete()) {
			$this->Session->setFlash(__('Tipos cliente deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tipos cliente was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
