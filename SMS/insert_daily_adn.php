<?php
include("db.php");

$Section=$_POST['Section'];
$Enrollment=$_POST['Enrollment'];
$Class_Name=$_POST['ClassName'];
$Absent=$_POST['Absent'];
$Leave=$_POST['Leave'];
$Sick_leave=$_POST['Sickleave'];
$Present=$_POST['Present'];
$Total=$_POST['Total'];
$Class_Name=$_POST['ClassName'];
$Day=$_POST['Day'];
$Date=$_POST['Date'];


	if($ed=="true")
	{
	$sql="";
		
		mysql_query($sql)or die(mysql_error()); 
	header('location:view_staff.php');
		exit;
		}
		else 
		
		if(isset($_POST['submit']))
{
$s=mysql_query("INSERT INTO stud_attendance(Section,Enrollment,Class_Name,Absent,Leave1,Sick_Leave,Present,Total1,Day,Date) VALUES ('$Section','$Enrollment','$Class_Name','$Absent','$Leave','$Sick_leave','$Present','$Total','$Day','$Date')");
//echo $a;

header('location:DailyAttendance.php');

//mysql_close($con);
}
?>