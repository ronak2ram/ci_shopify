<?php $this->load->view('layout/header'); ?>
<table class="table table-striped table-responsive">
	<tr>
		<th>Topic</th>
		<th>Address</th>
		<th>Action</th>
		<!-- <th>Full Data</th> -->
	</tr>
	<tr>
		<?php 
			foreach ($webhook as $key => $value) { ?>
			<tr>
				<td><?=  $value['topic']?></td>
				<td><?=  $value['address']?></td>
				<td>
					<a href="<?= base_url('webhook/edit/'.$value['id']) ?>" class='btn btn-primary'>Edit </a>
					<a href="<?= base_url('webhook/delete/'.$value['id']) ?>" class='btn btn-danger' onclick='return confirm("Really want to delete")'>Delete </a>
						
				</td>
				<!-- <td><?= json_encode($value)?></td> -->
			</tr>	
		<?php } ?>
	</tr>
</table>
<?php $this->load->view('layout/footer'); ?>