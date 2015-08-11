 </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 BarterHub - www.barterhub.in </b>All rights reserved.
            </div>
        </div>
       
       
        <script>
            $(document).ready(function() {
                $('.datatable-1').dataTable();
                $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                $('.dataTables_paginate > a').wrapInner('<span />');
                $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
            } );
            //Go back function in this project
            function goBack() {
                window.history.back();
            }

            //ajax call to change status
            function changeStatus(status, id){
                //alert(status);
                var dataString = 'status='+ status +'&id='+ id;

                $.ajax({
                
                    type:"POST",
                    url:"<?=base_url();?>masterentry/changeStatus/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        window.location.reload();
                    }
                
                });
            }
        </script>
      
    </body>
</html>