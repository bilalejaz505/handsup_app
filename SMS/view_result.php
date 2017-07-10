<?php

error_reporting(0);
ini_set('display_errors',0);
ob_start();


?>


<?php
include("db.php");
$ed="true";
$del="";
//$testId=$_GET['testId'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Student's Marks</title>
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

  <tr align="center">
	<?php //include('navi_main.html'); ?>
  </tr>
<!--
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="left"><font color="#006699">Main Page > User > New User </font></td>
  </tr>

-->
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>View Student's Marks</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('resnv.php'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="275">
 

<table width="1068" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td width="1332" colspan="2" align="right" bgcolor="#33CC99"><font color="#FF0000"> * Mandatory Fields</font></td>
</tr>
<tr>
<td>

<form method="get" action="view_result.php">
<strong>Date:</strong>
<input type="text"  value="" name="Date" id="datepicker-example7" />
<strong>class:</strong>
<select name="class" class="sub_input">
<option value="">SELECT CLASS</option>
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
  </select> <input type="submit"  value="Search"/> </form>
<table border="1" width="1061" align="center">
<tr bgcolor="#999999" align="center">
<td width="22" height="31">Sr#</td>
<td width="34" height="31" align="center">Roll No</td>
<td width="79" height="31" align="center">Student Name</td>
<td width="67" height="31" align="center">Father Name</td>
<td width="33">Class</td>
<td width="96">Test Date</td>
<td width="19">Sci</td>
<td width="23">Eng</td>
<td width="31">Urdu</td>
<td width="32">Math</td>
<td width="35">Pak Study</td>
<td width="35">Is Study</td>
<td width="24">Phy</td>
<td width="25">Che</td>
<td width="25">Bio</td>
<td width="38">Comp</td>
<td width="24">EW</td>
<td width="21">Civ</td>
<td width="24">Edu</td>
<td width="31">Arab</td>
<td width="26">Isl Elec</td>
<td width="60">Obtained Marks</td>
<td width="40">Total Marks</td>
<td width="24">Edit</td>
<td width="39">Delete</td>
</tr>



<?php
$i=1;
  $class=$_GET['class'];
  $Date=$_GET['Date'];
  if($class=='')
  {
	 $a=1;
  }
  else
  {
	   $a="testtable.class='$class'";
	  
	  }
 if($Date=='')
  {
	 $b=1;
  }
  else
  {
	   $b="month='$Date'";
	  
	  }
	  
$sql="SELECT *,testtable.class AS aa FROM testtable 
LEFT JOIN stud_data 
ON stud_data.s_name=testtable.s_name where $a && $b";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$a_id=$row['a_id'];
?>
<tr align="center" bgcolor="#FFFFFF">
<td><?php echo $i; ?></td>
<!--<td><?php //echo $row['testId']; ?></td>-->
<td align="left"><?php echo $row['roll_no']; ?></td>
<td align="left"><?php echo $row['s_name']; ?></td>
<td align="left"><?php echo $row['f_name']; ?></td>
<td><?php echo $row['aa']; ?></td>
<td align="left"><?php echo $row['month']; ?></td>
<td><?php echo $row['science']; ?></td>
<td><?php echo $row['eng']; ?></td>
<td><?php echo $row['urdu']; ?></td>
<td><?php echo $row['maths']; ?></td>
<td><?php echo $row['pak']; ?></td>
<td><?php echo $row['islam']; ?></td>
<td><?php echo $row['phy']; ?></td>
<td><?php echo $row['che']; ?></td>
<td><?php echo $row['bio']; ?></td>
<td><?php echo $row['comp']; ?></td>
<td><?php echo $row['elec']; ?></td>
<td><?php echo $row['civ']; ?></td>
<td><?php echo $row['edu']; ?></td>
<td><?php echo $row['arab']; ?></td>
<td><?php echo $row['isl_elec']; ?></td>
<td><?php $obt =$row['obtained']=$row['science']+$row['eng']+ $row['urdu']+$row['maths']+$row['pak']+$row['islam']+$row['phy']+$row['che']+$row['bio']+$row['comp']+$row['elec']+$row['civ']+ $row['edu']+$row['arab']+$row['isl_elec']; 
$tot=$row['total'];
 
if($tot>=$obt)
{
	echo $obt;
}
else
{
	echo "<b style='color:#F00'>Error</b>";
}
 

?></td>
<td><?php echo $row['total']; ?></td>
<td><a href="update_result.php?testId=<?php echo $row['testId']; ?>&h=<?php echo h; ?>&ed=<?php echo $ed; ?>&a_id=<?php echo $a_id; ?>&s_name=<?php echo $row['s_name']; ?>&roll_no=<?php echo $row['roll_no']; ?>&class=<?php echo $row['class']; ?>&month=<?php echo $row['month']; ?>&science=<?php echo $row['science']; ?>&eng=<?php echo $row['eng']; ?>&urdu=<?php echo $row['urdu']; ?>&maths=<?php echo $row['maths']; ?>&pak=<?php echo $row['pak']; ?>&islam=<?php echo $row['islam']; ?>&phy=<?php echo $row['phy']; ?>&civ=<?php echo $row['civ']; ?>&arab=<?php echo $row['arab']; ?>&isl_elec=<?php echo $row['isl_elec']; ?>&che=<?php echo $row['che']; ?>&bio=<?php echo $row['bio']; ?>&comp=<?php echo $row['comp']; ?>&elec=<?php echo $row['elec']; ?>&total=<?php echo $row['total']; ?>&edu=<?php echo $row['edu']; ?>&isl_elec=<?php echo $row['isl_elec']; ?>">Edit</a></td>
<td><a href="delete.php?testId=<?php echo $row['testId']; ?>&del=true" onclick="return confirm('Are you sure to Delete');">Delete</a></td>
</tr>
<?php
$i++;
}
?>
</table> 


</td>
</tr>
    <tr>
  <td>&nbsp;</td>
  </tr>
</table>


</td></tr> 
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
