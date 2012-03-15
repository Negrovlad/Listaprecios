<div class="tiposClientesTiposListas index">
	<h2><?php echo __('Tipos Clientes Tipos Listas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tipos_cliente_id');?></th>
			<th><?php echo $this->Paginator->sort('tipos_lista_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre_archivo');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($tiposClientesTiposListas as $tiposClientesTiposLista): ?>
	<tr>
		<td><?php echo h($tiposClientesTiposLista['TiposClientesTiposLista']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tiposClientesTiposLista['TiposCliente']['nombre_tipo_cliente'], array('controller' => 'tipos_clientes', 'action' => 'view', $tiposClientesTiposLista['TiposCliente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tiposClientesTiposLista['TiposLista']['nombre'], array('controller' => 'tipos_listas', 'action' => 'view', $tiposClientesTiposLista['TiposLista']['id'])); ?>
		</td>
		<td><?php echo h($tiposClientesTiposLista['TiposClientesTiposLista']['nombre_archivo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tiposClientesTiposLista['TiposClientesTiposLista']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tiposClientesTiposLista['TiposClientesTiposLista']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tiposClientesTiposLista['TiposClientesTiposLista']['id']), null, __('Are you sure you want to delete # %s?', $tiposClientesTiposLista['TiposClientesTiposLista']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tipos Clientes Tipos Lista'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos Clientes'), array('controller' => 'tipos_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Cliente'), array('controller' => 'tipos_clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos Listas'), array('controller' => 'tipos_listas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Lista'), array('controller' => 'tipos_listas', 'action' => 'add')); ?> </li>
	</ul>
</div>
