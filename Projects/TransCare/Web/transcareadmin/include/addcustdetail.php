<html>
<head>
<title>Add New Record in MySQL Database</title>
</head>
<body>
<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
   $fname = addslashes ($_POST['fname']);
   $lname = addslashes ($_POST['lname']);
   $phone = addslashes ($_POST['phone']);
}
else
{
   $user_fname = $_POST['fname'];
   $user_lname = $_POST['lname'];
   $user_phone = $_POST['phone']; 
}
$emp_salary = $_POST['emp_salary'];
$sql = "INSERT INTO userdetails".
       "(fname,lanme, phone) ".
       "VALUES('$user_fname','$user_lname',$user_phone)";
mysql_select_db('userdetails');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">user first Name</td>
<td><input name="user_fname" type="text" id="fname"></td>
</tr>
<tr>
<td width="100">user second name</td>
<td><input name="user_lname" type="text" id="lname"></td>
</tr>
<tr>
<td width="100">user phone</td>
<td><input name="user_phone" type="text" id="phone"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Employee">
</td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>