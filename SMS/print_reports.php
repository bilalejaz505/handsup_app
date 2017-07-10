<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Prints Reports</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="532" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center">&nbsp;</td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_report.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="82">
 


<table width="509" border="0" align="center" bgcolor="#FFFFFF">

  <tr class="href" align="center">
  <td width="38">&nbsp;</td>
    <td width="404" height="29"><font color="#000000" size="+2">School Managment System</font></td>
	<td width="53" >&nbsp;</td>
</tr>
  
  <tr align="center">
  <td colspan="3">Income & Expense Report</td>
  </tr>

</table>


</td></tr> 
<tr bgcolor="#FFFFFF"><td height="387">



<table width="509" border="0" align="center" bgcolor="#FFFFFF" >
<tr>
<td colspan="3" align="left" bgcolor="#33CC99"><font color="#FF0000" size="+2"><b>Income Status</b></font></td>
</tr>

  <tr class="href">
    <td width="43">&nbsp;</td>
    <td width="306" height="21">Particulars</td>
	<td width="146" >Amount</td>
</tr>
 <?php
$sql="SELECT * FROM income";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$in_id=$row['in_id'];
$inc_1=$row['inc_1'];
$cr_inc=$row['cr_inc'];
$cr_inc+=$cr_inc;
?>
<tr class="font">
    <td width="43">&nbsp;</td>
    <td width="306" height="21"><?php echo $inc_1=$row['inc_1']; ?></td>
	<td width="146" class="font1"><?php echo $cr_inc=$row['cr_inc']; ?></td>
</tr>
<?php } ?>
<tr>
<td colspan="3" ><hr /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center"><b>TOTAL INCOME:</b></td>
<td><b><?php $sql="SELECT sum(cr_inc) FROM income";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $cr_inc=$row['sum(cr_inc)'];
} ?></b></td>
</tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>
<tr>
<td colspan="3" align="left" bgcolor="#33CC99"><font color="#FF0000" size="+2"><b>Expense Status</b></font></td>
</tr>

<!--  <tr class="href">
    <td width="43">&nbsp;</td>
    <td width="306" height="21">Particulars</td>
	<td width="146" >Amount</td>
</tr>-->
 <?php
$sql="SELECT * FROM expense";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$exid=$row['exid'];
$exp_1=$row['exp_1'];
$dr_exp=$row['dr_exp'];
?>
<tr class="font">
    <td width="43">&nbsp;</td>
    <td width="306" height="21"><?php echo $exp_1=$row['exp_1']; ?></td>
	<td width="146" class="font1"><?php echo $dr_exp=$row['dr_exp']; ?></td>
</tr>
<?php } ?>
<tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center"><b>TOTAL EXPENSE:</b></td>
<td ><b><?php $sql="SELECT sum(dr_exp) FROM expense";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $dr_exp=$row['sum(dr_exp)'];
} ?></b></td>
</tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>

<td>&nbsp;</td>
<td><b>Total Income</b></td>
<td class="font1"><b><?php $sql="SELECT sum(cr_inc) FROM income";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $cr_inc1=$row['sum(cr_inc)'];
} ?></b></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><b>Total Expense</b></td>
<td class="font1"><b><?php $sql="SELECT sum(dr_exp) FROM expense";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $dr_exp1=$row['sum(dr_exp)'];
} ?></b></td>
</tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>
<tr bgcolor="#33CC99">
<td >&nbsp;</td>
<td class="href">Difference</td>
<td><b><?php echo $grand_total=($cr_inc1)-($dr_exp1); ?></b>&nbsp;</td>
</tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>
  <tr align="center">
  <td colspan="3" align="right"><input type="button" value="Print" name="print" onclick="return print_page()" class="loginButton" /></td>
  </tr>
    <tr>
  <td colspan="3">&nbsp;</td>
  </tr>
</table>


</td></tr>
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>
<script type="text/javascript">
function print_page()
{
 window.print()
}
</script>


<script type="text/javascript">

function validateForm(frm)

{
var from_date=document.forms["reportform"]["from_date"].value
var to_date=document.forms["reportform"]["to_date"].value


if (from_date == "" || from_date == "null")
{
alert("Please enter Date From");

	return false;
}

if (to_date == "" || to_date == "null")
{
alert("Please enter To Date");

	return false;
}

}

</script>

</body>
</html>
