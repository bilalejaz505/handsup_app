<?php

error_reporting(0);
ini_set('display_errors',0);
ob_start();


?>



<?php
include("db.php");

$std_name=$_POST['std_name'];
$f_name=$_POST['f_name'];
$class_sec=$_POST['class11'];
$issue_date=$_POST['issue_date'];
$due_date=$_POST['due_date'];
$tui_fee=$_POST['tui_fee'];
$adm_fee=$_POST['adm_fee'];
$reg_fee=$_POST['reg_fee'];
$misc=$_POST['misc'];
$trip=$_POST['trip'];
$lab=$_POST['lab'];
$comp=$_POST['comp'];
$arre=$_POST['arre'];

$fine=$_POST['fine'];
$pay_aftr_date=$_POST['pay_aftr_date'];

if(isset($_POST['submit']))
{
	$sql="INSERT INTO challan(std_name,f_name,class_sec,issue_date,due_date,tui_fee,adm_fee,reg_fee,misc,trip,lab,comp,arre,fine,pay_aftr_date) VALUES('$std_name','$f_name','$class_sec','$issue_date','$due_date','$tui_fee','$adm_fee','$reg_fee','$misc','$trip','$lab','$comp','$arre','$fine','$pay_aftr_date')";
	$result=mysql_query($sql);
	//echo $result;		
		header('location:get_dues.php');
		exit;
	//mysql_close($con);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enter Dues</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style>
<link href="style.css" rel="stylesheet"/>
</head>

<body background="logos/bg_blue.png">
<table width="655" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"	>
<tr align="center">
<td colspan="4" ><?php include('head.php'); ?>
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
 <td height="521">
 
 
<table width="502" bgcolor="#CCCCCC" border="1" cellpadding="1" cellspacing="0" class="mini_tab"> 

<tr  bgcolor="#CCCCCC">
<td colspan="3" align="center" valign="middle"><font size="+2" color="#000000">Zakariyan Educational System Layyah</font><br />
<font size="+0" color="ff0000"></font></td>
</tr>
<tr align="right">
<td colspan="2"><font color="#FF0000"> Mandatory  Fields</font></td>
</tr>
<form action="challan.php" method="post" name="challan" onsubmit="return validateForm()" onclick="print_dues.php" enctype="multipart/form-data">

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Student Name</td>
    <td width="279" colspan="2"><input type="text" name="std_name"  class="sub_input"/></td>
</tr>

<tr  align="left"  bgcolor="#CCCCCC">
    <td width="213">&nbsp;Father's Name</td>
    <td colspan="2"><input type="text" name="f_name"  class="sub_input"/></td>
</tr>

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Class/Sec</td>
    <td colspan="2"><select name="class11" class="sub_input">
      <?php  
 $sql="select * from class ";
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
    </select></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Issue Date:</td>
    <td colspan="2"><input type="text" name="issue_date" class="sub_input" style="width:150px" id="datepicker-example7" /></td>
</tr>

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Due Date:</td>
    <td colspan="2"><input type="text" name="due_date" class="sub_input" style="width:150px" id="datepicker-example1" /></td>
</tr>

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Tuition Fee (Rs.)</td>
    <td colspan="2"><input type="text" name="tui_fee" class="sub_input" /></td>
</tr>

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Admission Fee (Rs.)</td>
    <td colspan="2"><input type="text" name="adm_fee"  class="sub_input"/></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Registration Fee (Rs.)</td>
    <td colspan="2"><input type="text" name="reg_fee"  class="sub_input"/></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Misc. (Rs.)</td>
    <td colspan="2"><input type="text" name="misc"  class="sub_input"/></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Field Trips (Rs.)</td>
    <td colspan="2"><input type="text" name="trip"  class="sub_input"/></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Laboratory (Rs.)</td>
    <td colspan="2"><input type="text" name="lab"  class="sub_input"/></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Computer (Rs.)</td>
    <td colspan="2"><input type="text" name="comp"  class="sub_input"/></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
   <td width="213">&nbsp;Arrears (Rs.)</td>
   <td colspan="2"><input type="text" name="arre"  class="sub_input"/></td>
</tr> 


 
<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Fine (Rs.)</td>
    <td colspan="2"><input type="text" name="fine"  class="sub_input"/></td>
</tr> 

<tr align="left" bgcolor="#CCCCCC">
    <td width="213">&nbsp;Payable after Due Date (Rs.)</td>
    <td colspan="2"><input type="text" name="pay_aftr_date"  class="sub_input"/></td>
</tr> 

<tr align="right" bgcolor="#CCCCCC">
    <td colspan="3" align="center"><a href="print_dues.php"><input type="submit" name="submit" value="Submit" /></a></td>
</tr>

</form>

</table>

<tr>
<td>&nbsp;</td>
</tr>

</td><td height="2"></tr> 
</table>


<script language="javascript">

function validateForm(frm)

{

var std_name=document.forms["challan"]["std_name"].value
var f_name=document.forms["challan"]["f_name"].value
var class_sec=document.forms["challan"]["class_sec"].value
var issue_date=document.forms["challan"]["issue_date"].value
var due_date=document.forms["challan"]["due_date"].value
var tui_fee=document.forms["challan"]["tui_fee"].value
/*var adm_fee=document.forms["challan"]["adm_fee"].value
var reg_fee=document.forms["challan"]["reg_fee"].value
*/var pay_bfor_date=document.forms["challan"]["pay_bfor_date"].value
var fine=document.forms["challan"]["fine"].value
var pay_aftr_date=document.forms["challan"]["pay_aftr_date"].value


if ((std_name==null) || (std_name==""))

  {

  alert("Please enter Student Name");

  return false;

  //}
  
  if (std_name!="")
{
	var filter=/^[a-zA-Z _]+$/;
	var test_bool = filter.test(std_name);
		if(test_bool==false)
		{
		alert('Please enter only alphabets in Student name');
		return false;
		}
		if (trim(std_name)== "")
		{
		alert('Please enter Student name in correct format');
		return false;
		}
}	}

if ((f_name==null) || (f_name==""))

  {

  alert("Please enter Father Name");

  return false;

  //}
  
  if (f_name!="")
{
	var filter=/^[a-zA-Z _]+$/;
	var test_bool = filter.test(f_name);
		if(test_bool==false)
		{
		alert('Please enter only alphabets in Father name');
		return false;
		}
		if (trim(f_name)== "")
		{
		alert('Please enter Father name in correct format');
		return false;
		}
}	}
if (class_sec == "" || class_sec == "null")
{
alert("Please enter Class/Sec");

	return false;
}
if (issue_date == "" || issue_date == "null")
{
alert("Please enter Issue Date");

	return false;
}
if (due_date == "" || due_date == "null")
{
alert("Please enter Due Date");

	return false;
}

if (tui_fee == "" || tui_fee == "null")
{
alert("Please enter Tuition Fee");

	return false;
}
/*if (adm_fee == "" || adm_fee == "null")
{
alert("Please enter Admission Fee");

	return false;
}
if (reg_fee == "" || reg_fee == "null")
{
alert("Please enter Registration Fee");

	return false;
}
*/
if (pay_bfor_date == "" || pay_bfor_date == "null")
{
alert("Please enter payable before date");

	return false;
}
if (fine == "" || fine == "null")
{
alert("Please enter Fine");

	return false;
}
if (pay_aftr_date == "" || pay_aftr_date == "null")
{
alert("Please enter payable after date");

	return false;
}

}

</script>


</body>
</html>
