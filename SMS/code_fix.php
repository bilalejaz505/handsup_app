<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Code prefix</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="262" border="0" align="center" cellpadding="0" cellspacing="0">
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

<tr bgcolor="#FFFFFF"><td height="177">
 
<?php
$ed="true";
$hd_id=$_GET['hd_id'];
$hd_id=$_GET['hd_id'];
$hd_id=$_GET['hd_id'];
$hd_id=$_GET['hd_id'];

?>

<table width="424" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="3" align="left" bgcolor="#33CC99"><font color="#FF0000">CODE PREFIX:</font></td>
</tr>
<?php
		/*$sql="select * from  code_head";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$hd_id=$row['hd_id'];*/	
		?>
 <!-- <tr align="center">
    <td width="143" height="29" class="href">&nbsp;&nbsp;Head Title:</td>
    <td width="230" height="29"><?php //echo $row['head_code']; ?></td>
	<td width="37"><a href="code_enter.php?hd_id=<?php //echo $row['hd_id']; ?>&ed=<?php echo $ed; ?>&head_code=<?php echo $row['head_code']; ?>">edit</a></td>
</tr>
<?php
/*}
		$sql="select * from  code_staff";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$stf_id=$row['stf_id'];	*/
		?>
  <tr align="center">
    <td width="143" height="26" class="href">&nbsp;&nbsp;&nbsp;Staff Code:</td>
    <td width="230" height="26"><?php //echo $row['staff_code']; ?></td>
	<td><a href="code_staff.php?stf_id=<?php //echo $row['stf_id']; ?>&ed=<?php echo $ed; ?>&staff_code=<?php echo $row['staff_code']; ?>">edit</a></td>
</tr>
<?php
/*}
		$sql="select * from  code_stud";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$hd_id=$row['hd_id'];*/	
		?>
  <tr align="center">
    <td width="143" height="28"  class="href">&nbsp;&nbsp;&nbsp;Student Code:</td>
    <td width="230" height="28"><?php //echo $row['stud_code']; ?></td>
	<td><a href="code_stud.php?std_id=<?php //echo $row['std_id']; ?>&ed=<?php echo $ed; ?>&stud_code=<?php echo $row['stud_code']; ?>">edit</a></td>
</tr>-->
<?php
//}
		$sql="select * from  code_bill";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$bill_id=$row['bill_id'];	
		?>
  <tr align="center">
    <td width="131" height="33" class="href">&nbsp;&nbsp;&nbsp;Bank Name:</td>
    <td width="242" height="33"><?php echo $row['bill_code']; ?></td>
	<td width="37"><a href="code_bill.php?bill_id=<?php echo $row['bill_id']; ?>&ed=<?php echo $ed; ?>&bill_code=<?php echo $row['bill_code']; ?>">edit</a></td>
</tr>
  <?php
}
?>
  <tr align="center">
  <td colspan="3"></td>
  </tr>
    <tr>
 <td>&nbsp;</td>	
  <td colspan="2" align="left">&nbsp;<font color="#FF0000">Exp: write Bank name and Account No# for challan form.</font></td>
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
