<?php

error_reporting(0);
ini_set('display_errors',0);
ob_start();
?>



<?php
include("db.php");
$ed="true";
$a_id=$_GET['a_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Data</title>
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Student's Data</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_result.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="275">
 


<table width="658" border="1" cellpadding="0" cellspacing="1" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="9" align="center" bgcolor="#33CC99"><font size="+2" color="#FF0000">Student's Details</font></td>
</tr>

<tr bgcolor="#33CC99" align="center">
    <td width="108" height="27">Student Name</td>
    <td width="108" height="27" >Father's Name</td>
    <td width="121" height="27" >CNIC</td>
    <td width="38" height="27" >Roll #</td>
    <td width="47" height="27" >Gender</td>
    <td width="62" height="27" >Class</td>
   
    <td width="61" height="27">Session</td>
	<td width="29">Edit</td>
</tr>
<?php
 		$sql="select * from  stud_data order by class";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$a_id=$row['a_id'];	
?>
<tr align="left">
    <td width="108" height="29"><?php echo $row["s_name"]; ?></td>
    <td width="108" height="29" ><?php echo $row["f_name"]; ?> </td>
    <td width="121" height="29" ><?php echo $row["cnic"]; ?> </td>
    <td width="38" height="29"><?php echo $row["roll_no"]; ?> </td>
    <td width="47" height="29" ><?php echo $row["gender"]; ?> </td>
    <td width="62" height="29" ><?php echo $row["class"]; ?></td>
   
    <td width="61" height="29"><?php echo $row["session"]; ?></td>
	  <td><a href="enter_stud.php?a_id=<?php echo $row['a_id']; ?>&ed=<?php echo $ed; ?>&s_name=<?php echo $row['s_name']; ?>&f_name=<?php echo $row['f_name']; ?>&cnic=<?php echo $row['cnic']; ?>&roll_no=<?php echo $row['roll_no']; ?>&gender=<?php echo $row['gender']; ?>&class=<?php echo $row['class']; ?>&section=<?php echo $row['section']; ?>&session=<?php echo $row['session']; ?>">Edit</a></td>
</tr>
<?php
}
?>

</table>


</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
