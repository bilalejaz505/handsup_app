<?php

error_reporting(0);
ini_set('display_errors',0);
ob_start();


?>

<?php

include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Student Admission Form</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="655" align="center" border="0" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="652" colspan="4">
<?php include('head.php'); ?>
</td>
</tr>
  <tr>
	<?php include('navi_main.html'); ?>
  </tr>
    <tr align="center" bgcolor="#FFFFFF">
	<?php include('navi_stud.html'); ?>  
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="4" align="center" ><b style="font-size:24px; color:#009;">VIEW STUDENT DATA</b>
    <br/>
    
    <form  method="get" action="stud_view.php">
   
    <strong>Name:</strong><input type="text" name="q"/>

    <input type="submit" value="Search" />
    </form>
    </td>
  </tr>
 <tr align="center">
 <td>
 
 
<table bgcolor="#999999"> 
  <tr align="center" bgcolor="#33CC99">
 <td width="53">&nbsp;Sr.#</td>
 <td>&nbsp;Student's Name</td>
 <td width="139">&nbsp;Class</td>
 <td width="156">&nbsp;Registration #</td>
 </tr>
 
   <?php

$i=1;
 $q=$_GET['q'];
 if($q=='')
 {
	 $aq=1;
 }
 else
 {
	 $aq="sname like '%$q%'";
 }
 
 		$sql="select * from  students where $aq";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$s_id=$row['s_id'];	
			?>
  <tr align="center" class="font" bgcolor="#FFFFFF">
    <td height="22" ><?php echo "SMS_".$i; ?></td>
    <td width="335" align="left"><b class="font"><a href="show_stud.php?s_id=<?php echo $row['s_id']; ?>" class="href"> &nbsp;&nbsp;<?php echo $row["sname"]; ?></a></td>
	<td align="left"><b class="font"><?php echo $row['class']; ?></b></td>
	
<!--      <td align="center"><img src="imge/<?php //echo $row['image']; ?>" width="50" height="50" /></td>
-->
	<td align="left"><a href="show_stud.php?s_id=<?php echo $row['s_id']; ?>" class="href"><b class="font" title="click to view detail"><?php echo $row["reg"]; ?></b></a></td>
  </tr>
  <?php
	$i++;
	  }
  ?>
</table>


</td></tr> 
</table>
</body>
</html>
