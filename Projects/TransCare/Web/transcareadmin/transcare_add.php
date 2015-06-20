<?php 
	include("admin-header.php");
	

?>



<div id="element"></div>
<div class="container">
	<div class="header">
    	<div class="headerContent">
            <div class="indexLogo">
                    <img src="images/transcareLogoMain.png">
            </div>
            <div class="indexLogout">
                <a href="process.php"></a>
            </div>
        </div>
    </div>
    <?php 
		if(isset($_GET['val']) == ""){
	?>
    <form action="transcare_manage.php" method="post" enctype="multipart/form-data">
    <div class="mainContent"> 
    	<div class="mainTitle">
        	<h3>Main Screen</h3>
        </div>
        <div class="back">

                <a style="float:right" href="transcare_manage.php"></a>

        </div>
        <div style="clear:both;"></div>
        <div class="">
        	<h3><?php if(isset($setting)){ echo $msg; } ?></h3>
        </div>
        <div class="contentSec">
        	<div class="contentSecTitle">
        		<h3>Logo Image</h3>
        	</div>
            <div class="contentSecLeft">
            	 <input type="text" id="logo" value="" class="upLoadText"> 
                 <div class="fileUpload btn btn-primary">
                     <span class="uploadImage"></span>
                     <input id="logoup" onchange="logoUrl(this)" name="logo"  type="file" class="upload" value="Browse">
                 </div>
               <!--  <div class="upLoad">
                    <a href="#">Upload</a>
                 </div>-->
            </div>
            <div class="contentSecRight">
            	 <p class="imageView1">Current Image</p>
                 <p class="imageView2"><img id="changeLogo" style="width:82px; height:82px;" src="images/uploadImg.jpg"><br><br>filename.jpg</p>
            </div>
        </div>
        <div class="contentSec">
        	<div class="contentSecTitle">
        		<h3>Background Image</h3>
        	</div>
            <div class="contentSecLeft">
            	 <input type="text" id="bg_image" value="" class="upLoadText">
                 <div class="fileUpload btn btn-primary">
                     <span class="uploadImage"></span>
                     <input id="bgup" onchange="bgUrl(this)" name="backgrounimage" type="file" class="upload" value="Browse">
                 </div>
            </div>
            <div class="contentSecRight">
            	 <p class="imageView1">Current Image</p>
                 <p class="imageView2"><img id="changebg" style="width:82px; height:82px;" src="images/uploadImg.jpg"><br><br>filename.jpg</p>
            </div>
        </div>
        
        
        
        
        <div class="section2">
        	<div class="contentSecTitle">
        		<h3>Rotating Image - Main</h3>
        	</div>
            <div class="subSec">
            	<input type="hidden" name="countrim" id="countrim" value="1" />
                <p style="font-size:12px;color:#FF1F1F;margin-bottom:10px;">Please add only circle image in this Rotating Image - Main</p>
                <div id="appendMain">                
                <div class="subSec1" id="appendClass1">
                    <div class="ses1">
                        <p id="countmain1">1</p>
                    </div>
                    <div class="contentSec2Left">
                         <input type="text" id="rotatingmain1" value="" class="upLoadText">
                        <div class="fileUpload btn btn-primary">
                             <span class="uploadImage"></span>
                             <input id="rotatingmainup1" onchange="rotatingmainUrl(this,1)" name="rotatingmain[]" type="file" class="upload" value="Browse">
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img id="changerim1" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete maindel">
                                <a id="hideAdd1" href="javascript:void(0);" onClick="removeRotatedMain(1)"></a>
                          </div> 
                    </div>
                 </div>
                 </div>
                
             
                 <!--<div class="subSec1">
                    <div class="ses1">
                        <p>2</p>
                    </div>
                    <div class="contentSec2Left">
                         <input type="text" name="User" id="User" value="" class="upLoadText"> <a href="#" class="uploadImage"></a>
                         <div class="upLoad">
                            <a href="#">Upload</a>
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img src="images/uploadImg.jpg"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete">
                                <a href="#"></a>
                          </div> 
                    </div>
                 </div>-->
                 <div class="addImage" id="greaterremove">
                        <a href="javascript:void(0);" id="rim_content" onclick="addrotateimagemain();"></a>
                 </div>
             </div>
             
             
        </div>
        
        
         <div class="section2">
        	<div class="contentSecTitle">
        		<h3>Rotating Image - Idle</h3>
        	</div>
            <div class="subSec"> 
            <input type="hidden" name="countrii" id="countrii" value="1" />
            <div id="appendidel">               
                <div class="subSec1" id="appendClassidle1">
                    <div class="ses1">
                        <p id="countidle1">1</p>
                    </div>
                    <input type="hidden" id="getEachCount1" value="1">
                    <div class="contentSec2Left">
                         <input type="text" id="rotatingidle1" value="" class="upLoadText"> 
                        <div class="fileUpload btn btn-primary">
                             <span class="uploadImage"></span>
                             <input id="rotatingidleup1" onchange="rotatingidleUrl(this,1)" name="rotatingidle[]" type="file" class="upload" value="Browse">
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img id="changerii1" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete maindel">
                                 <a href="javascript:void(0);" onClick="removeRotatedIdle(1)"></a>
                          </div> 
                    </div>
                 </div>
                 </div>
             
                 <!--<div class="subSec1">
                    <div class="ses1">
                        <p>2</p>
                    </div>
                    <div class="contentSec2Left">
                         <input type="text" name="User" id="User" value="" class="upLoadText"> <a href="#" class="uploadImage"></a>
                         <div class="upLoad">
                            <a href="#">Upload</a>
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img src="images/uploadImg.jpg"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete">
                                <a href="#"></a>
                          </div> 
                    </div>
                 </div>-->
                  <div class="addImage" id="greaterremoveidle">
                        <a href="javascript:void(0);" onClick="addrotateimageidle();"></a>
             	 </div>
             </div>
            
             
        </div>
        
        
        <div class="tickerSec">
        	<div class="contentSecTitle">
        		<h3>Ticker Text</h3>
        	</div>
            <div class="tickerCon">
            	 <textarea rows="4" name="tickerText" id="summary" placeholder="Wrote your ticker text"></textarea>
                 <div id="counter" style="font-size:13px;"></div> 
                  <!--<div class="update">
                        <a href="#"></a>
             	  </div>-->
            </div> 
        </div>
        <div class="update">
            <input class="submitBut" name="add_details" type="submit" style="cursor:pointer;font-size: 0;">
        </div>
        <div style="clear:both"></div>
        
          
    </div>
    </form>
    <?php }else{ ?>
    <form action="transcare_manage.php" method="post" enctype="multipart/form-data">
    <?php 
		$qur = mysql_query("SELECT * FROM `site_setting`");
		$fetchqur = mysql_fetch_array($qur);
	?>
    
    	<div class="mainContent"> 
    	<div class="mainTitle">
        	<h3>Edit Screen</h3>
        </div>
        <div class="back">

                <a style="float:right" href="transcare_manage.php"></a>

        </div>
        <div class="">
        	<h3><?php if(isset($setting)){ echo $msg; } ?></h3>
        </div>
        <div class="contentSec">
        	<div class="contentSecTitle">
        		<h3>Logo Image</h3>
        	</div>
            <input type="hidden" name="settingId" value="<?php echo $fetchqur['s_id']; ?>">
            <div class="contentSecLeft">
            	 <input type="text" id="elogo" value="<?php echo $fetchqur['logo_image'] ?>" class="upLoadText"> 
                 <div class="fileUpload btn btn-primary">
                     <span class="uploadImage"></span>
                     <input id="elogoup" onchange="elogoUrl(this)" name="elogo"  type="file" class="upload" value="Browse">
                 </div>
               <!--  <div class="upLoad">
                    <a href="#">Upload</a>
                 </div>-->
            </div>
            <div class="contentSecRight">
            	 <p class="imageView1">Current Image</p>
                 <input type="hidden" name="logoremove" value="<?php echo $fetchqur['logo_image'] ?>">
                 <p class="imageView2"><img id="echangeLogo" style="width:82px; height:82px;" src="<?php echo $fetchqur['logo_image'] ?>"><br><br>filename.jpg</p>
            </div>
        </div>
        <div class="contentSec">
        	<div class="contentSecTitle">
        		<h3>Background Image</h3>
        	</div>
            <div class="contentSecLeft">
            	 <input type="text" id="ebg_image" value="<?php echo $fetchqur['bg_image'] ?>" class="upLoadText">
                 <div class="fileUpload btn btn-primary">
                     <span class="uploadImage"></span>
                     <input id="ebgup" onchange="ebgUrl(this)" name="ebackgrounimage" type="file" class="upload" value="Browse">
                 </div>
            </div>
            <div class="contentSecRight">
            	 <p class="imageView1">Current Image</p>
                 <input type="hidden" name="bgremove" value="<?php echo $fetchqur['bg_image'] ?>">
                 <p class="imageView2"><img id="echangebg" style="width:82px; height:82px;" src="<?php echo $fetchqur['bg_image'] ?>"><br><br>filename.jpg</p>
            </div>
        </div>
        
        
        
        
        <div class="section2">
        	<div class="contentSecTitle">
        		<h3>Rotating Image - Main</h3>
        	</div>
            <div class="subSec">
            	<p style="font-size:12px;color:#FF1F1F;margin-bottom:10px;">Please add only circle image in this Rotating Image - Main</p>
                <div id="appendMain"> 
                <?php 
				$i=1;
					$getri = mysql_query("SELECT * FROM `rotate_image_main`");
					$countrim = mysql_num_rows($getri);
					while($fetchgetri = mysql_fetch_array($getri)){
						
					
				?> 
                <input type="hidden" name="ecountrim" id="countrim" value="<?php echo $countrim; ?>" />   
                <input type="hidden" name="rmId<?php echo $i; ?>" value="<?php echo $fetchgetri['rim_id']; ?>">       
                <div class="subSec1" id="appendClass<?php echo $fetchgetri['rim_id']; ?>">
                    <div class="ses1">
                        <p id="countmain1"><?php echo $i; ?></p>
                    </div>
                    <div class="contentSec2Left">
                         <input type="text" id="erotatingmain<?php echo $i; ?>" value="<?php echo $fetchgetri['rotate_image_main'] ?>" class="upLoadText">
                        <div class="fileUpload btn btn-primary">
                             <span class="uploadImage"></span>
                             <input id="erotatingmainup<?php echo $i; ?>" onchange="erotatingmainUrl(this,<?php echo $i; ?>)" name="erotatingmain<?php echo $i; ?>" type="file" class="upload" value="<?php echo $fetchgetri['rotate_image_main'] ?>">
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                    <input type="hidden" name="unlinkrm<?php echo $i; ?>" value="<?php echo $fetchgetri['rotate_image_main'] ?>">
                          <p class="imageView3"><img id="echangerim<?php echo $i; ?>" src="<?php echo $fetchgetri['rotate_image_main'] ?>" style="width:82px; height:82px;"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete maindel">
                                <a href="javascript:void(0);" onClick="editMain(<?php echo $fetchgetri['rim_id']; ?>)"></a>
                          </div> 
                    </div>
                 </div>
                 <?php $i++; } 
				 if($countrim < 5){
					 $getbal1 = 5 - $countrim;
				 ?>
                 <h3 style="margin-bottom:10px;">You Can add <?php echo $getbal1; ?> images</h3>
                 <?php for($i=1; $i <= $getbal1; $i++){ ?>
                 	<div class="subSec1" id="addAppendNewmain">
                    <div class="ses1">
                        <p id="acountmain1"><?php echo $i; ?></p>
                    </div>
                    <div class="contentSec2Left">
                         <input type="text" id="aerotatingmain<?php echo $i; ?>" value="" class="upLoadText">
                        <div class="fileUpload btn btn-primary">
                             <span class="uploadImage"></span>
                             <input id="aerotatingmainup<?php echo $i; ?>" onchange="aerotatingmainUrl(this,<?php echo $i; ?>)" name="aerotatingmain[]" type="file" class="upload" value="<?php echo $fetchgetri['rotate_image_main'] ?>">
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img id="aechangerim<?php echo $i; ?>" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete maindel">
                                <a href="javascript:void(0);" onClick="aeditMain(<?php echo $i; ?>)"></a>
                          </div> 
                    </div>
                 </div>
                 <?php 
				 }
				 } ?>
                 </div>
                
             
                 <!--<div class="subSec1">
                    <div class="ses1">
                        <p>2</p>
                    </div>
                    <div class="contentSec2Left">
                         <input type="text" name="User" id="User" value="" class="upLoadText"> <a href="#" class="uploadImage"></a>
                         <div class="upLoad">
                            <a href="#">Upload</a>
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img src="images/uploadImg.jpg"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete">
                                <a href="#"></a>
                          </div> 
                    </div>
                 </div>-->
                 
             </div>
             
             
        </div>
        
        
         <div class="section2">
        	<div class="contentSecTitle">
        		<h3>Rotating Image - Idle</h3>
        	</div>
            <div class="subSec"> 
            <input type="hidden" name="ecountrii" id="ecountrii" value="1" />
            <div id="appendidel"> 
            <?php 
			$j=1;
					$getrii = mysql_query("SELECT * FROM `rotate_image_idle`");
					$countrii = mysql_num_rows($getrii);
					while($fetchgetrii = mysql_fetch_array($getrii)){
						
					
				?> 
                 <input type="hidden" name="ecountrii" id="ecountrii" value="<?php echo $countrii; ?>" />   
                <input type="hidden" name="riId<?php echo $j; ?>" value="<?php echo $fetchgetrii['rii_id']; ?>">                
                <div class="subSec1" id="appendClassidle<?php echo $fetchgetrii['rii_id']; ?>">
                    <div class="ses1">
                        <p id="countidle1"><?php echo $j; ?></p>
                    </div>
                    <input type="hidden" id="egetEachCount1" value="1">
                    <div class="contentSec2Left">
                         <input type="text" id="erotatingidle<?php echo $j; ?>" value="<?php echo $fetchgetrii['rotate_image_idle'] ?>" class="upLoadText"> 
                        <div class="fileUpload btn btn-primary">
                             <span class="uploadImage"></span>
                             <input id="erotatingidleup<?php echo $j; ?>" onchange="erotatingidleUrl(this,<?php echo $j; ?>)" name="erotatingidle<?php echo $j; ?>" type="file" class="upload" value="<?php echo $fetchgetrii['rotate_image_idle'] ?>">
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                     <input type="hidden" name="unlinkri<?php echo $j; ?>" value="<?php echo $fetchgetrii['rotate_image_idle'] ?>">
                          <p class="imageView3"><img id="echangerii<?php echo $j; ?>" src="<?php echo $fetchgetrii['rotate_image_idle'] ?>" style="width:82px; height:82px;"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete maindel">
                                 <a href="javascript:void(0);" onClick="editIdle(<?php echo $fetchgetrii['rii_id']; ?>)"></a>
                          </div> 
                    </div>
                 </div>
                 <?php $j++; } 
				  if($countrii < 5){
					  $getbal = 5 - $countrii;
				 ?>
                 <h3 style="margin-bottom:10px;">You Can add <?php echo $getbal; ?> images</h3>
                  <?php for($i=1; $i <= $getbal; $i++){ ?>
                 <div class="subSec1" id="addAppendNewidel">
                 	<div class="ses1">
                        <p id="countidle1"><?php echo $i; ?></p>
                    </div>
                    <input type="hidden" id="aegetEachCount1" value="1">
                    <div class="contentSec2Left">
                         <input type="text" id="aerotatingidle<?php echo $i; ?>" value="" class="upLoadText"> 
                        <div class="fileUpload btn btn-primary">
                             <span class="uploadImage"></span>
                             <input id="aerotatingidleup<?php echo $i; ?>" onchange="aerotatingidleUrl(this,<?php echo $i; ?>)" name="aerotatingidle[]" type="file" class="upload" value="">
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img id="aechangerii<?php echo $i; ?>" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete maindel">
                                 <a href="javascript:void(0);" onClick="aeditIdle(<?php echo $i; ?>)"></a>
                          </div> 
                    </div>
                 </div>
                                       
                 <?php 
				  }
				 } ?>
                 </div>
             
                 <!--<div class="subSec1">
                    <div class="ses1">
                        <p>2</p>
                    </div>
                    <div class="contentSec2Left">
                         <input type="text" name="User" id="User" value="" class="upLoadText"> <a href="#" class="uploadImage"></a>
                         <div class="upLoad">
                            <a href="#">Upload</a>
                         </div>
                    </div>
                    <div class="contentSecRight"> 
                          <p class="imageView3"><img src="images/uploadImg.jpg"><br><br>Current Image</p>
                          <p class="imageView4">filename.jpg</p>
                          <div class="deLete maindel">
                                <a href="#"></a>
                          </div> 
                    </div>
                 </div>-->
                  
             </div>
            
             
        </div>
        
        
        <div class="tickerSec">
        	<div class="contentSecTitle">
        		<h3>Ticker Text</h3>
        	</div>
            <div class="tickerCon">
            	 <textarea rows="4" name="etickerText" id="summary" placeholder="Wrote your ticker text"><?php echo $fetchqur['ticker_text'] ?></textarea>
                  <div id="counter" style="font-size:13px;"></div>
                  <!--<div class="update">
                        <a href="#"></a>
             	  </div>-->
            </div> 
        </div>
        <div class="update">
            <input class="submitBut" name="edit_details" type="submit" style="cursor:pointer;font-size: 0;">
        </div>
        <div style="clear:both"></div>
          
    </div>
    
    
    </form>
    <?php } ?>
