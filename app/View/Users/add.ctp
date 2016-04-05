<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><?php echo $this->Html->link(__(' Danh sách người dùng'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__(' Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="users form">
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<legend><?php echo __('Thêm người dùng'); ?></legend>
			<?php
				echo $this->Form->input('username', array('label'=>' Tên tài khoản','class'=>"form-control"));
				echo $this->Form->input('password', array('label'=>'Mật khẩu','class'=>"form-control"));
				echo $this->Form->input('avatar');
				echo $this->Form->input('role', array('label'=>' Quyền','class'=>"form-control", 'options' => array('admin' => 'Admin' , 'author' => 'Author')));
			?>
			</fieldset>
			</br>
			<?php echo $this->Form->button('Đăng kí',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>
</html>