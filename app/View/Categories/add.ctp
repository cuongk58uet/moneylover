<!DOCTYPE html>
<html>
<head>
	
</head>

<body>
	<?php echo $this->element('header'); ?>
	<div class=" col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li class="active"><?php echo $this->Html->link(__('Các danh mục'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('Danh sách các giao dịch'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Thêm giao dịch'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="categories form">
		<?php echo $this->Form->create('Category'); ?>
		<fieldset>
			<legend><?php echo __('Thêm danh mục'); ?></legend>
				<?php
					echo $this->Form->input('category_name',array('label'=>'Tên danh mục mới','class'=>"form-control", 'placeholder'=>" Tên danh mục"));
					echo $this->Form->input('category_type',array('label'=>'Kiểu danh mục','class'=>"form-control", 'options' => array('Nợ & Cho vay' => 'Nợ & Cho vay' ,'Chi Tiêu' => 'Chi Tiêu', 'Thu Nhập' => 'Thu Nhập')));
				?>
		</fieldset>
		</br>
		<?php echo $this->Form->button('Thêm',array('type' => 'submit','class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>
</html>
