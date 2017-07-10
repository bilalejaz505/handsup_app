<?php
include("db.php");

///////////           staff code change

$stud_code=$_POST['stud_code'];
$std_id=$_POST['std_id'];
$ed=$_GET['ed'];
$submit=$_POST['submit'];

	if($ed=="true")
	{
	$sql="Update code_stud set stud_code='$stud_code' where std_id='$std_id'";
		
		mysql_query($sql)or die(mysql_error()); 
		header('location:code_fix.php');
		exit;
		}
		else 
if(isset($_POST['submit']))
{
$a="INSERT INTO user(stud_code) VALUES('$stud_code')";
//echo $a;
mysql_query($a);
		header('location:code_fix.php');
		exit;
//mysql_close($con);
}
?>
