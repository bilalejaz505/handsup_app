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
$std_id="";
$stud_code="";


$btVal="";
$ed="";
if(isset($_GET['std_id']))
{
	$std_id=$_GET['std_id'];
	$btVal="Update";
	$ed="true";
}
if(isset($_GET['stud_code']))
{
	$stud_code=$_GET['stud_code'];
}
$submit=$_POST['submit'];
$std_id=$_GET['std_id'];
$ed=$_GET['ed'];
?>

<table width="323" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="left" bgcolor="#33CC99"><font color="#FF0000">CODE PREFIX:</font></td>
</tr>
<form method="post" action="code_change_stud.php?std_id=<?php echo $std_id; ?>&ed=<?php echo $ed; ?>" name="userform" >

  <tr>
    <td width="190" height="29" class="font">&nbsp;&nbsp;Student Code:</td>
    <td width="204" height="29"><input type="text" name="stud_code" value="<?php echo $stud_code; ?>" /></td>
</tr>

  <tr>
    <td width="190" height="28" ></td>
    <td width="204" height="28"><input type="submit" value="<?php echo $btVal; ?>" name="submit" class="loginButton" />
  <input type="hidden" name="ed" value="<?php echo $ed;?>" />
  <input type="hidden" name="std_id" value="<?php echo $std_id;?>"  />
  <input type="hidden" name="submit" value="<?php echo $submit; ?>" /></td>
</tr>
</form>
<!--
  <tr>
    <td width="190" height="26">&nbsp;&nbsp;&nbsp;Staff Code:</td>
    <td width="204" height="26"><input type="text" value="" name="staff_code"  /></td>
</tr>

  <tr>
    <td width="190" height="33">&nbsp;&nbsp;&nbsp;Bill No.</td>
    <td width="204" height="33"><input type="text" value="" name="bill_no" /></td>
</tr>-->
<!--  <tr>
    <td width="190" height="22">* Password:</td>
    <td width="204" height="22"><input type="password" value="" name="pass" id="pass" class="loginInputBg1" required="required" /></td>
  </tr>-->
  
  <tr align="center">
  <td colspan="2"></td>
  </tr>
    <tr>
  <td colspan="2">&nbsp;</td>
  </tr>
</table>


</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>
