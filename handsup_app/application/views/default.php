<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">

        <title>Handsup | Dashboard</title>

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

        <header class="header">

            <a href="layouts/index.html" class="logo">

                <!-- Add the class icon to your logo image or logo icon to add the margining -->

                Handsup

            </a>

            <!-- Header Navbar: style can be found in header.less -->

            <nav class="navbar navbar-static-top" role="navigation">

                <!-- Sidebar toggle button-->

                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </a>

                <div class="navbar-right">

                    <ul class="nav navbar-nav">

                      

                        <!-- User Account: style can be found in dropdown.less -->

                        <li class="dropdown user user-menu">

                            <a href="<?php echo base_url();?>admin/login/logout" class="dropdown-toggle">

                                Sign out

                            </a>

                           

                        </li>

                    </ul>

                </div>

            </nav>

        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Left side column. contains the logo and sidebar -->

            <aside class="left-side sidebar-offcanvas">

                <!-- sidebar: style can be found in sidebar.less -->

                <section class="sidebar">

                    <!-- Sidebar user panel -->

                    <div class="user-panel">

                       

                        <div class="pull-left info">

                            <p>Hello, Admin</p>



                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

                        </div>

                    </div>

                   <?php $user_role = $this->session->userdata('user_role');?>

                    <ul class="sidebar-menu">
						
                        <?php if($user_role==1 || $user_role==2){?>
                            <li>
    
                                <a href="<?php echo base_url();?>admin/dashboard">
    
                                    <i class="fa fa-tachometer"></i> <span>Dashboard</span>
    
                                </a>
    
                            </li>
                        <?php }?>
                        <?php if($user_role==1){?>    
                            <li>
    
                                <a href="<?php echo base_url();?>admin/adminUsers">
    
                                    <i class="fa fa-user"></i> <span>Admin Users</span>
    
                                </a>
    
                            </li>
                        <?php }?>
                        <?php if($user_role==1 || $user_role==4){?>
                            <li>
    
                                <a href="<?php echo base_url();?>admin/group">
    
                                    <i class="fa fa-object-group"></i> <span>Groups</span>
    
                                </a>
    
                            </li>
                        <?php }?>
                        <?php if($user_role==1 || $user_role==5){?>
                            <li>
    
                                <a href="<?php echo base_url();?>admin/project">
    
                                    <i class="fa fa-tasks"></i> <span>Projects</span>
    
                                </a>
    
                            </li>
                        
                        <?php }?>
                        <?php if($user_role==1 || $user_role==3){?>
                            <li>
    
                                <a href="<?php echo base_url();?>admin/users">
    
                                    <i class="fa fa-user"></i> <span>Users</span>
    
                                </a>
    
                            </li>
                        <?php }?>
                        <?php if($user_role==1){?>
                            <li>
    
                                <a href="<?php echo base_url();?>admin/categories">
    
                                    <i class="fa fa-list"></i> <span>Categories</span>
    
                                </a>
    
                            </li>
                            
                            <li>
    
                                <a href="<?php echo base_url();?>admin/interest">
    
                                    <i class="fa fa-pinterest"></i> <span>Interest</span>
    
                                </a>
    
                            </li>
                            
                            <li>
    
                                <a href="<?php echo base_url();?>admin/language">
    
                                    <i class="fa fa-calendar"></i> <span>Languages</span>
    
                                </a>
    
                            </li>
    
                            <li>
    
                                <a href="<?php echo base_url();?>admin/skill">
    
                                    <i class="fa fa-asterisk"></i> <span>Skills</span>
    
                                </a>
    
                            </li>
						<?php }?>
                        
                    </ul>

                </section>

                <!-- /.sidebar -->

            </aside>

			<!-- Right side column. Contains the navbar and content of the page -->

            <?php $this->load->view($content);?>

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
			 //Date range picker
             $('.daterange').daterangepicker();
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