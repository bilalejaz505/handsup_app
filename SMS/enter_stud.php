<?php

error_reporting(0);
ini_set('display_errors',0);
ob_start();


?>



<?php
include("db.php");

$a_id="";
$s_name="";
$f_name="";
$gender="";
$cnic="";
$class="";
$roll_no="";
$section="";
$session="";

$btVal="Add Student";
$ed="";
if(isset($_GET['a_id']))
{
    $a_id=$_GET['a_id'];
    $btVal="Update";
    $ed="true";
}

if(isset($_GET['s_name']))
{
    $s_name=$_GET['s_name'];
}
if(isset($_GET['f_name']))
{
    $f_name=$_GET['f_name'];
}
if(isset($_GET['fath_name']))
{
    $fath_name=$_GET['fath_name'];
}

if(isset($_GET['gender']))
{
    $gender=$_GET['gender'];
}
if(isset($_GET['cnic']))
{
    $cnic=$_GET['cnic'];
}
if(isset($_GET['class']))
{
    $class=$_GET['class'];
}

if(isset($_GET['roll_no']))
{
    $roll_no=$_GET['roll_no'];
}

if(isset($_GET['section']))
{
    $section=$_GET['section'];
}

if(isset($_GET['session']))
{
    $session=$_GET['session'];
}

$submit=$_POST['submit'];
$a_id=$_GET['a_id'];
$ed=$_GET['ed'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>New Student</title>
<style type="text/css">
<!--
body {
    margin-top: 0px;
}
-->
</style>
<link href="style.css" rel="stylesheet"/>
</head>

<body background="logos/bg_blue.png">
<table width="664" height="342" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Enter Student's Data</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
    <?php include('navi_result.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="257">



<table width="567" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="4" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<form method="post" action="add_stud.php?a_id=<?php echo $a_id; ?>&ed=<?php echo $ed; ?>" name="stad_form" enctype="multipart/form-data" onsubmit="return validateForm()">

  <tr>
    <td width="127" height="24" class="font">&nbsp;&nbsp;Student Name</td>
    <td width="144" height="24"><input type="text" value="<?php echo $s_name; ?>" name="s_name" class="sub_input"/></td>
  <td width="134" height="24" >&nbsp;&nbsp;Father's Name:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $f_name; ?>" name="f_name" class="sub_input" /></td>
</tr>

  <tr>
      <td width="127" height="24" class="font">&nbsp;&nbsp;Roll No</td>
    <td width="144" height="24"><input type="text" value="<?php echo $roll_no; ?>" name="roll_no" class="sub_input"/></td>
      <td width="134" height="24" class="font">&nbsp;&nbsp;Father's CNIC:</td>
    <td width="144" height="24"><input type="text" value="<?php echo $cnic; ?>" name="cnic" class="sub_input" /><br />
    <font color="#FF0000">eg: 3630255913203</font></td>
</tr>

  <tr>
        <td width="127" height="24" class="font">&nbsp;&nbsp;Gender</td>
    <td width="144" height="24">  <input type="radio" name="gender" value="Male"<?php if($gender=="Male") echo "selected";?> /> Male  <input type="radio" name="gender" value="Female"<?php if($gender=="Female") echo "selected";?> /> Female </td>
    <td width="134" height="24">&nbsp;&nbsp;Class </td>
    <td width="144" height="24"><select name="class" class="sub_input">
 <?php
 $sql="select * from class_res order by C_id ASC";
 $resultss=mysql_query($sql)or die(mysql_error());
        while($row=mysql_fetch_array($resultss))
            {
            $cname=$row['Class'];
            $C_id=$row['C_id'];
        ?>
 <option value="<?php echo $cname;?>"<?php if($class=="$cname") echo "selected";?>>
 <?php
     echo $cname;


 ?>
 </option><?php } ?>
  </select></td>
</tr>

  <tr>
    
    <td width="134" height="26">&nbsp;&nbsp;Session: </td>
    <td width="144" height="26"><input type="text" value="<?php echo $session; ?>" name="session"  class="sub_input"/></td>
</tr>

  <tr align="center">
  <td colspan="4"><input type="submit" value="<?php echo $btVal; ?>" name="submit" class="loginButton" />
  <input type="hidden" name="ed" value="<?php echo $ed;?>" />
  <input type="hidden" name="a_id" value="<?php echo $a_id;?>"  />
  <input type="hidden" name="submit" value="<?php echo $submit; ?>" /></td>
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

<script type="text/javascript">

function validateForm(frm)

{
var s_name=document.forms["stad_form"]["s_name"].value
var roll_no=document.forms["stad_form"]["roll_no"].value
var cnic=document.forms["stad_form"]["cnic"].value
var session=document.forms["stad_form"]["session"].value


if ((s_name==null) || (s_name==""))

  {

  alert("Please enter Student Name");

  return false;

  //}

  if (s_name!="")
{
    var filter=/^[a-zA-Z _]+$/;
    var test_bool = filter.test(s_name);
        if(test_bool==false)
        {
        alert('Please enter only alphabets in Student Name');
        return false;
        }
        if (trim(s_name)== "")
        {
        alert('Please enter Student Name in correct format');
        return false;
        }
}    }

if (roll_no == "" || roll_no == "null")
{
alert("Please enter Roll No#");

    return false;
}

if (cnic == "" || cnic == "null")
{
alert("Please enter CNIC #");

    return false;
}

if (session == "" || session == "null")
{
alert("Please enter Session");

    return false;
}


}

</script>

</body>
</html>
