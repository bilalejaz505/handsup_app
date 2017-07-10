<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Class & Subjects</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="366" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Add Class & Subjects</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_result.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="127">
 
<?php
$class=$_POST['class'];
if(isset($_POST['submit'])){
$sql="INSERT INTO class(class)VALUES('$class')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
?>
<?php echo "<b>".$class."</b><font color='red'>&nbsp;Class is Added to Database.</font>"; } ?>

<table width="323" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<form method="post" action="class_subj.php" name="classform" enctype="multipart/form-data" onsubmit="return validateForm()">

  <tr>
    <td width="190" height="29" class="font">* Enter Class:</td>
    <td width="204" height="29"><input type="text" value="" name="class" /></td>
</tr>
  
  <tr align="center">
  <td colspan="2"><input type="submit" value="Add Class" name="submit" class="loginButton" /></td>
  </tr></form>
</table>

</td></tr>
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
<tr bgcolor="#FFFFFF"><td height="157">


<?php
include("db.php");
$subjects=$_POST['subject'];
$cid=$_POST['cid'];
if(isset($_POST['submit1'])){
$sql="INSERT INTO subjects(C_id,subjects)VALUES('$cid','$subjects')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
?>
<?php echo "<b>".$subjects."</b><font color='red'>&nbsp;Subjects is Added to Database.</font>"; } ?>
<table width="323" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<form method="post" action="class_subj.php" name="subjform" enctype="multipart/form-data" >

<tr><td align="right">Select Class:</td>
<td><select name="cid">
 <?php  
 $sql="select * from class order by class";
 $resultss=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($resultss))
			{
			$cname=$row['Class'];
			$cid=$row['C_id'];	
			?>
 <option value="<?php echo $cid;?>"<?php if($status=="$cid") echo "selected";?>>
 <?php
 echo $cname;
			
				
 ?> 
 </option><?php } ?>
  </select>
</td><td>

  <tr>
    <td width="190" height="29" align="right">* Enter Subject:</td>
    <td width="204" height="29"><input type="text" value="" name="subject" /></td>
</tr>
  
  <tr align="center">
  <td colspan="2"><input type="submit" value="Add Subject" name="submit1" class="loginButton" /></td>
  </tr></form>

</table>



</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>

<script type="text/javascript">

function validateForm(frm)

{
var class=document.forms["classform"]["class"].value

if (class == "" || class == "null")
{
alert("Please enter Class");

	return false;
}
}


/*function validateForm1(frm)

{
var subject=document.forms["subjform"]["subject"].value

if (subject == "" || subject == "null")
{
alert("Please enter Subject");

	return false;
}
}*/
</script>

</body>
</html>
