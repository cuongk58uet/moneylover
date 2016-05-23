<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

<title>
	<?php echo $title_for_layout; ?>
</title>

<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('chickenrainshop');
		
		echo $this->Html->css('dashboard');
		
		echo $this->Html->css('font-awesome');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div  class="container-fluid">
  	<div id="content">
	  	<div class="row">
	  		<?php echo $this->Flash->render(); ?>
	  		<?php echo $this->fetch('content'); ?>
	  	</div>	
  	</div>
</div>

<div id="footer" class="footer">
	<div class="container">
		<div class="row">
	        <div class="pull-right">
	        <strong class="text-muted">DEVELOPMENT TEAM</strong>
	        </div>
			<!-- <?php echo $this->element('sql_dump'); ?> -->
		</div>
	</div>
</div>


<!-- Placed at the end of the document so the pages load faster -->
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('html5shiv'); ?>
<?php echo $this->Html->script('ie10-viewport-bug-workaround'); ?>
<?php echo $this->Html->script('ie-emulation-modes-warning'); ?>
<?php echo $this->Html->script('docs.min'); ?>
</body>
</html>