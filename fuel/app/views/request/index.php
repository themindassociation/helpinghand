<h2>Listing Requests</h2>
<br>
<?php if ($requests): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Body</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($requests as $request): ?>		<tr>

			<td><?php echo $request->title; ?></td>
			<td><?php echo $request->body; ?></td>
			<td>
				<?php echo Html::anchor('request/view/'.$request->id, 'View'); ?> |
				<?php echo Html::anchor('request/edit/'.$request->id, 'Edit'); ?> |
				<?php echo Html::anchor('request/delete/'.$request->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Requests.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('request/create', 'Add new Request', array('class' => 'btn btn-success')); ?>

</p>
