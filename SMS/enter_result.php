<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enter Student's Marks</title>
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
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Enter Student's Marks</b></font></td>
  </tr>

   <tr bgcolor="#FFFFFF" align="center">
	<?php include('resnv.php'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="275">
 
<?php
$class="";
$month="";
$total="";
$testId="";
$s_name="";
$roll_no="";
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


if(isset($_POST['class'])) $class1=$_POST['class'];
else $class1="";

?>

<table width="571" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td width="565" colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000">*Mandatory Fields</font></td>
</tr>
<tr> 
<td>

<table width="561" border="1" align="center">

<!--<tr><td colspan="4" align="center" bgcolor="#999999"><b style="font-size:24px; color:#009;">Enter Student Data</b></td></tr>
-->


<tr align="center">
<form action="insert_enter_result.php" method="post">
  <tr align="left" bgcolor="#FFFFFF">
  <td width="110" colspan="2"><b>Student Name:</b></td>
  <td width="161" colspan="2">
<input type="text" name="s_name">
 


<!--<td width="118" align="center">Roll No#</td>
<td width="144"><input type="text" name="roll_no" value="<?php //echo $roll_no ?>" class="sub_input" /></td>--></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left"><strong>Class</strong></td>
  <td><select name="class" class="sub_input">
    <?php  
 $sql="select * from class_res ";
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
<td align="center"><strong>Test Date</strong></td>
<td > <input type="text" value="<?php echo $month; ?>" style="width:135px" name="month" class="sub_input" required="required" id="datepicker-example7" />
</td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left"><strong>Total Marks</strong></td>
  <td ><input type="text" name="total" class="sub_input"/></td>
  <td align="left">English</td><td ><input type="text" name="eng" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left">Urdu</td><td ><input type="text" name="urdu" class="sub_input"/></td>
  <td align="left">Math</td><td ><input type="text" name="maths" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left">Pak Studies</td><td ><input type="text" name="pak" class="sub_input"/></td>
  <td align="left">Islamiyat</td><td ><input type="text" name="islam" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left">Physics</td><td ><input type="text" name="phy" class="sub_input"/></td>
  <td align="left">Chemistry</td><td ><input type="text" name="che" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF"><td align="left">G.Science</td><td ><input type="text" name="science" class="sub_input"/></td>
  <td align="left">Biology</td><td ><input type="text" name="bio" class="sub_input"/></td></tr>
 
  <tr align="center" bgcolor="#FFFFFF"><td align="center">Electrical Wiring</td><td ><input type="text" name="elec" class="sub_input"/></td>
  <td align="left">Computer</td><td ><input type="text" name="comp" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF">
  <td align="left">Education</td>
  <td ><input type="text" name="edu" class="sub_input"/></td>
  <td align="left">Civics</td>

  <td ><input type="text" name="civ" class="sub_input"/></td></tr>
  <tr align="center" bgcolor="#FFFFFF">
  <td align="left">Arabic</td>
  <td ><input type="text" name="arab" class="sub_input"/></td>
  <td align="left">Islamic Elec</td>
  <td ><input type="text" name="isl_elec" class="sub_input"/></td></tr>

  <tr align="center" bgcolor="#FFFFFF">
  <td align="center" colspan="4"><input type="submit" style="cursor:pointer; "/>

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
