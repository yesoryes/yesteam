<?php 
    include("header_in.php");
?>
<script src="<?php echo base_url(); ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                        	 <div class="module">
                                <div class="module-head">
                                    <h3>Posts</h3>
								</div>
								 <?php if(isset($mess) && $mess != ""){ ?>
			                    <div class="alert alert-success" role="alert" id="catsuccess"><?php echo $mess; ?></div>
			                    <?php } ?>
								   <div class="control-group" >
										<div class="controls span3">
											<p>From</p>
											<div class="input-append date " style="margin:0px;">
									    <input type="text" id="datepicker1" data-date-format="dd-mm-yyyy">
									    <span class="add-on"><i class="icon-th"></i></span>
										</div>
										</div>
										<div class="controls span3" >
											<p>To</p>
											<div class="input-append date " style="margin:0px;">
									    <input type="text" id="datepicker2" data-date-format="dd-mm-yyyy">
									    <span class="add-on"><i class="icon-th"></i></span>
										</div>
										</div>
										</div>
										<div class="controls" style="margin-bottom:20px;">
											<select tabindex="1" class="span2" id="statusPost" style="margin-top: 20px;">
												<option value="-1">All Status</option>
												<option value="0">Listed</option>
												<option value="1">Sold</option>
												<option value="2">Aproval pending</option>
											</select>
											<a href="javascript:void(0);" type="submit" onclick="searchpage();" class="btn btn-danger" style="width:110px; margin-top:10px;"><i class="icon-search" style="padding-right: 10px;"></i>Search</a> 
										</div>
								 
                                <div id="changeTable">
	                              <table class="table table-bordered datatable-1">
								  <thead>
									<tr>
									  <th>S.No</th>
									  <th>Post date</th>
									  <th>Post Id</th>
									  <th>Category</th>
									  <th>Product Name</th>
									  <th>Status</th>
									  <th>Sell To</th>
									   <th>Barter Points</th>
									    <th></th>
									</tr>
								  </thead>
								  <tbody>
								  <?php 
								  $i = 1;
								  foreach($productList as $prodl){ ?>
									<tr>
									  <td><?php echo $i; ?></td>
								       <td><?php echo date('d-m-Y', strtotime($prodl->post_date)); ?></td>
								       <td><?php echo $prodl->post_id; ?></td>
								       <td><?php echo getCategoryName($prodl->category); ?></td>
								       <td><?php echo $prodl->product_name ?></td>
									   <td><?php echo getProductStatus($prodl->status); ?></td>
								       <td><?php echo getUserName($prodl->sell_to); ?></td>
								       <td><?php echo $prodl->barter_points ?></td>

									   <td>
									   	<?php if($prodl->status == 0){
								       	?>
								       	<a href="<?php echo base_url(); ?>product/getListedProject/<?php echo $prodl->post_id; ?>">More Details</a>
								       	<?php 
								       	}else if($prodl->status == 1){
							       		?>
							       		<a href="<?php echo base_url(); ?>product/getListedProject/<?php echo $prodl->post_id; ?>">More Details</a>
							       		<?php
							       		}else if($prodl->status == 2){
						       			?>
						       			<a href="<?php echo base_url(); ?>product/getProductDetails/<?php echo $prodl->post_id; ?>">More Details</a>
						       			<?php
						       			}else{
					       				?>
					       				<a href="<?php echo base_url(); ?>product/getListedProject/<?php echo $prodl->post_id; ?>">More Details</a>
					       				<?php
					       				} ?>
									   </td>
									</tr>
									<?php 
									$i++;
									} ?>
									</tbody>
								</table>
								</div>
							
							</div>
						</div>
					</div><!--/.content-->
                  </div><!--/.span12-->
              </div><!--/.row-->
           </div><!--/.container-->
        </div><!--/.wrapper-->
        <script src="<?php echo base_url(); ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>scripts/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
			
				$('#datepicker1').datepicker({
				format: "yyyy-mm-dd",
				
				});
				$('#datepicker2').datepicker({
				format: "yyyy-mm-dd",
				
				});  
 		});
	function searchpage(){
		var poststatus = $('#statusPost').val();
		var dat1 = $('#datepicker1').val();
		var dat2 = $('#datepicker2').val();

		var dataString = 'dat1='+ dat1 +'&dat2='+ dat2 +'&poststatus='+ poststatus;
		//alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>product/getSearch/",
            data: dataString,
            cache: false,
            success: function (mresp) {
            	//alert(mresp);
               $('#changeTable').empty().append(mresp)
	   
            }
        }); 
	}
	 $(document).ready(function() {
                $('.datatable-1').dataTable();
                $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                $('.dataTables_paginate > a').wrapInner('<span />');
                $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
            } );
</script>
<?php 
    include("footer_in.php");
?>