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
<!------------------------------------>
  <link rel="stylesheet" href="public/css/zebra_datepicker.css" type="text/css">
        <link rel="stylesheet" href="examples/public/css/style.css" type="text/css">
       

        <script type="text/javascript" src="examples/public/javascript/jquery-1.7.2.js"></script>

        <script type="text/javascript" src="public/javascript/zebra_datepicker.js"></script>
        <script type="text/javascript" src="examples/public/javascript/functions.js"></script>

        <script type="text/javascript">
            SyntaxHighlighter.defaults['toolbar'] = false;
            SyntaxHighlighter.all();
        </script>
<!--------------------------------------->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Staff Salary</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="187" border="0" align="center" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="664" colspan="4">
<?php include('head.php'); ?>
</td>
</tr>

  <tr height="10">
	<?php include('navi_main.html'); ?>
  </tr>
  
<!--  
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="left"><font color="#006699">Main Page > User > View User </font></td>
  </tr>

-->
 <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Staff Salary</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_staff.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="102">
 


<table width="599" border="1" cellpadding="0" cellspacing="1" align="center" bgcolor="#CCCCCC" class="mini_tab">
<!--<tr>
	<td align="center" colspan="4"><strong>School Managment System</strong><br />Address</td>
</tr>-->
<tr align="center">
	<td colspan="4" class="href">STAFF SALARY SLIP</td>
</tr>
<form name="salform" action="add_salary.php" method="post" onsubmit="return validateForm()">
<tr align="left" >
    <td width="169" height="32" colspan="2">&nbsp;&nbsp;Employee's Name</td>
    <td width="164" height="32" colspan="2">
	<select name="stf_name" class="sub_input">
	<?php
		$sql="select * from  staff";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$sf_id=$row['sf_id'];	
		?>
		<option><?php echo $row['f_name']." ".$row['l_name']; ?></option>
 <?php
  }
  ?>
		</select></td>
</tr>
<tr align="left" >
    <td width="169" height="33" colspan="2">&nbsp;&nbsp;Designation</td>
    <td width="164" height="33" colspan="2"><select name="stf_desig" class="sub_input">
    <option value="Principal"<?php if($desig=="Principal") echo "selected";?>>Principal</option>
	<option value="Lecturer"<?php if($desig=="Lecturer") echo "selected";?>>Lecturer</option>
	<option value="Senior Headmaster"<?php if($desig=="Senior Headmaster") echo "selected";?>>Senior Headmaster</option>
	<option value="SST(Sc)"<?php if($desig=="SST(Sc)") echo "selected";?>>SST(Sc)</option>
	<option value="SST(Art)"<?php if($desig=="SST(Art)") echo "selected";?>>SST(Art)</option>
    <option value="EST"<?php if($desig=="ESt") echo "selected";?>>EST</option>
    <option value="EST(Eng)"<?php if($desig=="EST(eng)") echo "selected";?>>EST(Eng)</option>
    <option value="AT"<?php if($desig=="AT") echo "selected";?>>AT</option>
    <option value="PET"<?php if($desig=="PET") echo "selected";?>>PET</option>
</select></td>
</tr>
<tr align="left" >
    <td width="169" height="32" colspan="2"> &nbsp;&nbsp;Month & Year</td>
    <td width="164" height="32" colspan="2"><input type="text" name="mon_yr" value=""  class="sub_input" id="datepicker-example1"/></td>
</tr>
<tr align="left" >
    <td width="169" height="32" colspan="2">&nbsp;&nbsp;Cheque No</td>
    <td width="164" height="32" colspan="2"><input type="text" name="cheq_no" value=""  class="sub_input"/></td>
</tr>
<tr align="left" >
    <td width="169" height="32" colspan="2">&nbsp;&nbsp;Salary Date</td>
    <td width="164" height="32" colspan="2"><input type="text" name="sal_date" value=""  class="sub_input" id="datepicker-example7" /></td>
</tr>
<tr align="center" class="font0" style="color:#0000CC; font-weight:bold;">
    <td width="169" height="32" colspan="2" align="center">Earnings</td>
   
    <td width="164" height="32" colspan="2" align="center">Deduction</td>
    
</tr>

<tr align="left" >
    <td width="169" height="32">&nbsp;&nbsp;Basic Pay</td>
    <td width="135" height="32"><input type="text" name="sal_1" value=""  class="sub_input"/></td>
    <td width="164" height="32">&nbsp;&nbsp;IT Payable</td>
    <td width="116" height="22"><input type="text" name="sal_2" value=""  class="sub_input"/></td>
</tr>

<tr align="left" >
    <td width="169" height="32">&nbsp;&nbsp;Conveyance Allowance</td>
    <td width="135" height="32"><input type="text" name="sal_3" value=""  class="sub_input"/></td>
    <td width="164" height="32">&nbsp;&nbsp;Loan</td>
    <td width="116" height="22"><input type="text" name="sal_4" value=""  class="sub_input"/></td>
</tr>

<tr align="left" >
    <td width="169" height="32">&nbsp;&nbsp;House Rent</td>
    <td width="135" height="32"><input type="text" name="sal_5" value=""  class="sub_input"/></td>
    <td width="164" height="32">&nbsp;&nbsp;Tax </td>
    <td width="116" height="22"><input type="text" name="sal_6" value=""  class="sub_input"/></td>
</tr>

<tr align="left" >
    <td width="169" height="32">&nbsp;&nbsp;Medical Allowance</td>
    <td width="135" height="32"><input type="text" name="sal_7" value=""  class="sub_input"/></td>
    <td width="164" height="32">&nbsp;&nbsp;GPF Balance</td>
    <td width="116" height="22"><input type="text" name="sal_8" value=""  class="sub_input"/></td>
</tr>

<tr align="left" >
    <td width="169" height="32">&nbsp;&nbsp;Adhoc Allowances</td>
    <td width="135" height="32"><input type="text" name="sal_9" value=""  class="sub_input"/></td>
    <td width="164" height="32">&nbsp;&nbsp;Benevolent Fund</td>
    <td width="116" height="22"><input type="Text" name="sal_10" value=""  class="sub_input"/></td>
</tr>

<tr align="center">
  <td colspan="4"><input type="submit" name="submit" value="Submit" /></td>
</tr>
</form>

</table>

<tr bgcolor="#FFFFFF">
<td>&nbsp;</td>
</tr>

</td></tr> 
</table>
</body>
</html>
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


function validateForm(frm)

{
var mon_yr=document.forms["salform"]["mon_yr"].value
var sal_date=document.forms["salform"]["sal_date"].value
var sal_1=document.forms["salform"]["sal_1"].value
var net_sal=document.forms["salform"]["net_sal"].value


if (mon_yr == "" || mon_yr == "null")
{
alert("Please enter Month & Year");

	return false;
}

if (sal_date == "" || sal_date == "null")
{
alert("Please enter Date");

	return false;
}

if (sal_1 == "" || sal_1 == "null")
{
alert("Please enter Basic Salary");

	return false;
}

if (net_sal == "" || net_sal == "null")
{
alert("Please enter Net Salary");

	return false;
}
}

</script>