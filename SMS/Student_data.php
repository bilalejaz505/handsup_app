<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New User</title>
<link type="text/css" rel="stylesheet" href="style.css" />
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<body id="bg_body">
<?php
/*include("db.php");
if(isset($_POST['submit'])){
$user3=$_POST['user'];

$pass3=$_POST['pass'];
*/
//$con=mysql_connect("localhost","root","");
//if (!$con) {
//die ("can not connect".mysql_error());	
//}
//mysql_select_db("testdb",$con);
/*
$a=("INSERT INTO users(user,pass) VALUES('".$user."','".$pass."')");
//echo $a;
mysql_query($a,$con);
mysql_close($con);
}*/

$s_id="";
$sname="";
$rollNo="";
$fname="";
$class="";
$cnic="";
$address="";
$user2="";
$pass2="";

$btVal="Add Student";
$ed="";
$del="";
if(isset($_GET['s_id']))
{
	$testId=$_GET['s_id'];
	$btVal="Update";
	$ed="true";
}
if(isset($_GET['sname']))
{
	$sname=$_GET['sname'];
}
if(isset($_GET['rollNo']))
{
	$rollNo=$_GET['rollNo'];
}
if(isset($_GET['fname']))
{
	$fname=$_GET['fname'];
}
if(isset($_GET['cnic']))
{
	$cnic=$_GET['cnic'];
}
if(isset($_GET['class']))
{
	$class=$_GET['class'];
}
if(isset($_GET['address']))
{
	$address=$_GET['address'];
}
if(isset($_GET['user2']))
{
	$user2=$_GET['user2'];
}
if(isset($_GET['pass2']))
{
	$pass2=$_GET['pass2'];
}

?>
<table width="1366" align="center"  style="background:url(logo/1.bmp) repeat-x; height:40px; color:#FFF; text-align:center; margin-left:-8px; font-size:36px;">
<tr><td align="center"><img src="logo/icon-logo.png" width="30" height="34" align="absmiddle" >
<b>I CON COLLEGE KHANEWAL</b>
</td>
</tr>
</table>

<?php
//include("head_icon.html");
?>
<table width="555" align="center" border="1">
  <tr bgcolor="#3399FF">
    <td align="center"><a href="testQ.php" style="color:#0000CC; text-decoration:none;"><img src="logo/home.gif" width="18" height="18" align="texttop" title="Back To Main" /><b>Home</b></a></td>
    <td colspan="2"></td>
    <td align="center"><a href="logout.php" style="color:#F00; text-decoration:none;"><img src="logo/logout.png" width="18" height="18" align="texttop" style="cursor:pointer;" />Log Out</a></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#999999"><b style="font-size:24px; color:#FFFFFF; background-color:#000000;">STUDENT BIO-DATA</b></td>
  </tr>
  <form method="post" name="studentform" action="add_user.php?s_id=<?php echo $s_id; ?>&ed=true" >
    <tr bgcolor="#FFFFFF">
      <td width="121" align="center" >Student Name:</td>
      <td width="144" ><input type="text" value="<?php echo $sname; ?>" name="sname" class="sub_input" required="required" />  </td>
      <td width="118" align="center" >Mother Name:</td>
      <td width="144"><input type="text" value="<?php echo $mname; ?>" name="mname" class="sub_input" required="required" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="121" align="center" >Father Name:</td>
      <td width="144"><input type="text" value="<?php echo $fname; ?>" name="fname" class="sub_input" required="required" /></td>
      <td width="118" align="center" >Father's CNIC#:</td>
      <td width="144"><input type="text" value="<?php echo $cnic; ?>" name="cnic" class="sub_input" required="required" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="121" align="center" >Class:</td>
      <td width="144" align="center"><select name="class" class="sub_input">
