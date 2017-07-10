<?php
include("db.php");

$sname=$_POST['sname'];
$mname=$_POST['mname'];
$fname=$_POST['fname'];
$nic_1=$_POST['nic_1'];
$nic_2=$_POST['nic_2'];
$nic_3=$_POST['nic_3'];
$gender=$_POST['gender'];
$relig=$_POST['relig'];
$dob=$_POST['dob'];
$accu=$_POST['accu'];
$tel_1=$_POST['tel_1'];
$tel_2=$_POST['tel_2'];
$mob_no_1=$_POST['mob_no_1'];
$mob_no_2=$_POST['mob_no_2'];
$email=$_POST['email'];
$hostel=$_POST['hostel'];
$adrs=$_POST['adrs'];
$adname=$_POST['adname'];
$adno=$_POST['adno'];
$pclass=$_POST['pclass'];
$phone_no_1=$_POST['phone_no_1'];
$phone_no_2=$_POST['phone_no_2'];
$Cdate=$_POST['Cdate'];
$ins_add=$_POST['ins_add'];
$sname1=$_POST['sname1'];
$fname1=$_POST['fname1'];
$class1=$_POST['class1'];
$adno1=$_POST['adno1'];
$sname2=$_POST['sname2'];
$fname2=$_POST['fname2'];
$class2=$_POST['class2'];
$adno2=$_POST['adno2'];
$add_date=$_POST['add_date'];
$class=$_POST['class'];
$section=$_POST['section'];
$session=$_POST['session'];
$fee_status=$_POST['fee_status'];
$adm=$_POST['adm'];
$reg=$_POST['reg'];
$image="";

//if(isset($_POST['submit']))
//{

if ($_FILES["img"]["error"] > 0)
  {
  echo "Error: " . $_FILES["img"]["error"] . "<br>";
  }
else
  {
  $image=$_FILES["img"]["name"];
  echo "Upload: " . $_FILES["img"]["name"] . "<br>";
  echo "Type: " . $_FILES["img"]["type"] . "<br>";
  echo "Size: " . ($_FILES["img"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["img"]["tmp_name"];
  if (file_exists("photos/" . $_FILES["img"]["name"]))
      {
      echo $_FILES["img"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["img"]["tmp_name"],"photos/" . $_FILES["img"]["name"]);
      echo "Stored in: " . "photos/" . $_FILES["img"]["name"];
      }
}

echo $image;
		$sql="INSERT INTO students(sname,mname,fname,nic_1,nic_2,nic_3,gender,relig,dob,accu,tel_1,tel_2,mob_no_1,mob_no_2,email,hostel,adrs,image,adname,adno,pclass,phone_no_1,phone_no_2,Cdate,ins_add,sname1,fname1,class1,adno1,sname2,fname2,class2,adno2,add_date,class,section,session,fee_status,adm,reg) VALUES('$sname','$mname','$fname','$nic_1','$nic_2','$nic_3','$gender','$relig','$dob','$accu','$tel_1','$tel_2','$mob_no_1','$mob_no_2','$email','$hostel','$adrs','$image','$adname','$adno','$pclass','$phone_no_1','$phone_no_2','$Cdate','$ins_add','$sname1','$fname1','$class1','$adno1','$sname2','$fname2','$class2','$adno2','$add_date','$class','$section','$session','$fee_status','$adm','$reg')";
	$result=mysql_query($sql);
	echo $result;		
		header('location:stud_view.php');
		exit;
	mysql_close($con);
//}
?>