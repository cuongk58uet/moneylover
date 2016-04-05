<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><?php echo $this->Html->link(__(' Danh sách ví'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__(' Danh sách người dùng'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm người dùng'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Danh sách giao dịch'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Thêm giao dịch mới'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="wallets form">
			<?php echo $this->Form->create('Wallet'); ?>
			<fieldset>
				<legend><?php echo __('Thêm ví mới'); ?></legend>
			<?php
				echo $this->Form->input('wallet_name',array('label'=>'Tên ví','class'=>"form-control"));
				echo $this->Form->input('currency',array('label'=>' Đơn vị tiền tệ','class'=>"form-control"));
				echo $this->Form->input('banlances',array('label'=>' Số dư','class'=>"form-control"));
				echo $this->Form->input('user_id',array('label'=>'Tài khoản','class'=>"form-control"));
			?>
			</fieldset>
			</br>
			<?php echo $this->Form->button('Thêm ví',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>

</html>