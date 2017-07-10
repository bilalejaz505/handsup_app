<?php
include("db.php");

$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$fath_name=$_POST['fath_name'];
$gender=$_POST['gender'];
$cnic=$_POST['cnic'];
$dob=$_POST['dob'];
$desig=$_POST['desig'];
$dept=$_POST['dept'];
$relig=$_POST['relig'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$adrs=$_POST['adrs'];
$bps=$_POST['bps'];
$remarks=$_POST['remarks'];
$Qul_acd=$_POST['Qul_acd'];
$Qul_prof=$_POST['Qul_prof'];
$Domi=$_POST['Domi'];
$joining_date=$_POST['joining_date'];
$date_award=$_POST['date_award'];
$date_pp=$_POST['date_pp'];




$sf_id=$_GET['sf_id'];
$ed=$_POST['ed'];
$submit=$_POST['submit'];

	if($ed=="true")
	{
	$sql="Update staff set f_name='$f_name',l_name='$l_name',fath_name='$fath_name',gender='$gender',cnic='$cnic',dob='$dob',desig='$desig',dept='$dept',relig='$relig',mob='$mob',email='$email',adrs='$adrs',bps='$bps',remarks='$remarks',Qul_acd='$Qul_acd',Qul_prof='$Qul_prof',Domi='$Domi',joining_date='$joining_date',date_award='$date_award',date_pp='$date_pp' where sf_id='$sf_id'";
		
		mysql_query($sql)or die(mysql_error()); 
	header('location:view_staff.php');
		exit;
		}
		else 
		
		if(isset($_POST['submit']))
{
$s=mysql_query("INSERT INTO staff(f_name,l_name,fath_name,gender,cnic,dob,desig,dept,relig,mob,email,adrs,bps,remarks,Qul_acd,Qul_prof,Domi,joining_date,date_award,date_pp) VALUES('$f_name','$l_name','$fath_name','$gender','$cnic','$dob','$desig','$dept','$relig','$mob','$email','$adrs','$b_sal','$remarks','$Qul_acd','$Qul_prof','$Domi','$joining_date','$date_award','$date_pp')");
//echo $a;

header('location:view_staff.php');

//mysql_close($con);
}
?>