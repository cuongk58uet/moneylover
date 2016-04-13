<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><?php echo $this->Form->postLink(__(' Xóa giao dịch'), array('action' => 'delete', $this->Form->value('Transaction.id')), array('confirm' => __(' Bạn có chắc chắn muốn xóa giao dịch %s?', $this->Form->value('Transaction.id')))); ?></li>
            <li><?php echo $this->Html->link(__(' Danh mục ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Trở về'), array('action' => 'index')); ?></li>
          </ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="transactions form">
			<?php echo $this->Form->create('Transaction'); ?>
			<fieldset>
				<legend><?php echo __('Sửa giao dịch'); ?></legend>
			
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->Form->input('amount',array('label'=>'Giá trị','class'=>"form-control", 'placeholder' => 'Giá trị')); ?></br>
				<?php echo $this->Form->input('create_date',array(
					'label' => 'Ngày giao dịch : ',
					'class'=>"form-control",
					'placeholder' => 'Ngày',
					'div' => array('class' => 'form-inline'),
					'between' => '<div class="form-group">',
					'separator' => '</div><div class="form-group">',
        			'after' => '</div>'
					)); ?>
				<?php echo $this->Form->input('note',array('label'=>' Ghi chú','class'=>"form-control", 'placeholder' => 'Ghi chú')); ?>
				<?php echo $this->Form->input('wallet_id',array('label'=>' Ví','class'=>"form-control")); ?>
				<?php echo $this->Form->input('category_id',array('label'=>'Danh mục','class'=>"form-control")); ?>
				<?php echo $this->Form->input('category_type',array('label'=>'Kiểu danh mục','class'=>"form-control", 'options' => array('Nợ' => 'Nợ', 'Cho Vay' => 'Cho Vay', 'Chi Tiêu' => 'Chi Tiêu', 'Khoản Thu Nhập' => 'Khoản Thu Nhập'))); ?>
			
			</fieldset>
			</br>
			<?php echo $this->Form->button('Lưu thay đổi',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
</div>
	</div>
</body>

</html>