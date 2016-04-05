<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header');	?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
      
            <li class="active"><?php echo $this->Html->link(__(' Thêm giao dịch mới'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__(' Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Các danh mục giao dịch'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm danh mục giao dịch'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
          </ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="transactions index">
			<h2><?php echo __('Các giao dịch'); ?></h2>
			<table class="table table-striped">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('amount'); ?></th>
					<th><?php echo $this->Paginator->sort('create_date'); ?></th>
					<th><?php echo $this->Paginator->sort('note'); ?></th>
					<th><?php echo $this->Paginator->sort('wallet_id'); ?></th>
					<th><?php echo $this->Paginator->sort('category_id'); ?></th>
					<th><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($transactions as $transaction): ?>
			<tr>
				<td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
				<td><?php echo h($transaction['Transaction']['amount']); ?>&nbsp;</td>
				<td><?php echo h($transaction['Transaction']['create_date']); ?>&nbsp;</td>
				<td><?php echo h($transaction['Transaction']['note']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($transaction['Wallet']['wallet_name'], array('controller' => 'wallets', 'action' => 'view', $transaction['Wallet']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($transaction['Category']['id'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $transaction['Transaction']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
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
	</div>

</body>


</html>