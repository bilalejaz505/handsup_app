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
<title>Enter Student's Marks</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style>
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

</head>
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Re-Enter Student's Marks</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_result.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="275">
 
<?php
$testId="";
$s_name="";
$roll_no="";
$month="";
$class="";
$science="";
$eng="";
$urdu="";
$maths="";
$pak="";
$islam="";
$phy="";
$che="";
$bio="";
$comp="";
$elec="";
$edu="";
$civ="";
$arab="";
$isl_elec="";
$obtained="";
$total="";
$btVal="Add Marks";
$ed="";
$del="";
if(isset($_GET['testId']))
{
	$testId=$_GET['testId'];
	$btVal="Update Marks";
	$ed="true";
}
if(isset($_GET['s_name']))
{
	$s_name=$_GET['s_name'];
}
if(isset($_GET['roll_no']))
{
	$roll_no=$_GET['roll_no'];
}
if(isset($_GET['eng']))
{
	$eng=$_GET['eng'];
}
if(isset($_GET['urdu']))
{
	$urdu=$_GET['urdu'];
}
if(isset($_GET['maths']))
{
	$maths=$_GET['maths'];
}
if(isset($_GET['pak']))
{
	$pak=$_GET['pak'];
}
if(isset($_GET['islam']))
{
	$islam=$_GET['islam'];
}
if(isset($_GET['science']))
{
	$science=$_GET['science'];
}
if(isset($_GET['phy']))
{
	$phy=$_GET['phy'];
}
if(isset($_GET['che']))
{
	$che=$_GET['che'];
}
if(isset($_GET['bio']))
{
	$bio=$_GET['bio'];
}
if(isset($_GET['comp']))
{
	$comp=$_GET['comp'];
}

if(isset($_GET['elec']))
{
	$elec=$_GET['elec'];
}

if(isset($_GET['edu']))
{
	$edu=$_GET['edu'];
}

if(isset($_GET['civ']))
{
	$civ=$_GET['civ'];
}

if(isset($_GET['arab']))
{
	$arab=$_GET['arab'];
}

if(isset($_GET['isl_elec']))
{
	$isl_elec=$_GET['isl_elec'];
}

if(isset($_GET['month']))
{
	$month=$_GET['month'];
}
if(isset($_GET['class']))
{
	$class2=$_GET['class'];
}
if(isset($_GET['total']))
{
	$total=$_GET['total'];
}

$class1=$_POST['class'];
$submit=$_POST['submit'];

$h=$_GET['h'];
$ed=$_GET['ed'];
 $testId=$_POST['testId'];

$tid=$_GET['testId'];
$a_id=$_GET['a_id'];

?>

		<table width="571" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
	<tr>
		<td width="565" colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
	</tr>
	<tr>
  		<td>


		<table width="600" border="1" align="center">

<!--<tr><td colspan="4" align="center" bgcolor="#999999"><b style="font-size:24px; color:#009;">Enter Student Data</b></td></tr>
-->


  <tr align="center">
  <?php $testId1=$_GET['testId'];?>
		<form action="edit_result.php?testId1=<?php echo $testId1; ?>" method="post">
  <tr align="center" bgcolor="#FFFFFF"><td width="110" align="left"><strong>Student Name</strong></td>
  <td width="161"><?php if($h=="h"){?>
  <input type="text" name="s_name" value="<?php echo $s_name; ?>" class="sub_input"/><?php }?></td>
  <td width="118" align="center">&nbsp;</td>
  <td width="144">&nbsp;</td></tr>

  <tr align="center" bgcolor="#FFFFFF">
  <td align="left"><strong>Class</strong></td>
  <td>
  <?php if($h=="h"){?>
   <input type="text" name="class" value="<?php echo $class2;?>" class="sub_input"  /><?php }?>
  </td>
  <td align="left"><strong>Test Date</strong></td>
  <td > <input type="text" value="<?php echo $month; ?>" style="width:135px" name="month" class="sub_input" required="required" id="datepicker-example7" />
  </td></tr>

  <tr align="center" bgcolor="#FFFFFF">
  <td align="left"> <strong>Total Marks</strong></td><td ><input type="text" name="total" value="<?php echo $total; ?>" class="sub_input"/></td>
  <td align="left">English</td><td ><input type="text" name="eng" value="<?php echo $eng; ?>" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left">Urdu</td><td ><input type="text" name="urdu" value="<?php echo $urdu; ?>" class="sub_input"/></td>
  <td align="left">Math</td><td ><input type="text" name="maths" value="<?php echo $maths; ?>" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left">Pak Studies</td><td ><input type="text" name="pak" value="<?php echo $pak; ?>" class="sub_input"/></td>
  <td align="left">Islamiyat</td><td ><input type="text" name="islam" value="<?php echo $islam; ?>" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left">Physics</td><td ><input type="text" name="phy" value="<?php echo $phy; ?>" class="sub_input"/></td>
  <td align="left">Chemistry</td><td ><input type="text" name="che" value="<?php echo $che; ?>" class="sub_input"/><?php /*echo $str2;*/ ?></td></tr>
  
  <tr align="center" bgcolor="#FFFFFF"><td align="left">G.Science</td><td ><input type="text" name="science" value="<?php echo $science; ?>" class="sub_input"/></td>
  <td align="left"> Biology</td><td ><input type="text" name="bio" value="<?php echo $bio; ?>" class="sub_input"/></td></tr>
 
  <tr align="center" bgcolor="#FFFFFF"><td align="left"> Electrical Wiring</td><td ><input type="text" name="elec" value="<?php echo $elec; ?>" class="sub_input"/></td>
  <td align="left">Computer</td><td ><input type="text" name="comp" value="<?php echo $comp; ?>" class="sub_input"/></td></tr>
  
  <tr align="center" bgcolor="#FFFFFF"><td align="left">Education</td><td ><input type="text" name="edu" value="<?php echo $edu; ?>" class="sub_input"/></td>
  <td align="left">Civics</td><td ><input type="text" name="civ" value="<?php echo $civ; ?>" class="sub_input"/></td></tr>
  
  <tr align="center" bgcolor="#FFFFFF"><td align="left">Arabic</td><td ><input type="text" name="arab" value="<?php echo $arab; ?>" class="sub_input"/></td>
  <td align="left">Islamic Elec</td><td ><input type="text" name="isl_elec" value="<?php echo $isl_elec; ?>" class="sub_input"/></td></tr>

<tr align="center" bgcolor="#FFFFFF">
<td align="center" colspan="4"><input type="submit" value="<?php echo $btVal; ?>" style="cursor:pointer; "/>
<input type="hidden" name="tid" value="<?php echo $tid;?>" />
<input type="hidden" name="ed" value="<?php echo $ed;?>" />
<input type="hidden" name="a_id" value="<?php echo $a_id;?>" />
<input type="hidden" name="submit" value="<?php echo $submit;?>" />

</td>
</form></tr></table>


</td>
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
