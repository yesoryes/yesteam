<form name="search_form" action="#list" method="get">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" valign="top"><table width="30%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <th colspan="2" align="center" bgcolor="#CCCCCC" class="bigger">Search Post</th>
          </tr>
          <tr>
            <td width="44%" height="35" align="right">Title </td>
            <td width="56%" height="35" align="left"><input type="text" name="nam" id="nam" value="<?php echo $nam; ?>" /></td>
          </tr>
          <tr bgcolor="#F8F8F8">
            <td height="40" colspan="2" align="center"><input name="Search" type="submit" class="button" id="Search" value="Search" />
              &nbsp;
              <input type="button" name="Clear" id="Clear" value="Clear" class="button" onclick="clear_values(this.form,'2');" /></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
<br />
<?php
	//To display notice message
	notice_message();
	//To intialise querystring values
	$querystring = ($empid!=""?"&empid=$empid":"".$revenue != ''?"&revenue=$revenue":''.$code != ''?"&code=$code":''.$city != ''?"&city=$city":''.$status != ''?"&status=$status":'');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="list">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="right" valign="middle"><a href="<?php echo $redirect_page."?task=detail".$common_querystrings; ?>" title="<?php echo ADD_ICON_ALT; ?>"><img align="absmiddle" alt="<?php echo ADD_ICON_ALT; ?>" title="<?php echo ADD_ICON_ALT; ?>" src="<?php echo ADD_ICON; ?>" border="0" />Add new post</a> </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
          <th width="5%" align="left" valign="middle">S.No</th>
          <th width="25%" align="left" valign="middle">Title</th>
          <th width="50%" align="left" valign="middle">Description</th>
          <th width="10%" align="center" valign="middle">Created Date</th>
          <th width="10%" align="center" valign="middle">Action</th>
        </tr>
        <?php if($total<=0) { ?>
        <tr  bgcolor="#FFFFFF">
          <td colspan="5" align="center" valign="middle" class="redfont">No Records Available !!</td>
        </tr>
        <?php
		}
		else
		{
			while($list_details = mysql_fetch_assoc($get_list_details))
			{
			?>
				<tr <?php alternate_color($s); ?>>
				  <td align="left" valign="middle"><?php echo $s;  ?></td>
                  <td align="left" valign="middle"><?php echo fixEncoding(striptext($list_details['title'])); ?></td>
				  <td align="left" valign="middle"><?php echo fixEncoding(substr(striptext($list_details['description']),0,100).'...'); ?></td>
                  <td align="center" valign="middle"><?php echo fixEncoding(striptext(convert_date($list_details['date_created'],'d-m-Y'))); ?></td>
                  <td align="center" valign="middle"><?php if(striptext($list_details['is_active'])) { ?>
                    <a href="<?php echo $redirect_page."?flag=inactive&status_id=".striptext($list_details['id']).$common_querystrings; ?>"><img align="absmiddle" alt="<?php echo ACTIVE_ICON_ALT; ?>" title="<?php echo ACTIVE_ICON_ALT; ?>" src="<?php echo ACTIVE_ICON; ?>" border="0" /></a>
                    <?php } else { ?>
                    <a href="<?php echo $redirect_page."?flag=active&status_id=".striptext($list_details['id']).$common_querystrings; ?>"><img align="absmiddle" alt="<?php echo INACTIVE_ICON_ALT; ?>" title="<?php echo INACTIVE_ICON_ALT; ?>" src="<?php echo INACTIVE_ICON; ?>" border="0" /></a>
                    <?php } ?> &nbsp;&nbsp;
                    <a href="<?php echo $redirect_page."?task=detail&id=".striptext($list_details['id']).$common_querystrings; ?>"><img src="<?php echo EDIT_ICON; ?>" align="absmiddle" border="0" alt="<?php echo EDIT_ICON_ALT; ?>" title="<?php echo EDIT_ICON_ALT; ?>" /></a>
                   &nbsp;&nbsp;

                   <img align="absmiddle" alt="<?php echo DELETE_ICON_ALT; ?>" title="<?php echo DELETE_ICON_ALT; ?>" src="<?php echo DELETE_ICON; ?>" border="0" class="cursor_hand" onclick="get_confirm('<?php echo $redirect_page."?delete_id=".striptext($list_details['id']).$common_querystrings; ?>','Do you want to delete this post (OK = Yes   Cancel = No)')">
                  </td>
                  </tr>
                    <?php $s++;
		} 
	} ?>
    </table></td>
  </tr>
  <tr>
    <td><?php 
   	if($total>0)
	{
		//To intialise querystring values
		$querystring = ($nam!=""?"&nam=$nam":"");
		//To set paging details
		$paging_detail = 'Posts';
		//Include Database Pagination file
		require_once(dirname(__FILE__).'/../../includes/pagination.php');
	} 
	?>
    </td>
  </tr>
</table>