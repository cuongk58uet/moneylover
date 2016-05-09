<!DOCTYPE html>
<html>
<head>
	
</head>

<body>
	<?php echo $this->element('header'); ?>
	<div class=" col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><?php echo $this->Html->link(__('Trang chủ'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>

		</ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="categories form">
		<?php echo $this->Form->create(); ?>
		<fieldset>
			<legend><?php echo __('Chuyển tiền giữa 2 ví'); ?></legend>
				<?php
					echo $this->Form->input('amount',array('label'=>'Số tiền muốn chuyển','class'=>"form-control", 'placeholder'=>" Số tiền muốn chuyển"));
					echo $this->Form->input('source_id',array('label'=>'Ví Nguồn','class'=>"form-control"));
					echo $this->Form->input('destination_id',array('label'=>'Ví Đích','class'=>"form-control"));
				?>
		</fieldset>
		</br>
		<?php echo $this->Form->button('Thực hiện chuyển tiền',array('type' => 'submit','class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>
</html>
