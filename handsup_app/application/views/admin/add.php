<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Admin User
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
                    <form role="form" method="post" action="<?php echo base_url();?>admin/adminUsers/save" enctype="multipart/form-data">
                        <div class="box-body">
                        	<div class="form-group">
                                <label for="status">Active</label>
                                <input type="checkbox" id="status" name="status" checked="checked">
                            </div>
                            <div class="form-group">
                                <label for="full_name">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="country">User Roles</label>
                                <select name="user_role_id" class="form-control">
                                	<?php foreach($roles as $role){?>
                                    	<option value="<?php echo $role->id;?>"><?php echo $role->user_role;?></option>
                                    <?php }?>
                                </select>
                                
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
