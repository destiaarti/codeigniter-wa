<!-- JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>

<script>
	window.onload = function() {
		<?php if ($this->session->flashdata('msg') != '') {
    echo "effect_msg();";
}?>
	}

	function effect_msg_form() {
		$('.form-msg').slideDown(1000),
			setTimeout(function() {
				$('.form-msg').slideUp(1000);
			}, 3000)
	}

	function effect_msg() {
		$('.msg').show(1000),
			setTimeout(function() {
				$('.msg').fadeOut(1000);
			}, 3000)
	}
</script>
<script>
$(document).ready( function () {
	$('#tabel6kolom').DataTable({
            responsive: true,
            scrollX:true,
            dom: "Bfrtip",
            lengthMenu: [[5, 10, 15, 25, 50, -1], [5,10,15, 25, 50, "All"]],
            buttons: [
             'pageLength',
             {extend: 'copy',
                exportOptions: {
                columns: [0,1,2,3,4,5]
              }

            },
             {extend: 'csv',
                exportOptions: {
                columns: [0,1,2,3,4,5]
              }

            },
              {extend: 'excel',
                exportOptions: {
                columns: [0,1,2,3,4,5]
              }

            },
              {extend: 'print',
                exportOptions: {
                columns: [0,1,2,3,4,5]
              }
            },
              {extend: 'pdf',
                exportOptions: {
                columns: [0,1,2,3,4,5,]
              },
              orientation: 'landscape',
              pageSize: 'LEGAL' }

        ],
         
   
});
  })
</script>
