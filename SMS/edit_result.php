<?php
include("db.php");

 $testId1=$_GET['testId1'];
 $s_name=$_POST['s_name'];
 $class=$_POST['class'];
 $month=$_POST['month'];
 $total=$_POST['total'];
 $eng=$_POST['eng'];
 $urdu=$_POST['urdu'];
 $pak=$_POST['pak'];
 $maths=$_POST['maths'];
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



echo	$sql="update testtable set s_name='$s_name', class='$class',month='$month',total='$total',eng='$eng',urdu='$urdu',pak='$pak',maths='$maths',islam='$islam',phy='$phy',che='$che',science='$science',bio='$bio',elec='$elec',comp='$comp',edu='$edu',civ='$civ',arab='$arab',isl_elec='$isl_elec' WHERE testId=$testId1";
		mysql_query($sql)or die(mysql_error()); 
		
	header('location:view_result.php');
	
//mysql_close($con);

?>