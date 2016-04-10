<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><?php echo $this->Html->link(__(' Chỉnh sửa ví'), array('action' => 'edit', $wallet['Wallet']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__(' Xóa ví'), array('action' => 'delete', $wallet['Wallet']['id']), array('confirm' => __('Bạn có chắc chắn muốn xóa %s?', $wallet['Wallet']['wallet_name']))); ?> </li>
			<li><?php echo $this->Html->link(__(' Danh sách ví'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Danh sách các giao dịch'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm giao dịch mới'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
          </ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="wallets view">
			<div class="panel panel-info">
				<div class="panel-heading">
          			<h3 class="panel-title"><?php echo __(' Thông tin ví'); ?></h3>
        		</div>
				<div class="panel-body">
					<h2><?php echo __(' Ví'); ?></h2>
					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($wallet['Wallet']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __(' Tên ví'); ?></dt>
						<dd>
							<?php echo h($wallet['Wallet']['wallet_name']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __(' Đơn vị tiền tệ'); ?></dt>
						<dd>
							<?php echo h($wallet['Wallet']['currency']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __(' Số dư'); ?></dt>
						<dd>
							<?php echo h($wallet['Wallet']['banlances']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('User'); ?></dt>
						<dd>
							<?php echo $this->Html->link($wallet['User']['username'], array('controller' => 'users', 'action' => 'view', $wallet['User']['id'])); ?>
							&nbsp;
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="related">
			<h3><?php echo __('Giao dịch liên quan'); ?></h3>
			<?php if (!empty($wallet['Transaction'])): ?>
				<table class="table table-striped">
				<tr>
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('Giá trị'); ?></th>
					<th><?php echo __('Ngày giao dịch'); ?></th>
					<th><?php echo __('Ghi chú'); ?></th>
					<th><?php echo __(' ID Ví'); ?></th>
					<th><?php echo __(' Danh mục'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($wallet['Transaction'] as $transaction): ?>
					<tr>
						<td><?php echo $transaction['id']; ?></td>
						<td><?php echo $transaction['amount']; ?></td>
						<td><?php echo $transaction['create_date']; ?></td>
						<td><?php echo $transaction['note']; ?></td>
						<td><?php echo $transaction['wallet_id']; ?></td>
						<td><?php echo $transaction['category_id']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('Chi tiết'), array('controller' => 'transactions', 'action' => 'view', $transaction['id']), array('class' => 'btn btn-xs btn-primary')); ?>
							<?php echo $this->Html->link(__('Sửa'), array('controller' => 'transactions', 'action' => 'edit', $transaction['id']), array('class' => 'btn btn-xs btn-primary')); ?>
							<?php echo $this->Form->postLink(__('Xóa'), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), array('confirm' => __(' Bạn có chắc chắn muốn xóa %s?', $transaction['id']))); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
			<?php else: ?>
				<h4><strong> Bạn chưa tạo giao dịch nào. Nhấn vào <?php echo $this->Html->link('đây', array('controller'=> 'transactions', 'action' => 'add')) ; ?> để tạo giao dịch mới </strong></h4>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>