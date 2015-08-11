<?php include("header_in.php") ?>
	<style>
    .table
    {
        max-width:100%;
        width:99%;
        margin:5px;
    }
    .bottom
    {
        border: 1px solid #000;
        width: 100%;
    }
    .error{
	color:red;
}

    </style>	
    <script src="<?php echo base_url(); ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>scripts/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>scripts/validation.js"></script>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span12">
                    	<div class="content">
	                        <div class="module">
	                            <div class="module-head">
	                                <h3>Master Entry</h3>
	                            </div>
	                            <div class="alert alert-success" role="alert" id="deletecateg" style="display:none;">Deleted successfully</div>
	                            <?php if($this->session->flashdata('flashSuccess')):?>
         
						        <div class="alert alert-success alert-dismissible fadeoutthis" role="alert">
						          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						          <strong><?=$this->session->flashdata('flashSuccess')?></strong>
						        </div>
						          
						        <?php endif ?>
	                            <div class="module-option clearfix">
	                            	 <ul class="nav navbar-nav">
										<li class="active"><a style="border-radius:6px 6px 0 0;padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/enableLocation">Enable Location</a></li>
										<li><a style="padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/category">Add/Edit Category</a></li>
										<li><a style="padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/country">Country Master</a></li>
									</ul>
	                            </div>
	                            <div class="bottom"></div>
			                        <div class="module-head">
			                        	<h3>Enable Location</h3>
			                        </div>

                                    <div class="alert alert-success" role="alert" id="successMsg" style="display:none;">Location added successfully</div>
                                    <form id="enable_location" method="post" class="errormessage" name="" action="">
                                    	<div class="control-group" style="margin:20px 30px;">
		                                	<div class="controls">
		                                		<select tabindex="1" data-placeholder="Select here.." class="span4" name="country1" id="country1" onchange="bindState();">
														<option value="0">Select Country..</option>
														<?php
														//get state 
															foreach($country as $con){
																?>
		                                                        <option value="<?php echo $con->id; ?>"><?php echo $con->name; ?></option>
		                                                        <?php
															}
														?>
													</select>
		                                	</div>
											<div class="controls" id="changeState">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="state" id="state">
													<option value="0">Select here..</option>
													
												</select>
											</div>
												<div class="controls" style="margin:20px 0px;">
												<input type="text" id="city" placeholder="City Name" class="span4" name="city">
												</div>
												<div class="controls" style="margin:20px 0px;">
												<input type="text" id="pincode" placeholder="Pincode" class="span4" name="pincode">
												</div>
												<div class="controls">
												<button type="button" class="btn btn-danger" id="enableLocation" name="submit" style="width:100px;" onclick="addlocation();">ADD</button>

												<!-- <button type="button" class="btn btn-danger" style="width:100px;" onclick="testLocation();">ADD</button> -->
											   </div>
										</div>
                                    </form>
										 <div class="module-body">
										 	<span style="padding:5px;border:1px solid rgb(60, 188, 141); background-color:rgb(60, 188, 141);float:left;margin-top: 4px;margin-right:5px;"></span>
										 	<span>Status Disable, click to enable</span>
										 </div>
										 <div class="module-body">
										 	<span style="padding:5px;border:1px solid rgb(233, 66, 46); background-color:rgb(233, 66, 46);float:left;margin-top: 4px;margin-right:5px;"></span>
										 	<span>Status Enable, click to disable</span>
										 </div>
										 <div class="module-body table">
			                          		<table class="table table-bordered  datatable-1">
											  <thead>
												<tr>
												  <th>No</th>
												  <th>State</th>
												  <th>City</th>
												  <th>Country</th>
												  <th>Site Enable on</th>
												  <th>Status</th>
												</tr>
											  </thead>
											  <tbody>
											  <?php 
											  $i = 1;
											  foreach($location as $loc){ ?>
												<tr>
												  <td><?php echo $i; ?></td>
												  <td><?php echo getState($loc->state); ?></td>
												  <td><?php echo $loc->city; ?></td>
												  <td><?php echo getCountry($loc->country_id); ?></td>
												  <td><?php echo date('d M Y', strtotime($loc->site_enable)); ?></td>
												  <?php if($loc->status == 'enable'){ ?>
												  <td><button type="button" class="btn btn-danger" style="width:100px;" onclick="changeStatus(1,<?php echo $loc->el_id; ?>);"><abbr style="cursor: pointer;  border-bottom: 0;" title="click to disable">Disable</abbr></button>
												  <button type="button" class="btn btn-danger" style="width:100px;" onclick="deleteLocation(<?php echo $loc->el_id; ?>);">Delete</button>
												  </td>
												  <?php }else{ ?>
												  <td><button type="button" class="btn btn-success" style="width:100px;" onclick="changeStatus(2,<?php echo $loc->el_id; ?>);"><abbr style="cursor: pointer;  border-bottom: 0;" title="click to enable">Enable</abbr></button>
												  	<button type="button" class="btn btn-danger" style="width:100px;" onclick="deleteLocation(<?php echo $loc->el_id; ?>);">Delete</button>
												  </td>
												  <?php } ?>
												</tr>
												<?php 
												$i++;
												} ?>
												</tbody>
											</table>
								</div>  
	                        </div><!--end Module-->
                        </div> <!--/.content-->
                      </div> <!--/ span-12-->
                    </div> <!--/.row 9-->
                </div><!--/.container-->
            </div><!--/.wrapper-->
<script src="<?php echo base_url(); ?>scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript">
	
	function addlocation(){
		var con = $('#country1').val();
		var state = $('#state').val();
		var city = $('#city').val();
		var pincode = $('#pincode').val();
		if(con != 0 && state != 0 && city != '' && pincode != ''){

		var dataString = 'state='+ state + '&city='+ city + '&pincode='+ pincode +'&con='+ con;
		//alert(dataString);
 	    $.ajax({
		
			type:"POST",
			url:"<?=base_url();?>masterentry/addLocation/",
			data: dataString,
			cache: false,
			success: function (data) {
				//alert(data);
				$('#successMsg').css('display','block');
				var fad = $('#successMsg').fadeOut(10000)
				if(fad){
					window.location.reload();
				}
				//alert($("#alertInvite").attr("style"));
				//console.log(mresp);
			}
		
		});
 	}
		
	}
//filter state passing country id.
	function bindState(){
		var id = $('#country1').val();
		var dataString = 'id='+ id;
		//alert(dataString);
 	    $.ajax({
		
			type:"POST",
			url:"<?=base_url();?>masterentry/getCountryLocation/",
			data: dataString,
			cache: false,
			success: function (data) {
				$('#changeState').empty().append(data);
				
			}
		
		});
	}
//Delete location from database.
function deleteLocation(id){
	var dataString = 'id='+ id;
 	    $.ajax({
		
			type:"POST",
			url:"<?=base_url();?>masterentry/deleteLocation/",
			data: dataString,
			cache: false,
			success: function (data) {
				//alert(data);
				$('#deletecateg').css('display','block');
				var fad = $('#deletecateg').fadeOut(10000)
				if(fad){
					window.location.reload();
				}
				//alert($("#alertInvite").attr("style"));
				//console.log(mresp);
			}
		
		});
}

</script>
<?php include("footer_in.php") ?>
     