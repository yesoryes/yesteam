<form name="login_form" action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td align="left">
  <?php
    //To display notice message
    notice_message();
   ?>
  </td>
</tr>
<tr>
  <td align="center"><table width="30%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
    <tr bgcolor="#F8F8F8">
      <th colspan="2" align="center" bgcolor="#999999" class="bigger"><div align="center">Login Here</div></th>
    </tr>
    <tr>
      <td height="35" align="left">Username: </td>
      <td height="35" align="left"><input type="text" name="username" id="username" /></td>
    </tr>
    <tr bgcolor="#F8F8F8">
      <td height="35" align="left">Password:</td>
      <td height="35" align="left"><input type="password" name="password" id="password" /></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td height="40" align="left" valign="top"><input name="Submit" type="submit" class="button" id="Submit" value="Login" />
        <input name="submit_value" type="hidden" id="submit_value" value="1"></td>
    </tr>
  </table></td>
</tr>
<tr>
  <td align="center">&nbsp;</td>
</tr>
</table>
</form>