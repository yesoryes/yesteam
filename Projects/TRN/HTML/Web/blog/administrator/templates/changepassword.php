<form name="changepassword_form" action="" method="post"  enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left"><?php
    //To display notice message
    notice_message();
   ?>
      </td>
    </tr>
    <tr>
      <td align="center"><table width="59%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
          <tr bgcolor="#F8F8F8">
            <th colspan="3" align="center" bgcolor="#999999" class="bigger"><div align="center">Change Password </div></th>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td width="44%" height="35" align="right"><?php echo STAR; ?>Current Password </td>
            <td width="3%" align="left">&nbsp;</td>
            <td width="53%" height="35" align="left"><span id="sprytextfield1">
              <input name="currentpassword" type="password" id="username" />
              &nbsp; <span class="textfieldRequiredMsg">Please enter your current password.</span></span> </td>
          </tr>
          <tr bgcolor="#F8F8F8">
            <td height="35" align="right" ><?php echo STAR; ?>Password</td>
            <td width="3%" align="left">&nbsp;</td>
            <td width="53%" height="35" align="left"><span id="sprytextfield2"><span id="sprytextfield2">
              <input name="password" type="password" id="password" />
              &nbsp; </span><span class="textfieldRequiredMsg">Please enter your new password.</span></span> </td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td height="35" align="right"><?php echo STAR; ?>Confirm Password</td>
            <td width="3%" align="left">&nbsp;</td>
            <td height="35" width="53%" align="left"><span id="sprytextfield3">
              <input name="confirmpassword" type="password" id="confirmpassword" />
              &nbsp; <span class="textfieldRequiredMsg">Please reenter your new password.</span></span> </td>
          </tr>
          <tr bgcolor="#F8F8F8">
            <td>&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td height="40" align="left" valign="top"><input name="Submit" type="submit" class="button" id="Submit" value="Submit" />
              <input type="reset" name="Submit2" class="button"  value="Reset" />
              <input name="submit_value" type="hidden" id="submit_value" value="1"></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
//-->
</script>