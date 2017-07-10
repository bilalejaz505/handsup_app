<?php
include("db.php");

$s_name=$_POST['s_name'];
$f_name=$_POST['f_name'];
$cnic=$_POST['cnic'];
$roll_no=$_POST['roll_no'];
$gender=$_POST['gender'];
$class=$_POST['class'];
$section=$_POST['section'];
$session=$_POST['session'];


$a_id=$_POST['a_id'];
$ed=$_GET['ed'];
$submit=$_POST['submit'];

	if($ed=="true")
	{
	$sql="Update stud_data set s_name='$s_name',f_name='$f_name',cnic='$cnic',roll_no='$roll_no',gender='$gender',class='$class',section='$section',session='$session' where a_id='$a_id'";
		
		mysql_query($sql)or die(mysql_error()); 
		header('location:stud_data.php');
		exit;
		}
		else 
		
		if(isset($_POST['submit']))
{
$s=mysql_query("INSERT INTO stud_data(s_name,f_name,cnic,roll_no,gender,class,section,session) VALUES('$s_name','$f_name','$cnic','$roll_no','$gender','$class','$section','$session')");
//echo $a;
header('location:stud_data.php');
exit;
//mysql_close($con);
}
?>