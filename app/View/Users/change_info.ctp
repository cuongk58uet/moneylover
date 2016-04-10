<!DOCTYPE html>
<html>

<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
			<li class="active"><?php echo $this->Html->link(__('Trang chủ'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(' Quay lại','view/'.$user_info['id']); ?></li>
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="users form">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Form->create('User',array('type' => 'file')); ?>
			<fieldset>
				<legend><?php echo __('Chỉnh sửa thông tin'); ?></legend>
			
				<?php echo $this->Form->input('fullname', array('label'=>'Họ và tên','class'=>"form-control")); ?></br>
				<?php echo $this->Html->image($this->request->data['User']['avatar'], array('width'=>200, 'height' => 200)); ?></br>
				<?php echo $this->Form->input('avatar', array('label'=> 'Ảnh đại diện', 'class'=>'img-thumbnail', 'type' => 'file')); ?></br>
				<?php echo $this->Form->input('address', array('label'=>' Địa chỉ','class'=>"form-control")); ?></br>
				<?php echo $this->Form->input('email', array('label'=>'Email','class'=>"form-control")); ?></br>
				<?php echo $this->Form->input('role', array('label'=>' Quyền','class'=>"form-control", 'options' => array('admin' => 'Admin'))); ?>
			
			</fieldset>
			</br>
			<?php echo $this->Form->button('Lưu thay đổi',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>


</html>