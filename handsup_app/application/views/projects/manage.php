<aside class="right-side">                

                <!-- Content Header (Page header) -->

                <section class="content-header">

                    <h1>

                        Projects

                    </h1>

                </section>

				<!-- Main content -->

                <section class="content">

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="box">

                                <div class="box-header">

                                    <h3 class="box-title">Projects</h3>                                    

                                </div><!-- /.box-header -->
								<?php echo ($this->session->flashdata('message') != '' ? $this->session->flashdata('message') : '' );?>
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>Title</th>

                                                <th>Start From</th>
                                                
                                                <th>End At</th>
                                                
                                                <th>Age</th>
                                                
                                                <th>Gender</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        

                                        <?php 

										

										$index = 1;

										foreach($projects as $project){?>

                                             <tr>

                                             

                                                <td><?php echo $index;?></td>

                                                <td><?php echo $project->title;?></td>

                                                <td><?php echo date('d/m/Y', strtotime($project->from_date));?></td>
                                                
                                                <td><?php echo date('d/m/Y', strtotime($project->to_date));?></td>
                                                
                                                <td><?php echo $project->age;?></td>
                                                
                                                <td><?php echo $project->gender;?></td>

                                                <td><a href="<?php echo base_url();?>admin/project/edit/<?php echo $project->id;?>"><i class="fa fa-fw fa-edit"></i></a><a href="javascript:void(0);" onclick="deleteConfirm('<?php echo base_url();?>admin/project/deleteData/<?php echo $project->id;?>')"><i class="fa fa-fw fa-trash-o"></i></a></td>

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