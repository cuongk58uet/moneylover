<!DOCTYPE html>
<html>
<body>
	<?php echo $this->element('header');	?>
	<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <?php if(!empty($wallets)): ?>
            <li><?php echo $this->Html->link(__(' Thêm giao dịch mới'), array('action' => 'add')); ?></li>
          <?php endif ?>
            <li><?php echo $this->Html->link(__('Thêm ví mới'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('Thêm danh mục mới'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('Danh sách ví'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
          </ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo $this->Session->flash(); ?>
		<div class="transactions index">
			<?php if(empty($wallets)): ?>
				<h3>Ohhh!!! Xin chào <b><?php echo $user_info['fullname'];?></b></h3>
				<h4><strong> Có vẻ bạn chưa tạo ví nào. Nhấn vào <?php echo $this->Html->link('đây', array('controller'=> 'wallets', 'action' => 'add')) ; ?> để tạo ví mới </strong></h4></br>
			<?php else: ?>
			<?php if(!empty($transactions)): ?>
			<h3><b>Tổng quan tháng <?php echo date('m - Y'); ?></b></h3>
			<table class="table" style="width:auto;">
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
			<?php echo $this->Html->link(__('Chi tiết'), '/bao-cao-hang-thang/'.$currentMonth.'/'.$currentYear , array('class' => 'btn btn-sm btn-primary')); ?>
			<h2><b><?php echo __('Các giao dịch đã lưu'); ?></b></h2>
			<table class="table table-striped">
			<thead>
			<tr>
					<!-- <th><?php echo $this->Paginator->sort('id'); ?></th> -->
					<th><?php echo $this->Paginator->sort('create_date','Ngày giao dịch'); ?></th>
					<th><?php echo $this->Paginator->sort('amount','Giá trị'); ?></th>
					<th><?php echo $this->Paginator->sort('note','Ghi chú'); ?></th>
					<th><?php echo $this->Paginator->sort('wallet_name', 'Tên ví'); ?></th>
					<th><?php echo $this->Paginator->sort('category_name','Kiểu danh mục'); ?></th>
					<th><?php echo __('Tùy chọn'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($transactions as $transaction): ?>
			<tr>
				<!-- <td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td> -->
				<td><?php echo date('d-m-Y',strtotime($transaction['Transaction']['create_date'])); ?>&nbsp;</td>
				<td><?php echo $this->Number->format($transaction['Transaction']['amount'],array(
						'places' => 0,
						'before' => null,
					    'escape' => false,
					    'decimals' => '.',
					    'thousands' => ','
					    )); ?>&nbsp;</td>
				<td><?php echo h($transaction['Transaction']['note']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($transaction['Wallet']['wallet_name'], '/thong-tin-vi/'.$transaction['Wallet']['slug']); ?>
				</td>
				<td>
					<?php echo $this->Html->link($transaction['Category']['category_name'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Chi tiết'), '/chi-tiet-giao-dich/'.$transaction['Transaction']['slug'],array('class' => 'btn btn-xs btn-primary')); ?>
					<?php echo $this->Html->link(__('Sửa'), '/chinh-sua-giao-dich/'.$transaction['Transaction']['slug'],array('class' => 'btn btn-xs btn-primary')); ?>
					<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Bạn có chắc chắn muốn xóa %s?', $transaction['Transaction']['note']))); ?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
			<?php echo $this->Html->link(__(' Thêm giao dịch mới'), array('controller' => 'transactions', 'action' => 'add'), array('class' => 'btn btn-sm btn-primary')); ?></br>
			<?php echo $this->element('paginate', array('object' => 'giao dịch')); ?>
		</div>
	<?php else: ?>
		<h1>Ohhh!!!</h1>
		<h4><strong> Bạn chưa tạo giao dịch nào. Nhấn vào <?php echo $this->Html->link('đây', array('controller'=> 'transactions', 'action' => 'add')) ; ?> để tạo giao dịch mới </strong></h4>
	<?php endif ?>
	<?php endif ?>
	</div>

</body>


</html>