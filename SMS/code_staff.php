<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>New Student</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="360" border="0" align="center" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="664" colspan="4" >
<?php include('head.php'); ?>
</td>
</tr>

  <tr>
	<?php include('navi_main.html'); ?>
  </tr>
<!--
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="left"><font color="#006699">Main Page > User > New User </font></td>
  </tr>

-->
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Code Prefix</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_user.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="275">
 
<?php
$stf_id="";
$staff_code="";


$btVal="";
$ed="";
if(isset($_GET['stf_id']))
{
	$stf_id=$_GET['stf_id'];
	$btVal="Update";
	$ed="true";
}
if(isset($_GET['staff_code']))
{
	$staff_code=$_GET['staff_code'];
}
$submit=$_POST['submit'];
$stf_id=$_GET['stf_id'];
$ed=$_GET['ed'];
?>

<table width="366" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="left" bgcolor="#33CC99"><font color="#FF0000">CODE PREFIX:</font></td>
</tr>
<form method="post" action="code_change_staff.php?stf_id=<?php echo $stf_id; ?>&ed=<?php echo $ed; ?>" name="userform" >

  <tr>
    <td width="117" height="29" class="font">&nbsp;&nbsp;Staff Code:</td>
    <td width="239" height="29"><input type="text" name="staff_code" value="<?php echo $staff_code; ?>" /></td>
</tr>

  <tr>
    <td width="117" height="28" ></td>
    <td width="239" height="28"><input type="submit" value="<?php echo $btVal; ?>" name="submit" class="loginButton" />
  <input type="hidden" name="ed" value="<?php echo $ed;?>" />
  <input type="hidden" name="stf_id" value="<?php echo $stf_id;?>"  />
  <input type="hidden" name="submit" value="<?php echo $submit; ?>" /></td>
</tr>
</form>

  
  <tr align="center">
  <td colspan="2"></td>
  </tr>
</table>

</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>
