<table border="1" width="100%">
    <tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Actions</th>
    </tr>
	<?php foreach($users as $u){ ?>
    <tr>
		<td><?php echo $u['id']; ?></td>
		<td><?php echo $u['name']; ?></td>
		<td><?php echo $u['email']; ?></td>
		<td><?php echo $u['mobile']; ?></td>
		<td>
            <a href="<?php echo base_url('user/edit/'.$u['id']); ?>">Edit</a> |
            <a href="<?php echo base_url('user/remove/'.$u['id']); ?>">Delete</a> 
		</td>
    </tr>

	<?php } ?>
	<a href="<?php echo base_url(); ?>user/add"><button>Add</button></a>

</table>