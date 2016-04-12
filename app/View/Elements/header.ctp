<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
          <?php echo $this->Html->link('MoneyLover', '/trang-chu',array('class' => array('navbar-brand', 'glyphicon glyphicon-home')));?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='<?php echo $this->webroot."thong-tin-ca-nhan";?>'><i class="glyphicon glyphicon-user"></i><b><?php echo $user_info['username'];?></b></a></li>
            <li><a href='<?php echo $this->webroot."users/logout";?>'><i class="glyphicon glyphicon-log-out"></i>  Đăng xuất</a></li>
          </ul>
        </div>
    </div>
</div>