<!DOCTYPE html>
<html>
<body>
	
</body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
	          <ul class="nav nav-sidebar">
	            <li><?php echo $this->Html->link(__('Sửa danh mục'), '/chinh-sua-danh-muc/'.$category['Category']['id']); ?> </li>
				<li><?php echo $this->Form->postLink(__(' Xóa danh mục'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __(' Bạn có chắc chắn muốn xóa danh mục %s?', $category['Category']['category_name']))); ?> </li>
				<li><?php echo $this->Html->link(__(' Trở về'), array('action' => 'index')); ?> </li>
	          </ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="panel panel-info">
			<div class="panel-heading">
      			<h3 class="panel-title"><?php echo __(' Chi tiết danh mục'); ?></h3>
    		</div>
			<div class="panel-body">
				<div class="categories view">
					<dl>
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
		</div>
	</div>
</html>