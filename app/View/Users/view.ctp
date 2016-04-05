<!DOCTYPE html>
<html>
<head>
	
</head>

<body>
	<?php echo $this->element('header'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
          		<ul class="nav nav-sidebar">
          		<li><?php echo $this->Html->link(__('Trang chủ'), array('action' => 'index')); ?> </li>
            	<li><?php echo $this->Html->link(__(' Chỉnh sửa thông tin'), array('action' => 'edit', $user['User']['id'])); ?> </li>
				<!-- <li><?php echo $this->Html->link(__(' Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li> -->
          </ul>
			</div>
			
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


			<div class="users view" >
				<div class="panel panel-info">
					<div class="panel-heading">
              			<h3 class="panel-title"><?php echo __(' Thông tin cá nhân'); ?></h3>
            		</div>
					<div class="panel-body">
						<dl>
							<!-- <dt><?php echo __('Id'); ?></dt>
							<dd>
								<?php echo h($user['User']['id']); ?>
								&nbsp;
							</dd> -->
							<dt><?php echo __('Tên tài khoản'); ?></dt>
							<dd>
								<?php echo h($user['User']['username']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __('Tên chủ tài khoản'); ?></dt>
							<dd>
								<?php echo h($user['User']['fullname']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __(' Địa chỉ'); ?></dt>
							<dd>
								<?php echo h($user['User']['address']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __('Avatar'); ?></dt>
							<dd>
								<?php echo h($user['User']['avatar']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __(' Quyền'); ?></dt>
							<dd>
								<?php echo h($user['User']['role']); ?>
								&nbsp;
							</dd>
						</dl>
					</div>
				</div>
			</div>
			
			<!-- <div class="related">
				<h3><?php echo __('Ví của tôi'); ?></h3>
				<?php if (!empty($user['Wallet'])): ?>
					<table class="table table-striped">
					<tr>
						
						<th><?php echo __('Wallet Name'); ?></th>
						<th><?php echo __('Currency'); ?></th>
						<th><?php echo __('Banlances'); ?></th>
						<th><?php echo __('User Id'); ?></th>
						<th><?php echo __('Actions'); ?></th>
					</tr>
					<?php foreach ($user['Wallet'] as $wallet): ?>
						<tr>
							
							<td><?php echo $wallet['wallet_name']; ?></td>
							<td><?php echo $wallet['currency']; ?></td>
							<td><?php echo $wallet['banlances']; ?></td>
							<td><?php echo $wallet['user_id']; ?></td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('controller' => 'wallets', 'action' => 'view', $wallet['id'])); ?>
								<?php echo $this->Html->link(__('Edit'), array('controller' => 'wallets', 'action' => 'edit', $wallet['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wallets', 'action' => 'delete', $wallet['id']), array('confirm' => __('Bạn có chắc chắn muốn xóa %s?', $wallet['id']))); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</table>
				<?php endif; ?>

			</div> -->
		</div>
	</div>
</div>
	

</body>

</html>