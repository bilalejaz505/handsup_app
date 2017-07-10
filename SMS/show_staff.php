<?php
include("db.php");
$ed="true";
$sf_id=$_GET['sf_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>show staff</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="664" height="518" border="0" align="center" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="664" colspan="4">
<?php include('head.php'); ?>
</td>
</tr>

  <tr >
	<?php include('navi_main.html'); ?>
  </tr>
<!--
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="left"><font color="#006699">Main Page > User > New User </font></td>
  </tr>
-->
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Staff Detail</b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_staff.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="453">

<table width="597" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
  <?php
 		$sql="select * from  staff where sf_id=".$_GET['sf_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$sf_id=$row['sf_id'];	
		?>
<tr>
<td colspan="4" align="center" bgcolor="#33CC99"><font color="#FF0000"><?php echo $row['f_name']." ".$row['l_name']; ?>'s Profile</font></td>
</tr>


  <tr>
    <td width="140" height="24" class="href">First Name:</td>
    <td width="144" height="24"><?php echo $row['f_name']; ?></td>
  <td width="109" height="24"  class="href">Last Name:</td>
    <td width="144" height="24" ><?php echo $row['l_name']; ?></td>
</tr>

  <tr>
      <td width="140" height="24" class="href">Father's Name:</td>
    <td width="144" height="24"><?php echo $row['fath_name']; ?></td>
      <td width="140" height="24"  class="href">Date of Birth:</td>
    <td width="144" height="24"><?php echo $row['dob']; ?></td>
</tr>

  <tr>
        <td width="140" height="24"  class="href">Gender:</td>
    <td width="144" height="24"> <?php echo $row['gender']; ?> </td>
    <td width="140" height="24" class="href">CNIC # </td>
    <td width="144" height="24"><?php echo $row['cnic']; ?></td>
</tr>

  <tr>
    <td width="140" height="26" class="href">Designation:</td>
    <td width="144" height="26"><?php echo $row['desig']; ?></td>
    <td width="140" height="26" class="href">Department: </td>
    <td width="144" height="26"><?php echo $row['dept']; ?></td>
</tr>

   <tr>
    <td width="140" height="24" class="href">Religion:</td>
    <td width="144" height="24"><?php echo $row['relig']; ?></td>
    <td width="140" height="24" class="href">Mobile # </td>
    <td width="144" height="24"><?php echo $row['mob']; ?></td>
</tr>
 
   <tr>
    <td width="140" height="26" class="href">E-mail:</td>
    <td width="144" height="26"><?php echo $row['email']; ?></td>
    <td width="140" height="26" class="href">Address: </td>
    <td width="144" height="26"><?php echo $row['adrs']; ?></td>
</tr>

   <tr>
    <td width="140" height="24" class="href">BPS No:</td>
    <td width="144" height="24"><?php echo $row['bps']; ?></td>
    <td width="140" height="24" class="href">Remarks </td>
    <td width="144" height="24"><?php echo $row['remarks']; ?></td>
</tr>

  <tr>
    <td width="140" height="24" class="href">Academic Qualification:</td>
    <td width="144" height="24"><?php echo $row['Qul_acd']; ?></td>
    <td width="140" height="24" class="href">Professional Qualification: </td>
    <td width="144" height="24"><?php echo $row['Qul_prof']; ?></td>
</tr>

  <tr>
    <td width="140" height="24" class="href">Domicile:</td>
    <td width="144" height="24"><?php echo $row['Domi']; ?></td>
    <td width="140" height="24" class="href">Date of Joining:</td>
    <td width="144" height="24"><?php echo $row['joining_date']; ?></td>
</tr>

  <tr>
    <td width="140" height="24" class="href">Date of Award of Present Grade :</td>
    <td width="144" height="24"><?php echo $row['date_award']; ?></td>
    <td width="140" height="24" class="href">Date of Posting at Present School:</td>
    <td width="144" height="24"><?php echo $row['date_pp']; ?></td>
</tr>

  <tr align="center">
  <td colspan="4"><a href="staff.php?sf_id=<?php echo $row['sf_id']; ?>">
  	<input type="button" value="Edit" name="edit" class="loginButton" /></a>
    &nbsp;&nbsp;&nbsp;<a href="print_staff.php?sf_id=<?php echo $sf_id; ?>">
    <input type="button" value="Print" name="print" class="loginButton" /></a></td>
    <?php
  }
  ?>
  </tr>
    <tr>
  <td colspan="4">&nbsp;</td>
  </tr>
</table>


</td></tr> 
</table>



</body>
</html>
