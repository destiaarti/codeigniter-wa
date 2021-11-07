<?php echo anchor('/visa', 'Back'); ?>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Visa</h3>
            </div>
			
<table style="margin: 35px">
<tr>
		<td><b>Visa Type :</b></td>
		<td><?= $visa->visa_type ?></td>
	</tr>
<tr>
		<td><b>First Name :</b></td>
		<td><?= $visa->first_name ?></td>
	</tr>
	<tr>
		<td><b>Last Name :</b></td>
		<td><?= $visa->last_name ?></td>
	</tr>
	<tr>
		<td><b>No Visa :</b></td>
		<td><?= $visa->visa_number ?></td>
	</tr>
	<tr>
		<td><b>Email :</b></td>
		<td><?= $visa->email ?></td>
	</tr>
	<tr>
		<td><b>File Visa :</b></td>
</tr>
<tr>
		
			<?if($visa->visa_file != "default.png") { ?>
			
				<td><img src="<?php echo base_url('assets/uploads/visa/'.$visa->visa_file); ?>" width="250"  height="220" /> </td>
				<tr>
				<td><?=anchor('assets/uploads/visa/'.$visa->visa_file, 'View Visa File!','target="_blank"')?></td>
<? } else{ ?>
	<td><img src="<?php echo base_url('assets/uploads/default.png'); ?>" width="250"  height="220" /> </td>
		<tr>
	<td>No File Upload</td>
	<? } ?>
</tr>
<tr></tr>
	</tr>

	<tr>
		<td><b>Cap Visa Kedatangan: </b></td>
</tr>
<tr>
	
			<?if($visa->cap_file != "default.png") { ?>
				<td><img src="<?php echo base_url('assets/uploads/cap/'.$visa->cap_file); ?>" width="250"  height="220" /> </td>
				<tr>
		<td><?=anchor('assets/uploads/cap/'.$visa->cap_file, 'View Cap File!','target="_blank"')?></td>
<? } else{ ?>
	<td><img src="<?php echo base_url('assets/uploads/default.png'); ?>" width="250"  height="220" /> </td>
	<tr>
	<td>No File Upload</td>
	<? } ?>
</tr>
<tr></tr>

	</tr>
	
</table>
</div>
</div>
</div>
