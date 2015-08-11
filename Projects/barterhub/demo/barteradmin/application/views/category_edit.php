<?php include("header_in.php") ?>
<style type="text/css">
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
                <div class="module-head">
                	<h3>Category</h3>
                </div>
                
            	<form method="post" id="ecategory" class="errormessage" name="category" action="<?php echo base_url(); ?>masterentry/editCategory">
				<div class="control-group" style="margin:20px 30px;">
					<div class="controls" style="margin:20px 0px;">
					<input type="hidden" value="<?php echo $categoryedit[0]->c_id ?>" name="cid">
						<input type="text" id="category_name" placeholder="name" name="category_name" class="span4" value="<?php echo $categoryedit[0]->category_name ?>">
						</div>
						<div class="controls" style="margin:20px 0px;">
						<textarea class="span6" id="category_description" rows="5" name="category_description" placeholder="description"><?php echo $categoryedit[0]->description ?></textarea>
					    </div>
						<div class="controls">
						<button type="submit" class="btn btn-danger" style="width:100px;">Update</button>
						<button type="submit" class="btn btn-danger" style="width:100px;" onclick="goBack()">Cancel</button>
					   </div>
				</div> 
				</form> 
            </div>
        </div> <!--/.content-->
      </div> <!--/ span-12-->
    </div> <!--/.row 9-->
</div><!--/.container-->

</div><!--/.wrapper-->


<?php include("footer_in.php") ?>