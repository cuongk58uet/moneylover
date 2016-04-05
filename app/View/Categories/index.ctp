<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header'); ?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          	<li class="active"><?php echo $this->Html->link(__('Thêm danh mục'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('Danh sách các giao dịch'), array('controller' => 'transactions', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('Thêm giao dịch'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
          </ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="categories index">
			<h2><?php echo __('Các danh mục'); ?></h2>
			<table class="table table-striped">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('category_name'); ?></th>
					<th><?php echo $this->Paginator->sort('category_type'); ?></th>
					<th><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($categories as $category): ?>
			<tr>
				<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
				<td><?php echo h($category['Category']['category_name']); ?>&nbsp;</td>
				<td><?php echo h($category['Category']['category_type']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link($this->Form->button('Chi tiết'), array('action' => 'view', $category['Category']['id']), array('escape'=>false)); ?>

					<?php echo $this->Html->link($this->Form->button('Sửa'), array('action' => 'edit', $category['Category']['id']), array('escape'=>false)); ?>
					
					<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Bạn có chắc chắn muốn xóa danh mục %s?', $category['Category']['category_name']))); ?>
				</td>
			</tr>
		<?php endforeach; ?>
			</tbody>
			</table>
			<p>
			<?php
			echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>	</p>
			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		</div>
	</div>
</body>

</html>