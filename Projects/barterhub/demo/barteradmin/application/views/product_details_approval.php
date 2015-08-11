<?php 
    include("header_in.php");
?>
<style type="text/css">
	.dl-horizontal dt{
		text-align: left;
		font-weight: bold;
	}
	.med-content{
		padding:8px;
		font-weight: bold;
	}
	.m0{
		margin: 0;

	}
</style>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="content">
                	 <div class="module">
                        <div class="module-head">
                            <h3>Posts-Details </h3>
						   <div class="control-group" >
							<ul class="breadcrumb" style="padding:13px">
			  				  	<li><a href="#">Listed in Category:<?php echo getCategoryName($productDetails[0]->category); ?></a></li>
			  				  	<li>></li>
				        		<li><a href="#"><?php echo getSubCategoryName($productDetails[0]->sub_category); ?></a></li>
			        			<li class="pull-right"><a href="javascript:void(0);" onclick="goBack();">Back to Userlist</a></li>
			        		</ul>
							</div>
							</div>
						
								<div class="module-option clearfix">
	                            <div class="pull-left span5">
	                            	<?php if($productDetails[0]->product_pics != ''){ ?>
	                                <img src="<?php echo base_url().$productDetails[0]->product_pics ?>" class="img-responsive" alt="image"/>
	                                <?php }else{
                                	?>
                                	<img src="images/img_postdetail.png" class="img-responsive" alt="image"/>
                                	<?php
                                	} ?>
	                            </div>
                               <div class="pull-left span6">
                               <h4 style="text-decoration: underline;"><?php echo $productDetails[0]->product_name ?></h4>
                                     <dl class="dl-horizontal">
											<dt>Item Condition</dt>
											<dd><?php echo $productDetails[0]->item_condition ?></dd>
											<dt>Quantity</dt>
											<dd><?php echo $productDetails[0]->quantity ?> avilable</dd>
											<dt>Barter Points</dt>
											<dd><?php echo $productDetails[0]->barter_points ?>.00/per item</dd>
											<dt>Shipping</dt>
											<dd>Flate Rate-Courier-Delivery anywhere in India</dd>
											<dt>Discription</dt>
											<dd><?php echo $productDetails[0]->description ?></dd>
								</dl>
								<div class="pull-left">
									<a href="#Modal1" type="submit" class="btn btn-danger span1" data-toggle="modal" style="width:110px; margin:15px;">Rejected</a>
									<div class="clearfix"></div>
									<h5>Item approved on: <?php echo $productDetails[0]->approved_date; ?></h5>								  
								</div>
                               		<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <form method="post" action="<?php echo base_url(); ?>product/rejectProduct">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="exampleModalLabel">Item rejected</h4>
								      </div>
								      <div class="modal-body">
								          <div class="form-group">
								          	<input type="text" class="form-control span4" id="" name="userName" value="<?php echo getUserName($productDetails[0]->user_id); ?>">
								          </div>
								          <div class="form-group">
								          <input type="hidden" name="itemId" value="<?php echo $productDetails[0]->post_id ?>">
								          <input type="hidden" name="userEmail" value="<?php echo getUserEmail($productDetails[0]->user_id); ?>">
								            <input type="text" class="form-control span4" id="" name="productName" value="<?php echo $productDetails[0]->product_name ?>">
								          </div>
								          <div class="form-group">
								           <textarea class="span4" id="message-text" placeholder="Type your message here" name="message"></textarea>
								       						
									    </div>
									    
								          </div>
								        
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
								        <button type="submit" class="btn btn-primary">Rejected</button>
								      </div>
								    </div>
								    </form>
								  </div>
                             </div>
                             </div>
                            <div class="module-head">
                            <h3>Posted by
                            	</div>
                    <?php echo $this->method_call->getUserDetailsContent($productDetails[0]->user_id); ?> 	
                	<!-- <div class="module-body">
						<div class="stream-composer media">
							<a href="#" class="media-avatar medium pull-left span2">
								<img src="images/img_user.png">
							</a>
							<div class="media-body span3">
								<p class="med-content"><lable class="m0 span2">First Name</lable>: <lable class="col-md-2">Keera</lable></p>
								<p class="med-content"><lable class="m0 span2">Last Name</lable>: <lable>Keera</lable></p>
								<p class="med-content"><lable class="m0 span2">User Name</lable>: <lable>Keera</lable> </p>
								<p class="med-content"><lable class="m0 span2">Date of birth</lable>: <lable>Keera</lable></p>
							</div>
								<div class="media-body span3">
								<p class="med-content"><lable class="m0 span2">Mobile</lable>: <lable>Keera</lable></p>
								<p class="med-content"><lable class="m0 span2">Email</lable>: <lable>Keera</lable></p>
								<p class="med-content"><lable class="m0 span2"> No of sell</lable>: <lable>Keera</lable></p>
								<p class="med-content"><lable class="m0 span2">No of buy</lable>: <lable>Keera</lable></p>
							</div>
							<div class="span2">
								<p class="med-content"><lable class="m0 span2">City Name</lable>: <lable>Keera</lable></p>
							</div>
					</div>
				</div> -->
				  <!-- <div class="module">
					<div class="module-head">
						<h3>Transcation History</h3>
					</div>
					<div class="module-body">
						<div class="stream-composer media">
							<a href="#" class="media-avatar small pull-left">
								<img src="images/img_user.png">
							</a>
							<div class="media-body">
								<div class="stream-headline span4">
									<h5 class="stream-author">cart2usa2014</h5>
									<div class="stream-text">Mumabi</div>
									<div class="stream-text">on May 14,2015 5.01pm</div>
								</div>
								<div class="stream-headline span4">
									<h5 class="stream-text">Like the item</h5>
							</div>
						
						</div>
						</div>
						<div class="stream-composer media">
							<a href="#" class="media-avatar small pull-left">
								<img src="images/img_user.png">
							</a>
							<div class="media-body">
								<div class="stream-headline span4">
									<h5 class="stream-author">cart2usa2014</h5>
									<div class="stream-text">Mumabi</div>
									<div class="stream-text">on May 14,2015 5.01pm</div>
								</div>
								<div class="stream-headline span4">
									<h5 class="stream-text">Contact the Seller</h5>
							</div>
						
						</div>
						</div>
						<div class="stream-composer media">
							<a href="#" class="media-avatar small pull-left">
								<img src="images/img_user.png">
							</a>
							<div class="media-body">
								<div class="stream-headline span4">
									<h5 class="stream-author">cart2usa2014</h5>
									<div class="stream-text">Mumabi</div>
									<div class="stream-text">on May 14,2015 5.01pm</div>
								</div>
								<div class="stream-headline span4">
									<h5 class="stream-text">Accepted and contact open to cart2usa2014</h5>
							</div>
						
						</div>
						</div><!--/.media .stream
				</div>
				</div> 
				</div>
			</div> --><!--/.content-->
          </div><!--/.span12-->
      </div><!--/.row-->
   </div><!--/.container-->
</div><!--/.wrapper-->
<?php 
    include("footer_in.php");
?>