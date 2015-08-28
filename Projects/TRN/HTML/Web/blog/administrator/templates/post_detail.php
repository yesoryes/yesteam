<form id="pressroom_form" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" valign="middle"><?php
            //To include back link
            back_link('70%');
        ?>
      </td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="70%" border="0" cellpadding="5" cellspacing="0" style="border:1px solid #CCC;">
          <tr valign="baseline">
            <th colspan="3" bgcolor="#999999"><strong>Select a file from your computer</strong></th>
          </tr>
          <tr valign="baseline">
            <td height="25" colspan="3" align="center" valign="middle" class="formText"><?php echo STAR_INDICATES; ?></td>
          </tr>
          <tr bgcolor="#F8F8F8">
            <td height="25" align="right">Title</td>
            <td height="25" align="left">*</td>
            <td height="25" align="left"><span id="sprytextfield1"><input type="text" name="title" id="title"  value ="<?php echo $title ?>"/>           <span class="textfieldRequiredMsg">Photo title cannot be empty</span></span></td>
          </tr>
          <tr>
            <td height="25" align="right">Description</td>
            <td height="25" align="left">*</td>
            <td height="25" align="left"><span id="sprytextarea1"><textarea name="description" id="description" cols="35" rows="5"><?php echo $description ?></textarea><span class="textareaRequiredMsg">Photo description cannot be empty</span></span></td>
          </tr>
          <tr bgcolor="#F8F8F8">
            <td height="25" align="right">Browse photo</td>
            <td height="25" align="left">*</td>
            <td height="25" align="left"><input type="file" name="file_path" id="file_path" />
            <?php if(file_exist($file_path)) { ?>
                      <a href="<?php echo $file_path; ?>" target="_blank">
                     		 Image </a> 
                              <?php } ?>
            </td>
          </tr>
          <tr>
            <td width="423" height="25" align="right">&nbsp;</td>
            <td width="24" height="25" align="left">&nbsp;</td>
            <td width="564" height="25" align="left"><input name="Submit" type="submit" class="button" id="button" value="Submit" />
              &nbsp;&nbsp;
              <input type="reset" name="Reset" id="Reset" class="button" value="Reset" />
            <input name="submit_value" type="hidden" id="submit_value" value="1" /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><?php
            //To include back link
            back_link('70%');
        ?>
      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");

//-->
</script>