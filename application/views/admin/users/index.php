<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed" id="mytable" style="width: 100%">
		<thead>
			<tr class="active">
				<th class="text-center" width="30px" style="padding-left: 20px;">No</th>
				<th>Username</th>
				<th>Email</th>
				<th>Phone</th>
				<th class="text-center" width="160px" style="padding-left: 20px;">Tindakan</th>
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
					<td class="text-center" width="160px" style="padding-left: 20px;">
						<?php echo anchor('admin/users/detail/' . $users->id, 'Detail'); ?> |
						<?php echo anchor('admin/users/edit/' . $users->id, 'Update'); ?> |
						<?php echo anchor('admin/users/delete/' . $users->id, 'Delete'); ?>
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