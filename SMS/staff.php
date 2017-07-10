<?php

error_reporting(0);
ini_set('display_errors',0);
ob_start();


?>




<?php
include("db.php");

$sf_id="";
$f_name="";
$l_name="";
$fath_name="";
$gender="";
$cnic="";
$dob="";
$desig="";
$dept="";
$relig="";
$mob="";
$email="";
$adrs="";
$bps="";
$remarks="";
$Qul_acd="";
$Qul_prof="";
$Domi="";
$joining_date="";
$date_award="";
$date_pp="";



$ed="";
if(isset($_GET['sf_id']))
{
$sql="select * from  staff where sf_id=".$_GET['sf_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
		{
			$f_name=$row['f_name'];
			$f_name=$row['f_name'];
			$l_name=$row['l_name'];
			$fath_name=$row['fath_name'];
			$gender=$row['gender'];
			$cnic=$row['cnic'];
			$dob=$row['dob'];
			$desig=$row['desig'];
			$dept=$row['dept'];
			$relig=$row['relig'];
			$mob=$row['mob'];
			$email=$row['email'];
			$adrs=$row['adrs'];
			$bps=$row['bps'];
			$remarks=$row['remarks'];
			$Qul_acd=$row['Qul_acd'];
			$Qul_prof=$row['Qul_prof'];
			$Domi=$row['Domi'];
			$joining_date=$row['joining_date'];
			$date_award=$row['date_award'];
			$date_pp=$row['date_pp'];
			
		}
}

$submit=$_POST['submit'];
$sf_id=$_GET['sf_id'];
$ed=$_GET['ed'];
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
<title>New Staff</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="465" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Add New Staff</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_staff.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="390">
 


<table width="601" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="4" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<form method="post" action="add_staff.php?sf_id=<?php echo $sf_id; ?>" name="stafform" enctype="multipart/form-data" onsubmit="return validateForm()">

  <tr>
    <td width="156" height="24" class="font">&nbsp;&nbsp;First Name:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $f_name; ?>" name="f_name" class="sub_input"/></td>
  <td width="136" height="24" >&nbsp;&nbsp;Last Name:</td>
    <td width="147" height="24"><input type="text" value="<?php echo $l_name; ?>" name="l_name" class="sub_input" /></td>
</tr>

  <tr>
      <td width="156" height="24" class="font">&nbsp;&nbsp;Father's Name:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $fath_name; ?>" name="fath_name" class="sub_input"/></td>
      <td width="136" height="24" class="font">&nbsp;Date of Birth:</td>
    <td width="147" height="24"><input type="text" value="<?php echo $dob; ?>" style="width:130px" id="datepicker-example7" name="dob" class="sub_input"/><br /></td>
</tr>

  <tr>
        <td width="156" height="24" class="font">&nbsp;&nbsp;Gender:</td>
    <td width="144" height="24">  <input type="radio" name="gender" value="Male"<?php if($gender=="Male") echo "selected";?> /> Male  <input type="radio" name="gender" value="Female"<?php if($gender=="Female") echo "selected";?> /> Female </td>
    <td width="136" height="24">&nbsp;&nbsp; CNIC # </td>
    <td width="147" height="24"><input type="text" value="<?php echo $cnic; ?>" name="cnic" class="sub_input" /><br />
    <font color="#FF0000">eg: 3630255913203</font></td>
</tr>

  <tr>
    <td width="156" height="26">&nbsp;&nbsp;Designation:</td>
    <td width="144" height="26"><input type="text" value="<?php echo $desig; ?>" name="desig" class="sub_input"/></td>
    <td width="136" height="26">&nbsp;&nbsp;&nbsp;Department: </td>
    <td width="147" height="26"><input type="text" value="<?php echo $dept; ?>" name="dept" class="sub_input" /></td>
</tr>

   <tr>
    <td width="156" height="24">&nbsp;&nbsp;Religion:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $relig; ?>" name="relig" class="sub_input"/></td>
    <td width="136" height="24">&nbsp;&nbsp;Mobile # </td>
    <td width="147" height="24"><input type="text" value="<?php echo $mob; ?>" name="mob" class="sub_input" /><br />
    <font color="#FF0000">eg:03009639034</font></td>
</tr>
 
   <tr>
    <td width="156" height="26">&nbsp;&nbsp;Email:</td>
    <td width="144" height="26"><input type="text" value="<?php echo $email; ?>" name="email" class="sub_input"/></td>
    <td width="136" height="26">&nbsp;&nbsp; Address: </td>
    <td width="147" height="26"><input type="text" value="<?php echo $adrs; ?>" name="adrs"  class="sub_input"/></td>
</tr>

   <tr>
    <td width="156" height="24">&nbsp;&nbsp;BPS No:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $bps; ?>" name="bps" class="sub_input"/></td>
    <td width="136" height="24">&nbsp;&nbsp;Remarks: </td>
    <td width="147" height="24"><select name="remarks" class="sub_input">
	<option value="Contract Base"<?php if($remarks=="Contract Base") echo "selected";?>>Contract Base</option>
<option value="Permanent"<?php if($remarks=="Permanent") echo "selected";?>>Permanent</option>
<option value="Visiting Faculity"<?php if($remarks=="Visiting Faculity") echo "selected";?>>Visiting Faculity</option>
</select></td>
</tr>
   <tr>
    <td width="156" height="24">&nbsp;&nbsp;Acd Education:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $Qul_acd; ?>" name="Qul_acd" class="sub_input"/></td>
    <td width="136" height="24">&nbsp;&nbsp;Pro Education:</td>
    <td width="147" height="24"><input type="text" value="<?php echo $Qul_prof; ?>" name="Qul_prof" class="sub_input"/></td>
</tr>
<tr>
    <td width="156" height="24">&nbsp;&nbsp;Domicile:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $Domi; ?>" name="Domi" class="sub_input"/></td>
    <td width="136" height="24">&nbsp;&nbsp;Joining Date:</td>
    <td width="147" height="24"><input type="text" value="<?php echo $joining_date; ?>" name="joining_date" class="sub_input"/></td>
</tr>
    <td width="156" height="24"> Date of Award of Present Grade:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $date_award; ?>" name="date_award" class="sub_input"/></td>
    <td width="136" height="24"> Date of Posting at Present School:</td>
    <td width="147" height="24"><input type="text" value="<?php echo $date_pp; ?>" name="date_pp" class="sub_input"/></td>
  
  
  <tr align="center">
  <td colspan="4">
  
 <?php if(isset($_GET['sf_id']))
{
	
  ?>
  <input type="submit" value="Update" name="submit" class="loginButton" />
 <input type="hidden" value="true" name="ed" />
  
 <?php }
 
 else
 {
 ?>
 
  <input type="Submit" name="submit" value="Add Staff" class="loginButton" />
  <?php }?>
  
  
  </td>
  </tr></form>
    <tr>
  <td colspan="4">&nbsp;</td>
  </tr>
</table>


</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>


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
var f_name=document.forms["stafform"]["f_name"].value
var dob=document.forms["stafform"]["dob"].value
var cnic=document.forms["stafform"]["cnic"].value
var desig=document.forms["stafform"]["desig"].value
var adrs=document.forms["stafform"]["adrs"].value
var mob=document.forms["stafform"]["mob"].value
var b_sal=document.forms["stafform"]["b_sal"].value

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

if (dob == "" || dob == "null")
{
alert("Please enter Date of Birth");

	return false;
}

if (cnic == "" || cnic == "null")
{
alert("Please enter CNIC #");

	return false;
}

if (desig == "" || desig == "null")
{
alert("Please enter Designation");

	return false;
}

if (adrs == "" || adrs == "null")
{
alert("Please enter Address");

	return false;
}

if (mob == "" || mob == "null")
{
alert("Please enter Mobile No #");

	return false;
}

if (b_sal == "" || b_sal == "null")
{
alert("Please enter Basic Salary");

	return false;
}

}

</script>

</body>
</html>
