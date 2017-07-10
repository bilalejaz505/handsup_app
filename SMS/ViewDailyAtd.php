
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
<title>Print Student Dues</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style> </head>
</style></head>
<script type="text/javascript">
function print_page()
{
 window.print()
}
</script>

<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">

	<table width="1140" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
 	 <tr>
 		 <td colspan="3">&nbsp;<!--<b style="cursor:pointer;" onclick="return print_page()"><img src="logos/4.jpg" width="27" height="27" align="top" />&nbsp;&nbsp;Print Here...</b>--></td>
 	 </tr>
     
     <tr align="center">
         <td width="363" height="576" align="center" valign="top"> 


	<form method="get" action="ViewDailyAtd.php">
		<table>
				<tr> 
   
  					<td><strong>Date:</strong></td>  
   					 <td><input type="text" name="FDate"/>
  						
      
      
      
    </td>
    
    <td><input type="submit" value="Search" /></td>
    </tr>
    

</table></form>
<table width="70%" height="50" border="1" cellpadding="0" cellspacing="1"> 
	<tr align="center">
		<td height="46" colspan="10">
			<b><font size="+2">Zakariya Higher Secondery School Layyah</font></b></td>
	</tr>
<tr>
    <td align="center" width="10%"><strong>Class Name</strong></td>
    <td align="center" width="10%"><strong>Section</strong></td>
    <td align="center" width="10%"><strong>Enrollment</strong></td>
    <td align="center" width="10%"><strong>Absent</strong></td>
    <td align="center" width="10%"><strong>Leave</strong></td>
    <td align="center" width="10%"><strong>Sick Leave</strong></td>
    <td align="center" width="10%"><strong>Present</strong></td>
    <td align="center" width="10%"><strong>Total</strong></td>
    <td align="center" width="10%">Date</td>
    <td align="center" width="10%"><strong>Day</strong></td>
</tr>

  <?php
  
  $FDate=$_GET['FDate'];
  if($FDate=='')
  {
	 $a=1;
  }
  else
  {
	   $a="Date='$FDate'";
	  
	  }
			$sql="select * from  stud_attendance where $a";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{?>
 	<tr>
    	       
         <td align="center"> <?php echo $row['Class_Name']; ?> </td>
         <td align="center"><?php echo $row['Section']; ?> </td>
         <td align="center"><?php echo $row['Enrollment']; ?> </td>
         <td align="center"><?php echo $row['Absent']; ?> </td>
         <td align="center"><?php echo $row['Leave1']; ?> </td>
         <td align="center"><?php echo $row['Sick_Leave']; ?> </td>
         <td align="center"><?php echo $row['Present']=$row['Enrollment']-$row['Leave1']-$row['Sick_Leave']-$row['Absent']; ?></td>
         <td align="center"><?php echo $row['Total']=$row['Leave1']+$row['Sick_Leave']+$row['Absent']+$row['Present']; ?> </td>
         <td><?php echo $row['Date']; ?> </td>
         <td><?php echo $row['Day']; ?> </td>
    
    </tr>
 <?php	}
		?>
 
 </table>
 
 
<br/><br/>
<strong style="text-align:left">Incharge Signature</strong><span style="width:200px; height:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong style="text-align:left">Headmaster  Signature</strong>

</td>

</tr></table>
</body>
</html>
