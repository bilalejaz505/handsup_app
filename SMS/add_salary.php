<?php
include("db.php");

$stf_name=$_POST['stf_name'];
$stf_desig=$_POST['stf_desig'];
$mon_yr=$_POST['mon_yr'];
$cheq_no=$_POST['cheq_no'];
$sal_date=$_POST['sal_date'];
$sal_1=$_POST['sal_1'];
$sal_2=$_POST['sal_2'];
$sal_3=$_POST['sal_3'];
$sal_4=$_POST['sal_4'];
$sal_5=$_POST['sal_5'];
$sal_6=$_POST['sal_6'];
$sal_7=$_POST['sal_7'];
$sal_8=$_POST['sal_8'];
$sal_9=$_POST['sal_9'];
$sal_10=$_POST['sal_10'];
$total_add=$_POST['total_add'];
$total_ded=$_POST['total_ded'];
$net_sal=$_POST['net_sal'];
$submit=$_POST['submit'];

if(isset($_POST['submit']))
{
$a=mysql_query("INSERT INTO salary(stf_name,stf_desig,mon_yr,cheq_no,sal_date,sal_1,sal_2,sal_3,sal_4,sal_5,sal_6,sal_7,sal_8,sal_9,sal_10,total_add,total_ded,net_sal) VALUES('$stf_name','$stf_desig','$mon_yr','$cheq_no','$sal_date','$sal_1','$sal_2','$sal_3','$sal_4','$sal_5','$sal_6','$sal_7','$sal_8','$sal_9','$sal_10','$total_add','$total_ded','$net_sal')");
echo $a;
		header('location:view_salary.php');
		exit;
//mysql_close($con);
}
?>
