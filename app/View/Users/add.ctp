<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header_add'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="users form">
			<?php echo $this->Form->create('User',array('type' => 'file')); ?>
			<fieldset>
				<legend><?php echo __('Đăng kí người dùng mới'); ?></legend>
			<?php
				echo $this->Form->input('username', array('label'=>'Tên tài khoản', 'class'=>"form-control", 'placeholder' => 'Tên tài khoản'));
				echo $this->Form->input('password', array('label'=>'Mật khẩu (Tối thiểu 8 kí tự)', 'class'=>"form-control", 'placeholder'=>" Mật khẩu"));
				echo $this->Form->input('confirm_password', array('label'=>'Xác nhận mật khẩu', 'class'=>"form-control", 'type'=>'password', 'placeholder'=>" Xác nhận mật khẩu"));
				echo $this->Form->input('fullname', array('label'=>'Tên chủ tài khoản', 'class'=>"form-control", 'placeholder' => 'Họ và tên'));
				echo $this->Form->input('address', array('label'=>' Địa chỉ','class'=>"form-control", 'placeholder'=>" Địa chỉ"));
				echo $this->Form->input('email', array('label'=>'Email', 'class'=>"form-control", 'placeholder' => 'Địa chỉ email'));
			?>
			</br>
			<?php echo $this->GoogleRecaptcha->getRecaptcha(); ?>
			<div class="g-recaptcha" data-sitekey="6LdQ4R8TAAAAAFcBQnwk9H4vHOqA1vdpNf4C99sF"></div>
			</fieldset>
			</br>
			<?php echo $this->Form->button('Đăng kí',array('type' => 'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Html->link('Hủy', array('action' => 'login'), array('class' => 'btn  btn-default')) ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</body>
</html>