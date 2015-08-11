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
                <?php if($this->session->flashdata('flashSuccess')):?>
         
		        <div class="alert alert-success alert-dismissible fadeoutthis" role="alert">
		          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          <strong><?=$this->session->flashdata('flashSuccess')?></strong>
		        </div>
		          
		        <?php endif ?>
                <div class="module-option clearfix">
                	 <ul class="nav navbar-nav">
						<li><a style="padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/enableLocation">Enable Location</a></li>
						<li class="active"><a style="border-radius:6px 6px 0 0;padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/category">Add/Edit Category</a></li>
						<li><a style="padding: 12px 20px;" href="<?php echo base_url(); ?>masterentry/country">Country Master</a></li>
					</ul>
                </div>
              <div class="bottom"></div>
                    <div class="module-head">
                    	<h3>Category</h3>
                    </div>
                    <div class="alert alert-danger" role="alert" id="sub_category" style="display:none;">Sub category added successfully</div>
                    <div class="alert alert-danger" role="alert" id="deletecateg" style="display:none;">Delected Successfully</div>
                    <div class="alert alert-success" role="alert" id="successMsg" style="display:none;">Category added successfully</div>
                    <?php if(isset($mess) && $mess != ""){ ?>
                    <div class="alert alert-success" role="alert" id="catsuccess"><?php echo $mess; ?></div>
                    <?php } ?>
                	<form method="post" id="category" class="errormessage" name="category" action="">
						<div class="control-group" style="margin:20px 30px;">
							<div class="controls" style="margin:20px 0px;">
								<input type="text" id="category_name" name="category_name" placeholder="name" class="span4">
								</div>
								<div class="controls" style="margin:20px 0px;">
								<textarea class="span6" id="category_description" name="category_description" rows="5" placeholder="description"></textarea>
							    </div>
								<div class="controls">
								<button type="button" class="btn btn-danger" id="category_validate" style="width:100px;" onclick="addcategory();">Save</button>
							   </div>
						</div> 
						</form> 
						 <div class="module-body table">
          		<table class="table table-bordered datatable-1">
				  <thead>
					<tr>
					  <th>No</th>
					  <th>Category Name</th>
					  <th>Description</th>
					  <th></th>
					  </tr>
				  </thead>
				  <tbody>
				  <?php 
				  $i = 1;
				  foreach($category as $cat){ ?>
					<tr>
					  <td><?php echo $i; ?></td>
					  <td style="width: 30%;"><?php echo $cat->category_name ?></td>
					  <td style="width: 30%;"><?php echo substr($cat->description, 0, 30) ?></td>
					  <td><a href="<?php echo base_url(); ?>masterentry/categoryEdit/<?php echo $cat->c_id; ?>" class="btn btn-danger" style="width:100px;">Edit</a>
					  	<a href="javascript:void(0);" class="btn btn-danger" style="width:100px;" onclick="deleteCategory(<?php echo $cat->c_id; ?>);">Delete</a> 
					  </td>
					</tr>
					<?php 
					$i++;
					} ?>
					</tbody>
				 </tbody>
				</table>
				</div>
			
                    <div class="module-head">
                    	<h3>Sub-category</h3>
                    </div>
                    <div class="alert alert-danger" role="alert" id="sub_category" style="display:none;">Sub category added successfully</div>
                	 <div class="alert alert-danger" role="alert" id="deletesubcateg" style="display:none;">Deleted successfully</div>
						<div class="error" id="errorThrough" style="margin-left: 30px;"></div>
						<form id="sub_category_done" class="errormessage">
						<div class="control-group" style="margin:20px 30px;">
							<div class="controls">
								<select tabindex="1" data-placeholder="Select here.." id="categoryId" name="categoryId" class="span4">
									<option value="0">Select here..</option>
									<?php 
										foreach($category as $cal){
									?>
									<option value="<?php echo $cal->c_id; ?>"><?php echo $cal->category_name; ?></option>
									<?php } ?>
								</select>
							</div>
								<div class="controls" style="margin:20px 0px;">
								<input type="text" id="subCategory" placeholder="SubCategory" name="SubCategory" class="span4">
								</div>
								<div class="controls" style="margin:20px 0px;">
								<textarea class="span6" id="sub_cat_desc" rows="5" placeholder="description"></textarea>
								</div>
								<div class="controls">
								<button type="button" id="sub_category_validate" class="btn btn-danger" style="width:100px;" onclick="addSubCategory();">ADD</button>
							   </div>
						</div> 
						</form>
						 <div class="module-body table">
          		<table class="table table-bordered datatable-2">
				  <thead>
					<tr>
					  <th>No</th>
					  <th>Category Name</th>
					   <th>Sub category</th>
					  <th>Description</th>
					  <th></th>
					  </tr>
				  </thead>
				  <tbody>
				  <?php 
				  $i = 1;
				  foreach($subCategory as $sel){ ?>
					<tr>
					  <td><?php echo $i; ?></td>
					  <td><?php echo getCategoryName($sel->Category_id); ?></td>
					  <td><?php echo $sel->sub_category_name; ?></td>
					  <td><?php echo substr($sel->description, 0, 30) ?></td>
					  <td><a href="<?php echo base_url(); ?>masterentry/subCategoryEdit/<?php echo $sel->sc_id; ?>" class="btn btn-danger" style="width:100px;">Edit</a>
					  	<a href="javascript:void(0);" class="btn btn-danger" style="width:100px;" onclick="deleteSubCategory(<?php echo $sel->sc_id; ?>);">Delete</a> 
					  </td>
					</tr>
					<?php 
					$i++;
					} ?>
				 </tbody>
				</table>
			  
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
	
		function addcategory(){
			var name = $('#category_name').val();
			var desc = $('#category_description').val();
			if(name != ''){

			var dataString = 'name='+ name + '&desc='+ desc;
			//alert(dataString);
	 	    $.ajax({
			
				type:"POST",
				url:"<?=base_url();?>masterentry/addCategory/",
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

		//delete the category
		function deleteCategory(id){
			var dataString = 'id='+ id;
	 	    $.ajax({
			
				type:"POST",
				url:"<?=base_url();?>masterentry/deleteCategory/",
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

		//Add sub-category
		function addSubCategory(){
			var catId = $('#categoryId').val();
			var subName = $('#subCategory').val();
			var desc = $('#sub_cat_desc').val();
			if(catId != '' && subName != ''){
			var dataString = 'catId='+ catId + '&subName='+ subName +'&desc='+desc;
	 	    $.ajax({
			
				type:"POST",
				url:"<?=base_url();?>masterentry/addSubCategory/",
				data: dataString,
				cache: false,
				success: function (data) {
					//alert(data);
					$('#sub_category').css('display','block');
					var fad = $('#sub_category').fadeOut(10000)
					if(fad){
						window.location.reload();
					}
					//alert($("#alertInvite").attr("style"));
					//console.log(mresp);
				}
			
			});
	 	}else{
	 		$('#errorThrough').html("Please fill data");
	 	}
		}

		function deleteSubCategory(id){
			
			var dataString = 'id='+ id;
			//alert(dataString);
	 	    $.ajax({
			
				type:"POST",
				url:"<?=base_url();?>masterentry/deleteSubCategory/",
				data: dataString,
				cache: false,
				success: function (data) {
					//alert(data);
					$('#deletesubcateg').css('display','block');
					var fad = $('#deletesubcateg').fadeOut(10000)
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