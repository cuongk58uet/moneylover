<!DOCTYPE html>
<html>

<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
			<li><?php echo $this->Html->link(__('Trang chủ'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(' Quay lại','view/'.$user_info['id']); ?></li>
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="users form">
			<?php echo $this->Form->create('User',array('type' => 'file')); ?>
			<fieldset>
				<legend><?php echo __('Chỉnh sửa thông tin'); ?></legend>
			<?php
				echo $this->Form->hidden('id');
				echo $this->Form->hidden('username');
				echo $this->Form->hidden('password');
				echo $this->Form->input('fullname', array('label'=>'Họ và tên','class'=>"form-control"));
				echo $this->Html->image($this->request->data['User']['avatar'], array('width'=>200, 'height' => 200));
				echo $this->Form->input('avatar', array('label'=> '', 'class'=>'img-thumbnail', 'type' => 'file'));
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