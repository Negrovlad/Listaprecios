<?php
App::uses('AppModel', 'Model');
/**
 * TiposClientesTiposLista Model
 *
 * @property TiposCliente $TiposCliente
 * @property TiposLista $TiposLista
 */
class TiposClientesTiposLista extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre_archivo';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TiposCliente' => array(
			'className' => 'TiposCliente',
			'foreignKey' => 'tipos_cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TiposLista' => array(
			'className' => 'TiposLista',
			'foreignKey' => 'tipos_lista_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
