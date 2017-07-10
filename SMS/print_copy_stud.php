<?php
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Print Student Admission Form</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style></head>
<script language="Javascript1.2">

  function printpage() {

  window.print();
  
  }

</script>
<link href="style.css" rel="stylesheet"/>
<body>
	<table width="1187" border="0" align="center" cellpadding="0" cellspacing="1">
         &nbsp;&nbsp;
         <tr><td width="596" height="674">
	<table width="580" align="left" border="1" cellpadding="0" cellspacing="0">
			 <tr align="center" bgcolor="#FFFFFF">
		 	 <td height="51" colspan="4"><font color="#000000" size="+1">Zakariyan Educational System Layyah</font></td>
		</tr>
  <?php
 		$sql="select * from  students where s_id=".$_GET['s_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$s_id=$row['s_id'];	
		?>
  <tr bgcolor="#FFFFFF">
    <td height="28" colspan="4" align="right" >
	
	<b style="font-size:18px; color:#009;">ADMISSION&nbsp;LETTER</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Copy</td>
  </tr>
<!--<tr bgcolor="#FFFFFF">
<td height="28" colspan="4"><a href="stud_view.php" class="href"><input type="button" value="Back" style="background-color:#CCCCCC" /></a> </td>
</tr>-->
	<tr bgcolor="#FFFFFF">
    	<td height="58" colspan="3" align="center"><b style="font-size:24px; color:#000000;"><?php echo $sname=$row['sname']; ?></b></td>
		<td align="center"><img src="photos/<?php echo $row['image']; ?>" width="80" height="70" /></td>
  	</tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="148" height="27" align="left" > &nbsp;&nbsp;Mother Name:</td>
        <td width="139"  class="font1"> &nbsp;&nbsp;<?php echo $mname=$row['mname']; ?></td>
	    <td width="144" align="left" > &nbsp;&nbsp;Father's Name:</td>
        <td width="139" class="font1"> &nbsp;&nbsp;<?php echo $fname=$row['fname']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="148" height="28" align="left"> &nbsp;&nbsp;Father's CNIC#:</td>
        <td width="139"  class="font1"> &nbsp;&nbsp;<?php echo $nic=$row['nic_1']."-".$row['nic_2']."-".$row['nic_3']; ?></td>
        <td width="144" align="left" > &nbsp;&nbsp;Occupation:</td>
        <td width="139" class="font1"> &nbsp;&nbsp;<?php echo $accu=$row['accu']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="148" height="25" align="left" > &nbsp;&nbsp;Date of Birth:</td>
        <td width="139"  class="font1"> &nbsp;&nbsp;<?php echo $dob=$row['dob']; ?></td>
        <td width="144" align="left" > &nbsp;&nbsp;Religion:</td>
        <td width="139" class="font1"> &nbsp;&nbsp;<?php echo $relig=$row['relig']; ?></td>
	</tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="148" height="27" align="left" > &nbsp;&nbsp;Gender:</td>
        <td width="139"  align="left" class="font1"> &nbsp;&nbsp;<?php echo $gender=$row['gender']; ?></td>
        <td width="144" align="left" > &nbsp;&nbsp;Home Tel #:</td>
        <td width="139" class="font1"> &nbsp;&nbsp;<?php echo $tel=$row['tel_1']."-".$row['tel_2']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="148" height="27" align="left" > &nbsp;&nbsp;E-mail:</td>
        <td width="139"  class="font1"> &nbsp;&nbsp;<?php echo $email=$row['email']; ?></td>
        <td width="144" align="left" > &nbsp;&nbsp;Mobile #:</td>
        <td width="139" class="font1"> &nbsp;&nbsp;<?php echo $mob=$row['mob_no_1']."-".$row['mob_no_2']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="148" height="26" align="left" > &nbsp;&nbsp;Address:</td>
        <td width="139"  class="font1"> &nbsp;&nbsp;<?php echo $adrs=$row['adrs']; ?></td>
	    <td  > &nbsp;&nbsp;Hostelide:</td>
	    <td  class="font1"> &nbsp;&nbsp;<?php echo $hostel=$row['hostel']; ?></td>
    </tr>
    
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
    </tr>
 
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td  height="30" colspan="4"><b style="font-size:16px; color:#000000;"> &nbsp;&nbsp;PREVIOUS INSTITUTIO DATA:</b></td>	
    </tr>
     
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
	    <td height="42"> &nbsp;&nbsp;Institution Name:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $adname=$row['adname']; ?></td>
	    <td> &nbsp;&nbsp;Institution Adm #:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $adno=$row['adno']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
	    <td height="44"> &nbsp;&nbsp;Certi Issue Date:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $Cdate=$row['Cdate']; ?></td>
	    <td> &nbsp;&nbsp;Institution Phone:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $phone=$row['phone_no_1']."-".$row['phone_no_2']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
	    <td height="44"> &nbsp;&nbsp;Class:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $pclass=$row['pclass']; ?></td>
	    <td> &nbsp;&nbsp;Institution Address:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $ins_add=$row['ins_add']; ?></td>
    </tr>

    <tr bgcolor="#FFFFFF" class="subheading">
        <td height="30" colspan="4"><b style="font-size:16px; color:#000000;"> &nbsp;&nbsp;FOR OFFICE USE ONLY:</b></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td height="28"> &nbsp;&nbsp;Date of Admission:</td>
        <td class="font1"> &nbsp;&nbsp;<?php echo $add_date=$row['add_date']; ?></td>
        <td> &nbsp;&nbsp;Adm. In Class:</td>
        <td class="font1"> &nbsp;&nbsp;<?php echo $class=$row['class']; ?></td>
    </tr>
   
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
       <td height="27"> &nbsp;&nbsp;Section:</td>
       <td class="font1"> &nbsp;&nbsp;<?php echo $section=$row['section']; ?></td>
       <td> &nbsp;&nbsp;Session:</td>
       <td class="font1"> &nbsp;&nbsp;<?php echo $session=$row['session']; ?></td>
    </tr>
   
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
       <td height="25"> &nbsp;&nbsp;Fee Status:</td>
       <td class="font1"> &nbsp;&nbsp;<?php echo $fee_status=$row['fee_status']; ?></td>
       <td> &nbsp;&nbsp;Admission:</td>
       <td class="font1"> &nbsp;&nbsp;<?php echo $adm=$row['adm']; ?></td>
    </tr>
   
    <tr class="subheading" align="center" bgcolor="#FFFFFF">
      <td height="31" colspan="2" align="left"> &nbsp;&nbsp;Regist #:&nbsp;&nbsp;<span class="font1">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $reg=$row['reg']; ?></span></td>
      <td colspan="2" class="font1" align="left">&nbsp;&nbsp;</td>
		<?php
		}
		?>
    </tr>
        <tr bgcolor="#FFFFFF">
        <td height="88" colspan="2" align="center" valign="bottom"><u>Authorized Sign & Stamp</u></td>
        <td height="88" colspan="2" align="center" valign="bottom"><u>Principal Sign</u></td>
    </tr>
