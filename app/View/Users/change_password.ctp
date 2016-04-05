<html>
<head>
	
</head>

<body>
<div class ="container">
	<div class="content col-md-4">
	</div>
		<div class="content col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
	            	<h2 class="panel-title"> Đổi mật khẩu</h2>
	            </div>
	            <div class="panel-body">
	            	<?php echo $this->Session->flash('auth' ); ?>
					<?php echo $this->element('errors'); ?>
					<div class="users form">

						<?php echo $this->Form->create('User' ); ?>
						<fieldset>
							<?php echo $this->Form->input('password',array('label'=>' Mật khẩu mới','class'=>"form-control", 'placeholder'=>" Mật khẩu mới"));
							echo $this->Form->input('confim_password',array('lable'=>' Xác nhận mật khẩu', 'class'=>'form-control', 'placeholder'=>" Xác nhận mật khẩu", 'type'=>'password' ));
							?>
							
						</fieldset></br>
						<?php echo $this->Form->button(' Lưu thay đổi',array('type' => '','class'=>'btn btn-lg btn-primary btn-block')); ?></br>
						<button type="button" class="btn btn-default"><?php echo $this->Html->link(__('Hủy thay đổi'), array('action' => 'index')); ?></button>
						
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>