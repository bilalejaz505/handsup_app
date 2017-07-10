<?php
include("db.php");

$class=$_POST['class'];
$total=$_POST['total'];
$month=$_POST['month'];
$s_name=$_POST['s_name'];
$eng=$_POST['eng'];
$urdu=$_POST['urdu'];
$maths=$_POST['maths'];
$pak=$_POST['pak'];
$islam=$_POST['islam'];
$phy=$_POST['phy'];
$che=$_POST['che'];
$science=$_POST['science'];
$bio=$_POST['bio'];
$elec=$_POST['elec'];
$comp=$_POST['comp'];
$edu=$_POST['edu'];
$civ=$_POST['civ'];
$arab=$_POST['arab'];
$isl_elec=$_POST['isl_elec'];




	echo 	$sql="INSERT INTO testtable(class,total,month,s_name,eng,urdu,maths,pak,islam,phy,che,science,bio,elec,comp,edu,civ,arab,isl_elec) VALUES('$class','$total','$month','$s_name','$eng','$urdu','$maths','$pak','$islam','$phy','$che','$science','$bio','$elec','$comp','$edu','$civ','$arab','$isl_elec')";
	$result=mysql_query($sql);
 $result;		
		header('location:view_result.php');
		exit;
	mysql_close($con);
//}
?>