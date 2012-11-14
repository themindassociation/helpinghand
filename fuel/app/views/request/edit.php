<h2>Editing Request</h2>
<br>

<?php echo render('request/_form'); ?>
<p>
	<?php echo Html::anchor('request/view/'.$request->id, 'View'); ?> |
	<?php echo Html::anchor('request', 'Back'); ?></p>
