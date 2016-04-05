<!DOCTYPE html>
<html>

<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><?php echo $this->Html->link(__(' Thêm ví mới'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__(' Danh sách người dùng'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm người dùng'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Danh sách các giao dịch'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm giao dịch mới'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="wallets index">
			<h2><?php echo __('Danh sách ví'); ?></h2>
			<table class="table table-striped">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('wallet_name'); ?></th>
					<th><?php echo $this->Paginator->sort('currency'); ?></th>
					<th><?php echo $this->Paginator->sort('banlances'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($wallets as $wallet): ?>
			<tr>
				<td><?php echo h($wallet['Wallet']['id']); ?>&nbsp;</td>
				<td><?php echo h($wallet['Wallet']['wallet_name']); ?>&nbsp;</td>
				<td><?php echo h($wallet['Wallet']['currency']); ?>&nbsp;</td>
				<td><?php echo h($wallet['Wallet']['banlances']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($wallet['User']['username'], array('controller' => 'users', 'action' => 'view', $wallet['User']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $wallet['Wallet']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $wallet['Wallet']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $wallet['Wallet']['id']), array('confirm' => __(' Bạn có chắc chắn muốn xóa %s?', $wallet['Wallet']['id']))); ?>
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