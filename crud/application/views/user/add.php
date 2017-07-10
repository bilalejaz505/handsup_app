<?php echo validation_errors(); ?>

<?php echo form_open('user/add'); ?>

	<div>Name : <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" /></div>
	<div>Email : <input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" /></div>
	<div>Mobile : <input type="tel" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" /></div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>
<a href="<?php echo base_url('user')?>"><buttuon>Back Home</buttuon></a>
