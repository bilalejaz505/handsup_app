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
<title>Print Staff Salary</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="577" border="0" align="center" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="664" colspan="4">
<?php include('head.php'); ?>
</td>
</tr>

  <tr height="10">
	<?php //include('navi_main.html'); ?>
  </tr>
  
<!--  
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="left"><font color="#006699">Main Page > User > View User </font></td>
  </tr>

-->
 <tr bgcolor="#FFFFFF">
    <td height="8" colspan="4" align="center"><!--<font size="+2" color="#000000"><b>Staff Salary</b></font>--></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php //include('navi_staff.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"	><td height="532">
 

<script language="Javascript1.2">

  function printpage() {

  window.print();
  
  }

</script>


<table width="599" border="1" cellpadding="0" cellspacing="1" align="center" bgcolor="#FFFFFFF" class="mini_tab">
<!--<tr>
	<td align="center" colspan="4"><strong>School Managment System</strong><br />Address</td>
</tr>-->
<tr align="right">
	<td colspan="4" align="center"><u class="href">SALARY SLIP</u>
	  <!--<input type="button" value="Print Here..." name="print" onclick="printpage()" style="background-color:#FFFFFF;" />--></td>
</tr>
<?php
 		$sql="select * from  salary where sal_id=".$_GET['sal_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$sal_id=$row['sal_id'];	
		?>
<tr>
<td height="112" colspan="4">&nbsp;&nbsp;&nbsp;<font size="+1"> Employee's Name :</font>&nbsp; &nbsp;&nbsp;<strong><?php echo $row['stf_name']; ?></strong><br />
&nbsp;&nbsp;&nbsp;<font size="+1">Designation:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['stf_desig']; ?></strong><br />
&nbsp;&nbsp;&nbsp;<font size="+1">Month & Year:</font>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<strong> <?php echo $row['mon_yr']; ?></strong> <br />
&nbsp;&nbsp;&nbsp;<font size="+1">Cheque No:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['cheq_no']; ?></strong><br />
&nbsp;&nbsp;&nbsp;<font size="+1">Salary Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['sal_date']; ?> </strong></font></td>
</tr>

<tr align="center" bgcolor="#CCCCCC" style="color:#0000CC; font-weight:bold;">
    <td width="169" height="32">Earnings</td>
    <td width="135" height="32"></td>
    <td width="164" height="32">Deduction</td>
    <td width="116" height="22"></td>
</tr>
<tr align="left" bgcolor="#CCCCCC" >
  <td height="32">&nbsp;&nbsp;Basic Pay</td>
  <td align="right" height="32" class="font1"><?php echo $a=$row['sal_1']; ?></td>
  <td height="32">&nbsp;&nbsp;IT Payable</td>
  <td align="right" height="22" class="font1"><?php echo $a1=$row['sal_2']; ?></td>
</tr>
<tr align="left" bgcolor="#CCCCCC" >
  <td height="32">&nbsp;&nbsp;Conveyance Allowance</td>
  <td align="right" height="32" class="font1"><?php echo $b=$row['sal_3']; ?></td>
  <td height="32">&nbsp;&nbsp;Loan</td>
  <td height="22" class="font1" align="right"><?php echo $b1=$row['sal_4']; ?></td>
</tr>
<tr align="left" bgcolor="#CCCCCC" >
  <td height="32">&nbsp;&nbsp;House Rent</td>
  <td align="right" height="32" class="font1"><?php echo $c=$row['sal_5']; ?></td>
  <td height="32">&nbsp;&nbsp;Tax </td>
  <td height="22" class="font1" align="right"><?php echo $c1=$row['sal_6']; ?></td>
</tr>
<tr align="left" bgcolor="#CCCCCC" >
  <td height="32">&nbsp;&nbsp;Medical Allowance</td>
  <td align="right" height="32" class="font1"><?php echo $e=$row['sal_7']; ?></td>
  <td height="32">&nbsp;&nbsp;GPF Balance</td>
  <td height="22" class="font1" align="right"><?php echo $row['sal_8']; ?></td>
</tr>
<tr align="left" bgcolor="#CCCCCC" >
  <td height="32">&nbsp;&nbsp;Adhoc Allowances</td>
  <td align="right" height="32" class="font1"><?php echo $f=$row['sal_9']; ?></td>
  <td height="32">&nbsp;&nbsp;Benevolent Fund</td>
  <td height="22" class="font1" align="right"><?php echo $d1=$row['sal_10']; ?></td>
</tr>
<tr align="left" bgcolor="#CCCCCC" >
  <td height="32"><b>&nbsp;&nbsp;Net Gross Salary</b></td>
  <td height="32" class="font1" align="right"><?php echo $t1=$a+$b+$c+$d+$e+$f+$g;?></td>
  <td height="32"><b>&nbsp;&nbsp;Total Deduction</b></td>
  <td height="22" class="font1"align="right"><?php echo $t2=$a1+$b1+$c1+$d1; ?></td>
</tr>
<tr align="left" bgcolor="#CCCCCC" >
  <td height="32"></td>
  <td height="32"></td>
  <td height="32" class="href">&nbsp;&nbsp;Net Salary </td>
  <td height="22" class="font1"align="right"><?php echo $t1-$t2; ?></td>
</tr>
<?php
}
?>
<tr align="center">
<td height="108" colspan="4"><br />
  <br /><br />
________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________
<br />
  <strong>Employee's Sign &nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;Director/Principal Sign</strong></td>
</tr>

</table>

<tr bgcolor="#FFFFFF">
<td>&nbsp;</td>
</tr>

</td></tr> 
</table>
</body>
</html>
