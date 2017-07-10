<?php
session_start();
?>
<body background="logos/bg_blue.png">
<?php
include("db.php");
$backurl='index.php';

$user= $_REQUEST['user'];

$pass= $_REQUEST['password'];


		$sql_account=mysql_query("select * from user where user='".$user."' And pass='".$pass."'")or die(mysql_error());
		$row_admin = mysql_num_rows($sql_account);
		$sql_fetch=mysql_fetch_array($sql_account);
		
		//$row_admin;
		
		if ($row_admin > 0)

		{
	$_SESSION['us']='admin';
			echo("<script>location.href = 'index1.php';</script>");
			}
	
			else

			{
	
			$url="Invalid User Name And Password";
	
			$backurl=$backurl.'?MSG='.$url;
	
			//header('Location:'.$backurl);
	
			echo("<script>location.href = '".$backurl."';</script>");
	
			}
			
?>
</body>