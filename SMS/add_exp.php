
<?php session_start();
if(!isset($_SESSION['us']))
{
	echo("<script>location.href = 'index.php';</script>");
}

?>
<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Particulars</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="409" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Entery of Income & Expense</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_report.html'); ?>

</tr>

<tr bgcolor="#FFFFFF">
<td height="164">

<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr class="href">
<td colspan="5" align="left" bgcolor="#33CC99"><font color="#FF0000">Expense Entry</font></td>
</tr>
<tr class="href" align="center">
<td>Date</td>
<td>Particulars</td>
<td>To Name</td>
<td>Dr</td>
<td>Cr</td>
</tr>


<form method="post" action="add_particular.php" name="subjform" enctype="multipart/form-data" onsubmit="return validateForm1()">

<tr align="center">
    <td width="118" height="29"><input type="text" value="" name="date" size="10" /></td>
    <td width="109" height="29">
<select name="exp"><?php
$sql="SELECT * FROM ex_part ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$ex_part=$row['ex_part'];
$ex_id=$row['ex_id'];
?>
<option value="">
<?php echo $ex_part=$row['ex_part']; ?>

</option>
<?php } ?>
</select>
</td>
    <td width="132" height="29"><input type="text" value="" name="to_name" size="10"/></td>
    <td width="95" height="29"><input type="text" value="" name="dr" size="6"/></td>
    <td width="86" height="29">&nbsp;</td>
</tr>

<tr align="center">
    <td width="118" height="29">&nbsp;</td>
    <td width="109" height="29"><input type="text" value="" name="exp_2" size="10"/></td>
    <td width="132" height="29">&nbsp;</td>
    <td width="95" height="29">&nbsp;</td>
    <td width="86" height="29"><input type="text" value="" name="cr" size="6"/></td>
</tr>
  
  <tr align="center">
  <td colspan="5"><input type="submit" value="Submit" name="submit1" class="loginButton" /></td>
  </tr></form>

</table>


</td></tr>
<tr bgcolor="#FFFFFF">
<td height="19">&nbsp;</td>
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
<?php echo "<b>".$subjects."</b><font color='red'>&nbsp;A Partical is Added to Expense.</font>"; } ?>
<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr class="href">
<td colspan="5" align="left"  bgcolor="#33CC99"><font color="#FF0000">Income Entry</font></td>
</tr>
<tr class="href" align="center">
<td>Date</td>
<td>Particulars</td>
<td>From Name</td>
<td>Dr</td>
<td>Cr</td>
</tr>


<form method="post" action="add_particular.php" name="subjform" enctype="multipart/form-data" onsubmit="return validateForm1()">

<tr align="center">
    <td width="118" height="29"><input type="text" value="" name="date" size="10" /></td>
    <td width="109" height="29">
<select name="exp"><?php
$sql="SELECT * FROM ex_part ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$ex_part=$row['ex_part'];
$ex_id=$row['ex_id'];
?>
<option value="">
<?php echo $ex_part=$row['ex_part']; ?>

</option>
<?php } ?>
</select>
</td>
    <td width="132" height="29"><input type="text" value="" name="to_name" size="10"/></td>
    <td width="95" height="29"><input type="text" value="" name="dr" size="6"/></td>
    <td width="86" height="29">&nbsp;</td>
</tr>

<tr align="center">
    <td width="118" height="29">&nbsp;</td>
    <td width="109" height="29"><input type="text" value="" name="exp_2" size="10"/></td>
    <td width="132" height="29">&nbsp;</td>
    <td width="95" height="29">&nbsp;</td>
    <td width="86" height="29"><input type="text" value="" name="cr" size="6"/></td>
</tr>
  
  <tr align="center">
  <td colspan="5"><input type="submit" value="Submit" name="submit1" class="loginButton" /></td>
  </tr></form>

</table>



</td></tr> 
<tr bgcolor="#FFFFFF">
<td height="19">&nbsp;</td>
</tr>
</table>

<script type="text/javascript">


function validateForm1(frm)

{
var ex_part=document.forms["subjform"]["ex_part"].value

if (ex_part == "" || ex_part == "null")
{
alert("Please enter Expense Particals");

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
