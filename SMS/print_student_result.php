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
</style></head>
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
 <td width="363" height="576" align="center"> 

<table width="360" height="549" border="1" cellpadding="0" cellspacing="1"> 


<tr align="center">
<td height="46" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />

<b><font size="+1">Govt.Nusrat ul Islam Higher Secondary School Multan CanttPh # 9200880</font></b><br />
 
</td>

</tr>
  <?php
 		$sql="select * from  challan where ch_id=".$_GET['ch_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$ch_id=$row['ch_id'];	
		?>
<tr align="left" class="font">
<td width="168" height="20">&nbsp;Student's Name </td>
<td colspan="2" align="center"><?php echo $row['std_name']; ?></td>
</tr>

<tr align="left" class="font">
<td height="25" >&nbsp;Father's Name</td>
<td colspan="2" align="center"><?php echo $row['f_name']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Class/Sec</td>
<td colspan="2" align="center"><?php echo $row['class_sec']; ?></td>
</tr>

<tr align="left" class="font">
<td height="25" >&nbsp;Issue Date</td>
<td width="100" align="center"><?php echo $row['issue_date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="80" align="center">Bill No. </td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Due Date</td>
<td align="center"><?php echo $row['due_date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td align="center"><?php echo $row['ch_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr align="left" class="font">
<td>&nbsp;Bank</td>
<?php
}
		$sql="select * from  code_bill";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$bill_id=$row['bill_id'];	
		?>
<td height="33" colspan="2" align="center"><?php echo $row['bill_code']; ?></td>
<?php 
	}
 		$sql="select * from  challan where ch_id=".$_GET['ch_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$ch_id=$row['ch_id'];
			?>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Tuition Fee</td>
<td colspan="2" align="center"><?php echo $a=$row['tui_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="28" >&nbsp;Admission Fee </td>
<td colspan="2" align="center"><?php echo $b=$row['adm_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Registration Fee </td>
<td colspan="2" align="center"><?php echo $c=$row['reg_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="23" >&nbsp;Misc.</td>
<td colspan="2" align="center"><?php echo $d=$row['misc']; ?></td>
</tr>

<tr align="left" class="font">
<td height="22" >&nbsp;Field Trips</td>
<td colspan="2" align="center"><?php echo $e=$row['trip']; ?></td>
</tr>

<tr align="left" class="font">
<td height="26" >&nbsp;Laboratory</td>
<td colspan="2" align="center"><?php echo $f=$row['lab']; ?></td>
</tr>

<tr align="left" class="font">
<td height="23" >&nbsp;Computer</td>
<td colspan="2" align="center"><?php echo $g=$row['comp']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Arrears</td>
<td colspan="2" align="center"><?php echo $h=$row['arre']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Payable Before Due Date</td>
<td colspan="2" align="center"><?php echo $tot=$a+$b+$c+$d+$e+$f+$g+$h; ?></td>
</tr>

<tr align="left" class="font">
<td height="28" >&nbsp;Fine</td>
<td colspan="2" align="center"><?php echo $fine=$row['fine']; ?></td>
</tr>

<tr align="left" class="font">
<td height="28" >&nbsp;Total</td>
<td colspan="2" align="center"><?php echo $fine+$tot; ?></td>
</tr>

<tr align="left" class="font">
  <td height="26" >&nbsp;Payable After Due Date</td>
  <td colspan="2" align="center"><?php echo $row['pay_aftr_date']+$tot+$fine;; ?></td>
</tr>
<?php

}
?>
<tr>
<td height="82" colspan="3" valign="bottom">Bank's Stamp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorized Sign.</td>
</tr>

</table>


&nbsp;

</td>
<td width="363">


 
<table width="360" height="555" border="1" cellpadding="0" cellspacing="1"> 


<tr align="center">
<td height="46" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<b><font size="+1">Govt.Nusrat ul Islam Higher Secondary School Multan Cantt Ph # 9200880</font></b><br />
  
</td>

</tr>
  <?php
 		$sql="select * from  challan where ch_id=".$_GET['ch_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$ch_id=$row['ch_id'];	
		?>
<tr align="left" class="font">
<td width="168" height="20">&nbsp;Student's Name </td>
<td colspan="2" align="center"><?php echo $row['std_name']; ?></td>
</tr>

<tr align="left" class="font">
<td height="25" >&nbsp;Father's Name</td>
<td colspan="2" align="center"><?php echo $row['f_name']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Class/Sec</td>
<td colspan="2" align="center"><?php echo $row['class_sec']; ?></td>
</tr>

<tr align="left" class="font">
<td height="25" >&nbsp;Issue Date</td>
<td width="100" align="center"><?php echo $row['issue_date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="80" align="center">Bill No. </td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Due Date</td>
<td align="center"><?php echo $row['due_date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td align="center"><?php echo $row['ch_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

<tr align="left" class="font">
<td>&nbsp;Bank</td>
<?php
}
		$sql="select * from  code_bill";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$bill_id=$row['bill_id'];	
		?>
<td height="33" colspan="2" align="center"><?php echo $row['bill_code']; ?></td>
<?php 
	}
 		$sql="select * from  challan where ch_id=".$_GET['ch_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$ch_id=$row['ch_id'];
			?>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Tuition Fee</td>
<td colspan="2" align="center"><?php echo $a=$row['tui_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="28" >&nbsp;Admission Fee </td>
<td colspan="2" align="center"><?php echo $b=$row['adm_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Registration Fee </td>
<td colspan="2" align="center"><?php echo $c=$row['reg_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="23" >&nbsp;Misc.</td>
<td colspan="2" align="center"><?php echo $d=$row['misc']; ?></td>
</tr>

<tr align="left" class="font">
<td height="22" >&nbsp;Field Trips</td>
<td colspan="2" align="center"><?php echo $e=$row['trip']; ?></td>
</tr>

<tr align="left" class="font">
<td height="26" >&nbsp;Laboratory</td>
<td colspan="2" align="center"><?php echo $f=$row['lab']; ?></td>
</tr>

<tr align="left" class="font">
<td height="23" >&nbsp;Computer</td>
<td colspan="2" align="center"><?php echo $g=$row['comp']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Arrears</td>
<td colspan="2" align="center"><?php echo $h=$row['arre']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Payable Before Due Date</td>
<td colspan="2" align="center"><?php echo $tot=$a+$b+$c+$d+$e+$f+$g+$h; ?></td>
</tr>

<tr align="left" class="font">
<td height="28" >&nbsp;Fine</td>
<td colspan="2" align="center"><?php echo $fine=$row['fine']; ?></td>
</tr>
<tr align="left" class="font">
<td height="28" >&nbsp;Total</td>
<td colspan="2" align="center"><?php echo $fine+$tot; ?></td>
</tr>
<tr align="left" class="font">
  <td height="26" >&nbsp;Payable After Due Date</td>
  <td colspan="2" align="center"><?php echo $row['pay_aftr_date']+$tot+$fine;; ?></td>
</tr>
<?php

}
?>
<tr>
<td height="82" colspan="3" valign="bottom">Bank's Stamp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorized Sign.</td>
</tr>

</table>



&nbsp;
</td>
<td width="345">



 
<table width="377" height="560" border="1" cellpadding="0" cellspacing="1"> 


<tr align="center">
<td height="46" colspan="3">Bank's Copy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deposit Cash Only
<br />
<b><font size="+1">Govt.Nusrat ul Islam Higher Secondary School Multan Cantt.</font></b><br />
  
</td>

</tr>
  <?php
 		$sql="select * from  challan where ch_id=".$_GET['ch_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$ch_id=$row['ch_id'];	
		?>
<tr align="left" class="font">
<td width="168" height="20">&nbsp;Student's Name </td>
<td colspan="2" align="center"><?php echo $row['std_name']; ?></td>
</tr>

<tr align="left" class="font">
<td height="25" >&nbsp;Father's Name</td>
<td colspan="2" align="center"><?php echo $row['f_name']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Class/Sec</td>
<td colspan="2" align="center"><?php echo $row['class_sec']; ?></td>
</tr>

<tr align="left" class="font">
<td height="25" >&nbsp;Issue Date</td>
<td width="100" align="center"><?php echo $row['issue_date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="97" align="center">Bill No. </td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Due Date</td>
<td align="center"><?php echo $row['due_date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td align="center"><?php echo $row['ch_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

<tr align="left" class="font">
<td>&nbsp;Bank</td>
<?php
}
		$sql="select * from  code_bill";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$bill_id=$row['bill_id'];	
		?>
<td height="33" colspan="2" align="center"><?php echo $row['bill_code']; ?></td>
<?php 
	}
 		$sql="select * from  challan where ch_id=".$_GET['ch_id']."";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$ch_id=$row['ch_id'];
			?>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Tuition Fee</td>
<td colspan="2" align="center"><?php echo $a=$row['tui_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="28" >&nbsp;Admission Fee </td>
<td colspan="2" align="center"><?php echo $b=$row['adm_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Registration Fee </td>
<td colspan="2" align="center"><?php echo $c=$row['reg_fee']; ?></td>
</tr>

<tr align="left" class="font">
<td height="23" >&nbsp;Misc.</td>
<td colspan="2" align="center"><?php echo $d=$row['misc']; ?></td>
</tr>

<tr align="left" class="font">
<td height="22" >&nbsp;Field Trips</td>
<td colspan="2" align="center"><?php echo $e=$row['trip']; ?></td>
</tr>

<tr align="left" class="font">
<td height="26" >&nbsp;Laboratory</td>
<td colspan="2" align="center"><?php echo $f=$row['lab']; ?></td>
</tr>

<tr align="left" class="font">
<td height="23" >&nbsp;Computer</td>
<td colspan="2" align="center"><?php echo $g=$row['comp']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Arrears</td>
<td colspan="2" align="center"><?php echo $h=$row['arre']; ?></td>
</tr>

<tr align="left" class="font">
<td height="20" >&nbsp;Payable Before Due Date</td>
<td colspan="2" align="center"><?php echo $tot=$a+$b+$c+$d+$e+$f+$g+$h; ?></td>
</tr>

<tr align="left" class="font">
<td height="28" >&nbsp;Fine</td>
<td colspan="2" align="center"><?php echo $fine=$row['fine']; ?></td>
</tr>
<tr align="left" class="font">
<td height="28" >&nbsp;Total</td>
<td colspan="2" align="center"><?php echo $fine+$tot; ?></td>
</tr>

<tr align="left" class="font">
  <td height="26" >&nbsp;Payable After Due Date</td>
  <td colspan="2" align="center"><?php echo $row['pay_aftr_date']+$tot+$fine;; ?></td>
</tr>
<?php

}
?>
<tr>
<td height="82" colspan="3" valign="bottom">Bank's Stamp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorized Sign.</td>
</tr>

</table>



&nbsp;
</td></tr></table>
</body>
</html>
