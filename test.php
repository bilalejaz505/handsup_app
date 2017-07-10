<?php
if (isset($_GET['type']) && $_GET['type'] == 'login')
{
	header('Location: mytest.php');
	exit();
}

if (isset($_GET['type']) && $_GET['type'] == 'changepassword')
{
	header('Location: mychangepass.php');
	exit();
}
?>

<html>
<body>
<form method="GET" action="test.php?type=changepassword">
<input type="text" name="name">
<input type="submit" name="submit" value="Save">
</form>
</body>
</html>