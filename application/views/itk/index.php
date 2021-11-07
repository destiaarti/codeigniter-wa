<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="row">
<div class="col-md-12">
<div style="padding-bottom:20px;display:flex;justify-content: space-between;">
	<h1><i class="fa fa-fw fa-cc"></i> ITK 	<?php echo $hari ?> HARI </h1>
	<a href="<?php echo site_url('itk/add') ?>" class="btn bg-navy btn-flat margin">Add New ITK</a>
</div>
<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed text-center" id="mytable" style="width: 100%">
		<thead>
			<tr class="active">
				<th width="30px" style="padding-left: 20px;">No</th>
				<th>NAME</th>
				<th>ITK NUMBER</th>
				<th>DATE EXPIRED</th>
				<th>DEADLINE TO EXPIRE</th>
				<th>SEND NOTIFICATION</th>
				<th>STATUS</th>

				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
            foreach ($itk as $itk) { ?>
				<tr id="<?php echo $itk->id; ?>">
					<td width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
					<td><?= $itk->first_name ?> <?= $itk->last_name ?></td>
					<td><?= $itk->no_passport ?></td>
					<td><?= date('d/F/Y', strtotime($itk->date_start)) ?> - <?= date('d/F/Y', strtotime($itk->date_expired))?> </td>
					<td><?= date_diff(date_create($itk->date_expired), date_create($itk->date_start))->format("%R%a days") ?></td>
					<td><?= date('d/F/Y', strtotime($itk->send_notification)) ?></td>
					<td><? if($itk->status_notification == 0){
						?> <button type="button" class="btn bg-navy btn-flat margin">unsent</button> <?
					}else{
						?> <button type="button" class="btn bg-green btn-flat margin">sent</button> <?
					} ?>
					</td>
							<td><?php echo anchor(site_url('email/send/' . $itk->id.'/itk'), 'Send Email', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-purple btn-normal')) ?></td>
					<td><?php echo anchor(site_url('whatsapp/send/' . $itk->id.'/itk'), 'Send Wa', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-olive btn-normal')) ?></td>
					<td><?php echo anchor(site_url('itk/edit/' . $itk->id), 'Edit', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-orange btn-normal')) ?></td>
					<td><?php echo anchor(site_url('itk/detail/' . $itk->id), 'Detail', array('data-toggle' => 'tooltip', 'title' => 'edit data', 'class' => 'btn bg-navy btn-normal')) ?></td>
					
					<td><button type="submit" class="btn btn-danger remove"> Delete</button></a>
			<!-- <td><a href="<?php echo site_url('itk/delete/'.$itk->id); ?>" onclick="return confirm('Are you sure want to delete <?=$itk->email;?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a> -->
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
		var table=$(this).parents("table").attr("mytable");
        var id = $(this).parents("tr").attr("id");

    

       swal({

        title: "Are you sure?",

        text: "You will not be able to recover this file!",

        type: "warning",

		buttons: true,
            dangerMode: true,

      }).then((willDelete) => {
          if (willDelete) {
			$.ajax({

// url: 'itk/delete/'+id,
url: "<?=base_url('itk/delete/')?>"+id,
type: 'DELETE',
error: function() {

   alert('Something is wrong');

},

success: function(data) {
	location.reload(true); 
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


