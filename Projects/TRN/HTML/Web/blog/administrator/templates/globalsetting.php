<form id="globalsetting_form" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" valign="middle"></td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="70%" border="0" cellpadding="5" cellspacing="0" style="border:1px solid #CCC;">
          <tr valign="baseline">
            <th colspan="3" bgcolor="#999999"><strong>Global Settings </strong></th>
          </tr>
          <tr valign="baseline">
            <td height="25" colspan="3" align="center" valign="middle" class="formText"><?php echo STAR_INDICATES; ?></td>
          </tr>
          <tr valign="baseline">
            <td height="25" align="right" valign="top" class="formText"><?php echo STAR; ?>Email </td>
            <td height="25" align="left" valign="top">&nbsp;</td>
            <td height="25" align="left" valign="top"><span id="sprytextfield7">
            <input name="admin_email" type="text" id="admin_email" value="<?php echo $admin_email; ?>" size="45" maxlength="255" autocomplete="off"/>
&nbsp; <span class="textfieldRequiredMsg"> Please enter your email id.</span><span class="textfieldInvalidFormatMsg">Invalid email address.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td height="25" align="right" valign="top" class="formText"><?php echo STAR; ?>Phone number </td>
            <td height="25" align="left" valign="top">&nbsp;</td>
            <td height="25" align="left" valign="top"><span id="sprytextfield8">
              <input name="phonenumber" type="text" id="phonenumber" value="<?php echo $phonenumber; ?>" size="45" maxlength="255" autocomplete="off"/>
            &nbsp; <span class="textfieldRequiredMsg"> Please enter your Phone number.</span></span></td>
          </tr>
          <tr valign="baseline" bgcolor="#F8F8F8">
            <td height="25" align="right" valign="top" class="formText"><?php echo STAR; ?>Title</td>
            <td width="10" height="25" align="left" valign="top">&nbsp;</td>
            <td width="578" height="25" align="left" valign="top"><span id="sprytextfield1">
              <input name="site_title" type="text" id="name" value="<?php echo $site_title; ?>" size="45" maxlength="255" autocomplete="off" />
              &nbsp; <span class="textfieldRequiredMsg"> Please enter Title.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td  height="25" align="right" valign="top" class="formText"><?php echo STAR; ?>Metatag Keyword</td>
            <td width="10" height="25" align="left" valign="top">&nbsp;</td>
            <td width="578" height="25" align="left" valign="top"><span id="sprytextarea1">
              <textarea name="meta_keyword"  cols="45" rows="5" id="meta_keyword"><?php echo $meta_keyword; ?></textarea>
              &nbsp;<span class="textareaRequiredMsg">Please enter metatag keyword.</span></span></td>
          </tr>
          <tr valign="baseline" bgcolor="#F8F8F8">
            <td  height="25" align="right" valign="top" class="formText"><?php echo STAR; ?>Metatag Description</td>
            <td width="10" height="25" align="left" valign="top">&nbsp;</td>
            <td width="578" height="25" align="left" valign="top"><span id="sprytextarea2">
              <textarea name="meta_description" id="meta_description"  cols="45" rows="5"><?php echo $meta_description; ?></textarea>
              <span class="textareaRequiredMsg"> &nbsp;Please enter metatag description.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td height="25" align="right" valign="top" class="formText"><?php echo STAR; ?>Admin Page Length </td>
            <td height="25" align="center" valign="top">&nbsp;</td>
            <td height="25" align="left" valign="top"><span id="sprytextfield2">
              <input name="admin_page_length" type="text" id="admin_page_length" value="<?php echo $admin_page_length; ?>" size="3" maxlength="3" />
              &nbsp; <span class="textfieldRequiredMsg"> Please enter admin page length! </span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
          <tr valign="baseline" bgcolor="#F8F8F8">
            <td height="25" align="right" valign="top" class="formText"><?php echo STAR; ?>User Page Length </td>
            <td height="25" align="center" valign="top">&nbsp;</td>
            <td height="25" align="left" valign="top"><span id="sprytextfield3">
              <input name="user_page_length" type="text" id="user_page_length" value="<?php echo $user_page_length; ?>" size="3" maxlength="3" />
              &nbsp; <span class="textfieldRequiredMsg"> Please enter user page length! </span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
          <tr>
            <td height="25" align="right"><?php echo STAR; ?> Please specify the no. of days that needs to be considered as archived CSV as
obsolete so that automatic scheduled job can dele those files</td>
            <td height="25" align="left">&nbsp;</td>
            <td height="25" align="left">
            <span id="sprytextfield4">
            <input name="delete_csv_days" type="text" id="delete_csv_days" value="<?php echo $delete_csv_days; ?>" size="3" maxlength="3" />
              &nbsp; <span class="textfieldRequiredMsg"> Please enter in days! </span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
          <tr bgcolor="#F8F8F8">
            <td height="25" align="right" class="formText"><?php echo STAR; ?> Export CSV Delimiter </td>
            <td height="25" align="left" >&nbsp;</td>
            <td height="25" align="left"> 
            <span id="sprytextfield5">
            <input name="delimiter" type="text" id="delimiter" value="<?php echo $delimiter; ?>" size="3" maxlength="3" />
              &nbsp; <span class="textfieldRequiredMsg"> Please enter export CSV delimiter! </span></td>
          </tr>
          <tr>
            <td width="340" height="25" align="right"></td>
            <td width="10" height="25" align="left">&nbsp;</td>
            <td width="578" height="25" align="left"><input name="Submit" type="submit" class="button" id="button" value="Submit" />
              &nbsp;&nbsp;
              <input type="reset" name="Reset" id="Reset" class="button" value="Reset" />
              <input name="submit_value" type="hidden" id="submit_value" value="1" /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center" valign="middle"></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur", "change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "", {validateOn:["blur", "change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "email", {validateOn:["blur", "change"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {validateOn:["blur", "change"]});
//-->
</script>
