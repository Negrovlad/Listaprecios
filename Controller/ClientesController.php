<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 */
class ClientesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cliente->recursive = 0;
		$this->set('clientes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$this->set('cliente', $this->Cliente->read(null, $id));		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cliente->create();
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('The cliente has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente could not be saved. Please, try again.'));
			}
		}
		$xpfUsers = $this->Cliente->XpfUser->find('list');
		$tiposClientes = $this->Cliente->TiposCliente->find('list', array('fields' => array('TiposClientes.id', 'TiposClientes.nombre_tipo_cliente')));
		$this->set(compact('xpfUsers', 'tiposClientes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('The cliente has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Cliente->read(null, $id);
		}
		
		// NOTA VLADIMIR
		//  Cliente->XpfUsers y Cliente->TiposClientes se refieren a las relaciones dentro de la clase Cliente del modelo
		$xpfUsers = $this->Cliente->XpfUsers->find('list');
		$tiposClientes = $this->Cliente->TiposClientes->find('list', array('fields' => array('TiposClientes.id', 'TiposClientes.nombre_tipo_cliente')));

		$this->set(compact('xpfUsers', 'tiposClientes'));
		
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
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->Cliente->delete()) {
			$this->Session->setFlash(__('Cliente deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cliente was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
