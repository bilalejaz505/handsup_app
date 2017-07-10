<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Admission Details</title>
<style type="text/css">
<!--
body {
	margin-top: -0px;
}
-->
</style></head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="655" align="center" border="0" cellpadding="0" cellspacing="0">
<tr align="center">
<td colspan="4" >
<?php include('head.php'); ?>
</td>
</tr>
  <tr>
	<?php include('navi_main.html'); ?>
  </tr>

 <tr align="center">
 <td>



<table bgcolor="#FFFFFF">
  <?php
 		$sql="select * from  students where s_id=".$_GET['s_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$s_id=$row['s_id'];	
		?>
<tr align="center" >
	<?php include('navi_stud.html'); ?>  
  </tr>
  <tr>
    <td colspan="4" align="center" >
	
	<b style="font-size:24px; color:#009;"><?php echo $sname=$row['sname']; ?>'s Details</b></td>

  </tr>

   <tr bgcolor="#FFFFFF" align="left">
    <td height="58" colspan="3"><b style="font-size:24px; color:#000000; background-color:#33CC99;">&nbsp;STUDENT BIO-DATA</b></td>
	<td align="center"><img src="photos/<?php echo $row['image']; ?>" width="80" height="70" /></td>
  </tr>
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
      <td width="179" align="left" >&nbsp;&nbsp;Student Name:</td>
      <td  align="left"width="147" class="font1"><?php echo $sname=$row['sname']; ?></td>
      <td width="139" align="left" >Mother's Name:</td>
      <td align="left" width="199" class="font1"><?php echo $mname=$row['mname']; ?></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
      <td width="179" align="left" >&nbsp;&nbsp;Father's Name:</td>
      <td align="left" width="147" class="font1"><?php echo $fname=$row['fname']; ?></td>
      <td width="139" align="left" >Father's CNIC#:</td>
      <td align="left" width="199" class="font1"><?php echo $nic=$row['nic_1']."-".$row['nic_2']."-".$row['nic_3']; ?></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
      <td width="179" align="left" >&nbsp;&nbsp;Gender:</td>
      <td width="147" align="left" class="font1"><?php echo $gender=$row['gender']; ?></td>
      <td width="139" align="left" >Religion:</td>
      <td align="left" width="199" class="font1"><?php echo $relig=$row['relig']; ?></td>
	</tr>
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
      <td width="179" align="left" >&nbsp;&nbsp;Date of Birth:</td>
      <td  align="left"width="147" class="font1"><?php echo $dob=$row['dob']; ?></td>
      <td width="139" align="left" >Occupation:</td>
      <td align="left" width="199" class="font1"><?php echo $accu=$row['accu']; ?></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
      <td width="179" align="left" >&nbsp;&nbsp;Home Tel #:</td>
      <td align="left" width="147" class="font1"><?php echo $tel=$row['tel_1']."-".$row['tel_2']; ?></td>
      <td width="139" align="left" >Mobile #:</td>
      <td align="left" width="199" class="font1"><?php echo $mob=$row['mob_no_1']."-".$row['mob_no_2']; ?></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
      <td width="179" align="left" >&nbsp;&nbsp;E-mail:</td>
      <td align="left" width="147" class="font1"><?php echo $email=$row['email']; ?></td>
      <td width="139" align="left" >Address:</td>
      <td align="left" width="199" class="font1"><?php echo $adrs=$row['adrs']; ?></td>
    </tr>
  <tr align="center" bgcolor="#FFFFFF" class="subheading">
	<td colspan="2" align="left" >&nbsp;&nbsp;Living In Hostel:&nbsp;&nbsp;&nbsp;&nbsp;<span class="font1"><?php echo $hostel=$row['hostel']; ?></span></td>
	<td colspan="2" align="left" class="font1">&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF" align="left" class="subheading">
	<td colspan="4"><b style="font-size:24px; color:#000000; background-color:#33CC99;">&nbsp;PREVIOUS INSTITUTION DATA</b></td>
  </tr>
 <tr align="center" bgcolor="#FFFFFF" class="subheading">
	<td  align="left">&nbsp;&nbsp;Institution Name:</td>
	<td  align="left"class="font1"><?php echo $adname=$row['adname']; ?></td>
	<td align="left">Institution Adm #:</td>
	<td align="left" class="font1"><?php echo $adno=$row['adno']; ?></td>
 </tr>
 <tr align="center" bgcolor="#FFFFFF" class="subheading">
	<td align="left">&nbsp;&nbsp;Certificate Issue Date:</td>
	<td align="left" class="font1"><?php echo $Cdate=$row['Cdate']; ?></td>
	<td align="left">Institution Phone #:</td>
	<td align="left" class="font1"><?php echo $phone=$row['phone_no_1']."-".$row['phone_no_2']; ?></td>
 </tr>
  <tr align="center" bgcolor="#FFFFFF" class="subheading">
	<td align="left">&nbsp;&nbsp;Class:</td>
	<td align="left" class="font1"><?php echo $pclass=$row['pclass']; ?></td>
	<td align="left">Institution Address:</td>
	<td align="left" class="font1"><?php echo $ins_add=$row['ins_add']; ?></td>
 </tr>

   <tr bgcolor="#FFFFFF" class="subheading">
	<td colspan="4" align="left"><b style="font-size:24px; color:#000000; background-color:#33CC99;">&nbsp;FOR OFFICE USE ONLY</b></td>
  </tr>
 <tr align="center" bgcolor="#FFFFFF" class="subheading">
	<td align="left">&nbsp;&nbsp;Date of Admission:</td>
	<td align="left" class="font1"><?php echo $add_date=$row['add_date']; ?></td>
	<td align="left">Adm. In Class:</td>
	<td align="left" class="font1"><?php echo $class=$row['class']; ?></td>
 </tr>
<tr  align="center" bgcolor="#FFFFFF" class="subheading">
<td align="left">&nbsp;&nbsp;Section:</td>
<td  align="left"class="font1"><?php echo $section=$row['section']; ?></td>
<td align="left">Session:</td>
<td align="left" class="font1"><?php echo $session=$row['session']; ?></td>
</tr>
<tr  align="center" bgcolor="#FFFFFF" class="subheading">
<td align="left">&nbsp;&nbsp;Fee Status:</td>
<td align="left" class="font1"><?php echo $fee_status=$row['fee_status']; ?></td>
<td align="left">Admission:</td>
<td align="left" class="font1"><?php echo $adm=$row['adm']; ?></td>
</tr>
<tr class="subheading" align="center" bgcolor="#FFFFFF">
<td colspan="2" align="left">&nbsp;&nbsp;Regist #:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="font1"><?php echo $reg=$row['reg']; ?></span></td>
<td colspan="2" class="font1" align="left">&nbsp;</td>

</tr>
    <tr bgcolor="#FFFFFF">
 <td colspan="4" align="center"><a href="print_copy_stud.php?s_id=<?php echo $row['s_id']; ?>" class="href"><input type="button" name="print" value="Print Copy" class="button" /></a></td>
    </tr>
	<?php
}
?>
</table>


</td></tr></table>
</body>
</html>
