<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View User</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="221" border="0" align="center" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="664" colspan="4" >
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>View All User</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_user.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"	><td height="136">
 

<table width="546" border="1" cellpadding="0" cellspacing="1" align="center" bgcolor="#cccccc" class="mini_tab">

  <tr align="center" class="font0" style="color:#0000CC; font-weight:bold;">
    <td width="27">Sr#</td>
    <td width="133" height="32" >First Name</td>
    <td width="82" height="32" >Last Name</td>
    <td width="108" height="32">Designation</td>
    <td width="84" height="32">User Name</td>
    <td width="91" height="22">Password</td>
</tr>

<?php
 		$i=1;
		$sql="select * from  user";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$u_id=$row['u_id'];	
		?>

  <tr align="center">
    <td><?php echo $i; ?></td>
    <td width="133" height="32" class="font" align="left"><?php echo $row['f_name']; ?></td>
    <td width="82" height="32" ><?php echo $row['l_name']; ?></td>
    <td width="108" height="32"><?php echo $row['desig']; ?></td>
    <td width="84" height="32"><?php echo $row['user']; ?></td>
    <td width="91" height="22"><?php echo $row['pass']; ?></td>
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
