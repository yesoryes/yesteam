  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" valign="middle">
		<?php
            //To include back link
            back_link('70%');
        ?>
      </td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="70%" border="0" cellpadding="5" cellspacing="0" style="border:1px solid #CCC;">
        <tr valign="baseline">
          <th colspan="3" bgcolor="#999999"><strong>Disk Preview</strong></th>
        </tr>
        <tr valign="baseline">
          <td width="449" height="25" align="right" valign="top" class="formText"><span class="red">Disk Name</span></td>
          <td width="11" height="25" align="left" valign="top">&nbsp;</td>
          <td width="480" height="25" align="left" valign="top"><?php echo $type; ?></td>
        </tr>
        <tr valign="baseline" bgcolor="#F8F8F8">
          <td height="25" align="right" valign="top" class="formText">Image Name</td>
          <td height="25" align="left" valign="top">&nbsp;</td>
          <td height="25" align="left" valign="top"><?php if(file_exist($file_image)) { ?>
		  <a href="<?php echo $file_image_large; ?>" target="_blank">
		  <img src="<?php echo $file_image; ?>" />		  </a>
		  <?php } else { ?>
		  No image
		  <?php } ?></td>
        </tr>
        <tr>
          <td height="25" align="right">Peice</td>
          <td height="25" align="left">&nbsp;</td>
          <td height="25" align="left"><?php echo $price; ?> p </td>
        </tr>
        <tr bgcolor="#F8F8F8">
          <td height="25" align="right">Art Template </td>
          <td height="25" align="left">&nbsp;</td>
          <td height="25" align="left">
		  	<?php if(file_exist($arttemplate)) { ?>
			  <a href="<?php echo $arttemplate; ?>" target="_blank">
			  	View
			  </a>
		    <?php } else { ?>
			  	No File
		    <?php } ?>
		  </td>
        </tr>
        <tr>
          <td width="449" height="25" align="right">&nbsp;</td>
          <td width="11" height="25" align="left">&nbsp;</td>
          <td width="480" height="25" align="left"><input type="button" name="Close" id="Reset" class="button" value="Close" onclick="goback();" /></td>
        </tr>

      </table></td>
    </tr>
    <tr>
      <td align="center" valign="middle">
		<?php
            //To include back link
            back_link('70%');
        ?>
      </td>
    </tr>
  </table>
