<div class="tiposClientesTiposListas form">
<?php echo $this->Form->create('TiposClientesTiposLista');?>
	<fieldset>
		<legend><?php echo __('Add Tipos Clientes Tipos Lista'); ?></legend>
	<?php
		echo $this->Form->input('tipos_cliente_id');
		echo $this->Form->input('tipos_lista_id');
		echo $this->Form->input('nombre_archivo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipos Clientes Tipos Listas'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tipos Clientes'), array('controller' => 'tipos_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Cliente'), array('controller' => 'tipos_clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos Listas'), array('controller' => 'tipos_listas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Lista'), array('controller' => 'tipos_listas', 'action' => 'add')); ?> </li>
	</ul>
</div>
