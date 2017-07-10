<html>
<head>

</head>
<body>
<?php echo $flash_msg; ?>
<br>
<table style="border: solid 1px black;">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user)
    { ?>
        <tr>
            <td style="border: solid 1px black;"><?php echo $user->name; ?></td>
            <td style="border: solid 1px black;"><?php echo $user->email; ?></td>
            <td style="border: solid 1px black;"><?php echo $user->number; ?></td>
            <td style="border: solid 1px black;"><a href="<?php echo URL::to('/'); ?>/users/view/<?php echo $user->id; ?>">view</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo URL::to('/'); ?>/users/edit/<?php echo $user->id; ?>">edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo URL::to('/'); ?>/users/customDeleteSingle/<?php echo $user->id; ?>">delete</a></td>
        </tr>
    <?php }
    ?>
    </tbody>

</table>
<a href="<?php echo URL::to('/'); ?>/users/add">Add</a>
</body>
</html>