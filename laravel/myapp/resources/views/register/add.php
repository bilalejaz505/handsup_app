<html>
<head>

</head>
<body>
<form action="<?php echo URL::to('/'); ?>/users/customSave" method="post">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="text" name="number">
    <input type="submit">
    <a href="<?php echo URL::to('/'); ?>/users">Back</a>
</form>
</body>
</html>