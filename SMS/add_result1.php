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
$obtained=$_POST['obtained'];
$total=$_POST['total'];

// $testId=$_POST['testId'];
 $roll_no=$_POST['roll_no'];
// $tid=$_POST['tid'];
// $ad=$_POST['ad'];
$stid=$_GET['a_id'];
 $submit1=$_POST['submit1'];
//$ad=$_POST['ad'];

/*	if($ed=="true")
	{
	 $obtained=$_POST['eng']+$_POST['urdu']+$_POST['maths']+$_POST['pak']+$_POST['islam']+$_POST['science']+$_POST['phy']+$_POST['che']+$_POST['bio']+$_POST['comp']+$_POST['elec'];			

	$sql="Update testtable set month='$month',science='$science',eng='$eng',urdu='$urdu',maths='$maths',pak='$pak',islam='$islam',phy='$phy',che='$che',bio='$bio',comp='$comp',elec='$elec',obtained='$obtained',total='$total'  Where testId='$tid'";
				$ab=mysql_query($sql); if(!$ab) {
		die("Unable to select database");
			}
		//echo $sql;
		
	
	$sql="Update stud_data set  s_name='".$_POST['s_name']."',roll_no='".$_POST['roll_no']."',class='".$_POST['class']."' where  a_id ='$a_id'";

		mysql_query($sql)or die(mysql_error()); 
		header('location:view_result.php');
		exit;
		}
	else */
	//{		 


		///////////get a_id
		$results=mysql_query("select * from stud_data where roll_no ='$roll_no'")or die(mysql_error());
		while($row=mysql_fetch_array($results))
			{
				 $a_id=$_GET['a_id'];
		    }
	if($submit1=="submit1")
{
 $obtained=$_POST['eng']+$_POST['urdu']+$_POST['maths']+$_POST['pak']+$_POST['islam']+$_POST['science']+$_POST['phy']+$_POST['che']+$_POST['bio']+$_POST['comp']+$_POST['elec'];			

$sql="Insert INTO testtable(a_id,month,science,eng,urdu,maths,pak,islam,phy,che,bio,comp,elec,obtained,total) VALUES('$a_id','$month','$science','$eng','$urdu','$maths','$pak','$islam','$phy','$che','$bio','$comp','$elec','$obtained','$total')");
echo $a;
header('location:view_result.php');
//exit;
}
//header('location:view_result.php');
//mysql_close($con);
//}
?>