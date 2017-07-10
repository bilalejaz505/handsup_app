<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Interest
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
                    <form role="form" method="post" action="<?php echo base_url();?>admin/interest/update/<?php echo $interest->id;?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="eng_name">English Name</label>
                                <input type="text" class="form-control" id="eng_name" name="eng_name" placeholder="Enter" value="<?php echo $interest->eng_name;?>">
                            </div>
                            <div class="form-group">
                                <label for="cn_name">Arabic Name</label>
                                <input type="text" class="form-control" id="arb_name" name="arb_name" placeholder="Enter" value="<?php echo $interest->arb_name;?>">
                            </div>
                            <div class="form-group">
                               		<img src="<?php echo $interest->image;?>" style="margin: 0 10px;" width="150"/>
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
