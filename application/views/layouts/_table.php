<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>


<!-- <script>
$(document).ready(function () {
    $.noConflict(); -->
    <script type="text/javascript">
jQuery(document).ready(function($){
    // $.noConflict(); 
        $('#tabel6kolomitk').DataTable({
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
                columns: [0,1,2,3,4,5]
              },
              orientation: 'landscape',
              pageSize: 'LEGAL' }
        ],   
    });
});
     
</script>