<?php
session_start();
include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Reports</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}

</style>



</head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png" onload="MM_preloadImages('img/deepblue_dayOver.gif','img/lightgreen_dayDown.gif','img/bananasplit_dayDown.gif')">
<table width="664" height="713" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="26" colspan="4" align="center"><font size="+2" color="#000000"><b>Income &amp; Expense Report </b></font></td>
  </tr>

<tr bgcolor="#FFFFFF" align="center">
	<?php include('navi_report.html'); ?>

</tr>

<tr bgcolor="#FFFFFF"><td height="185">
 
<?php
/*$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$desig=$_POST['desig'];
$user=$_POST['user'];
$pass=$_POST['pass'];

if(isset($_POST['submit']))
{
$a="INSERT INTO abc(f_name,l_name,desig,user,pass) VALUES('$f_name','$l_name','$desig','$user','$pass')";
//echo $a;
mysql_query($a);
		header('location:view_user.php');
		exit;
mysql_close($con);
}*/
?>
<script type="text/javascript" src="function.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />

<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">

	window.onload = function(){

		new JsDatePick({

			useMode:2,

			target:"inputField",

			dateFormat:"%Y-%m-%d"

		});

		new JsDatePick({

			useMode:2,

			target:"inputField1",

			dateFormat:"%Y-%m-%d"

		});

	};

function validateForm1()
{
var date_from=document.getElementById("inputField").value;
var date_to=document.getElementById("inputField1").value;
if((date_from == "") || (date_from == null))

	{

  		alert("Please select date from");

  		return false;

  	}

if((date_to == "") || (date_to == null))

	{

  		alert("Please select date to");

  		return false;

  	}
return true;
}

function redirectUser2() {

var date_from=document.getElementById("inputField").value;
var date_to=document.getElementById("inputField1").value;

window.open("print_reports.php?date_from="+date_from+"&date_to="+date_to);

}
</script>

<form name="reportform" method="post" action="reports.php" onsubmit="return validateForm1()">
<table width="509" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="6" align="right" bgcolor="#33CC99"><font color="#FF0000">* Mandatory Fields</font></td>
</tr>
<tr class="href">
<td colspan="6" align="left" bgcolor="#CCCCCC"><b>Select Period</b></td>
</tr>

  <tr>
  <td width="66">&nbsp;</td>
    <td width="108" height="29">* <b>Date From:</b></td>
    <td width="86" height="29"><input type="text" name="date_from" id="inputField" size="10" class="sub_input"/></td>
	<td width="28" >&nbsp;<b>to</b></td>
    <td width="199" height="29"><input type="text" name="date_to" id="inputField1" size="10" class="sub_input"/></td>
</tr>
  
  <tr align="center">
  <td colspan="6"><input type="submit" value="submit"  class="loginButton" /></td>
  </tr>
    <tr>
  <td>&nbsp;</td>
  </tr>
</table>
</form>
	
</td></tr> 

<tr bgcolor="#FFFFFF"><td height="410">

