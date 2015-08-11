<?php
    $htmlContent = $_POST["txtMessage"];

    sendEmail($htmlContent,"mahi@reveilletechnologies.com","Reveille Technologies - Support",$_POST["txtName"],$_POST["txtMail"]);
    function sendEmail($message,$toemail,$subject,$name,$fromemail)
	{
		$headers1 = "From: Reveille < reveille@reveilletechnologies.com >\r\n";
		$headers1 .= "Return-Path: ".$name." < ".$fromemail." >\r\n";
		//$headers .= "CC: susan@example.com\r\n";
		$headers1 .= "MIME-Version: 1.0\r\n";
		$headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$result = mail($toemail, $subject, $message,$headers1);
		return $result;	
	
	}

    header('Location: Contact.html?r=1');
    exit;
?>
