<div class="tiposListas form">
<?php echo $this->Form->create('TiposLista');?>
	<fieldset>
		<legend><?php echo __('Add Tipos Lista'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('TiposCliente');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipos Listas'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tipos Clientes'), array('controller' => 'tipos_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Cliente'), array('controller' => 'tipos_clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
