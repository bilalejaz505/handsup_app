<?php
include("db.php");
$hd_id="";
$head_code="";


$btVal="";
$ed="";
if(isset($_GET['hd_id']))
{
	$hd_id=$_GET['hd_id'];
	$btVal="Update";
	$ed="true";
}
if(isset($_GET['head_code']))
{
	$head_code=$_GET['head_code'];
}
$submit=$_POST['submit'];
$hd_id=$_GET['hd_id'];
$ed=$_GET['ed'];
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
<table width="664" height="318" border="0" align="center" cellpadding="0" cellspacing="0">
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

<tr bgcolor="#FFFFFF"><td height="233">

<table width="353" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="left" bgcolor="#33CC99"><font color="#FF0000">CODE PREFIX:</font></td>
</tr>
<form method="post" action="code_change.php?hd_id=<?php echo $hd_id; ?>&ed=<?php echo $ed; ?>" name="userform" >

  <tr>
    <td width="135" height="29" class="font">&nbsp;&nbsp;Head Title:</td>
    <td width="208" height="29"><input type="text" name="head_code" value="<?php echo $head_code; ?>" size="27"/></td>
</tr>

  <tr>
    <td width="135" height="28" ></td>
    <td width="208" height="28"><input type="submit" value="<?php echo $btVal; ?>" name="submit1" class="loginButton" />
  <input type="hidden" name="ed" value="<?php echo $ed;?>" />
  <input type="hidden" name="hd_id" value="<?php echo $hd_id;?>"  />
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
