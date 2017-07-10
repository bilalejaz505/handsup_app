<html>
<head>

</head>
<body>
<table style="border: solid 1px black;">
<tr><td>Name</td><td><?php echo $data->name; ?></td></tr>
<tr><td>Email</td><td><?php echo $data->name; ?></td></tr>
<tr><td>Number</td><td><?php echo $data->email; ?></td></tr>
<tr><td>Created at</td><td><?php echo $data->created_at; ?></td></tr>
</table>
<a href="<?php echo URL::to('/'); ?>/users">Back</a>
</body>
</html>