<?php
include("db.php");

///////////           staff code change

$staff_code=$_POST['staff_code'];
$stf_id=$_POST['stf_id'];
$ed=$_GET['ed'];
$submit=$_POST['submit'];

	if($ed=="true")
	{
	$sql="Update code_staff set staff_code='$staff_code' where stf_id='$stf_id'";
		
		mysql_query($sql)or die(mysql_error()); 
		header('location:code_fix.php');
		exit;
		}
		else 
if(isset($_POST['submit']))
{
$a="INSERT INTO user(staff_code) VALUES('$staff_code')";
//echo $a;
mysql_query($a);
		header('location:code_fix.php');
		exit;
//mysql_close($con);
}
?>
