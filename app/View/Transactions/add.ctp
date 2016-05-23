<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header');?>
	<br>
	<button type="button" class="btn btn-default" data-toggle="collapse" data-target=".sidebar"><i class="glyphicon glyphicon-chevron-right"></i> Menu</button>
	<div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
        	<li class="active"><?php echo $this->Html->link(__(' Thêm giao dịch mới'), ''); ?> </li>
			<li><?php echo $this->Html->link(__(' Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__(' Các danh mục'), array('controller' => 'categories', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__(' Thêm danh mục'), array('controller' => 'categories', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('Trở về'), array('action' => 'index')); ?></li>
        </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php if($this->Session->check('Message.success')): ?>
			<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $this->Session->flash('success'); ?>
			</div>
		<?php else: ?>
		<?php if($this->Session->check('Message.error')): ?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $this->Session->flash('error'); ?>
			</div>
		<?php endif ?>
		<?php endif ?>
		<div class="transactions form">
			<?php echo $this->Form->create('Transaction'); ?>
			<fieldset>
				<legend><?php echo __('Thêm giao dịch mới'); ?></legend>
			
				<?php echo $this->Form->input('amount',array('label'=>'Giá trị','class'=>"form-control", 'placeholder' => 'Giá trị')); ?></br>
				<?php echo $this->Form->input('create_date',array(
					'label' => 'Ngày giao dịch : ',
					'class'=>"form-control",
					'type' => 'date',
					'dateFormat' => 'DMY',
					'placeholder' => 'Ngày',
					'div' => array('class' => 'form-inline'),
					'between' => '<div class="form-group">',
					'separator' => '</div><div class="form-group">',
        			'after' => '</div>'
					)); ?>
				<?php echo $this->Form->input('note',array('label'=>'Ghi chú','class'=>"form-control", 'placeholder' => 'Ghi chú')); ?>
				<?php echo $this->Form->input('wallet_id',array('label'=>' Ví','class'=>"form-control")); ?>
				<?php echo $this->Form->input('category_id',array('label'=>'Danh mục','class'=>"form-control")); ?>
				<?php echo $this->Form->input('user_id',array('label'=>'Tài khoản','class'=>"form-control")); ?>
			
			</fieldset>
			</br>
			<?php echo $this->Form->button('Thêm giao dịch',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>
</html>