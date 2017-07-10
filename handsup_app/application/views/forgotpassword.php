<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">

        <title>Handsup | Forgot Password</title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- bootstrap 3.0.2 -->

        <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- font Awesome -->

        <link href="<?php echo base_url();?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Ionicons -->

        <link href="<?php echo base_url();?>assets/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->

        <link href="<?php echo base_url();?>assets/admin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- fullCalendar -->

        <link href="<?php echo base_url();?>assets/admin/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />

        <!-- Daterange picker -->

        <link href="<?php echo base_url();?>assets/admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

        <!-- bootstrap wysihtml5 - text editor -->

        <link href="<?php echo base_url();?>assets/admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme style -->

        <link href="<?php echo base_url();?>assets/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

        <![endif]-->

    </head>

    <body class="skin-blue">

        <!-- header logo: style can be found in header.less -->

        <div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Left side column. contains the logo and sidebar -->


			<!-- Right side column. Contains the navbar and content of the page -->

           <aside class="right-side" style="margin-left:0px !important;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 style="text-align:center;">
                        Forgot Password
                    </h1>
                </section>
            	<?php echo ($this->session->flashdata('message') != '' ? $this->session->flashdata('message') : '' );?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <!-- form start -->
                                <form role="form" method="post" action="<?php echo base_url();?>forgotpassword/save">
                                	<input type="hidden" name="varification_code" value="<?php echo $varification_code;?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter">
                                        </div>
                                        <div class="form-group">
                                            <label for="cnfrm_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="cnfrm_password" name="cnfrm_password" placeholder="Enter">
                                        </div>
                                    </div><!-- /.box-body -->
            
                                    <div class="box-footer" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
            
                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside>


            <!-- /.right-side -->

        </div><!-- ./wrapper -->



        <!-- add new calendar event modal -->





        <!-- jQuery 2.0.2 -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <!-- jQuery UI 1.10.3 -->

        <script src="<?php echo base_url();?>assets/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->

        <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Sparkline -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>

        <!-- jvectormap -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>

        <!-- fullCalendar -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

        <!-- jQuery Knob Chart -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>

        <!-- daterangepicker -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <!-- Bootstrap WYSIHTML5 -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <!-- iCheck -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        

         <!-- DATA TABES SCRIPT -->

        <script src="<?php echo base_url();?>assets/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>



        <!-- AdminLTE App -->

        <script src="<?php echo base_url();?>assets/admin/js/AdminLTE/app.js" type="text/javascript"></script>       

		

        <!-- page script -->

        <script type="text/javascript">

            $(function() {

                $("#example1").dataTable();

            });
			
			function deleteConfirm(url)
			{
				if(confirm('Are you sure you want to delete this record?'))
				{
					window.location.href = url;
				}
			}
        </script>

    </body>

</html>