<option value="ICS(part-1st)">&nbsp;&nbsp;&nbsp;ICS (part-1st)&nbsp;&nbsp;&nbsp;</option><option value="ICS(part-2nd)">&nbsp;&nbsp;&nbsp;ICS (part-2nd)&nbsp;&nbsp;&nbsp;</option> <option value="I.COM(part-1st)">&nbsp;&nbsp;&nbsp;I.Com (part-1st)&nbsp;&nbsp;&nbsp;</option><option value="I.COM(part-2nd)">&nbsp;&nbsp;&nbsp;I.Com (part-2nd)&nbsp;&nbsp;&nbsp;</option>	<option value="B.COM(part-1st)">&nbsp;&nbsp;&nbsp;B.Com (part-1st)&nbsp;&nbsp;&nbsp;</option><option value="B.COM(part-2nd)">&nbsp;&nbsp;&nbsp;B.Com (part-2nd)&nbsp;&nbsp;&nbsp;</option> <option value="F.A(part-1st)">&nbsp;&nbsp;&nbsp;F.A (part-1st)&nbsp;&nbsp;&nbsp;</option><option value="F.A(part-2nd)">&nbsp;&nbsp;&nbsp;F.A (part-2nd)&nbsp;&nbsp;&nbsp;</option> <option value="B.A(part-1st)">&nbsp;&nbsp;&nbsp;B.A (part-1st)&nbsp;&nbsp;&nbsp;</option><option value="B.A(part-2nd)">&nbsp;&nbsp;&nbsp;B.A (part-2nd)&nbsp;&nbsp;&nbsp;</option>
</select></td>
      <td width="118" align="center" >Address:</td>
      <td width="144"><input type="text" name="address" value="<?php echo $address; ?>" class="sub_input" required="required" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="121" align="center" >User Name:</td>
      <td width="144"><input type="text" value="<?php echo $user2; ?>" name="user2" class="sub_input" required="required" /></td>
      <td width="118" align="center" >Password:</td>
      <td width="144"><input type="password" value="<?php echo $pass2; ?>" name="pass2" class="sub_input" required="required" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="144" colspan="4" align="center"><input type="reset" name="reset" value="Reset To Clear"  />&nbsp;&nbsp;&nbsp;<input type="submit" value="<?php echo $btVal; ?>"/></td>
    </tr>
  </form>
</table></td>
</tr>
<!--  <table width="354" style="margin-bottom:360px;">
    <tr>
      <td colspan="2" class="heading">Create New User</td>
    </tr>
    <form method="post">
      <tr>
        <td width="120" align="center" style="color:#000;"><p>* User Name:</p></td>
        <td width="222" ><input type="text" name="user" class="loginInputBg" required="required" /></td>
      </tr>
      <tr>
        <td width="120" align="center"><p>* Password: </p></td>
        <td width="222"><input type="password" name="pass" class="loginInputBg" required="required" /></td>
      </tr>
      <tr>
        <td width="120" height="34" align="center"></td>
        <td width="222" align="right"><input type="submit" value="Submit" name="submit" class="loginButton"/></td>
      </tr>
    </form>
  </table>-->

<table border="1" width="1083" align="center">
<tr bgcolor="#3399FF"><td colspan="10" align="center" style="color:#009; font-size:24px; font-weight:bolder; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Student Personal Record</td></tr>
<tr bgcolor="#999999">
<td width="27" height="31">Sr#</td>
<td width="174" height="31">Student Name</td>
<td width="64" height="31">Roll No#</td>
<td width="158">Father Name</td>
<td width="129">Father's CNIC</td>
<td width="135">Class</td>
<td width="150">Address</td>
<td width="66">Username</td>
<td width="66">Password</td>
<!--<td width="33">Edit</td>-->
<td width="50">Delete</td>
</tr>



<?php
$i=1;
include("db.php");
//$con=mysql_connect("localhost","root","");
//mysql_select_db("testdb",$con);
$sql="SELECT * FROM students order by class ASC";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
?>
<tr align="center" bgcolor="#FFFFFF">
<td><?php echo $i; ?></td>
<!--<td><?php //echo $row['s_id']; ?></td>-->
<td><?php echo $row['sname']; ?></td>
<td><?php echo $row['rollNo']; ?></td>
<td><?php echo $row['fname']; ?></td>
<td><?php echo $row['cnic']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['user2']; ?></td>
<td><?php echo $row['pass2']; ?></td>
<!--<td><a href="new_user.php?s_id=<?php //echo $row['s_id']; ?>&sname=<?php //echo $row['sname']; ?>&rollNo=<?php //echo $row['rollNo']; ?>&fname=<?php ///echo $row['fname']; ?>&cnic=<?php //echo $row['cnic']; ?>&class=<?php /////echo $row['class']; ?>&address=<?php ///echo $row['address']; ?>&user2=<?php //echo $row['user2']; ?>&pass2=<?php //echo $row['pass2']; ?>">Edit</a></td>
--><td><a href="add_user.php?s_id=<?php echo $row['s_id']; ?>&del=true" onclick="return confirm('Are you sure to Delete');">Delete</a></td>
</tr>
<?php
$i++;
}
?>

   <?php
   include("footer.html");
   ?>
</table>
</body>
</html>