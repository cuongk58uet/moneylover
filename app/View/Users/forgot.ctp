<html>
<body>
	<div class="panel panel-info">
	
		<div class="panel-heading">
	    	<h3 class="panel-title"><strong class="glyphicon glyphicon-user"></strong> Quên mật khẩu </h3>
		</div>
	    <div class="panel-body"> 
			<div class="users form">
				<?php echo $this->Form->create('User' ); ?>
				<fieldset>
					<?php echo $this->Form->input('email',array('label'=>'Vui lòng nhập địa chỉ Email mà bạn đã đăng kí trên  MoneyLover','class'=>"form-control", 'placeholder'=>"Email"));?></br>
					<?php echo $this->Session->flash(); ?>
				</fieldset>
				<?php echo $this->Form->button('Lấy lại mật khẩu',array('type' => 'submit','class'=>'btn btn-primary')); ?>
				<?php echo $this->Html->link('Trở về', array('action' => 'login'), array('class' => 'btn  btn-default')) ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</body>
</html>