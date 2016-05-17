<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header');	?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
      		<!-- <li><?php echo $this->Html->link(__('Trang chủ'), array('controller' => 'transactions', 'action' => 'index')); ?> </li> -->
			<li><?php echo $this->Html->link(__('Trở về'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
          </ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="transactions index">
			<h3><b>Tổng quan tháng <?php echo $month.' - '.$year ?></b></h3>
			<table class="table" style="width:auto; border:none;">
				<tr>
					<td><b>Tiền vào:</b></td>
					<td>
					<?php if(!empty($inflow['0']['0']['Total'])): ?>
						<?php echo $this->Number->format($inflow['0']['0']['Total'],array(
							'places' => 0,
							'before' => null,
						    'escape' => false,
						    'decimals' => '.',
						    'thousands' => ','
						    )) ?>
					<?php else: ?>
						<p style="color: #0080ff">Không có dữ liệu để hiển thị</p>
					<?php endif ?>
					</td>
					

				</tr>
				<tr>
					<td><b>Tiền ra:</b></td>
					<td>
					<?php if(!empty($outflow['0']['0']['Total'])): ?>
					<?php echo $this->Number->format($outflow['0']['0']['Total'], array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )) ?>
					<?php else: ?>
						<p style="color: #0080ff">Không có dữ liệu để hiển thị</p>
					<?php endif ?>
					</td>
				</tr>
				<tr>
					<td><b>Thu nhập ròng:</b></td>
					<td>
					<?php if(!empty($netIncome)): ?>
					<?php echo $this->Number->format($netIncome, array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )) ?>
					<?php else: ?>
						<p style="color: #0080ff">Không có dữ liệu để hiển thị</p>
					<?php endif ?>
					</td>
				</tr>
			</table>
			<?php if($netIncome < 0): ?>
				<h4><b style=" color: red">Bạn đã chi tiêu quá tay trong tháng này. Hãy nhanh chóng điều chỉnh kế hoạch chi tiêu hợp lý</b></h4></br>
			<?php endif ?>
			<h4><b>Khoản chi lớn nhất: </b> 
			<?php if(!empty($most_outflow['Transaction']['amount'])): ?>
			<?php echo $this->Number->format($most_outflow['Transaction']['amount'], array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )) ?>
			<?php else: ?>
						
			<?php endif ?>
						</h4>
		    <p><b>Danh mục:</b> 
		    <?php if(!empty($most_outflow['Category']['category_name'])): ?>
		    	<?php echo $most_outflow['Category']['category_name']?>
		    <?php else: ?>
		    	<b style="color: #0080ff">Rỗng</b>
		    <?php endif ?>
		    </p>

			<p><b>Ghi chú:</b> 
			<?php if(!empty($most_outflow['Transaction']['note'])): ?>
				<?php echo $most_outflow['Transaction']['note']?>
			<?php else: ?>
				<b style="color: #0080ff">Rỗng</b>
			<?php endif ?>
			</p>
			<p><b>Ngày tạo giao dịch:</b> 
			<?php if(!empty($most_outflow['Transaction']['create_date'])): ?>
				<?php echo date('d-m-Y',strtotime($most_outflow['Transaction']['create_date']))?>
			<?php else: ?>
				<b style="color: #0080ff">Rỗng</b>
			<?php endif ?>
			</p></br>
			<!--  -->
			<h4><b>Chi tiêu theo nhóm:</b></h4>
			<?php if(!empty($details_outflow)): ?>
				<?php foreach ($details_outflow as $detail): ?>
					<h5><b><?php echo $detail['Category']['category_name']?>: </b><?php echo $this->Number->toPercentage($detail['0']['Total']/$outflow['0']['0']['Total']*100)?> </h5>
				<?php endforeach; ?>
			<?php else: ?>
				<p style="color: #0080ff">Không có khoản chi tiêu nào</p>
			<?php endif ?>
			
			<!--  -->
			</br><h4><b>Thu nhập:</b></h4>
			<?php if(!empty($details_inflow)): ?>
				<?php foreach ($details_inflow as $details_inflow): ?>
					<h5><b><?php echo $details_inflow['Category']['category_name']?>: </b><?php echo $this->Number->format($details_inflow['0']['Total'], array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    ))?> </h5>
				<?php endforeach; ?>
			<?php else: ?>
				<p style="color: #0080ff">Không có khoản thu nhập nào</p>
			<?php endif ?>

			</br></br><h4><b>Xem tổng quan của tháng khác: </b></h4>
			<div class="categories form">
				<?php echo $this->Form->create(); ?>
				<fieldset>
						<?php echo $this->Form->input('date', array(
							'type'  => 'date',
							'class'=>"form-control",
							'div' => array('class' => 'form-inline'),
							'between' => '<div class="form-group">',
							'separator' => '</div><div class="form-group">',
		        			'after' => '</div>',
		        			'label' => 'Chọn thời gian: ',
							'empty' => false,
							'dateFormat' => 'MY',
							'maxYear' => date('Y'),
							'minYear' => date('Y') - 5
							));
						?>
				</fieldset>
				</br>
				<?php echo $this->Form->button('Xem',array('type' => 'submit','class'=>'btn btn-primary')); ?>
				<?php echo $this->Form->end(); ?>
			</div>
			
		</div>
	</div>

</body>


</html>