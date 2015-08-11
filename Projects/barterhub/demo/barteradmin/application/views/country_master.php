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
	                            
				                <?php if($this->session->flashdata('flashSuccess')):?>
         
						        <div class="alert alert-success alert-dismissible fadeoutthis" role="alert">
						          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						          <strong><?=$this->session->flashdata('flashSuccess')?></strong>
						        </div>
						          
						        <?php endif ?>
				                <div class="alert alert-success" role="alert" id="deletecateg" style="display:none;">Deleted successfully</div>
	                            <div class="module-option clearfix">
	                            	 <ul class="nav navbar-nav">
										<li><a style="padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/enableLocation">Enable Location</a></li>
										<li><a style="padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/category">Add/Edit Category</a></li>
										<li class="active"><a style="border-radius:6px 6px 0 0;padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/country">Country Master</a></li>
									</ul>
	                            </div>
	                            <div class="bottom"></div>
			                        <div class="module-head">
			                        	<h3>Country Master</h3>
			                        </div>
                                    <div class="alert alert-success" role="alert" id="successMsg" style="display:none;">Country master added successfully</div>
                                    <form id="country" method="post" class="errormessage" name="" action="">
                                    	<div class="control-group" style="margin:20px 30px;">
											
										<div class="controls" style="margin:20px 0px;">
										<input type="text" id="country_name" placeholder="Country Name" class="span4" name="country_name">
										</div>
										<div class="controls">
										<button type="button" class="btn btn-danger" id="countryValidate" name="submit" style="width:100px;" onclick="addCountry();">ADD</button>

										<!-- <button type="button" class="btn btn-danger" style="width:100px;" onclick="testLocation();">ADD</button> -->
									   </div>
										</div>
                                    </form>
										  
										 <div class="module-body table">
                          		<table class="table table-bordered datatable-1">
								  <thead>
									<tr>
									  <th>No</th>
									  <th>Country</th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
								  <?php 
								  //print_r($country);
								  if($country != ''){
								  $i = 1;
								  foreach($country as $loc){ ?>
									<tr>
									  <td><?php echo $i; ?></td>
									  <td><?php echo $loc->name; ?></td>
									  
									  <td><a href="<?php echo base_url(); ?>masterentry/countryEdit/<?php echo $loc->id; ?>" class="btn btn-danger" style="width:100px;">Edit</a>
					  	<a href="javascript:void(0);" class="btn btn-danger" style="width:100px;" onclick="deleteCountry(<?php echo $loc->id; ?>);">Delete</a> 
					  </td>
									 
									</tr>
									<?php 
									$i++;
									} 
								}else{
									?>
									<tr><td>There is no data.</td></tr>
									<?php 
								}
									?>
									</tbody>
								</table>
								<div class="module-head">
			                        	<h3>State Master</h3>
			                        </div>
								<form id="stateId" method="post" class="errormessage" name="" action="<?php echo base_url(); ?>masterentry/stateEntry">
                                	<div class="control-group" style="margin:20px 30px;">
									
									<div class="controls" style="margin:20px 0px;">
										<select class="span4" name="country_id">
											<option value="0">Select country</option>
											<?php 
											foreach($country as $repet){ ?>
											?>
											<option value="<?php echo $repet->id ?>"><?php echo $repet->name ?></option>
											<?php } ?>
										</select>
									</div>	
									<div class="controls" style="margin:20px 0px;">
									<input type="text" id="state_name" class="span4" name="state_name" placeholder="State Name">
									</div>
									<div class="controls">
									<button type="submit" class="btn btn-danger" id="stateValidate" name="submit" style="width:100px;">ADD</button>

									<!-- <button type="button" class="btn btn-danger" style="width:100px;" onclick="testLocation();">ADD</button> -->
								   </div>
									</div>
                                </form>
                                <table class="table table-bordered datatable-2">
								  <thead>
									<tr>
									  <th>No</th>
									  <th>State name</th>
									  <th>country name</th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
								  <?php 
								  //print_r($country);
								  if($country != ''){
								  $i = 1;
								  foreach($stateentry as $sts){ ?>
									<tr>
									  <td><?php echo $i; ?></td>
									  <td><?php echo $sts->StateName; ?></td>
									   <td><?php echo getCountry($sts->countryId) ?></td>
										<td><a href="<?php echo base_url(); ?>masterentry/stateEdit/<?php echo $sts->StateID; ?>" class="btn btn-danger" style="width:100px;">Edit</a>
										<a href="javascript:void(0);" class="btn btn-danger" style="width:100px;" onclick="deleteState(<?php echo $sts->StateID; ?>);">Delete</a> 
										</td>
									 
									</tr>
									<?php 
									$i++;
									} 
								}else{
									?>
									<tr><td>There is no data.</td></tr>
									<?php 
								}
									?>
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
	$(document).ready(function() {
    $('.datatable-2').dataTable();
    $('.dataTables_paginate').addClass("btn-group datatable-pagination");
    $('.dataTables_paginate > a').wrapInner('<span />');
    $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
    $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
	} );
	function addCountry(){
		
		var country = $('#country_name').val();
		
		if(country != ''){

		var dataString = 'country='+ country;
		//alert(dataString);
 	    $.ajax({
		
			type:"POST",
			url:"<?=base_url();?>masterentry/countryAdd/",
			data: dataString,
			cache: false,
			success: function (data) {
				//alert(data);
				$('#successMsg').css('display','block');
				var fad = $('#successMsg').fadeOut(10000)
				if(fad){
					window.location.reload();
				}
				
			}
		
		});
 	}
		
	}
	//delete country ajax call
	function deleteCountry(id){
		var dataString = 'id='+ id;
 	    $.ajax({
		
			type:"POST",
			url:"<?=base_url();?>masterentry/deleteCountry/",
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

	//delete state ajax call
	function deleteState(id){
		var dataString = 'id='+ id;
 	    $.ajax({
		
			type:"POST",
			url:"<?=base_url();?>masterentry/deletestate/",
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


	setTimeout(function(){ 
		$('#catsuccess').fadeOut(4000);
	 }, 3000);

</script>
<?php include("footer_in.php") ?>
     