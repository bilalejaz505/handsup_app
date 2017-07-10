<?php echo validation_errors(); ?>

<?php echo form_open('user/edit/'.$user['id']); ?>

	<div>Name : <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $user['name']); ?>" /></div>
	<div>Email : <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" /></div>
	<div>Mobile : <input type="text" name="mobile" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $user['mobile']); ?>" /></div>
	
	<button type="submit">Save</button>


<?php echo form_close(); ?>
	<a href="<?php echo base_url('user/')?>"><buttuon>Back Home</buttuon></a>

