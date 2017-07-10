<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Class & Subjects</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="446" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>View Class & Subjects</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_result.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="361">
 


<table width="407" border="1" cellpadding="0" cellspacing="1" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="6" align="right" bgcolor="#33CC99"><font color="#FF0000"></font></td>
</tr>

<tr>
<td width="201">
<table width="197" border="1" align="center">

<tr bgcolor="#33CC99" align="center">
    <td width="37" height="28">Sr#</td>
    <td width="133" height="28" valign="top" >Class</td>

</tr>
<?php
$i=1;
 		$sql="select * from  class";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$C_id=$row['C_id'];	
?>
<tr align="center">
<td><?php echo $i; ?></td>
    <td width="133" height="29" valign="top"><?php echo $row["Class"]; ?></td>
</tr>
<?php
$i++;
}
?>


</table>
</td>
<td width="197">
<table width="196" border="1" align="center">

<tr bgcolor="#33CC99" align="center">
    <td width="41" height="28">Sr#</td>
    <td width="129" height="28" >Subjects</td>

</tr>
<?php
$i=1;
 		$sql="select * from  subjects";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$Sb_id=$row['Sb_id'];	
?>
<tr align="center">
<td><?php echo $i; ?></td>
    <td width="129" height="29"><?php echo $row["subjects"]; ?></td>
</tr>
<?php
$i++;
}
?>

</table>
</td>
</tr>


</table>


</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>

































</body>
</html>
