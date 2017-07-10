<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Entery Heads</title>
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
<script type="text/javascript" src="function.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />

<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">

	window.onload = function(){

		new JsDatePick({

			useMode:2,

			target:"inputField",

			dateFormat:"%Y-%m-%d"

		});

		new JsDatePick({

			useMode:2,

			target:"inputField1",

			dateFormat:"%Y-%m-%d"

		});

	};

</script>
<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr class="href">
<td colspan="5" align="left" bgcolor="#33CC99"><font color="#FF0000">Expense Entry</font></td>
</tr>
<tr class="href" align="center">
<td>Date</td>
<td>Heads</td>
<td>To Name</td>
<td>Dr</td>
</tr>

<?php
$date_exp=$_POST['date_exp'];
$exp_1=$_POST['exp_1'];
$to_name=$_POST['to_name'];
$dr_exp=$_POST['dr_exp'];

if(isset($_POST['submit1'])){
$sql="INSERT INTO expense(date_exp,exp_1,to_name,dr_exp)VALUES('$date_exp','$exp_1','$to_name','$dr_exp')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
?>
<?php echo "<b>".$subjects."</b><font color='red'>&nbsp;An Expense Entery is Added.</font>"; } ?>
<form method="post" action="entry_reports.php" name="expform" enctype="multipart/form-data" onsubmit="return validateForm1()">

<tr align="center">
    <td width="118" height="29"><input type="text" value="" name="date_exp" size="10" id="inputField" class="sub_input"/></td>
    <td width="109" height="29">
<select name="exp_1"  class="sub_input"><?php
$sql="SELECT * FROM ex_part ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$ex_part=$row['ex_part'];
$ex_id=$row['ex_id'];
?>
<option>
<?php echo $ex_part=$row['ex_part']; ?>

</option>
<?php } ?>
</select></td>
    <td width="132" height="29"><input type="text" value="" name="to_name" size="10" class="sub_input"/></td>
    <td width="95" height="29"><input type="text" value="" name="dr_exp" size="6" class="sub_input"/></td>
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
$date_inc=$_POST['date_inc'];
$inc_1=$_POST['inc_1'];
$from_name=$_POST['from_name'];
$cr_inc=$_POST['cr_inc'];

if(isset($_POST['submit2'])){
$sql="INSERT INTO income(date_inc,inc_1,from_name,cr_inc)VALUES('$date_inc','$inc_1','$from_name','$cr_inc')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
?>
<?php echo "<b>".$subjects."</b><font color='red'>&nbsp;An Income Entery is Added.</font>"; } ?>
<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr class="href">
<td colspan="4" align="left"  bgcolor="#33CC99"><font color="#FF0000">Income Entry</font></td>
</tr>
<tr class="href" align="center">
<td>Date</td>
<td>Heads</td>
<td>From Name</td>
<td>Cr</td>
</tr>


<form method="post" action="entry_reports.php" name="incform" enctype="multipart/form-data" onsubmit="return validateForm2()">

<tr align="center">
    <td width="118" height="29"><input type="text" value="" name="date_inc" size="10" class="sub_input" id="inputField1"/></td>
    <td width="109" height="29"><select name="inc_1" class="sub_input"><?php
$sql="SELECT * FROM in_part ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$in_part=$row['in_part'];
$in_id=$row['in_id'];
?>
<option >
<?php echo $in_part=$row['in_part']; ?></option>
<?php } ?>
</select></td>
    <td width="132" height="29"><input type="text" value="" name="from_name" size="10" class="sub_input"/></td>
    <td width="95" height="29"><input type="text" value="" name="cr_inc" size="6" class="sub_input"/></td>
</tr>
  
  <tr align="center">
  <td colspan="5"><input type="submit" value="Submit" name="submit2" class="loginButton" /></td>
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
var date_exp=document.forms["expform"]["date_exp"].value
var to_name=document.forms["expform"]["to_name"].value
var dr_exp=document.forms["expform"]["dr_exp"].value

if (date_exp == "" || date_exp == "null")
{
alert("Please enter Expense Date");

	return false;
}
if (to_name == "" || to_name == "null")
{
alert("Please enter To Name");

	return false;
}

if (dr_exp == "" || dr_exp == "null")
{
alert("Please enter Value of Debit");

	return false;
}
}


function validateForm2(frm)

{
var date_inc=document.forms["incform"]["date_inc"].value
var from_name=document.forms["incform"]["from_name"].value
var cr_inc=document.forms["incform"]["cr_inc"].value

if (date_inc == "" || date_inc == "null")
{
alert("Please enter Income Date");

	return false;
}
if (from_name == "" || from_name == "null")
{
alert("Please enter From Name");

	return false;
}

if (cr_inc == "" || cr_inc == "null")
{
alert("Please enter Value of Credit");

	return false;
}
}
</script>

</body>
</html>
