<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="row">
<div class="col-md-12">
<div style="padding-bottom:20px;display:flex;justify-content: space-between;">
	<h1><i class="fa fa-fw fa-cc"></i> Visa 	<?php echo $hari ?> HARI </h1>
	<a href="<?php echo site_url('visa/add') ?>" class="btn bg-navy btn-flat margin">Add New Visa</a>
</div>
<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed text-center" id="tabel6kolomitk" style="width: 100%">
		<thead>
			<tr class="active">
				<th width="30px" style="padding-left: 20px;">No</th>
				<th>NAME</th>
				<th>VISA NUMBER</th>
				<th>VISA TYPE</th>
				<th>DATE EXPIRED</th>
				<th>DEADLINE TO EXPIRE</th>
				<th>SEND NOTIFICATION</th>
				<th>STATUS</th>

				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
            foreach ($visa as $visa) { ?>
				<tr id="<?php echo $visa->id; ?>">
					<td width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
					<td><?= $visa->first_name ?> <?= $visa->last_name ?></td>
					<td><?= $visa->visa_number ?></td>
					<td><?= $visa->visa_type ?></td>
					<td><?= date('d/F/Y', strtotime($visa->date_start)) ?> - <?= date('d/F/Y', strtotime($visa->date_expired))?> </td>
					<td><?= date_diff(date_create($visa->date_expired), date_create($visa->date_start))->format("%R%a days") ?></td>
					<td><?= date('d/F/Y', strtotime($visa->send_notification)) ?></td>
					<td><? if($visa->status_notification == 0){
						?> <button type="button" class="btn bg-navy btn-flat margin">unsent</button> <?
					}else{
						?> <button type="button" class="btn bg-green btn-flat margin">sent</button> <?
					} ?>
					</td>
					<td><?php echo anchor(site_url('email/send/' . $visa->id.'/visa'), 'Send Email', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-purple btn-normal')) ?></td>
					<td><?php echo anchor(site_url('whatsapp/send/' . $visa->id.'/visa'), 'Send Wa', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-olive btn-normal')) ?></td>
					<td><?php echo anchor(site_url('visa/edit/' . $visa->id), 'Edit', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-orange btn-normal')) ?></td>
					<td><?php echo anchor(site_url('visa/detail/' . $visa->id), 'Detail', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-navy btn-normal')) ?></td>
					
					<td><button type="submit" class="btn btn-danger remove"> Delete</button></a>
			<!-- <td><a href="<?php echo site_url('visa/delete/'.$visa->id); ?>" onclick="return confirm('Are you sure want to delete <?=$visa->email;?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a> -->
             </td>
				</tr>
			<?php } ?>
			
		</tbody>
		
	</table>
	
</div>

</div>
</div>

<script type="text/javascript">
    $(".remove").click(function(){
		var table=$(this).parents("table").attr("tabel6kolomitk");
        var id = $(this).parents("tr").attr("id");

    

       swal({

        title: "Are you sure?",

        text: "You will not be able to recover this file!",

        type: "warning",

		// buttons: true,
            dangerMode: true,

      }).then((willDelete) => {
          if (willDelete) {
			$.ajax({

// url: 'visa/delete/'+id,
url: "<?=base_url('visa/delete/')?>"+id,
type: 'DELETE',
error: function() {

   swal('Something is wrong');

},

success: function(data) {

	//  $("#"+id).remove();
	//  $("#mytable").DataTable().ajax.reload;
	
	 swal("Deleted!", "Your file has been deleted.", "success").then(willConfirm => {
   if (willConfirm) {
	location.reload(true); 
	 }});

}
});
          } else {
            swal("Your file is safe!");
          }
        });

      


    });

    

</script>


