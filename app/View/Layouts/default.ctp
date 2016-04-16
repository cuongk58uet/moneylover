<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

<title>
	<?php echo $title_for_layout; ?>
</title>

<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');

		echo $this->Html->css('chickenrainshop');
		echo $this->Html->css('dashboard');
		
		echo $this->Html->css('font-awesome');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<!-- Bootstrap core CSS -->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="container" class="container">
  	<div id="content">
	  	<div class="row">
	  		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  			<?php echo $this->Flash->render(); ?>
	  			
			</div>	
	  		<?php echo $this->fetch('content'); ?>
	  	</div>
  	</div>
</div>
<div id="footer" class="footer">
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <strong class="text-muted">DEVELOPMENT TEAM</strong>
		<!-- <?php echo $this->element('sql_dump'); ?> -->
    </div>
</div>
<!-- Placed at the end of the document so the pages load faster -->
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('html5shiv'); ?>
<script 
src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
jQuery('.creload').on('click', function() {
    var mySrc = $(this).prev().attr('src');
    var glue = '?';
    if(mySrc.indexOf('?')!=-1)  {
        glue = '&';
    }
    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
    return false;
});
</script>
</body>
</html>