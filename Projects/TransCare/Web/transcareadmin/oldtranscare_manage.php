<?php 

	include("admin-header.php");



$rows=mysql_query("SELECT * FROM templates");

$count=mysql_num_rows($rows);


echo $count;

 

if(isset($_GET["value"]))

{

	$del=$_GET["value"];

	echo $del;

	$query="Delete from templates where template_id='$del'";

	$result=mysql_query($query);

	if($result)

	{

		echo "deleted";

		echo '<meta http-equiv="refresh" content="0; url=transcare_manage.php" />';

	}



else

{

	echo "not del";

	

}

}	

if(isset($_GET["delete"]))

{

	$delete=$_GET["delete"];

	echo $delete;

	$query="Delete from template_content where id='$delete'";

	$result=mysql_query($query);

	if($result)

	{

		echo "deleted";

		echo '<meta http-equiv="refresh" content="0; url=transcare_manage.php" />';

	}



else

{

	echo "not del";

	

}

}	

	

	

	

	

//Adding details

	if(isset($_POST['add_details'])){

		

	$createdOn = date('Y-m-d H:i:s');

		

		

	if(isset($_FILES['logo']['name']))

	{

		$logofilesize=$_FILES['backgrounimage']['size'];

		if($logofilesize>0)

		{

	   $tmpFilePath = $_FILES['logo']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    

		   $path = "logo/"; // create folder 

		   $logoName = $_FILES['logo']['name'];

		   $logoN = $path.$logoName;



		   $logomove = move_uploaded_file($_FILES['logo']['tmp_name'], $path.$logoName) ;

	   }

		}

	}

	if(isset($_FILES['backgrounimage']['name']))

	{

		$bgfilesize=$_FILES['backgrounimage']['size'];

		if($bgfilesize>0)

		{

	   $tmpFilePath = $_FILES['backgrounimage']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    

		   $bgpath = "background/"; // create folder 

		   $bgName = $_FILES['backgrounimage']['name'];

		   $bgN = $bgpath.$bgName;



		   $bgmove = move_uploaded_file($_FILES['backgrounimage']['tmp_name'], $bgpath.$bgName) ;

	   }

		}

	}

	

		if(isset($_FILES['rotatingmain']['name']))

	{

		$count=count($_FILES['rotatingmain']['name']);

	

		$rimsize=$_FILES['rotatingmain']['size'];

		for($x =0; $x< $count;$x++){

	if($rimsize>0)

	{

	   $tmpFilePath = $_FILES['rotatingmain']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    



		   $rimpath = "rotatingmain/"; // create folder 

		   $rimName = $_FILES['rotatingmain']['name'];

		   $rimN = $rimpath.$rimName;

		   $rimmove = move_uploaded_file($_FILES['rotatingmain']['tmp_name'],$rimpath.$rimName) ;

	   }

	}

		}

	}

	

	if(isset($_FILES['rotatingidle']['name']))

	{

		

		$rilsize=$_FILES['rotatingidle']['size'];

	if($rilsize>0)

	{

	   $tmpFilePath = $_FILES['rotatingidle']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    



		   $rilpath = "rotatingidle/"; // create folder 

		   $rilName = $_FILES['rotatingidle']['name'];

		   $rilN = $rilpath.$rilName;

		   $rilmove = move_uploaded_file($_FILES['rotatingidle']['tmp_name'],$rilN) ;

	   }

	}

	}

	

	$tickerText = $_POST['tickerText'];



	$setting = mysql_query("INSERT INTO `site_setting` (logo_image, bg_image, ticker_text, created_on) VALUES('$logoN', '$bgN', '$tickerText', '$createdOn')");

	

	if(isset($_FILES['rotatingmain']['name']))

	{

		for($i=0; $i<count($_FILES['rotatingmain']['name']); $i++) 

		{

			   $tmpFilePath = $_FILES['rotatingmain']['tmp_name'][$i];

			   if ($tmpFilePath != "")

			   {    

				   $path = "rotatingmain/"; // create folder 

				   $name = $_FILES['rotatingmain']['name'][$i];

				   $paname = $path.$name;



				   if(move_uploaded_file($_FILES['rotatingmain']['tmp_name'][$i], $path.$name)) 

				   { 

					$query=mysql_query("INSERT INTO `rotate_image_main` (rotate_image_main, created_on) VALUES('$paname', '$createdOn')");

				   }

			 }

		}



	}

	

	if(isset($_FILES['rotatingidle']['name']))

	{

		for($i=0; $i<count($_FILES['rotatingidle']['name']); $i++) 

		{

			   $tmpFilePath = $_FILES['rotatingidle']['tmp_name'][$i];

			   if ($tmpFilePath != "")

			   {    

				   $path = "rotatingidle/"; // create folder 

				   $name = $_FILES['rotatingidle']['name'][$i];

				   $paname = $path.$name;



				   if(move_uploaded_file($_FILES['rotatingidle']['tmp_name'][$i], $path.$name)) 

				   { 

					$query=mysql_query("INSERT INTO `rotate_image_idle` (rotate_image_idle, created_on) VALUES('$paname', '$createdOn')");

				   }

			 }

		}



	}

	

	

	if($setting){

		$msg = "Details added successfully";

	}

		

	}

	

	//Update details

	

	if(isset($_POST['edit_details'])){

		$createdOn = date('Y-m-d H:i:s');

		$settingId = $_POST['settingId'];

		$etickerText = $_POST['etickerText'];

		

		if(isset($_FILES['elogo']['name']))

		{

			$logofilesize=$_FILES['elogo']['size'];

			if($logofilesize>0)

			{

		   $tmpFilePath = $_FILES['elogo']['tmp_name'];

		   if ($tmpFilePath != "")

		   {    

		   		$rem = $_POST['logoremove'];

				unlink($rem);

			   $path = "logo/"; // create folder 

			   $logoName = $_FILES['elogo']['name'];

			   $logoN = $path.$logoName;

	

			   $logomove = move_uploaded_file($_FILES['elogo']['tmp_name'], $path.$logoName) ;

			   $qur = mysql_query("UPDATE site_setting SET logo_image = '$logoN', created_on = '$createdOn' WHERE s_id = '$settingId'");

			   

		   }

			}

		}

		if(isset($_FILES['ebackgrounimage']['name']))

		{

			$bgfilesize=$_FILES['ebackgrounimage']['size'];

			if($bgfilesize>0)

			{

		   $tmpFilePath = $_FILES['ebackgrounimage']['tmp_name'];

		   if ($tmpFilePath != "")

		   {    

		   		

			   $bpath = "background/"; // create folder 

			   $bgName = $_FILES['ebackgrounimage']['name'];

			   $bgN = $bpath.$bgName;

	

			   $bgmove = move_uploaded_file($_FILES['ebackgrounimage']['tmp_name'], $bgN) ;

			   $qur = mysql_query("UPDATE site_setting SET bg_image = '$bgN', created_on = '$createdOn' WHERE s_id = '$settingId'");

		   }

			}

		}

		

		if($etickerText != ''){

			$updatesetting = mysql_query("UPDATE `site_setting` SET ticker_text = '$etickerText', created_on = '$createdOn' WHERE s_id = '$settingId'");

		}

		

		//update rotating image main

		

		$rmCount = $_POST['ecountrim'];

		

		for($i=1; $i <= $rmCount; $i++) 

		{

			$rid = $_POST['rmId'.$i];

			$tmpFilePath = $_FILES['erotatingmain'.$i]['tmp_name'];

		   if($_FILES["erotatingmain".$i]["size"] > 0)

		   {   

			

			   $rmpath = "rotatingmain/"; // create folder 

			   $rmname = $_FILES['erotatingmain'.$i]['name'];

			   $deletImg = $_POST['unlinkrm'.$i];

			   $rotname = $rmpath.$rmname;

			   unlink($deletImg);



			   if(move_uploaded_file($_FILES['erotatingmain'.$i]['tmp_name'], $rmpath.$rmname)) 

			   { 

			   //echo ;

				$equery=mysql_query("UPDATE rotate_image_main SET rotate_image_main = '$rotname', updated_on = '$createdOn' WHERE rim_id = '$rid'");

			   }

				

			}

		}

		

		//Add&edit rotating main

		if(isset($_FILES['aerotatingmain']['name']))

		{

			for($i=0; $i<count($_FILES['aerotatingmain']['name']); $i++) 

			{

				   $tmpFilePath = $_FILES['aerotatingmain']['tmp_name'][$i];

				   if ($tmpFilePath != "")

				   {    

					   $path = "rotatingmain/"; // create folder 

					   $name = $_FILES['aerotatingmain']['name'][$i];

					   $paname = $path.$name;

	

					   if(move_uploaded_file($_FILES['aerotatingmain']['tmp_name'][$i], $path.$name)) 

					   { 

						$query=mysql_query("INSERT INTO `rotate_image_main` (rotate_image_main, created_on) VALUES('$paname', '$createdOn')");

					   }

				 }

			}

	

		}

		

		

		//update rotating image idel

		

		$riCount = $_POST['ecountrii'];

		

		for($j=1; $j <= $riCount; $j++) 

		{

			

			$rii = $_POST['riId'.$j];

			$tmpFilePath = $_FILES['erotatingidle'.$j]['tmp_name'];

		   if($_FILES["erotatingidle".$j]["size"] > 0)

		   {   

			

			   $ripath = "rotatingidle/"; // create folder 

			   $riname = $_FILES['erotatingidle'.$j]['name'];

			   $deletImg = $_POST['unlinkri'.$j];

			   $rotiname = $ripath.$riname;

			   unlink($deletImg);



			   if(move_uploaded_file($_FILES['erotatingidle'.$j]['tmp_name'], $ripath.$riname)) 

			   { 

			   //echo ;

				$equery=mysql_query("UPDATE rotate_image_idle SET rotate_image_idle = '$rotiname', updated_on = '$createdOn' WHERE rii_id = '$rii'");

			   }

				

			}

		}

		

		//Add&edit rotating idel

		if(isset($_FILES['aerotatingidle']['name']))

		{

			for($i=0; $i<count($_FILES['aerotatingidle']['name']); $i++) 

			{

				   $tmpFilePath = $_FILES['aerotatingidle']['tmp_name'][$i];

				   if ($tmpFilePath != "")

				   {    

					   $path = "rotatingidle/"; // create folder 

					   $name = $_FILES['aerotatingidle']['name'][$i];

					   $paname = $path.$name;

	

					   if(move_uploaded_file($_FILES['aerotatingidle']['tmp_name'][$i], $path.$name)) 

					   { 

						$query=mysql_query("INSERT INTO `rotate_image_idle` (rotate_image_idle, created_on) VALUES('$paname', '$createdOn')");

					   }

				 }

			}

	

		}

		

		

	}

	

	

