<!DOCTYPE html>
<html>
<body>
	
</body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
	          <ul class="nav nav-sidebar">
	            <li class="active"><?php echo $this->Html->link(__('Sửa danh mục'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__(' Xóa danh mục'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __(' Bạn có chắc chắn muốn xóa danh mục %s?', $category['Category']['category_name']))); ?> </li>
				<li><?php echo $this->Html->link(__(' Trở về'), array('action' => 'index')); ?> </li>
				<!--<li><?php echo $this->Html->link(__(' Thêm danh mục'), array('action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__(' Các giao dịch'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__(' Thêm giao dịch'), array('controller' => 'transactions', 'action' => 'add')); ?> </li> -->
	          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="categories view">
			<h2><?php echo __('Danh mục'); ?></h2>
			<dl>
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($category['Category']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __(' Tên danh mục'); ?></dt>
				<dd>
					<?php echo h($category['Category']['category_name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __(' Loại danh mục'); ?></dt>
				<dd>
					<?php echo h($category['Category']['category_type']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>
</html>