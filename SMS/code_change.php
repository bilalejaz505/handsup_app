<?php
include("db.php");

$head_code=$_POST['head_code'];
$hd_id=$_POST['hd_id'];
$ed=$_GET['ed'];
$submit=$_POST['submit'];

	if($ed=="true")
	{
	$sql="Update code_head set head_code='$head_code' where hd_id='$hd_id'";
		
		mysql_query($sql)or die(mysql_error()); 
		header('location:code_fix.php');
		exit;
		}
		else 
if(isset($_POST['submit1']))
{
$a="INSERT INTO user(head_code) VALUES('$head_code')";
//echo $a;
mysql_query($a);
		header('location:code_fix.php');
		exit;
//mysql_close($con);
}

?>
