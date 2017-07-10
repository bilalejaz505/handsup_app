<?php
include("db.php");

$month=$_POST['month'];
$science=$_POST['science'];
$eng=$_POST['eng'];
$urdu=$_POST['urdu'];
$maths=$_POST['maths'];
$pak=$_POST['pak'];
$islam=$_POST['islam'];
$phy=$_POST['phy'];
$che=$_POST['che'];
$bio=$_POST['bio'];
$comp=$_POST['comp'];
$elec=$_POST['elec'];
$total=$_POST['total'];
$roll_no=$_POST['roll_no'];
//$stid=$_POST['s_name'];

		$results=mysql_query("select * from stud_data where roll_no ='$roll_no'")or die(mysql_error());
		while($row=mysql_fetch_array($results))
			{
				 $stid=$row['a_id'];
		    }
			
$obtained=$_POST['eng']+$_POST['urdu']+$_POST['maths']+$_POST['pak']+$_POST['islam']+$_POST['science']+$_POST['phy']+$_POST['che']+$_POST['bio']+$_POST['comp']+$_POST['elec'];			

$sql="Insert INTO testtable (a_id,month,science,eng,urdu,maths,pak,islam,phy,che,bio,comp,elec,obtained,total) VALUES('".$stid."','$month','$science','$eng','$urdu','$maths','$pak','$islam','$phy','$che','$bio','$comp','$elec','$obtained','$total')";

mysql_query($sql) or die(mysql_error());

header('location:view_result.php');
//mysql_close($con);
?>