<html>

<form action="<?php echo base_url();?>page/insert" method="post">
	<label>Name:</label>
	<input type="text" name="name" ><br>
	<label>Email:</label>
	<input type="email" name="email"><br>
	<label>Mobile:</label>
	<input type="tel" name="mobile"><br>
	<input type="submit" value="insert">
</form>
<div>
	<?php foreach ($records as $abc)
	{
		echo $abc->name;echo '<br>';
		echo $abc->email;echo '<br>';
		echo $abc->mobile;echo '<br>';
	}?>
</div>
</html>
