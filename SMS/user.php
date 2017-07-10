
<?php

error_reporting(0);
ini_set('display_errors',0);
ob_start();


?>


<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>New User</title>
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Create New User</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_user.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="275">
 
<?php
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$desig=$_POST['desig'];
$user=$_POST['user'];
$pass=$_POST['pass'];

if(isset($_POST['submit']))
{
$a="INSERT INTO user(f_name,l_name,desig,user,pass) VALUES('$f_name','$l_name','$desig','$user','$pass')";
//echo $a;
mysql_query($a);
		header('location:view_user.php');
		exit;
mysql_close($con);
}
?>

<table width="323" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000"> Mandatory Fields</font></td>
</tr>
<form method="post" action="user.php" name="userform" enctype="multipart/form-data" onsubmit="return validateForm()">

  <tr>
    <td width="190" height="29" class="font">&nbsp;&nbsp;First Name:</td>
    <td width="204" height="29"><input type="text" value="" name="f_name"  class="sub_input" required="required"  /></td>
</tr>

  <tr>
    <td width="190" height="28" >&nbsp;&nbsp;Last Name:</td>
    <td width="204" height="28"><input type="text" value="" name="l_name"  class="sub_input" required="required"  /></td>
</tr>

  <tr>
    <td width="190" height="26">&nbsp;&nbsp;Designation:</td>
    <td width="204" height="26"><input type="text" value="" name="desig"  class="sub_input" required="required"  /></td>
</tr>

  <tr>
    <td width="190" height="33">&nbsp;&nbsp;User Name:</td>
    <td width="204" height="33"><input type="text" value="" name="user"  class="sub_input" required="required"  /></td>
</tr>
  <tr>
    <td width="190" height="22">&nbsp;&nbsp;Password:</td>
    <td width="204" height="22"><input type="password" value="" name="pass" id="pass"  class="sub_input" required="required" /></td>
  </tr>
  
  <tr align="center">
  <td colspan="2"><input type="submit" value="submit" name="submit" class="loginButton" /></td>
  </tr></form>
    <tr>
  <td>&nbsp;</td>
  </tr>
</table>


</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>

<script type="text/javascript">

function validateForm(frm)

{
var f_name=document.forms["userform"]["f_name"].value
var desig=document.forms["userform"]["desig"].value
var user=document.forms["userform"]["user"].value
var pass=document.forms["userform"]["pass"].value


if ((f_name==null) || (f_name==""))

  {

  alert("Please enter First Name");

  return false;

  //}
  
  if (f_name!="")
{
	var filter=/^[a-zA-Z _]+$/;
	var test_bool = filter.test(f_name);
		if(test_bool==false)
		{
		alert('Please enter only alphabets in First name');
		return false;
		}
		if (trim(f_name)== "")
		{
		alert('Please enter First name in correct format');
		return false;
		}
}	}


if (desig == "" || desig == "null")
{
alert("Please enter Designation");

	return false;
}

if (user == "" || user == "null")
{
alert("Please enter user name");

	return false;
}

if (pass == "" || pass == "null")
{
alert("Please enter password");

	return false;
}

}

</script>

</body>
</html>
