<aside class="right-side">                

                <!-- Content Header (Page header) -->

                <section class="content-header">

                    <h1>

                        Admin Users

                    </h1>

                </section>
                <!-- Main content -->
                <a href="<?php echo base_url();?>admin/adminUsers/add" style="padding: 0 20px;"><button class="btn btn-primary btn-lg">Add User</button></a>

                <section class="content">

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="box">

                                <div class="box-header">

                                    <h3 class="box-title">Admin Users</h3>                                    

                                </div><!-- /.box-header -->
								<?php echo ($this->session->flashdata('message') != '' ? $this->session->flashdata('message') : '' );?>
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>User Name</th>

                                                <th>User Role</th>
                                                
                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        

                                        <?php 

										

										$index = 1;

										foreach($users as $user){?>

                                             <tr>

                                             

                                                <td><?php echo $index;?></td>

                                                <td><?php echo $user->username;?></td>

                                                <td><?php echo getUserRole($user->user_role_id);?></td>
                                                
                                                <td><a href="<?php echo base_url();?>admin/adminUsers/edit/<?php echo $user->id;?>"><i class="fa fa-fw fa-edit"></i></a><a href="javascript:void(0);" onclick="deleteConfirm('<?php echo base_url();?>admin/adminUsers/deleteData/<?php echo $user->id;?>')"><i class="fa fa-fw fa-trash-o"></i></a></td>

                                            </tr>

                                        <?php 

										$index++;

										}?>

                                        </tbody>

                                        

                                    </table>

                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div>

                    </div>



                </section><!-- /.content -->

            </aside>

<style>

.dataTables_filter label{

	float:right;

}

.dataTables_paginate  ul.pagination{

	float:right;

}

</style>