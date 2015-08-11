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
                	<h3>Sub-Category</h3>
                </div>
                
            	<form method="post" id="subcategory_done" class="errormessage" name="category" action="<?php echo base_url(); ?>masterentry/editSubCategory">
				<div class="control-group" style="margin:20px 30px;">
					<div class="controls">
						<select tabindex="1" data-placeholder="Select here.." id="categoryId" class="span4" name="categoryId">
							<option value="0">Select here..</option>
							<?php 
								foreach($category as $cal){
							?>
							<option value="<?php echo $cal->c_id; ?>" <?php if($cal->c_id == $subcatedit[0]->Category_id){ echo "selected='selected'"; } ?>><?php echo $cal->category_name; ?></option>
							<?php } ?>
						</select>
					</div>
						<div class="controls" style="margin:20px 0px;">
						<input type="hidden" value="<?php echo $subcatedit[0]->sc_id ?>" name="scid">
						<input type="text" id="subCategory" placeholder="SubCategory" class="span4" name="subCategory" value="<?php echo $subcatedit[0]->sub_category_name ?>">
						</div>
						<div class="controls" style="margin:20px 0px;">
						<textarea class="span6" id="sub_cat_desc" rows="5" placeholder="description" name="sub_cat_desc"><?php echo $subcatedit[0]->description ?></textarea>
						</div>
						<div class="controls">
						<button type="submit" class="btn btn-danger" style="width:100px;" onclick="addSubCategory();">update</button>
						<button type="button" class="btn btn-danger" style="width:100px;" onclick="goBack();">Cancel</button>
					   </div>
				</div> 
				</form> 
            </div>
        </div> <!--/.content-->
      </div> <!--/ span-12-->
    </div> <!--/.row 9-->
</div><!--/.container-->

</div><!--/.wrapper-->
<script type="text/javascript">
	function goBack() {
	    window.history.back();
	}
</script>

<?php include("footer_in.php") ?>