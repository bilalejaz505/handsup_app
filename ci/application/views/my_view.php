<html>
<form action="<?php echo base_url(); ?>page/save" method="post">
<input type="text" name="name">
<input type="text" name="email">
<input type="submit" value="Save">
</form>
<div>
    <?php foreach ($records as $abc)
    {
     echo $abc->name;echo '<br>';
     echo $abc->email;echo '<br>';
     echo $abc->timestamp;echo '<br>';
    }?>
</div>
</html>