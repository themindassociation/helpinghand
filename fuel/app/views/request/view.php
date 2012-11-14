<h2>Viewing #<?php echo $request->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $request->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $request->body; ?></p>

<?php echo Html::anchor('request/edit/'.$request->id, 'Edit'); ?> |
<?php echo Html::anchor('request', 'Back'); ?>