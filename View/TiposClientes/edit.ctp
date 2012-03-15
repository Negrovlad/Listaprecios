<div class="tiposClientes form">
<?php echo $this->Form->create('TiposCliente');?>
	<fieldset>
		<legend><?php echo __('Edit Tipos Cliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre_tipo_cliente');
		echo $this->Form->input('carpeta_archivos');
		echo $this->Form->input('TiposLista');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TiposCliente.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TiposCliente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos Clientes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tipos Listas'), array('controller' => 'tipos_listas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Lista'), array('controller' => 'tipos_listas', 'action' => 'add')); ?> </li>
	</ul>
</div>