?>





<style>

	.fileUpload {

	position: relative;

	overflow: hidden;

	margin: 10px;

}

.fileUpload input.upload {

	position: absolute;

	top: 20px;

	right: 0;

	margin: 0;

	padding: 0;

	font-size: 20px;

	cursor: pointer;

	opacity: 0;

	filter: alpha(opacity=0);

}

.manage_details{

	text-align: center;

	margin-top: 10px;

}

.but_edit{

	  text-decoration: none;

	  font-size: 0px;

	  color: #000;

}

.but_edit:hover{

	color:#fff;

	background-color:#000;

}

</style>



<div class="container">

	<div class="header">

    	<div class="headerContent">

            <div class="indexLogo">

                    Admin Panel

            </div>

            <div class="indexLogout">

                <a href="process.php"></a>

            </div>

        </div>

    </div>

    <form action="" method="post" enctype="multipart/form-data">

    <div class="mainContent"> 

    	<div class="">

        	<h3><?php if(isset($setting)){ echo $msg; } ?></h3>

        </div>

    	<div class="mainTitle">

        	<h3>Manage Screen</h3>

        </div>

        <div class="contentSec">

        	<div class="contentSecTitle">

        		<h3>Logo Image</h3>

        	</div>

            <?php 

				$que = mysql_query("SELECT * FROM `site_setting`");

				$fetchque = mysql_fetch_array($que);

			?>

            <div class="manage_details">

            	<img src="<?php echo $fetchque['logo_image']; ?>" style="width:200px;">

            </div>

            

        </div>

        <div class="contentSec">

        	<div class="contentSecTitle">

        		<h3>Background Image</h3>

        	</div>

             <div class="manage_details">

            	<img src="<?php echo $fetchque['bg_image']; ?>" style="width:200px;">

            </div>

            

        </div>

        

        

        

        

        <div class="section2">

        	<div class="contentSecTitle">

        		<h3>Rotating Image - Main</h3>

        	</div>

             <div class="manage">

             <?php 

			 	$getrim = mysql_query("SELECT * FROM rotate_image_main");

				while($fetrim = mysql_fetch_array($getrim)){

			 ?>

            	<img src="<?php echo $fetrim['rotate_image_main']; ?>" style="margin:10px;width:150px; height:150px;">

                <?php } ?>

            </div>

             

             

        </div>

        

        

         <div class="section2">

        	<div class="contentSecTitle">

        		<h3>Rotating Image - Idle</h3>

        	</div>

             <div class="manage">

            	 <?php 

			 	$getrim = mysql_query("SELECT * FROM rotate_image_idle");

				while($fetrim = mysql_fetch_array($getrim)){

			 ?>

            	<img src="<?php echo $fetrim['rotate_image_idle']; ?>" style="margin:10px;width:150px; height:150px;">

                <?php } ?>

            </div>

            

             

        </div>

        

        

        <div class="tickerSec">

        	<div class="contentSecTitle">

        		<h3>Ticker Text</h3>

        	</div>

            <div class="tickerCon">

            	 <textarea rows="4" name="tickerText" placeholder="Wrote your ticker text" readonly><?php echo $fetchque['ticker_text'];  ?></textarea>

                  <!--<div class="update">

                        <a href="#"></a>

             	  </div>-->

            </div> 

        </div>

        <div class="update">

            <a class="but_edit" href="transcare_add.php?val=editdetails">Edit</a>

        </div>

        <div style="clear:both"></div>

        

        <div class="innerScr">

        	 <div class="innerScrP">

             		<div class="contentSecTitle">

        				<h3>Inner Screens - Primary</h3>

        			</div>

                    <div class="innerScrContent">

                        <?php if($count >0)

						{

							$i=1;

							while($row=mysql_fetch_array($rows))

{

	?> 

      <div class="innerScreen">

	 <h5> <?php echo $row["template_name"] ?></h5>

	                       <div class="inrEdit">

                        		<a href="transcare_edit_templates.php?eid= <?php echo $row["template_id"] ?>" ></a>

             	  			 </div>

                           <!--  <div class="inrDelete">

                        		<a href="transcare_manage.php?value= <?php echo $row["template_id"] ?>"></a>

             	  			 </div> -->      

							

                             </div>

                             

                        <?php

						  $i++;   

}

?>                   <?php

						}

						 else

						{

						}

						if($count == 6){

						}
						else{

					    ?>

                        <div class="addScreen">

                        		<a href="transcare_add_templates.php"></a>

            	  		</div>

                        <?php } ?>

                         <p class="innerText">* Maximum 6 Screens Only</p>

                   </div>

                   

        	 </div>

              <div class="innerScrS"> 

              		<div class="contentSecTitle">

        				<h3>Inner Screens - Secondary</h3>

        			</div>

                    <div class="innerScrContent"  style="overflow:auto;height:350px;">

                    <?php 

					$gettemp1 = mysql_query("SELECT * FROM template_content");

					if(mysql_num_rows($gettemp1) > 0){

					while($fetchTemp1 = mysql_fetch_array($gettemp1)){

					 ?>

                        <div class="innerScreen">

                            <h5><?php echo $fetchTemp1['linkname']; ?></h5>

                            <div class="inrEdit">

                        		<a href="subscreen_edit.php?scid=<?php echo $fetchTemp1['id']; ?>&tn=<?php echo $fetchTemp1['table_name']; ?>&temp_id=<?php echo $fetchTemp1['template_id']; ?>"></a>

             	  			 </div>

                           <div class="inrDelete">

                        		<a href="transcare_manage.php?delete=<?php echo $fetchTemp1['id']; ?>?>"></a>

             	  			 </div>                             

                        </div> 

                        <?php } 

					}

						?>

                        <div class="addScreen">

                        	<a href="SubScreen1.php?screenid=0&&screen=screen1"></a>

            	  		</div> 

                   </div>

                   

        	 </div> 

        </div>  

    </div>

    </form>

