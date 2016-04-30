<strong>
	<?php
	echo $this->Paginator->counter('Trang {:page}/{:pages}, hiển thị {:current} '.$object.' trong tổng số {:count} '.$object);
	?></br>
		<?php echo $this->Paginator->prev('Trở lại ', array('class'=>'btn btn-xs btn-default')); ?>
		<?php echo $this->Paginator->numbers(array('separator' => ' - ', 'class' => 'btn btn-xs btn-default ', 'currentClass' => 'current')); ?>
		<?php echo $this->Paginator->next(' Kế tiếp', array('class'=>'btn btn-xs btn-default')); ?>
</strong>