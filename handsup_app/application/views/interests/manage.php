<aside class="right-side">                

                <!-- Content Header (Page header) -->

                <section class="content-header">

                    <h1>

                        Interests

                    </h1>

                </section>

				<a href="<?php echo base_url();?>admin/interest/add" style="padding: 0 20px;"><button class="btn btn-primary btn-lg">Add Interest</button></a>

                <!-- Main content -->

                <section class="content">

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="box">

                                <div class="box-header">

                                    <h3 class="box-title">Interests</h3>                                    

                                </div><!-- /.box-header -->
								<?php echo ($this->session->flashdata('message') != '' ? $this->session->flashdata('message') : '' );?>
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>English Name</th>

                                                <th>Arabic Name</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        

                                        <?php 

										

										$index = 1;

										foreach($interests as $interest){?>

                                             <tr>

                                             

                                                <td><?php echo $index;?></td>

                                                <td><?php echo $interest->eng_name;?></td>

                                                <td><?php echo $interest->arb_name;?></td>

                                                <td><a href="<?php echo base_url();?>admin/interest/edit/<?php echo $interest->id;?>"><i class="fa fa-fw fa-edit"></i></a><a href="javascript:void(0);" onclick="deleteConfirm('<?php echo base_url();?>admin/interest/deleteData/<?php echo $interest->id;?>')"><i class="fa fa-fw fa-trash-o"></i></a></td>

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