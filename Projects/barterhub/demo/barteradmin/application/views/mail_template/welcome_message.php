<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Some circle</title>
</head>
<body>
<table width ="550px" border="0" cellspacing="0" cellpadding="0" style=" font-family:'Open Sans'; font-size:14px; margin:0 auto; height:auto; background-color:#fffff6;">
	<tr valign="top" style="background-color:#F0F0F0;">
    	<td ><img style="width:170px; padding:20px 0 20px 15px;" src="http://easasoft.com/somecircle/image/sclogo.png"/></td>
    </tr>
    <table width ="550px" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #cadce6; ;margin:0 auto; height:auto; background-color:#fffff6; font-family:'Open Sans'; padding:0 15px 0 15px;">
   		<tr>
        	<td style=" font-size:20px; font-weight:600; color:#424242; padding:23px 0 0 0; letter-spacing:.5px;">Welcome to Somecircle,</td>
        </tr>
        <tr>
        	<td style=" font-size:13px; font-weight:400; color:#555353; padding:15px 0 0 0;">Hi <?=$email?><br /><br />
            Thank you for signing up with us! <a style="color:#2a98d7">http://somecircle.com</a></td>
        </tr>
        
        <tr>
        	<td style=" font-size:13px; font-weight:400; color:#555353; padding:15px 0 0 0;"><b>Activation link : </b><br /><br />
             <a style="color:#2a98d7" href="<?=$activate_link?>"><?=$activate_link?></a></td>
        </tr>
        
         <tr>
        	<td style=" font-size:13px; font-weight:400; color:#555353; padding:15px 0 0 0;"><b>Mobile verification code :</b>&nbsp; <?=$verificatiocode?></td>
        </tr>
        
                
         <tr>
             <td>
                 <h1 style="font-size:15px; color:#333; font-weight:600; margin:26px 0 0 0px;">Regards,</h1>
                 <h2 style="font-size:17px; color:#444; font-weight:500; margin:0 0 0 0px; padding:3px 0 24px 0">The Somecircle Team </h2>
             </td>
          </tr>
   </table>
   
   <table width ="550px" border="0" cellspacing="0" cellpadding="0" style="  font-family:'Open Sans'; font-size:14px; margin:0 auto; height:auto; background-color:#f7fbfe;border-left:1px solid #cadce6;border-right:1px solid #cadce6;border-bottom:1px solid #cadce6;">
                    <tr valign="top" style="background-color:#f7fbfe; ">
                        <td><h5 style="font-size:11px; color:#718591; font-weight:400; text-align:center; margin: 10px 0 0 0">© <?=date('Y')?> Some circle. All rights reserved.</h5></td>
                    </tr>
                    <tr valign="top" style="background-color:#f7fbfe; ">
                        <td><h6 style="font-size:11px; color:#718591; font-weight:400; text-align:center; width:513px; margin:0px auto;padding:5px 0 15px 0;">Some circle Group. Registered address: 2nd Floor, Union House, 182-194 Union Street, London SE1 0LH. Registered in England and Wales with Company No. 6074771</h6></td>
                    </tr>
    </table>
</table>
</body>
</html>
