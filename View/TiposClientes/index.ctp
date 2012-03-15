<div class="tiposClientes index">
	<h2><?php echo __('Tipos Clientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre_tipo_cliente');?></th>
			<th><?php echo $this->Paginator->sort('carpeta_archivos');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($tiposClientes as $tiposCliente): ?>
	<tr>
		<td><?php echo h($tiposCliente['TiposCliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($tiposCliente['TiposCliente']['nombre_tipo_cliente']); ?>&nbsp;</td>
		<td><?php echo h($tiposCliente['TiposCliente']['carpeta_archivos']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tiposCliente['TiposCliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tiposCliente['TiposCliente']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tiposCliente['TiposCliente']['id']), null, __('Are you sure you want to delete # %s?', $tiposCliente['TiposCliente']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tipos Cliente'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos Listas'), array('controller' => 'tipos_listas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Lista'), array('controller' => 'tipos_listas', 'action' => 'add')); ?> </li>
	</ul>
</div>