</div>

<script>



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

	

		$('#appendMain').append('<div class="subSec1" id="appendClass'+next+'"><div class="ses1"><p id="countmain'+next+'">'+next+'</p></div><div class="contentSec2Left"><input type="text" id="rotatingmain'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="rotatingmainup'+next+'" onchange="rotatingmainUrl(this,'+next+')" name="rotatingmain[]" type="file" class="upload" value="Browse"></div></div><div class="contentSecRight"> <p class="imageView3"><img id="changerim'+next+'" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p><p class="imageView4">filename.jpg</p><div class="deLete"><a href="javascript:void(0);" onClick="removeRotatedMain('+next+')"></a></div> </div></div>');             

        $('#countrim').val(next);

		

		

	}

	function removeRotatedMain(id){

		var cid = $('#countrim').val();

			if(cid > 1){

		$('#appendClass'+id).remove();

		var langCount=$('#countrim').val();

		$('#countrim').val(parseInt(langCount)-1);

		}

		

	}

	

	function rotatingmainUrl(input,id) {

	   $('#rotatingmain'+id).val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#changerim'+id).attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }

   

    $("#rotatingmainup1").change(function() {

		$('')

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

	

		$('#appendidel').append('<div class="subSec1" id="appendClassidle'+next+'"><div class="ses1"><p id="countidle'+next+'">'+next+'</p></div><input type="hidden" id="getEachCount'+next+'" value="1"><div class="contentSec2Left"><input type="text" id="rotatingidle'+next+'" value="" class="upLoadText"> <div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="rotatingidleup'+next+'" onchange="rotatingidleUrl(this,'+next+')" name="rotatingidle[]" type="file" class="upload" value="Browse"></div></div><div class="contentSecRight"> <p class="imageView3"><img id="changerii'+next+'" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p><p class="imageView4">filename.jpg</p><div class="deLete"><a href="javascript:void(0);" onClick="removeRotatedIdle('+next+')"></a></div> </div></div>');             

        $('#countrii').val(next);

		

		

	}

	function removeRotatedIdle(id){

		var cid = $('#countrii').val();

		if(cid > 1){

		$('#appendClassidle'+id).remove();

		var langCount=$('#countrii').val();

		$('#countrii').val(parseInt(langCount)-1);

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

	

	

	

</script>

<?php 

	include("admin-footer.php");

?>