<div class="tiposListas index">
	<h2><?php echo __('Tipos Listas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($tiposListas as $tiposLista): ?>
	<tr>
		<td><?php echo h($tiposLista['TiposLista']['id']); ?>&nbsp;</td>
		<td><?php echo h($tiposLista['TiposLista']['nombre']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tiposLista['TiposLista']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tiposLista['TiposLista']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tiposLista['TiposLista']['id']), null, __('Are you sure you want to delete # %s?', $tiposLista['TiposLista']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tipos Lista'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos Clientes'), array('controller' => 'tipos_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipos Cliente'), array('controller' => 'tipos_clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
