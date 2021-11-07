<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
        
        $(document).ready(function(){
          $('#submit').click(function(){
            var startDate = new Date($('#date_start').val());
        var endDate = new Date($('#date_expired').val());
        if (startDate > endDate){
               swal("Expired Date should be greater than Start Date");
               return false;
        }
          });
        });
        
              </script>