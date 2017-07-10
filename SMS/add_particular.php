<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Heads</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="366" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Add Income & Expense Heads</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_report.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="127">
 
<?php
$in_part=$_POST['in_part'];
if(isset($_POST['submit'])){
$sql="INSERT INTO in_part(in_part)VALUES('$in_part')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
?>
<?php echo "<b>".$class."</b><font color='red'>&nbsp;Particular is Added to Income.</font>"; } ?>

<table width="362" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<form method="post" action="add_particular.php" name="classform" enctype="multipart/form-data" onsubmit="return validateForm()">

  <tr align="left">
    <td width="149" height="29" class="font">Income Head:</td>
    <td width="203" height="29"><input type="text" value="" name="in_part"  class="sub_input"/></td>
</tr>
  
  <tr align="center">
  <td colspan="2"><input type="submit" value="Add" name="submit" class="loginButton" /></td>
  </tr></form>
</table>

</td></tr>
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
<tr bgcolor="#FFFFFF"><td height="157">


<?php
$ex_part=$_POST['ex_part'];
if(isset($_POST['submit1'])){
$sql="INSERT INTO ex_part(ex_part)VALUES('$ex_part')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
?>
<?php echo "<b>".$subjects."</b><font color='red'>&nbsp;Particular is Added to Expense.</font>"; } ?>
<table width="369" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<form method="post" action="add_particular.php" name="subjform" enctype="multipart/form-data" onsubmit="return validateForm1()">

<tr><td align="right"></td>
<td>
</td><td>

  <tr align="left">
    <td width="190" height="29">Expense Head:</td>
    <td width="204" height="29"><input type="text" value="" name="ex_part"  class="sub_input"/></td>
</tr>
  
  <tr align="center">
  <td colspan="2"><input type="submit" value="Add" name="submit1" class="loginButton" /></td>
  </tr></form>

</table>



</td></tr> 

</table>

<script type="text/javascript">

function validateForm(frm)

{
var in_part=document.forms["classform"]["in_part"].value

if (in_part == "" || in_part == "null")
{
alert("Please enter Income Head");

	return false;
}
}

function validateForm1(frm)

{
var ex_part=document.forms["subjform"]["ex_part"].value

if (ex_part == "" || ex_part == "null")
{
alert("Please enter Expense Head");

	return false;
}
}
/*function validateForm1(frm)

{
var subject=document.forms["subjform"]["subject"].value

if (subject == "" || subject == "null")
{
alert("Please enter Subject");

	return false;
}
}*/
</script>

</body>
</html>