</table>



<table width="580" align="right" border="1" cellpadding="0" cellspacing="0">
    <tr align="center" bgcolor="#FFFFFF">
       <td height="51" colspan="4"><font color="#000000" size="+1">Zakariyan Educational System Layyah</font></td>
    </tr>
  		<?php
 		$sql="select * from  students where s_id=".$_GET['s_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$s_id=$row['s_id'];	
		?>
  	<tr bgcolor="#FFFFFF">
        <td height="26" colspan="4" align="left" >
	
	Student Copy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px; color:#009;">ADMISSION&nbsp;LETTER</b></td>
    </tr>

    <tr bgcolor="#FFFFFF">
        <td height="58" colspan="3" align="center"><b style="font-size:24px; color:#000000;"><?php echo $sname=$row['sname']; ?></b></td>
	    <td align="center"><img src="photos/<?php echo $row['image']; ?>" width="80" height="70" /></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="147" height="27" align="left" >&nbsp;&nbsp;Mother's Name:</td>
        <td width="148"  class="font1"> &nbsp;&nbsp;<?php echo $mname=$row['mname']; ?></td>
	    <td width="141" align="left" >&nbsp;&nbsp;Father's Name:</td>
        <td width="134" class="font1"> &nbsp;&nbsp;<?php echo $fname=$row['fname']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="147" height="28" align="left" > &nbsp;&nbsp;Father's CNIC#:</td>
        <td width="148"  class="font1"> &nbsp;&nbsp;<?php echo $nic=$row['nic_1']."-".$row['nic_2']."-".$row['nic_3']; ?></td>
        <td width="141" align="left" > &nbsp;&nbsp;Occupation:</td>
        <td width="134" class="font1"> &nbsp;&nbsp;<?php echo $accu=$row['accu']; ?></td>
    </tr>
    
        <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="147"  height="25" align="left" > &nbsp;&nbsp;Date of Birth:</td>
        <td width="148"   class="font1"> &nbsp;&nbsp;<?php echo $dob=$row['dob']; ?></td>
        <td width="141" align="left" > &nbsp;&nbsp;Religion:</td>
        <td width="134" class="font1"> &nbsp;&nbsp;<?php echo $relig=$row['relig']; ?></td>
	</tr>
    
        <tr align="center" bgcolor="#FFFFFF" class="subheading">
        <td width="147" height="27" align="left" > &nbsp;&nbsp;Gender:</td>
        <td width="148" align="left" class="font1"> &nbsp;&nbsp;<?php echo $gender=$row['gender']; ?></td>
        <td width="141" align="left" > &nbsp;&nbsp;Home Tel #:</td>
        <td width="134" align="left"class="font1"> &nbsp;&nbsp;<?php echo $tel=$row['tel_1']."-".$row['tel_2']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="147" height="27" align="left" > &nbsp;&nbsp;E-mail:</td>
        <td width="148" class="font1"> &nbsp;&nbsp;<?php echo $email=$row['email']; ?></td>
        <td width="141" align="left" > &nbsp;&nbsp;Mobile #:</td>
        <td width="134" class="font1"> &nbsp;&nbsp;<?php echo $mob=$row['mob_no_1']."-".$row['mob_no_2']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td width="147" height="26" align="left" > &nbsp;&nbsp;Address:</td>
        <td width="148" class="font1"> &nbsp;&nbsp;<?php echo $adrs=$row['adrs']; ?></td>
	    <td  > &nbsp;&nbsp;Hostelide:</td>
	    <td  class="font1"> &nbsp;&nbsp;<?php echo $hostel=$row['hostel']; ?></td>
    </tr>
    
    <tr align="center" bgcolor="#FFFFFF" class="subheading">
    </tr>
   
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td  height="30" colspan="4"><b style="font-size:16px; color:#000000;"> &nbsp;&nbsp;PREVIOUS INSTITUTIO DATA:</b></td>	
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
	    <td height="35"> &nbsp;&nbsp;Institution Name:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $adname=$row['adname']; ?></td>
	    <td> &nbsp;&nbsp;Institution Adm #:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $adno=$row['adno']; ?></td>
    </tr>
 
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
	    <td height="45"> &nbsp;&nbsp;Certi Issue Date:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $Cdate=$row['Cdate']; ?></td>
	    <td> &nbsp;&nbsp;Institution Phone:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $phone=$row['phone_no_1']."-".$row['phone_no_2']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
	    <td height="44"> &nbsp;&nbsp;Class:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $pclass=$row['pclass']; ?></td>
	    <td> &nbsp;&nbsp;Institution Address:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $ins_add=$row['ins_add']; ?></td>
    </tr>

    <tr bgcolor="#FFFFFF" class="subheading">
        <td height="30" colspan="4"><b style="font-size:16px; color:#000000;"> &nbsp;&nbsp;FOR OFFICE USE ONLY:</b></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
	    <td height="28"> &nbsp;&nbsp;Date of Admission:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $add_date=$row['add_date']; ?></td>
	    <td> &nbsp;&nbsp;Adm. In Class:</td>
	    <td class="font1"> &nbsp;&nbsp;<?php echo $class=$row['class']; ?></td>
    </tr>
    
    <tr align="left" bgcolor="#FFFFFF" class="subheading">
        <td height="27"> &nbsp;&nbsp;Section:</td>
        <td class="font1"> &nbsp;&nbsp;<?php echo $section=$row['section']; ?></td>
        <td> &nbsp;&nbsp;Session:</td>
        <td class="font1"> &nbsp;&nbsp;<?php echo $session=$row['session']; ?></td>
    </tr>
    
	<tr align="left" bgcolor="#FFFFFF" class="subheading">
		<td height="25"> &nbsp;&nbsp;Fee Status:</td>
		<td class="font1"> &nbsp;&nbsp;<?php echo $fee_status=$row['fee_status']; ?></td>
		<td> &nbsp;&nbsp;Admission:</td>
		<td class="font1"> &nbsp;&nbsp;<?php echo $adm=$row['adm']; ?></td>
	</tr>
    
	<tr class="subheading" align="left" bgcolor="#FFFFFF">
	<td height="31" colspan="2" align="left"> &nbsp;&nbsp;Regist #:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="font1"><?php echo $reg=$row['reg']; ?></span></td>
	<td colspan="2" class="font1" align="left">&nbsp;&nbsp;</td>
		<?php
		}
		?>
	</tr>
    
    <tr bgcolor="#FFFFFF">
		<td height="88" colspan="2" align="center" valign="bottom"><u>Authorized Sign & Stamp</u></td>
      	<td height="88" colspan="2" align="center" valign="bottom"><u>Principal Sign</u></td>
    </tr>
    
	</table>
		</td>
	</tr>
</table>
</body>
</html>
