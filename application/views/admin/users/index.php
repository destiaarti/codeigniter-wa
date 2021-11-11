<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed" id="mytable" style="width: 100%">
		<thead>
			<tr class="active">
				<th class="text-center" width="30px" style="padding-left: 20px;">No</th>
				<th>Username</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Last Login</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
            foreach ($users as $users) { ?>
				<tr>
					<td class="text-center" width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
					<td><?= $users->username ?></td>
					<td><?= $users->email ?></td>
					<td><?= $users->phone ?></td>
					<td><?= $users->last_login ?></td>
					<td>
					  <?php echo anchor(site_url('admin/user/edit/' . $users->id), 'Edit Password', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-navy btn-normal')) ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script>
$(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>