<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Get Dues</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="655" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"	>
<tr align="center">
<td colspan="4"><?php include('head.php'); ?>
</td>
</tr>
  <tr>
	<?php include('navi_main.html'); ?>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="4" align="center" ><font size="+2" color="#000000">Challan Form</font></td>
  </tr>
  
<tr align="center">
<?php include('navi_challan.html'); ?>
</tr>
  
 <tr align="center">
 <td height="82">


 
<table width="389" bgcolor="#CCCCCC" border="1" cellpadding="1" cellspacing="0" class="mini_tab"> 
<!--
<tr  bgcolor="#CCCCCC">
<td colspan="3" align="center" valign="middle"><font size="+2" color="#000000">School  Management  System</font><br />
<font size="+0" color="#000000">Address</font></td>
</tr>
-->
<tr align="center" class="font0" style="color:#0000CC; font-weight:bold;">
<td width="35">Sr#</td>
<td width="227">Student Name/Father Name</td>
<td width="113">Date of Dues</td>
</tr>





<?php
	$i=1;
 		$sql="select * from  challan";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$ch_id=$row['ch_id'];	
?>
<tr align="left" bgcolor="#CCCCCC">
<td height="22"><?php echo $i; ?></td>
<td><b class="font"><a href="print_dues.php?ch_id=<?php echo $row['ch_id']; ?>" class="href"><?php echo $row['std_name']."/".$row['f_name']; ?></a></b></td>
<td><font color="#FF0000"><?php echo $row['issue_date']; ?></font></td>
</tr>
<?php
$i++;
}
?>
</table>

<tr>
<td>&nbsp;</td>
</tr>

</td></tr> 
</table>

</body>
</html>
