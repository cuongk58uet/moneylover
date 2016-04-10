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
					<?php echo $this->Form->input('email',array('label'=>'Email','class'=>"form-control", 'placeholder'=>"Email"));?></br>
					<?php echo $this->Session->flash(); ?>
				</fieldset></br>
				<div class="col-md-4 col-xs-6"></div>
				<div class=" col-md-4">
				<?php echo $this->Form->button('Lấy lại mật khẩu',array('type' => 'submit','class'=>'btn btn-lg btn-primary btn-block')); ?>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</body>
</html>