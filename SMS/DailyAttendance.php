<?php session_start();
if(!isset($_SESSION['us']))
{
	echo("<script>location.href = 'index.php';</script>");
}

?>

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

$btVal="Add Daily Class Attendence";
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
    <td height="25" colspan="4" align="center"><p><b><font color="#000000" size="+2">Daily Class Attendance  Sheet</font></b></p>
  </td>
  </tr>


 <tr align="center" bgcolor="#FFFFFF">
		<?php include('navi_attendance.html'); ?>  
    </tr>
<tr bgcolor="#FFFFFF"><td height="257">



<table width="567" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="4" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<form method="post" action="insert_daily_adn.php?a_id=<?php echo $a_id; ?>&ed=<?php echo $ed; ?>" name="stad_form" enctype="multipart/form-data" onsubmit="return validateForm()">

  <tr>
    <td width="98" height="24" class="font">Class  Name:</td>
    <td width="223" height="24"><select name="ClassName" class="sub_input">
      <?php  
 $sql="select * from class ";
 $resultss=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($resultss))
			{
			$cname=$row['Class'];
			$cid=$row['C_id'];	
		?>
      <option value="<?php echo $cname;?>">
        <?php
	 echo $cname;
			
				
 ?>
        </option>
      <?php } ?>
    </select></td>
    <td width="84" height="24" >Section:</td>
    <td width="144" height="24"><input type="text" value="" name="Section" class="sub_input" /></td>
</tr>

 <tr>
      <td width="98" height="24" class="font">Enrollment:</td>
      <td width="223" height="24"><input type="text" value="" name="Enrollment" class="sub_input"/></td>
      <td width="84" height="24" class="font">Absent:</td>
      <td width="144" height="24"><input type="text" value="" name="Absent" class="sub_input" /></td>
</tr>

<tr>
      <td width="98" height="24" class="font">Leave:</td>
      <td width="223" height="24"><input type="text"  value="" name="Leave" class="sub_input"/> </td>
      <td width="84" height="24">Sick  Leave:</td>
      <td width="144" height="24"> <input type="text"  value="" name="Sickleave" class="sub_input"/> </td>
</tr>
  <tr>
    <td height="24" class="font">Date:</td>
    <td height="24"><input type="text" value="" id="datepicker-example7" name="Date" class="sub_input"/></td>
    <td height="24" >Day:</td>
    <td height="24">
      <select name="Day">
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
        </select></td>
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
