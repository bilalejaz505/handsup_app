<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Language
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
                        <h3 class="box-title">Add</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url();?>admin/language/save">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="eng_name">English Name</label>
                                <input type="text" class="form-control" id="eng_name" name="eng_name" placeholder="Enter">
                            </div>
                            <div class="form-group">
                                <label for="cn_name">Arabic Name</label>
                                <input type="text" class="form-control" id="arb_name" name="arb_name" placeholder="Enter">
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