<?php 
									if(isset($_REQUEST['date_from']))

									{

									$date_from=$_REQUEST['date_from'];
									//$date_from1=$date_from." 00:00:00";
									$date_to=$_REQUEST['date_to'];
									//$date_to1=$date_to." 00:00:00";
									if(($date_from!="") && ($date_to!=""))

									{
									
								/*$sql_query = "Select * from income i, expense e where i.date_inc BETWEEN '".$date_from."' AND '".$date_to."' AND e.date_exp BETWEEN '".$date_from."' AND '".$date_to."'";*/
								$sql_query = "Select * from income where date_inc BETWEEN '".$date_from."' AND '".$date_to."'";
								$sql_record=mysql_query($sql_query)or die(mysql_error());

								$sql_total=mysql_num_rows($sql_record);

                   
									if ($sql_total > 0)

									{
									
								?>
<form action="print_reports.php?date_from=<?php echo $r=$row['date_inc']; ?>&date_to=<?php echo $date_inc; ?>" method="post" ></form>
<table width="509" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">
<tr>
<td colspan="3" align="center"><b>Date:</b> <?php echo $date_from; ?> <b>To:</b> <?php echo $date_to; ?></td>
</tr>
<tr>
<td colspan="3" align="left" bgcolor="#33CC99"><table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<!--<input type="hidden" name="date_from" id="date_from" value="<?php //echo $date_from;?>"/><input type="hidden" name="date_to" id="date_to" value="<?php //echo $date_to;?>"/>--><font color="#FF0000" size="+2"><b>Income Status</b></font></td>
</tr>

  <tr class="href">
    <td width="43">&nbsp;</td>
    <td width="306" height="21">Particulars</td>
	<td width="146" >Amount</td>
</tr>
	
 <?php
while($row=mysql_fetch_array($sql_record))
{
$in_id=$row['inid'];
$inc_1=$row['inc_1'];
$cr_inc=$row['cr_inc'];
?>
<tr class="font">
    <td width="43">&nbsp;</td>
    <td width="306" height="21"><?php echo $inc_1; ?></td>
	<td width="146" ><?php echo $cr_inc; ?></td>
</tr>
<?php } ?>
<tr>
<td colspan="3" ><hr /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center"><b>TOTAL INCOME:</b></td>
<td><b><?php $sql="SELECT sum(cr_inc) AS s FROM income where date_inc BETWEEN '".$date_from."' AND '".$date_to."'";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $cr_inc1=$row['s'];
} ?></b></td>
</tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>
<tr>
<td colspan="3" align="left" bgcolor="#33CC99"><font color="#FF0000" size="+2"><b>Expense Status</b></font></td>
</tr>

<!--  <tr class="href">
    <td width="43">&nbsp;</td>
    <td width="306" height="21">Particulars</td>
	<td width="146" >Amount</td>
</tr>-->
 <?php //}}}

$sql="SELECT * FROM expense where date_exp BETWEEN '".$date_from."' AND '".$date_to."'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$exid=$row['exid'];
$exp_1=$row['exp_1'];
$dr_exp=$row['dr_exp'];
?>
<tr class="font">
    <td width="43">&nbsp;</td>
    <td width="306" height="21"><?php echo $exp_1=$row['exp_1']; ?></td>
	<td width="146" ><?php echo $dr_exp=$row['dr_exp']; ?></td>
</tr>
<?php } ?>
<tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center"><b>TOTAL EXPENSE:</b></td>
<td><b><?php $sql="SELECT sum(dr_exp) AS s FROM expense where date_exp BETWEEN '".$date_from."' AND '".$date_to."'";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $dr_exp1=$row['s'];
} ?></b></td>
</tr>
<!--<tr>
<td colspan="3" ><hr /></td>
</tr>

<td>&nbsp;</td>
<td>Total Income</td>
<td><b><?php/* $sql="SELECT sum(cr_inc) FROM income";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $cr_inc1=$row['sum(cr_inc)'];
}*/ ?></b></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>Total Expense</td>
<td><b><?php /*$sql="SELECT sum(dr_exp) FROM expense";
 	$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo $dr_exp1;
}*/ ?></b></td>
</tr>
<tr>-->
<td colspan="3" ><hr /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td class="href">Difference</td>
<td><b><?php echo $grand_total=($cr_inc1)-($dr_exp1); ?></b></td>
</tr>
<tr>
<td colspan="3" ><hr /></td>
</tr>
  <tr align="center">
  <td colspan="3" align="right"><!--<a href="print_reports.php" class="href">-->
  										 <input type="button" id="submit" name="submit" value="Take Print" onclick="redirectUser2()" class="loginButton"/></td>
  </tr>
  
    <tr>
  <td colspan="3">&nbsp;</td>
  </tr>
</table>


</td></tr>

<tr bgcolor="#FFFFFF"><td height="45">
							<?php
								}

								elseif($sql_total ==0) 

								{  

								?>
								<table width="509" border="0" align="center" bgcolor="#CCCCCC" class="mini_tab">

									

									<tr>

										<td width="277" align="center" valign="center">

											<font color="#FF0000"><?php echo  "No such record exist within this date range."; ?></font>										</td>

									</tr>

	  </table>
								
	</td></tr>
<?php
								}
								
								}
								
								}
								?>
								</form>
    <tr bgcolor="#FFFFFF">
  <td>&nbsp;</td>
  </tr>
</table>

<script type="text/javascript">
function print_page()
{
 window.print()
}

function validateForm(frm)

{
var from_date=document.forms["reportform"]["from_date"].value
var to_date=document.forms["reportform"]["to_date"].value


if (from_date == "" || from_date == "null")
{
alert("Please enter Date From");

	return false;
}

if (to_date == "" || to_date == "null")
{
alert("Please enter To Date");

	return false;
}

}

</script>

</body>
</html>
