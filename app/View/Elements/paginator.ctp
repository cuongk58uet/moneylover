<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Trang {:page} của {:pages}, hiển thị {:current} trong tổng số {:count}, starting on record {:start}, ending on {:end}')
	));
	?>
</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __(' Trở lại '), array(), null, array('type'=>'button', 'class'=>'btn btn-xs btn-primary'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(' Kế tiếp ') . ' >', array(), null, array('type'=>'button', 'class'=>'btn btn-xs btn-primary'));
	?>
	</div>

<ul class="pagination">
	<?php echo $this->Paginator->prev('<<',array('tag'=>'li'),'<<',array('tag'=>'li', 'disabledTag','class'=>'disabled')); ?>

	<?php echo $this->Paginator->numbers(array('separator'=>'', 'tag'=>'li','currentClass'=>'active','currentTag'=>'a')); ?>

	<?php echo $this->Paginator->next('>>',array('tag'=>'li'),'>>',array('tag'=>'li', 'disabledTag','class'=>'disabled')); ?>
	
</ul>