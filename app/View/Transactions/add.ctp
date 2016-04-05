<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header');?>
	<div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li class="active"><?php echo $this->Html->link(__(' Danh sách các giao dịch'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__(' Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Các danh mục'), array('controller' => 'categories', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__(' Thêm danh mục'), array('controller' => 'categories', 'action' => 'add')); ?></li>
        </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="transactions form">
			<?php echo $this->Form->create('Transaction'); ?>
			<fieldset>
				<legend><?php echo __('Thêm giao dịch mới'); ?></legend>
			<?php
				echo $this->Form->input('amount',array('label'=>'Giá trị','class'=>"form-control"));
				echo $this->Form->input('create_date',array('class'=>"bfh-datepicker"));
				echo $this->Form->input('note',array('label'=>'Ghi chú','class'=>"form-control"));
				echo $this->Form->input('wallet_id',array('label'=>' Ví','class'=>"form-control"));
				echo $this->Form->input('category_id',array('label'=>' Danh mục','class'=>"form-control"));
			?>
			</fieldset>
			</br>
			<?php echo $this->Form->button('Thêm giao dịch',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>
</html>