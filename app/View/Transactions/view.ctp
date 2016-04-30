<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
            <li><?php echo $this->Html->link(__(' Sửa giao dịch'), '/chinh-sua-giao-dich/'.$transaction['Transaction']['slug']); ?> </li>
			<li><?php echo $this->Form->postLink(__(' Xóa giao dịch'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __(' Bạn có chắc chắn muốn xóa %s?', $transaction['Transaction']['id']))); ?> </li>
			<li><?php echo $this->Html->link(__(' Trở về'), array('action' => 'index')); ?> </li>
          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="transactions view">
			<div class="panel panel-info">
				<div class="panel-heading">
	      			<h3 class="panel-title"><?php echo __('Chi tiết giao dịch'); ?></h3>
	    		</div>
				<div class="panel-body">
					
					<dl>
						<dt><?php echo __(' Giá trị'); ?></dt>
						<dd>
							<?php echo h($transaction['Transaction']['amount']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __(' Ngày tạo giao dịch'); ?></dt>
						<dd>
							<?php echo h($transaction['Transaction']['create_date']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __(' Ghi chú'); ?></dt>
						<dd>
							<?php echo h($transaction['Transaction']['note']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __(' Ví'); ?></dt>
						<dd>
							<?php echo $this->Html->link($transaction['Wallet']['wallet_name'], '/thong-tin-vi/'.$transaction['Wallet']['slug']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __(' Kiểu danh mục'); ?></dt>
						<dd>
							<?php echo $this->Html->link($transaction['Category']['category_type'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id'])); ?>
							&nbsp;
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</body>


</html>