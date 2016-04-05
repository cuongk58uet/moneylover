<!DOCTYPE html>
<html>
<head>
	<!-- <?php echo $title;  ?> -->
</head>
<body>
<?php echo $this->element('header'); ?>

<div class="container-fluid">
	<div class="row">
		<div class=" col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          	<li>Xin chào: <b><?php echo $user_info['fullname'];?></b></li>
          	<li><?php echo $this->Html->link(' Thông tin cá nhân','view/'.$data['id']); ?></li>
            <!-- <li><?php echo $this->Html->link(__(' Thêm người dùng'), array('action' => 'add')); ?></li> -->
			<li><?php echo $this->Html->link(__(' Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link('Đổi mật khẩu', '/doi-mat-khau');	?></li>

          </ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="users index">
				<h2><?php echo __(' Danh sách người dùng'); ?></h2>
				<table class="table table-striped">
		            <thead>
		              <tr>
		                <th><?php echo $this->Paginator->sort('username'); ?></th>
		                <th><?php echo $this->Paginator->sort('fullname'); ?></th>
		                <th><?php echo $this->Paginator->sort('avatar'); ?></th>
		                <th><?php echo $this->Paginator->sort('role'); ?></th>
		                <th class="actions"><?php echo __('Actions'); ?></th>
		              </tr>
		            </thead>
		            <tbody>
		            	
			            <tr>
							<td><?php echo $user['User']['username']; ?>&nbsp;</td>
							<td><?php echo $user['User']['fullname']; ?>&nbsp;</td>
							<td><?php echo $user['User']['avatar']; ?>&nbsp;</td>
							<td><?php echo $user['User']['role']; ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __(' Bạn có chắc chắn muốn xóa %s?', $user['User']['username']))); ?>
							</td>
						</tr>
						
		            </tbody>
          		</table>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>