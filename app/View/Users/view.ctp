<!DOCTYPE html>
<html>
<head>
	
</head>

<body>
	<?php echo $this->element('header'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
          		<ul class="nav nav-sidebar">
          		<li class="active"><?php echo $this->Html->link(__('Trang chủ'), array('action' => 'index')); ?> </li>
            	<li><?php echo $this->Html->link(__(' Chỉnh sửa thông tin'), '/cap-nhat-thong-tin'); ?> </li>
          </ul>
			</div>
			
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<?php echo $this->Session->flash(); ?>
			<div class="users view" >
				<div class="panel panel-info">
					<div class="panel-heading">
              			<h3 class="panel-title"><?php echo __(' Thông tin cá nhân'); ?></h3>
            		</div>
					<div class="panel-body">
						<dl>
							<dt><?php echo __('Tên tài khoản'); ?></dt>
							<dd>
								<?php echo h($user['User']['username']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __('Tên chủ tài khoản'); ?></dt>
							<dd>
								<?php echo h($user['User']['fullname']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __(' Địa chỉ'); ?></dt>
							<dd>
								<?php echo h($user['User']['address']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __('Email'); ?></dt>
							<dd>
								<?php echo h($user['User']['email']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __('Avatar'); ?></dt>
							<dd>
								<?php echo $this->Html->image($user['User']['avatar'],array('width'=>200, 'height' => 200)); ?>
								&nbsp;
							</dd></br>
							<dt><?php echo __(' Quyền'); ?></dt>
							<dd>
								<?php echo h($user['User']['role']); ?>
								&nbsp;
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	

</body>

</html>