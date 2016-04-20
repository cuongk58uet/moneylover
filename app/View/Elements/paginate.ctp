<strong>
	<?php
	echo $this->Paginator->counter('Trang {:page}/{:pages}, hiển thị {:current} '.$object.' trong tổng số {:count} '.$object);
	?></br>
		<?php echo $this->Paginator->prev('Trở lại  '); ?>
		<?php echo $this->Paginator->numbers(array('separator' => ' - ')); ?>
		<?php echo $this->Paginator->next('  Kế tiếp'); ?>
</strong>