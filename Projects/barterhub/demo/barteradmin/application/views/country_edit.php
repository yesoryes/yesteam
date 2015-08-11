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
	                            
	                            <div class="bottom"></div>
			                        <div class="module-head">
			                        	<h3>Country Master</h3>
			                        </div>
                                    <form id="ecountry" method="post" class="errormessage" name="" action="<?php echo base_url(); ?>masterentry/updateCountry">
                                    	<div class="control-group" style="margin:20px 30px;">
										<input type="hidden" name="cid" value="<?php echo $editCountry[0]->id; ?>">	
										<div class="controls" style="margin:20px 0px;">
										<input type="text" id="country_name" value="<?php echo $editCountry[0]->name; ?>" placeholder="country Name" class="span4" name="country_name">
										</div>
										<div class="controls">
										<button type="submit" class="btn btn-danger" id="" name="submit" style="width:100px;">Update</button>
										<button type="submit" class="btn btn-danger" id="" name="submit" style="width:100px;" onclick="goBack();">Cancel</button>

										<!-- <button type="button" class="btn btn-danger" style="width:100px;" onclick="testLocation();">ADD</button> -->
									   </div>
										</div>
                                    </form>
	                        </div><!--end Module-->
                        </div> <!--/.content-->
                      </div> <!--/ span-12-->
                    </div> <!--/.row 9-->
                </div><!--/.container-->
            </div><!--/.wrapper-->


<?php include("footer_in.php") ?>
     