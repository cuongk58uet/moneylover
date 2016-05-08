<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header');	?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
      		<li><?php echo $this->Html->link(__('Trang chủ'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Trở về'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
          </ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="transactions index">
			<h3><b>Tổng quan tháng <?php echo date('m - Y'); ?></b></h3>
			<table class="table" style="width:auto; border:none;">
				<tr>
					<td><b>Tiền vào:</b></td>
					<td><?php echo $this->Number->format($inflow['0']['0']['Total'],array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )) ?></td>
				</tr>
				<tr>
					<td><b>Tiền ra:</b></td>
					<td><?php echo $this->Number->format($outflow['0']['0']['Total'], array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )) ?></td>
				</tr>
				<tr>
					<td><b>Thu nhập ròng:</b></td>
					<td><?php echo $this->Number->format($netIncome, array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )) ?></td>
				</tr>
			</table>
			<?php if($netIncome < 0): ?>
				<h4><b>Bạn đã chi tiêu quá tay trong tháng này. Hãy nhanh chóng điều chỉnh kế hoạch chi tiêu hợp lý</b></h4></br>
			<?php endif ?>
			<h4><b>Khoản chi lớn nhất: </b> <?php echo $this->Number->format($most_outflow['Transaction']['amount'], array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )) ?></h4>
		    <p><b>Danh mục:</b> <?php echo $most_outflow['Category']['category_name']?></p>
			<p><b>Ghi chú:</b> <?php echo $most_outflow['Transaction']['note']?></p>
			<p><b>Ngày tạo giao dịch:</b> <?php echo date('d-m-Y',strtotime($most_outflow['Transaction']['create_date']))?></p></br>
			<!--  -->
			<h4><b>Chi tiêu theo nhóm:</b></h4>
			<?php foreach ($details_outflow as $detail): ?>
				<h5><b><?php echo $detail['Category']['category_name']?>: </b><?php echo $this->Number->toPercentage($detail['0']['Total']/$outflow['0']['0']['Total']*100)?> </h5>
			<?php endforeach; ?>
			<!--  -->
			</br><h4><b>Thu nhập:</b></h4>
			<?php foreach ($details_inflow as $details_inflow): ?>
				<h5><b><?php echo $details_inflow['Category']['category_name']?>: </b><?php echo $this->Number->format($details_inflow['0']['Total'], array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    ))?> </h5>
			<?php endforeach; ?>
		</div>
	</div>

</body>


</html>