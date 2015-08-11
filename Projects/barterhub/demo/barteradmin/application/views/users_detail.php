<?php 
    include("header_in.php");
?>
<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                        	 <div class="module" style="padding-bottom:20px;">
                                <div class="module-head">
                                    <h3>User Details
                                    	<a class="pull-right" href="javascript:void(0);" onclick="goBack();">Back to Userlist</a></h3>
                                </div>
                        	<div class="module-body">
								<div class="stream-composer media">
									<a href="#" class="media-avatar medium pull-left span2">
										<?php if($getUsers[0]->profile_pics != ''){ ?>
										<img src="<?php echo base_url().$getUsers[0]->profile_pics; ?>">
										<?php }else{
										?>
										<img src="images/img_user.png">
										<?php
										} ?>
									</a>
									<div class="media-body span3">
										<p style="padding:8px;">First Name: <?php echo $getUsers[0]->firstname ?></p>
										<p style="padding:8px;">Last Name: <?php echo $getUsers[0]->lastname ?></p>
										<p style="padding:8px;">User Name:<?php echo $getUsers[0]->username ?> </p>
										<p style="padding:8px;">Date Of Birth:<?php echo $getUsers[0]->date_of_birth ?></p>
									</div>
										<div class="media-body span3">
										<p style="padding:8px;">Mobile:<?php echo $getUsers[0]->mobile ?></p>
										<p style="padding:8px;">Email:<?php echo $getUsers[0]->email ?></p>
										<p style="padding:8px;">No of Sell: <?php if($getUsers[0]->no_of_sell != ''){ echo $getUsers[0]->no_of_sell; }else{ echo "0"; } ?></p>
										<p style="padding:8px;">No of Buy:  <?php if($getUsers[0]->no_of_buy != ''){ echo $getUsers[0]->no_of_buy; }else{ echo "0"; } ?></p>
									</div>
									<div class="span2">
									<?php if($getUsers[0]->status == 1){ ?>
										<button type="submit" class="btn btn-success" style="width:100px;">Active</button>
										<?php }else{
										?>
										<button type="submit" class="btn btn-danger" style="width:100px;">disable</button>
										<?php
										} ?>
									</div>
									<?php if($getUsers[0]->about != ''){ ?>
									<div class="span10">
										<h5>About Me</h5>
										<p><?php echo $getUsers[0]->about ?></p>
									</div>
									<?php } ?>
								</div>
							</div>
							    <div class="module-head" style="margin-bottom:20px;">
                                    <h3>My Post History</h3>
                                </div>
                              <table class="table table-bordered datatable-1">
								  <thead>
									<tr>
									  <th>S.No</th>
									  <th>Post Id</th>
									  <th>Category</th>
									  <th>Product Name</th>
									  <th>Status</th>
									  <th>Barter Points</th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
								  <?php 
								  $i = 1;
								  foreach($getUsersProduct as $prod){ ?>
									<tr>
									  <td><?php echo $i; ?></td>
									  <td><?php echo $prod->post_id ?></td>
									  <td><?php echo getCategoryName($prod->category); ?></td>
									  <td><?php echo $prod->product_name ?></td>
									  <td><?php echo getProductStatus($prod->status); ?></td>
									  <td><?php echo $prod->barter_points ?></td>
									  <td>
									  	<?php if($prod->status == 0){
								       	?>
								       	<a href="<?php echo base_url(); ?>product/getListedProject/<?php echo $prod->post_id; ?>">More Details</a>
								       	<?php 
								       	}else if($prod->status == 1){
							       		?>
							       		<a href="<?php echo base_url(); ?>product/getListedProject/<?php echo $prod->post_id; ?>">More Details</a>
							       		<?php
							       		}else{
						       			?>
						       			<a href="<?php echo base_url(); ?>product/getProductDetails/<?php echo $prod->post_id; ?>">More Details</a>
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
					</div><!--/.content-->
                  </div><!--/.span12-->
              </div><!--/.row-->
           </div><!--/.container-->
        </div><!--/.wrapper-->
        <script type="text/javascript">
			function goBack() {
			    window.history.back();
			}
		</script>
<?php 
    include("footer_in.php");
?>