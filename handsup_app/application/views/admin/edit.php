<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Admin User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php echo ($this->session->flashdata('message') != '' ? $this->session->flashdata('message') : '' );?>
                    <form role="form" method="post" action="<?php echo base_url();?>admin/adminUsers/update/<?php echo $user->id;?>" enctype="multipart/form-data">
                        <div class="box-body">
                        	<div class="form-group">
                                <label for="status">Active</label>
                                <input type="checkbox" id="status" name="status" <?php if($user->status == 1){?>checked="checked" <?php }?> <?php if($user->user_role_id == 1){?> disabled="disabled" <?php }?>>
                            </div>
                            <div class="form-group">
                                <label for="full_name">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username?>" disabled="disabled" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="country">User Roles</label>
                                <select name="user_role_id" class="form-control">
                                	<?php foreach($roles as $role){?>
                                    	<option <?php if($user->user_role_id == $role->id){ ?> selected="selected" <?php }?> value="<?php echo $role->id;?>"><?php echo $role->user_role;?></option>
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
