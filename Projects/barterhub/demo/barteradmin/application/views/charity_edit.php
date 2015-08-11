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
	.setIcon{
		position: absolute;
		top: 0;
		right: 0;
		cursor: pointer;
		font-size: 18px;
	}
	.setIcon:hover{
		color: rgb(255, 31, 31);
	}
	.rqe{
		position: relative;
		border: 1px solid #ddd;
		padding: 5px 40px;
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
                        <h3>Charities</h3>
                    </div>
                     <?php
                        if(isset($mess) && $mess != '')
			            {
			            ?>
			            <div class="row">
			            <div class="span12">
			            
			            <div class="alert c_alert alert-dismissible fade in" role="alert" id="alertstatus" style="margin: 0px 20px 10px 20px;">
			              <button type="button" class="close" data-dismiss="alert"></button>
			              <?=$mess?>
			            </div>
			            
			            </div>
			            </div>
			            <?php 
			            }
			            ?>
         			<form class="form-horizontal row-fluid" style="border-top:0px;" name="charityForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>charity/editCharity">
         				<input type="hidden" name="getId" value="<?php echo $editCharity[0]->char_id?>">
         				<h3 style="padding: 15px">Add Charity</h3>
							<div class="control-group span6" style="padding:15px;">
								<label class="control-label" for="basicinput" style="padding:10px;">Charity Name:</label>
								<div class="controls">
									<input type="text" id="basicinput" placeholder="" name="charity_name" class="span10" value="<?php echo $editCharity[0]->charity_name?>">
									<p id="charityname" class="error"></p>
								</div>
								<label class="control-label" for="basicinput" style="padding:10px;">Contact Person:</label>
								<div class="controls">
									<input type="text" id="basicinput" class="span10" name="contact_person" value="<?php echo $editCharity[0]->contact_person?>">
									<p id="contactperson" class="error"></p>
								</div>
							</div>
								<div class="control-group span6" style="margin:0px; padding:15px;">
								<label class="control-label" for="basicinput" style="padding:10px;">Reg. No:</label>
								<div class="controls">
									<input type="text" id="basicinput"  class="span10" name="reg_no" value="<?php echo $editCharity[0]->reg_no?>">
									<p id="regno" class="error"></p>
								</div>
									<label class="control-label" for="basicinput" style="padding:10px;">Contact Number:</label>
								<div class="controls">
									<input type="text" id="basicinput" class="span10" name="contact_no" value="<?php echo $editCharity[0]->contact_number ?>">
									<p id="contactno" class="error"></p>
								</div>
							</div>
								<div class="control-group " style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">Address:</label>
								<div class="controls">
									<!-- <input type="text" id="basicinput" style="height: 150px;"  name="address"> -->
									<textarea class="span11" style="height: 150px;" name="address1"><?php echo $editCharity[0]->address ?></textarea>
									<p id="address" class="error"></p>
								</div>
								</div>
								<div class="control-group" style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">About the Charity:</label>
								<div class="controls">
									<!-- <input type="text" id="basicinput" style="height: 150px;" class="span11" name="about_charity"> -->
									<textarea class="span11" style="height: 150px;" name="about_charity"><?php echo $editCharity[0]->about; ?></textarea>
								</div>
								</div>
								<div class="control-group" style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">Logo:</label>
									<div class="controls">
										<?php if($editCharity[0]->logo != ''){ ?>
											<img src="<?php echo base_url().$editCharity[0]->logo; ?>">
										<?php }else{ ?>
										<h3>There is no logo currently</h3>
										<?php } ?>
									</div>
								<div class="controls">
									<div class="input-append span6">
										<input type="file" class="span12" placeholder="Upload file" name="elogo">
									</div>
								</div>
								</div>
								<div class="control-group" style="padding:15px;">
									<label class="control-label" for="basicinput" style="padding:10px;">Image Gallery:</label>
									<div class="controls clearfix">
										<?php echo $this->method_call->getCharityGallery($editCharity[0]->char_id); ?>
									</div>
								<div class="controls clearfix">
								<h2>Your can add more images</h2>
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
									<button type="submit" name="add_charity" class="btn btn-danger span1" style="width:80px;" onclick="return charityValidation();"><i class="icon-plus" style="padding-right: 10px;"></i>Upate</button>
								   <button type="submit" class="btn btn-danger span1" onclick="goBack();" style="width:100px;"><i class="icon-remove" style="padding-right: 10px;"></i>CANCEL</button>
								 </div>
							</div>
						</form>
                </div><!--end Module-->
            </div> <!--/.content-->
          </div> <!--/ span-12-->
        </div> <!--/.row 9-->
    </div><!--/.container-->
</div><!--/.wrapper-->
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
// $(document).ready(function(){
// 	setTimeout(function(){ 
// 		$('#alertstatus').fadeOut(4000);
// 	 }, 3000);
// });

//delete the gallery image
function deleteGallery(id,del){
	
	var dataString = 'id='+ id;
	alert(dataString);
	$.ajax({
			
	type:"POST",
	url:"<?=base_url();?>charity/deleteGallery/",
	data: dataString,
	cache: false,
	success: function (data) {
		
			$('#deleterow'+del).fadeOut(3000);
	}
	});
}
</script>
<?php 
    include("footer_in.php");
?>