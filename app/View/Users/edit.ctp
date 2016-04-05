<!DOCTYPE html>
<html>

<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <!-- <li class="active"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __(' Bạn có chắc chắn muốn xóa %s?', $this->Form->value('User.username')))); ?></li> -->
			<li><?php echo $this->Html->link(__('Trang chủ'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(' Quay lại','view/'.$user_info['id']); ?></li>
<!-- 			<li><?php echo $this->Html->link(__(' Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li> -->
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="users form">
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<legend><?php echo __('Chỉnh sửa thông tin'); ?></legend>
			<?php
				echo $this->Form->input('fullname', array('label'=>'Họ và tên','class'=>"form-control"));
				echo $this->Form->input('avatar');
				echo $this->Form->input('address', array('label'=>' Địa chỉ','class'=>"form-control"));
				echo $this->Form->input('role', array('label'=>' Quyền','class'=>"form-control", 'options' => array('admin' => 'Admin' , 'author' => 'Author')));
			?>
			</fieldset>
			</br>
			<?php echo $this->Form->button('Lưu thay đổi',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>


</html>