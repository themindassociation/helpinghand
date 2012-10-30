<!DOCTYPE html>
<html lang=en>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('main.css'); ?>
	<?php echo Asset::css('bootstrap-responsive.css'); ?>
	<?php echo Asset::js('bootstrap.js'); ?>	
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a href="#" class="brand">TheMind</a>
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row-fluid">
			<div class="span12">

<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</div>
<?php endif; ?>

<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-error">
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</div>
<?php endif; ?>

<?php echo $content; ?>

			</div>
		</div>
	</div>
</body>
</html>
