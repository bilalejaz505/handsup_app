<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Project
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
                    <form role="form" method="post" action="<?php echo base_url();?>admin/project/update/<?php echo $project->id;?>" enctype="multipart/form-data">
                        <div class="box-body">
                        	<div class="form-group">
                                <label for="eng_name">User Name</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter" value="<?php echo $user->full_name;?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="eng_name">Category Name</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter" value="<?php echo $category->eng_name;?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="eng_name">Project Type</label>
                                <select class="form-control" name="project_type">
                                	<option <?php echo ($project->project_type = 1 ? 'selected' : '');?> value="1">One Time</option>
                                    <option <?php echo ($project->project_type = 2 ? 'selected' : '');?> value="2">On Going</option>
                                    <option <?php echo ($project->project_type = 3 ? 'selected' : '');?> value="3">With Funding</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eng_name">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter" value="<?php echo $project->title;?>">
                            </div>
                            <!-- Date range -->
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right daterange" name="date_range" value="<?php echo date('m/d/Y', strtotime($project->from_date));?> - <?php echo date('m/d/Y', strtotime($project->to_date));?>"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label for="eng_name">Country</label>
                                <select class="form-control" name="country_id">
                                	<?php 
									foreach($country as $count){?>
                                	<option <?php echo ($project->country_id = $count['id'] ? 'selected' : '');?> value="<?php echo $count['id'];?>"><?php echo $count['eng_country_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eng_name">City</label>
                                <select class="form-control" name="city_id">
                                	<?php foreach($city as $ct){?>
                                	<option <?php echo ($project->city_id = $ct['id'] ? 'selected' : '');?> value="<?php echo $ct['id'];?>"><?php echo $ct['eng_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cn_name">Project Description</label>
                                <textarea name="project_description" class="form-control" placeholder="Enter"><?php echo $project->project_description;?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="eng_name">Number of Volunteers</label>
                                <input type="text" class="form-control" name="no_of_volunteers" placeholder="Enter" value="<?php echo $project->no_of_volunteers;?>">
                            </div>
                            <div class="form-group">
                                <label for="eng_name">Gender</label>
                                <select class="form-control" name="gender">
                                	<option <?php echo ($project->gender = 1 ? 'selected' : '');?> value="1">Male</option>
                                    <option <?php echo ($project->gender = 0 ? 'selected' : '');?> value="0">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eng_name">Age</label>
                                <input type="text" class="form-control" name="age" placeholder="Enter" value="<?php echo $project->age;?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="eng_name">Video Link</label>
                                <input type="text" class="form-control" name="video_link" placeholder="Enter" value="<?php echo $project->video_link;?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="eng_name">Status</label>
                                <input type="checkbox" <?php echo ($project->active_status = 1 ? 'checked' : '');?> class="form-control" name="active_status">
                            </div>
                            
                            <div class="form-group">
                                <label for="eng_name">Language</label>
                                <select class="form-control" name="language_ids[]" multiple="multiple">
                                	<?php 
									foreach($languages as $language){?>
                                	<option <?php echo (in_array($language['id'], $project_languages) ? 'selected' : '');?> value="<?php echo $language['id'];?>"><?php echo $language['eng_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="eng_name">Skill</label>
                                <select class="form-control" name="skill_ids[]" multiple="multiple">
                                	<?php 
									foreach($skills as $skill){?>
                                	<option <?php echo (in_array($skill['id'], $project_skills) ? 'selected' : '');?> value="<?php echo $skill['id'];?>"><?php echo $skill['eng_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                               <?php foreach($images as $image){?>
                               		<img src="<?php echo $image['image_name'];?>" style="margin: 0 10px;" width="150"/><a href="javascript:void(0);" onclick="deleteConfirm('<?php echo base_url();?>admin/project/deleteImage/<?php echo $image['project_id'];?>/<?php echo $image['id'];?>')"><i class="fa fa-fw fa-trash-o"></i></a>
                               <?php }?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Project Images</label>
                                <input type="file" name="images[]" multiple="multiple" id="exampleInputFile">
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
