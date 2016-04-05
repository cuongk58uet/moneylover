<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
            <li class="active"><?php echo $this->Html->link(__(' Sửa giao dịch'), array('action' => 'edit', $transaction['Transaction']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__(' Xóa giao dịch'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __(' Bạn có chắc chắn muốn xóa %s?', $transaction['Transaction']['id']))); ?> </li>
			<li><?php echo $this->Html->link(__(' Danh sách giao dịch'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm giao dịch'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Các danh sách giao dịch'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm danh mục giao dịch'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="transactions view">
			<h2><?php echo __('Giao dịch'); ?></h2>
			<dl>
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($transaction['Transaction']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __(' Giá trị'); ?></dt>
				<dd>
					<?php echo h($transaction['Transaction']['amount']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __(' Ngày tạo giao dịch'); ?></dt>
				<dd>
					<?php echo h($transaction['Transaction']['create_date']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __(' Ghi chú'); ?></dt>
				<dd>
					<?php echo h($transaction['Transaction']['note']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __(' Ví'); ?></dt>
				<dd>
					<?php echo $this->Html->link($transaction['Wallet']['wallet_name'], array('controller' => 'wallets', 'action' => 'view', $transaction['Wallet']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __(' Kiểu danh mục'); ?></dt>
				<dd>
					<?php echo $this->Html->link($transaction['Category']['category_type'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id'])); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>
</body>


</html>