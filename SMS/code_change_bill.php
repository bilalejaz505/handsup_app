<?php
include("db.php");

///////////           staff code change

$bill_code=$_POST['bill_code'];
$bill_id=$_POST['bill_id'];
$ed=$_GET['ed'];
$submit=$_POST['submit'];

	if($ed=="true")
	{
	$sql="Update code_bill set bill_code='$bill_code' where bill_id='$bill_id'";
		
		mysql_query($sql)or die(mysql_error()); 
		header('location:code_fix.php');
		exit;
		}
		else 
if(isset($_POST['submit']))
{
$a="INSERT INTO user(bill_code) VALUES('$bill_code')";
//echo $a;
mysql_query($a);
		header('location:code_fix.php');
		exit;
//mysql_close($con);
}
?>
