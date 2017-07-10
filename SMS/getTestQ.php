<?php

include("db.php");
 $rollNo=$_POST['T3'];
 $tid=$_POST['tid'];
  $ed=$_POST['ed'];
$s_id=$_POST['s_id'];
 $insert=$_POST['insert'];



//if(isset($_GET['testId']))
//{

	if($ed=="ed")
	{

 $obt=$_POST['eng']+$_POST['urdu']+$_POST['maths']+$_POST['pak']+$_POST['islam']+$_POST['science']+$_POST['phy']+$_POST['che']+$_POST['bio']+$_POST['comp']+$_POST['elec'];			

		$sqlw="Update testtable set month='".$_POST['month']."',science='".$_POST['science']."',eng='".$_POST['eng']."',urdu='".$_POST['urdu']."',maths='".$_POST['maths']."',pak='".$_POST['pak']."',islam='".$_POST['islam']."',phy='".$_POST['phy']."',che='".$_POST['che']."',bio='".$_POST['bio']."',comp='".$_POST['comp']."',elec='".$_POST['elec']."',obtained='".$obt."',total='".$_POST['total']."' Where testId='$tid'";
		$ab=mysql_query($sqlw); if(!$ab) {
		die("Unable to select database");
			}
		//echo $sql;
		
	
	$sql="Update students set  sname='".$_POST['T2']."',rollNo='".$_POST['T3']."',class='".$_POST['class']."' where  s_id ='$s_id'";
		
		
		mysql_query($sql)or die(mysql_error()); 
		header('location:testQ.php');
		exit;
	}
	elseif($_GET['testId']!="" && isset($_GET['del']))
	{
		$sql="Delete From testtable Where testId=".$_GET['testId'];
		//echo $sql;
		mysql_query($sql);
		header('location:testQ.php');
		exit;
	}
	else
	{
		$sql="SELECT MAX(testId) as testId From testtable";
		$result=mysql_query($sql);
		$id=0;
		while($row=mysql_fetch_array($result))
		{
			$id=$row['testId'];
			$id=$id+1; 
		}
		if($id==0)
		{
			$id=1;
		}
		 $id;
		
		///////////get sid
		$results=mysql_query("select * from students where s_id ='$s_id'")or die(mysql_error());
		while($row=mysql_fetch_array($results))
			{
				 $stid=$row['s_id'];
		    }

if($insert=="insert")
{		
 $obtained=$_POST['eng']+$_POST['urdu']+$_POST['maths']+$_POST['pak']+$_POST['islam']+$_POST['science']+$_POST['phy']+$_POST['che']+$_POST['bio']+$_POST['comp']+$_POST['elec'];			
			
	$sql="Insert INTO testtable (testId,s_id,month,science,eng,urdu,maths,pak,islam,phy,che,bio,comp,elec,obtained,total)values(".$id.",'".$stid."','".$_POST['month']."','".$_POST['science']."','".$_POST['eng']."','".$_POST['urdu']."','".$_POST['maths']."','".$_POST['pak']."','".$_POST['islam']."','".$_POST['phy']."','".$_POST['che']."','".$_POST['bio']."','".$_POST['comp']."','".$_POST['elec']."','".$obtained."','".$_POST['total']."')";
		$sql;
		mysql_query($sql); 
		header('location:testQ.php');
		exit;
		}
		header('location:testQ.php');
		}

?>
