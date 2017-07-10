<html>
<head>

</head>
<body>
<form action="<?php echo URL::to('/'); ?>/users/customUpdate" method="post">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
    <input type="text" name="name" value="<?php echo $data->name; ?>">
    <input type="text" name="email" value="<?php echo $data->email; ?>">
    <input type="text" name="number" value="<?php echo $data->number; ?>">
    <input type="submit">
    <a href="<?php echo URL::to('/'); ?>/users">Back</a>
</form>
</body>
</html>