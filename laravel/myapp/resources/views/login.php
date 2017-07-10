<html>
<head>

</head>
<body>
<?php echo ($flash_msg != '' ? $flash_msg : ''); ?>
<br>
<h3>Please login before continuing</h3>
<form action="<?php echo URL::to('/'); ?>/auth/login" method="post">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="text" name="email">
    <input type="submit">
</form>
</body>
</html>