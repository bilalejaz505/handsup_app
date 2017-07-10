<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Staff Profile</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="" height="418" border="0" align="center" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="642" colspan="4" >
<?php include('head.php'); ?>
</td>
</tr>

  <tr >
	<?php //include('navi_main.html'); ?>
  </tr>
<!--
  <tr bgcolor="#FFFFFF">
    <td height="26" colspan="4" align="left"><font color="#006699">Main Page > User > New User </font></td>
  </tr>
-->

<tr bgcolor="#FFFFFF"><td height="333">

<table width="667" height="323" border="1" align="center" style="font-size:13px" >
  <?php
 		$sql="select * from  staff where sf_id=".$_GET['sf_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$sf_id=$row['sf_id'];	
		?>
<tr>
<td colspan="4" align="center"><font color="#FF0000" size="+2"><b><?php echo $row['f_name']." ".$row['l_name']; ?>'s Profile</b></font></td>
</tr>


  <tr align="left">
    <td width="177" height="24" class="href" align="">First Name:</td>
    <td width="141" height="24"><?php echo $row['f_name']; ?></td>
  <td width="175" height="24"  class="href">Last Name:</td>
    <td width="146" height="24" ><?php echo $row['l_name']; ?></td>
</tr>

  <tr align="left">
      <td width="177" height="24" class="href">Father's Name:</td>
    <td width="141" height="24"><?php echo $row['fath_name']; ?></td>
      <td width="175" height="24"  class="href">Date of Birth:</td>
    <td width="146" height="24"><?php echo $row['dob']; ?></td>
</tr>

  <tr align="left">
        <td width="177" height="24"  class="href">Gender:</td>
    <td width="141" height="24"> <?php echo $row['gender']; ?> </td>
    <td width="175" height="24" class="href">CNIC # </td>
    <td width="146" height="24"><?php echo $row['cnic']; ?></td>
</tr>

  <tr align="left">
    <td width="177" height="26" class="href">Designation:</td>
    <td width="141" height="26"><?php echo $row['desig']; ?></td>
    <td width="175" height="26" class="href">Department: </td>
    <td width="146" height="26"><?php echo $row['dept']; ?></td>
</tr>

   <tr align="left">
    <td width="177" height="24" class="href">Religion:</td>
    <td width="141" height="24"><?php echo $row['relig']; ?></td>
    <td width="175" height="24" class="href">Mobile # </td>
    <td width="146" height="24"><?php echo $row['mob']; ?></td>
</tr>
 
   <tr align="left">
    <td width="177" height="26" class="href">Email:</td>
    <td width="141" height="26"><?php echo $row['email']; ?></td>
    <td width="175" height="26" class="href">Address: </td>
    <td width="146" height="26"><?php echo $row['adrs']; ?></td>
</tr>

   <tr align="left">
    <td width="177" height="24" class="href">BPS No:</td>
    <td width="141" height="24"><?php echo $row['bps']; ?></td>
    <td width="175" height="24" class="href">Remarks </td>
    <td width="146" height="24"><?php echo $row['remarks']; ?></td>
</tr>

<tr align="left">
    <td width="177" height="24" class="href">Academic Qualification:</td>
    <td width="141" height="24"><?php echo $row['Qul_acd']; ?></td>
    <td width="175" height="24" class="href">Professional Qualification: </td>
    <td width="146" height="24"><?php echo $row['Qul_prof']; ?></td>
</tr>

  <tr align="left">
    <td width="177" height="24" class="href">Domicile:</td>
    <td width="141" height="24"><?php echo $row['Domi']; ?></td>
    <td width="175" height="24" class="href">Date of Joining:</td>
    <td width="146" height="24"><?php echo $row['joining_date']; ?></td>
</tr>

  <tr align="left">
    <td width="177" height="24" class="href"><strong>Date of award of present grade</strong> :</td>
    <td width="141" height="24"><?php echo $row['date_award']; ?></td>
    <td width="175" height="24" class="href"><strong>Date of posting at present school:</strong></td>
    <td width="146" height="24"><?php echo $row['date_pp']; ?></td>
</tr>
  <?php
  }
  ?>
  <tr align="right">
  <td colspan="4"><!--<input type="button" value="Print Here..." name="print" onclick="printpage()" style="background-color:#FFFFFF;" />--></td>
  </tr>

</table>


</td></tr> 
</table>

<script language="Javascript1.2">

  function printpage() {

  window.print();
  
  }

</script>

</body>
</html>
