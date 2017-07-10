<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <?php echo ($this->session->flashdata('message') != '' ? $this->session->flashdata('message') : '' );?>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url();?>admin/users/save" enctype="multipart/form-data">
                        <div class="box-body">
                        	<div class="form-group">
                                <label for="status">Active</label>
                                <input type="checkbox" id="status" name="status">
                            </div>
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" class="form-control" onchange="getCity('<?php echo base_url();?>',this.value);">
                                	<?php foreach($countries as $country){?>
                                    	<option value="<?php echo $country->code;?>"><?php echo $country->eng_country_name;?></option>
                                    <?php }?>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <select name="city" class="cityDropdown form-control">
                                
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Account Type</label>
                                <select name="account_type" class="form-control">
                                    <option value="1">Individual</option>
                                    <option value="0">Group</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InputFile">File input</label>
                                <input type="file" name="image" id="InputFile">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->

            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside>
