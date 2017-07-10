<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Staff Salary</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="175" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>View Staff Salary</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_staff.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="90">
 

<table width="555" border="1" cellpadding="1" cellspacing="0" align="center" bgcolor="#CCCCCC" class="mini_tab">

  <tr align="center" class="font0" style="color:#0000CC; font-weight:bold;">
    <td width="27">Sr#</td>
    <td width="234" height="32" >Name</td>
    <td width="103" height="32">Designation</td>
    <td width="173" height="32">Date of Month/Year</td>
</tr>

<?php
 		$i=1;
		$sql="select * from  salary";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$sal_id=$row['sal_id'];	
		?>

  <tr align="center">
    <td><?php echo $i; ?></td>
    <td align="left" width="234" height="22" class="font"><a href="show_salary.php?sal_id=<?php echo $row['sal_id']; ?>" class="href"><?php echo $row['stf_name']; ?></a></td>
    <td width="103" height="22"><?php echo $row['stf_desig']; ?></td>
    <td width="173" height="22"><?php echo $row['sal_date']." of <font color='#FF0000'>&nbsp;".$row['mon_yr']."</font>"; ?></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>

<tr bgcolor="#FFFFFF">
<td>&nbsp;</td>
</tr>

</td></tr> 
</table>
</body>
</html>
