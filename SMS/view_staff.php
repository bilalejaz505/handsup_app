<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Staff</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="283" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>View Staff</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_staff.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="198">
 

<table width="555" border="1" cellpadding="1" cellspacing="0" align="center" bgcolor="#CCCCCC" class="mini_tab">

  <tr align="center" class="font0" style="color:#0000CC; font-weight:bold;">
    <td width="56">Sr#</td>
    <td width="208" height="32" >Name</td>
    <td width="145" height="32">Designation</td>
    <td width="131" height="32">Remarks</td>
</tr>

<?php
 		$i=1;
		$sql="select * from  staff";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$sf_id=$row['sf_id'];	
		?>

  <tr align="left">
    <td align="center"><?php echo $i; ?></td>
    <td width="208" height="22" class="font"><a href="show_staff.php?sf_id=<?php echo $row['sf_id']; ?>" class="href"><?php echo $row['f_name']." ".$row['l_name']; ?></a></td>
    <td width="145" height="22"><?php echo $row['desig']; ?></td>
    <td width="131" height="22"><?php echo $row['remarks']; ?></td>
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
