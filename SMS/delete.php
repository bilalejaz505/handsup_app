<?php
include("db.php");
$del="";
$testId=$_GET['testId'];
if($_GET['testId']!="" && isset($_GET['del']))
	{
		$sql="Delete From testtable Where testId=".$_GET['testId'];
		//echo $sql;
		mysql_query($sql);
		header('location:view_result.php');
		exit;
	}
	
	?>