<?php
	//Page Redirect Functions
	function redirect($Url)
	{
		//To replace querystring & value
		$Url = str_replace("?&","?",$Url);
		
		// If no headers are sent, send one
		if (!headers_sent())
		{
			header("Location: ".$Url."");
			exit;
		}
		else
		{
			  echo "<script language='javascript' type='text/javascript'>window.location.href='".$Url."'</script>";
			  echo "<META http-equiv='refresh' content='0;URL=".$Url."'>";
			  exit;
		}
	}
	
	//Function to remove slashes
	function striptext($Str)
	{	
		//Condition for not empty
		if($Str != "") 
		{
			//Condition to check whether the string is not numeric
			if(!is_numeric($Str))
			   return  stripslashes(trim(html_entity_decode($Str)));
			else
				return trim($Str);
		}
		else
			return $Str;
	}
	
	//Function to add slashes
	function wraptext($Str)
	{
		//Condition for not empty
		if(!empty($Str))
		{
			//Condition to check whether the string is not numeric
			if(!is_numeric($Str))
			{
				//To check whether the function exists or not
				if(function_exists('mysql_real_escape_string'))
					return mysql_real_escape_string(trim($Str));
				else
					return addslashes(htmlspecialchars(stripslashes(trim($Str)), ENT_QUOTES));
			}
			else
				return trim($Str);
		}
		else
			return $Str;
	}
	
	//Function for editor to add slashes
	function wraptext_editor($Str)
	{
		//Condition for not empty
		if(!empty($Str))
		{
			//Condition to check whether the string is not numeric
			if(!is_numeric($Str))
			{
				return addslashes(stripslashes(trim($Str)));
			}
			else
				return trim($Str);
		}
		else
			return $Str;
	}
	
	//Function for paging
	function getPagerData($numHits, $limit, $page) 
	{ 
	   $numHits  = (int) $numHits; 
	   $limit    = max((int) $limit, 1); 
	   $page     = (int) $page;
	   $numPages = ceil($numHits / $limit); 
	
	   $page = max($page, 1);
	   $page = min($page, $numPages); 
		
	   $offset = ($page - 1) * $limit; 
		
	   $ret = new stdClass; 
	
	   $ret->offset   = $offset; 
	   $ret->limit    = $limit; 
	   $ret->numPages = $numPages; 
	   $ret->page     = $page; 
	
	   return $ret; 
	}
	
	//Function to find number of rows
	function totalrows($TableName, $FieldNames, $WhereCon = "", $OtherCon = "")
	{
		if(!empty($WhereCon))
			$WhereCon = "WHERE ".$WhereCon;
			
		//Query to get total number of tows		
		//echo "SELECT $FieldNames FROM ".$TableName." $WhereCon $OtherCon";
		$TtlNumRow_Qry = mysql_query("SELECT $FieldNames FROM ".$TableName." $WhereCon $OtherCon") or die("Total Num Rows Query Error For Table: $TableName ".mysql_error());
		return (mysql_num_rows($TtlNumRow_Qry));
	}
	
	//Function to Insert in to table
	function insert_table($TableName, $SetOfFields, $SetOfValues)
	{
		//Insert Query
		//echo "INSERT INTO ".$TableName." (".$SetOfFields.") VALUES (".$SetOfValues.")";
		//exit;
		$Insrt_Qry = mysql_query("INSERT INTO ".$TableName." (".$SetOfFields.") VALUES (".$SetOfValues.")") or die("Insert Query Error For Table: $TableName ".mysql_error());
		return mysql_insert_id();
	}
	
	//Function to Update the table
	function update_table($TableName,$FieldsValues,$WhereCon = "")
	{

		if(!empty($WhereCon))
			$WhereCon = "WHERE ".$WhereCon;

		//Update Query
		//echo "UPDATE $TableName SET  $FieldsValues $WhereCon";
		$updt_Qry = mysql_query("UPDATE ".$TableName." SET $FieldsValues $WhereCon") or die("Update Query Error For Table: $TableName ".mysql_error());
	}
	
	//Function to select from table
	function select_single_record($TableName, $FieldNames, $WhereCon = "", $OtherCon = "")
	{
		if(!empty($WhereCon))
			$WhereCon = "WHERE ".$WhereCon;
			
		//Select Query
		//echo "SELECT $FieldNames FROM ".$TableName." $WhereCon $OtherCon";
		$Select_Qry = mysql_query("SELECT $FieldNames FROM ".$TableName." $WhereCon $OtherCon") or die("Single Select Query Error For Table: $TableName ".mysql_error());
		$Return_Value[0] = mysql_num_rows($Select_Qry);
		$Return_Value[1] = mysql_fetch_array($Select_Qry);
		return $Return_Value;
	}
	
	//Function to select from table
	function select_multi_records($TableName, $FieldNames, $WhereCon = "", $OtherCon = "")
	{
		if(!empty($WhereCon))
			$WhereCon = "WHERE ".$WhereCon;
		
		//Select Query
		//echo "SELECT $FieldNames FROM ".$TableName." $WhereCon $OtherCon";		
		$Select_Qry = mysql_query("SELECT $FieldNames FROM ".$TableName." $WhereCon $OtherCon") or die("Multi Select Query Error For Table: $TableName ".mysql_error());
		return $Select_Qry;
	}
	
	//Function to delete the records
	function delete_records($TableName, $WhereCon = "", $OtherCon = "")
	{
		if(!empty($WhereCon))
			$WhereCon = "WHERE ".$WhereCon;
			
		//Delete Query
		$Delete_Qry = mysql_query("DELETE FROM ".$TableName." $WhereCon $OtherCon") or die("Delete Query Error For Table: $TableName ".mysql_error());
	}
	
	//Function for conversion of date display type
	function convert_date($date,$format="")
	{
		if(strlen($format) <= 0)
		{
			$format = "m/d/Y";
		}
	
		if($date == "0000-00-00 00:00:00" || $date == "0000-00-00" || $date == "")
		{
			$temp_dt = "";	
		}
		else
		{
			$temp_dt = date($format, strtotime($date));
		}
		return $temp_dt;		
	}//end of convert date format function
	
	
	//Function for conversion of date for inserting
	function convert_date_insert($date,$format="")
	{
		if(strlen($format) <= 0)
		{
			$format = "Y-m-d";
		}
	
		if($date == "")
		{
			$temp_dt = "";	
		}
		else
		{
			$temp_dt = date($format, strtotime($date));
		}
		return $temp_dt;
		
	}//end of convert date format function
	
	//File Existing Check function
	function file_exist($File)
	{
		if(file_exists($File) && is_file($File))
			return true;
		else
			return false;
	}
	
	//Function get current file name
	function current_file_name()
	{
		return basename($_SERVER['PHP_SELF']);
	}
	
	//function to delete files
	function file_delete($File)
	{
		if(file_exist($File))
		{
			unlink($File);
			return true;
		}
		else
			return false;
	}
	
	//Function to upload file
	function file_upload($uploaddir, $fld_name, $file_info="", $file_types="", $size=512000)
	{
		$flname=$_FILES[$fld_name]['name'];
		$fname=explode(".",$flname);
		$count=count($fname);
		$fext=$fname[$count-1];
		
		$ret_val = "";
		
		if(!is_array($file_types))
			$file_types=array("gif","jpg","jpeg","png","txt","pdf","doc","xls");
	
		if(!in_array(strtolower($fext),$file_types))
		{
			$ret_val = "extension_failed";
			return $ret_val;
		}
		else if($_FILES[$fld_name]['size'] > $size)
		{
			$ret_val = "size_failed";
			return $ret_val;
		}
		else if(file_exist($uploaddir.$flname))
		{
			$ret_val = "file_exist";
			return $ret_val;
		}
		
		///This line assigns a random number to a variable. You could also use a timestamp here if you prefer.  
		$ran = rand () ; //This takes the random number (or timestamp) you generated and adds a . on the end, so it is ready of the file extension to be appended. 
		
		if(strlen($file_info) > 0)
			$flname = $file_info . "_" . $flname;
		
		if(strlen($ret_val) <= 0)
		{
			$uploadfile1 = $uploaddir.$ran.'_'.$flname;
			$ret_val = $ran.'_'.$flname;
			if(move_uploaded_file($_FILES[$fld_name]['tmp_name'], $uploadfile1))
			{
				@chmod($uploadfile1,0777);
			}
			else
			{
				return false;
			}
		}
		return $ret_val;
	}
	
	//Function to resize image
	function image_resize($thimg,$newthumb,$wth=0,$ht=0)
	{
		//Condition to check given width * height ratio
		if($wth>$ht)
			$dimen = $wth;
		else
			$dimen = $ht;
					
		list($thwidth, $thheight, $thtype, $thattr) = getimagesize($thimg);
		$ext = @pathinfo($thimg);
		
		//Condition to check actual image width * height ratio
		if($thwidth>$thheight)
			$newper = $dimen/$thwidth;
		else
			$newper = $dimen/$thheight;
		 
		//Set Width & Height           			
		$width=round($thwidth*$newper);
		$height=round($thheight*$newper);
		
		//Condition for jpg file           	
		if(strcasecmp($ext["extension"],"jpg")==0)
		{
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromjpeg($thimg);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $thwidth, $thheight);
			$ret=imagejpeg($image_p,$newthumb);
		}
		//Condition for gif file
		if(strcasecmp($ext["extension"],"gif")==0)
		{
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromgif($thimg);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $thwidth, $thheight);
			$ret=imagegif($image_p,$newthumb);
		}
		//Condition for png file
		if(strcasecmp($ext["extension"],"png")==0)
		{
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefrompng($thimg);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $thwidth, $thheight);
			$ret=imagepng($image_p,$newthumb);
		}
		chmod($newthumb,0777);
		return $ret;
	}
	
	//Error Message Function
	function frame_notices($notice_message, $notice_class="success")
	{
		//To set notice message in session
		$_SESSION['notice_message'] .= '<div class="'.trim($notice_class).'">'.trim($notice_message).'</div>';
	}
	
	//Function to display notice message
	function notice_message()
	{
		if(isset($_SESSION['notice_message']) && strlen($_SESSION['notice_message']) > 0)
		{
			//To display notice message
			echo $_SESSION['notice_message'];
			//To unset the notice message values
			unset($_SESSION['notice_message']);
		}
	}	
		
	function image_delete($File)
	{
		if(file_exist($File))
		{
			unlink($File);
			frame_notices("Image has been deleted sucessfully!!");
			return true;
		}
		else
			return false;
	
	}
	function file_extension_message($fie_extension,$filename = '')
	{
		return ($filename.' Please Upload a Valid File with Extension of '.implode(',',$fie_extension));
	}
	
	function file_size_message($filename = '')
	{
		return($filename.' File Size Exceeds the Limit ' . (MAX_FILE_SIZE/1048576) . ' MB !!');
	}
	
	function file_exist_message($filename = '')
	{
		return($filename.' File Name Already Exists');
	}
	
	function urlvalidation($url)
	{
		$redurl = "/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i";
		if(preg_match($redurl , $url))
			return ture;
		else
			return false;
	}
	//translate text in multilanguage
	function t($text)
	{
		return $text;
	}
	
	//Compare two strings return the percentage of matching
	function closest_word($input, $words, $percent = null) 
	{
		$shortest = -1;
		foreach ($words as $word) {
		  $lev = levenshtein($input, $word);
	
		  if ($lev == 0) {
			$closest = $word;
			$shortest = 0;
			break;
		  }
	
		  if ($lev <= $shortest || $shortest < 0) {
			$closest  = $word;
			$shortest = $lev;
		  }
		}
	
		$percent = 1 - levenshtein($input, $closest) / max(strlen($input), strlen($closest));
		
		return round($percent * 100 , 2);
	 }
	 
	// Fixes the encoding to uf8
	function fixEncoding($in_str)
	{
	  $cur_encoding = mb_detect_encoding($in_str) ;
	  if($cur_encoding == "UTF-8" && mb_check_encoding($in_str,"UTF-8"))
		return $in_str;
	  else
		return utf8_encode($in_str);
	} // fixEncoding
?>