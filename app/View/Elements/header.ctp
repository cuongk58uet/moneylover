<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
          <i class="glyphicon glyphicon-home navbar-brand"></i><?php echo $this->Html->link('Money Lover', '/trang-chu',array('class' => 'navbar-brand'));?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a><i class="glyphicon glyphicon-user"></i><b><?php echo $user_info['username'];?></b></a></li>
            <li><a href='<?php echo $this->webroot."users/logout";?>'><i class="glyphicon glyphicon-log-out"></i>  Đăng xuất</a></li>
          </ul>
        </div>
    </div>
</div>