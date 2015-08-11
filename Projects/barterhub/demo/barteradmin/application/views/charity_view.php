<?php 
    include("header_in.php");
?>
<style>
	.table
	{
		max-width:100%;
		width:98%;
		margin:13px;
	}
	.bottom
	{
		border: 1px solid #000;
		width: 100%;
	}
	.controls
	{
		padding:10px;
	}
	.error{
		color:red;
	}

</style>
<script src="<?php echo base_url(); ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>

<div class="wrapper">
<div class="container">
    <div class="row">
        <div class="span12">
        	<div class="content">
                <div class="module">
                    <div class="module-head">
                        <h3>Charities</h3>
                    </div>
                    <?php if($this->session->flashdata('flashSuccess')):?>
         
			        <div class="alert alert-success alert-dismissible fadeoutthis" role="alert">
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			          <strong><?=$this->session->flashdata('flashSuccess')?></strong>
			        </div>
			          
			        <?php endif ?>
                    <div class="alert alert-danger" role="alert" id="deletechar" style="display:none;">Delected Successfully</div>
                     
         			<form class="form-horizontal row-fluid" style="border-top:0px;" method="post" name="charityForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>charity/insertCharity">
         				<h3 style="padding: 15px">Add Charity</h3>
							<div class="control-group span6" style="padding:15px;">
								<label class="control-label" for="basicinput" style="padding:10px;">Charity Name:</label>
								<div class="controls">
									<input type="text" id="basicinput" placeholder="" name="charity_name" class="span10">
									<p id="charityname" class="error"></p>
								</div>
								<label class="control-label" for="basicinput" style="padding:10px;">Contact Person:</label>
								<div class="controls">
									<input type="text" id="basicinput" class="span10" name="contact_person">
									<p id="contactperson" class="error"></p>
								</div>
							</div>
								<div class="control-group span6" style="margin:0px; padding:15px;">
								<label class="control-label" for="basicinput" style="padding:10px;">Reg. No:</label>
								<div class="controls">
									<input type="text" id="basicinput"  class="span10" name="reg_no">
									<p id="regno" class="error"></p>
								</div>
									<label class="control-label" for="basicinput" style="padding:10px;">Contact Number:</label>
								<div class="controls">
									<input type="text" id="basicinput" class="span10" name="contact_no">
									<p id="contactno" class="error"></p>
								</div>
							</div>
								<div class="control-group " style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">Address:</label>
								<div class="controls">
									<textarea class="span11" style="height: 150px;" name="address"></textarea>
									<p id="address" class="error"></p>
								</div>
								</div>
								<div class="control-group" style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">About the Charity:</label>
								<div class="controls">
									<textarea class="span11" style="height: 150px;" name="about_charity"></textarea>
								</div>
								</div>
								<div class="control-group" style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">Logo:</label>
								<div class="controls">
									<div class="input-append span6">
										<input type="file" class="span12" placeholder="Upload file" name="logo">
									</div>
								</div>
								</div>
								<div class="control-group" style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">Image Gallery:</label>
								<div class="controls">
									<div class="input-append span6">
										<input type="file" class="span12" placeholder="Upload file" id="charity_image" name="charity_image[]" multiple>
									</div>
									<div class="span12" style="margin-top: 15px;">
										<output id="result" />
									</div>
								</div>
								</div>
									<div class="control-group" style="padding:15px;">
								
							
								<div class="controls" style="margin-top:30px; margin-bottom:50px;">
									<button type="submit" name="add_charity" class="btn btn-danger span1" onclick="return charityValidation();" style="width:80px;"><i class="icon-plus" style="padding-right: 10px;"></i>ADD</button>
								   
								 </div>
							</div>
						</form>
					<form class="form-horizontal row-fluid" style="border-top:0px;">	   
                    <h3 style="padding: 15px">Charities List</h3>
                     <table class="table table-bordered datatable-1">
					  <thead>
						<tr>
						  <th>S.No</th>
						  <th>Charity Name</th>
						  <th>Reg.No</th>
						  <th>Contact Person</th>
						  <th>Contact Number</th>
						  <th>Address</th>
						  <th>Edit</th>
						 </tr>
					  </thead>
					  <tbody>
                      <?php 
					  	$i = 1;
						foreach($charity as $char){
					  ?>
						<tr>
						  <td><?php echo $i; ?></td>
					       <td><?php echo $char->charity_name; ?></td>
					       <td><?php echo $char->reg_no; ?></td>
					       <td><?php echo $char->contact_person; ?></td>
					       <td><?php echo $char->contact_number; ?></td>
					       <td><?php echo $char->address; ?></td>
					      <td><a href="<?php echo base_url(); ?>charity/charityEdit/<?php echo $char->char_id; ?>" class="btn btn-danger" style="width:100px;">Edit</a>
					  	<a href="javascript:void(0);" class="btn btn-danger" style="width:100px;" onclick="deleteCharity(<?php echo $char->char_id; ?>);">Delete</a> 
					  </td>
						</tr>
                        <?php 
							$i++;
						}
						?>
						</tbody>
					  </table>
					</form>
                </div><!--end Module-->
            </div> <!--/.content-->
          </div> <!--/ span-12-->
        </div> <!--/.row 9-->
    </div><!--/.container-->
</div><!--/.wrapper-->
<script src="<?php echo base_url(); ?>scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scripts/jquery-confirm.js"></script>
<script type="text/javascript">
//validation for charity
function charityValidation(){
	
	document.getElementById("charityname").innerHTML = "";
	document.getElementById("contactperson").innerHTML = "";
	document.getElementById("regno").innerHTML = "";
	document.getElementById("contactno").innerHTML = "";
	document.getElementById("address").innerHTML = "";

	if(document.charityForm.charity_name.value == ""){
		document.getElementById("charityname").innerHTML = "Please enter charity name";
		document.charityForm.charity_name.focus();
		return false;
	}
	if(document.charityForm.contact_person.value == ""){
		document.getElementById("contactperson").innerHTML = "Please enter person name";
		document.charityForm.contact_person.focus();
		return false;
	}
	if(document.charityForm.reg_no.value == ""){
		document.getElementById("regno").innerHTML = "Please enter reg no";
		document.charityForm.reg_no.focus();
		return false;
	}
	if(document.charityForm.contact_no.value == ""){
		document.getElementById("contactno").innerHTML = "Please enter number";
		document.charityForm.contact_no.focus();
		return false;
	}
	if(document.charityForm.address.value == ""){
		document.getElementById("address").innerHTML = "Please enter address";
		document.charityForm.address.focus();
		return false;
	}
	return true;
}


window.onload = function(){
	if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("charity_image");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("div");
                    
                    div.innerHTML = "<div class='span4'><img style='height:177px;' class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/></div>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}
	setTimeout(function(){ 
		$('#alertstatus').fadeOut(4000);
	 }, 3000);
//delete the Charity
function deleteCharity(id){


	$.confirm({
    title: 'Confirm!',
    content: 'Are you sure want to disable this users?',
    confirm: function () {
	var dataString = 'id='+ id;
	    $.ajax({
	
		type:"POST",
		url:"<?=base_url();?>charity/deleteCharity/",
		data: dataString,
		cache: false,
		success: function (data) {
			//alert(data);
			$('#deletechar').css('display','block');
			var fad = $('#deletechar').fadeOut(10000)
			if(fad){
				window.location.reload();
			}
			//alert($("#alertInvite").attr("style"));
			//console.log(mresp);
		}
	
	});
	}
});
}

</script>
<?php 
    include("footer_in.php");
?>