</div>
<script>

$(function() {
    $("#element").introLoader();
});

$(document).ready(function()  {
    var characters = 200;
    $("#counter").append("You have <strong>"+  characters+"</strong> characters remaining");
    $("#summary").keyup(function(){
        if($(this).val().length > characters){
        $(this).val($(this).val().substr(0, characters));
        }
    var remaining = characters -  $(this).val().length;
    $("#counter").html("You have <strong>"+  remaining+"</strong> characters remaining");
    if(remaining <= 10)
    {
        $("#counter").css("color","red");
    }
    else
    {
        $("#counter").css("color","black");
    }
    });
}); 

/*Logo script*/
	document.getElementById("logoup").onchange = function () {
		document.getElementById("logo").value = this.value;
		document.getElementById("logo").value.replace("C:\\fakepath\\", "");
	};
	
	function logoUrl(input) {
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#changeLogo').attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   $("#logoup").change(function() {
	   logoUrl(this);
   });
   
   /*Background script*/
   
   document.getElementById("bgup").onchange = function () {
		document.getElementById("bg_image").value = this.value;
		document.getElementById("bg_image").value.replace("C:\\fakepath\\", "");
	};
	
	function bgUrl(input) {
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#changebg').attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   $("#bgup").change(function() {
	   bgUrl(this);
   });
   
    /*document.getElementById("rotatingmainup1").onchange = function () {
		document.getElementById("rotatingmain1").value = this.value;
		document.getElementById("rotatingmain1").value.replace("C:\\fakepath\\", "");
	};
	
	function rotatingmainUrl(input) {
		alert('hi');
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#changerim1').attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   
    $("#rotatingmainup1").change(function() {
	   rotatingmainUrl(this);
   });
   
    document.getElementById("rotatingidleup1").onchange = function () {
		document.getElementById("rotatingidle1").value = this.value;
		document.getElementById("rotatingidle1").value.replace("C:\\fakepath\\", "");
	};
	
	function rotatingidleUrl(input) {
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#changerii1').attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   
    $("#rotatingidleup1").change(function() {
	   rotatingidleUrl(this);
   });*/
 
   /*Add rotating image main*/
   
   function addrotateimagemain (id){
		var id = $('#countrim').val();
		var next = parseInt(id)+1;
		
		if(next == 5){
			$('#greaterremove').hide();
		}else{
			$('#greaterremove').show();
		}
	
		$('#appendMain').append('<div class="subSec1" id="appendClass'+next+'"><div class="ses1"><p id="countmain'+next+'">'+next+'</p></div><div class="contentSec2Left"><input type="text" id="rotatingmain'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="rotatingmainup'+next+'" onchange="rotatingmainUrl(this,'+next+')" name="rotatingmain[]" type="file" class="upload" value="Browse"></div></div><div class="contentSecRight"> <p class="imageView3"><img id="changerim'+next+'" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p><p class="imageView4">filename.jpg</p><div class="deLete maindel maindel"><a href="javascript:void(0);" onClick="removeRotatedMain('+next+')"></a></div> </div></div>');             
        $('#countrim').val(next);
		
		
	}
	function removeRotatedMain(id){
		var cid = $('#countrim').val();
			if(cid > 1){
		$('#appendClass'+id).remove();
		var langCount=$('#countrim').val();
		$('#countrim').val(parseInt(langCount)-1);
		}else
		{
		$('#rotatingmain'+id).val('');
		$('#changerim'+id).attr('src','images/uploadImg.jpg');
		}
		
	}

	function aeditMain(id)
	{
		  
		$('#aechangerim'+id).attr('src','images/uploadImg.jpg');
		$('#aerotatingmain'+id).val('');
		$('#aerotatingmainup'+id).val('');

	}


	function aeditIdle(id)
	{
		        
		$('#aerotatingidle'+id).val('');
		$('#aerotatingidleup'+id).val('');
		$('#aechangerii'+id).attr('src','images/uploadImg.jpg');

	}
	
	function rotatingmainUrl(input,id) {
	   $('#rotatingmain'+id).val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#changerim'+id).attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }ss
   }
   
    $("#rotatingmainup1").change(function() {
	   rotatingmainUrl(this,id);
   });
	
	/*Add rotating image idle*/
	
	function addrotateimageidle(){
		var id = $('#countrii').val();
		var next = parseInt(id)+1;
		
		if(next == 5){
			$('#greaterremoveidle').hide();
		}else{
			$('#greaterremoveidle').show();
		}
	
		$('#appendidel').append('<div class="subSec1" id="appendClassidle'+next+'"><div class="ses1"><p id="countidle'+next+'">'+next+'</p></div><input type="hidden" id="getEachCount'+next+'" value="1"><div class="contentSec2Left"><input type="text" id="rotatingidle'+next+'" value="" class="upLoadText"> <div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="rotatingidleup'+next+'" onchange="rotatingidleUrl(this,'+next+')" name="rotatingidle[]" type="file" class="upload" value="Browse"></div></div><div class="contentSecRight"> <p class="imageView3"><img id="changerii'+next+'" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p><p class="imageView4">filename.jpg</p><div class="deLete maindel"><a href="javascript:void(0);" onClick="removeRotatedIdle('+next+')"></a></div> </div></div>');             
        $('#countrii').val(next);
		
		
	}
	function removeRotatedIdle(id){
		var cid = $('#countrii').val();
		if(cid > 1){
		$('#appendClassidle'+id).remove();
		var langCount=$('#countrii').val();
		$('#countrii').val(parseInt(langCount)-1);
		}else
		{
		$('#rotatingidle'+id).val('');
		$('#changerii'+id).attr('src','images/uploadImg.jpg');
		}
		
	}
	
	function rotatingidleUrl(input,id) {
		$('#rotatingidle'+id).val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#changerii'+id).attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   
    $("#rotatingidleup1").change(function() {
	   rotatingidleUrl(this,id);
   });
   
   
   
   
   //edit process script

	//edit logo script
	function elogoUrl(input) {
		$('#elogo').val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#echangeLogo').attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   $("#elogoup").change(function() {
	   logoUrl(this);
   });
   
   //background image edit
   
   function ebgUrl(input) {
	   $('#ebg_image').val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#echangebg').attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   $("#ebgup").change(function() {
	   bgUrl(this);
   });
   
   //Edit rotating main image
   
   function erotatingmainUrl(input,id) {
	   $('#erotatingmain'+id).val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#echangerim'+id).attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }ss
   }
   
    $("#erotatingmainup1").change(function() {
	   erotatingmainUrl(this,id);
   });
   
   // Edit rotating image
   
   function erotatingidleUrl(input,id) {
		$('#erotatingidle'+id).val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#echangerii'+id).attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   
    $("#erotatingidleup1").change(function() {
	   erotatingidleUrl(this,id);
   });
   
   
    //Add&Edit rotating main image
   
   function aerotatingmainUrl(input,id) {
	   $('#aerotatingmain'+id).val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#aechangerim'+id).attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }ss
   }
   
    $("#aerotatingmainup1").change(function() {
	   aerotatingmainUrl(this,id);
   });
   
   // Add&Edit rotating image idel
   
   function aerotatingidleUrl(input,id) {
		$('#aerotatingidle'+id).val(input.value);
	   if (input.files && input.files[0]) {
		   var reader = new FileReader();
		   reader.onload = function(e) {
			   $('#aechangerii'+id).attr('src', e.target.result);
		   }

		   reader.readAsDataURL(input.files[0]);
	   }
   }
   
    $("#aerotatingidleup1").change(function() {
	   aerotatingidleUrl(this,id);
   });


//delete main
function editMain(id)
{
 $.ajax({
        url: "deletemainpageimages.php",
        type: "post",
        data: {mainimgid:id},
        success: function(data){
      if(data==1)
      {
        $('#appendClass'+id).remove();
        window.location.reload();
      }
        },
        error:function(data){
      
        }
    });
}
//delete idle img
function editIdle(id)
{
 $.ajax({
        url: "deletemainpageimages.php",
        type: "post",
        data: {idleimgid:id},
        success: function(data){
      if(data==1)
      {
        $('#appendClassidle'+id).remove();
            window.location.reload();
      }
        },
        error:function(data){
      
        }
    });
}
	
	
</script>
<?php 
	include("admin-footer.php");
?>