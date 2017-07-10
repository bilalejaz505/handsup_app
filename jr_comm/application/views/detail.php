<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BusinessCommunications - Turnig on Technology</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/frontend/jr_comm/vendor/bootstrap/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet"
          href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;lang=en"/>

    <!-- Plugin CSS -->
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/frontend/jr_comm/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/frontend/jr_comm/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/frontend/jr_comm/vendor/device-mockups/device-mockups.min.css">

    <!-- Theme CSS -->
    <link href="<?php echo base_url(); ?>assets/frontend/jr_comm/css/new-age.min.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
<style>
    .rc-anchor-light {
        background: #f9f9f9;
        border: 1px solid #d3d3d3;
        color: #000;
        margin-left: 14px !important;
    }
</style>

</head>

<body id="page-top">


<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="col-md-12">

            <div class="text-center">
                <?php
                $social = social_links();
                ?>
                <a href="<?php echo $social->soc_fb; ?>" target="_blank"><img width="20px"
                                                              src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/facebook-logo-button.png"
                                                              onmouseover="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/facebook-logo-button-hover.png')"
                                                              onmouseout="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/facebook-logo-button.png')"/></li>
                </a>
                <a href="<?php echo $social->soc_google; ?>" target="_blank"><img width="20px"
                                                                  src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/google-plus.png"
                                                                  onmouseover="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/google-plus-hover.png')"
                                                                  onmouseout="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/google-plus.png')"/></li>
                </a>
                <a href="<?php echo $social->soc_ins; ?>" target="_blank"><img width="20px"
                                                               src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/instagram-logo.png"
                                                               onmouseover="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/instagram-logo-hover.png')"
                                                               onmouseout="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/instagram-logo.png')"/></li>
                </a>
                <a href="<?php echo $social->soc_tw; ?>" target="_blank"><img width="20px"
                                                              src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/twitter-logo-button.png"
                                                              onmouseover="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/twitter-logo-button-hover.png')"
                                                              onmouseout="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/twitter-logo-button.png')"/></li>
                </a>
                <a href="<?php echo $social->soc_lin; ?>" target="_blank"><img width="20px"
                                                               src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/linkedin-button.png"
                                                               onmouseover="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/linkedin-button-hover.png')"
                                                               onmouseout="$(this).attr('src','<?php echo base_url(); ?>assets/frontend/jr_comm/img/linkedin-button.png')"/></li>
                </a>
            </div>

        </div>

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><img width="250px" height="56px"
                                                                      style="margin: -28px 0 0;" class="logo"
                                                                      src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/logo.png"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <?php echo menus('1', $page_id); ?>

                <i class="dropdown search-icon-cc">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i style="color: #0083C1;"
                                                                                  class="fa fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <input type="text" placeholder="Search...." class="form-control"/>
                    </div>
                </i>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php echo $this->session->flashdata('message'); ?>
<div class="container">
    <div style="height:70px;" class="col-md-12">

    </div>
</div>


<div class="jk-slider">
    <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example" data-slide-to="1"></li>
            <li data-target="#carousel-example" data-slide-to="2"></li>
            <li data-target="#carousel-example" data-slide-to="3"></li>
            <li data-target="#carousel-example" data-slide-to="4"></li>
        </ol>

        <div class="carousel-inner">
            <?php
            $i = 0;
            $home_id = getPageIdbyTemplate('home');
            $home_listing = ListingContent($home_id);
            foreach ($home_listing as $home) { ?>
                <div class="item <?php echo($i == 0 ? 'active' : ''); ?>">
                    <div class="hero">
                        <hgroup>
                            <div class="slides-data">
                                <h3 class="mini-font"><?php echo getPageName($home->id); ?></h3>
                                <?php echo content_detail('eng_home_desc', $home->id) ?>
                                <a href="#" class="btn btn-outline btn-xl page-scroll">Get Started</a>
                            </div>
                        </hgroup>

                    </div>
                    <div class="overlay"></div>
                    <a href="#"><img
                            src="<?php echo base_url(); ?>assets/script/<?php echo content_detail('eng_home_image_mkey_hdn', $home->id) ?>"/></a>

                </div>
                <?php $i++;
            }
            ?>

        </div>
        <?php if (count($home_listing) > 1) { ?>
            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        <?php } ?>
    </div>

</div>


<!-- <header id="carousel-example-generic" class="carousel slide" data-ride="carousel">

             <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>


            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="img/slide1.jpg" alt="...">
                <div class="carousel-caption">

                <div class="slides-data">
                 <h3 class="mini-font">A BETTER WAY</h3>
                <h1>LEARN TECHNOLOGY</h1>
                <h3>Nam varius accumsan elementum aliquam</h3><br />
                <a href="#" class="btn btn-outline btn-xl page-scroll">Get Started</a>
                </div>

                </div>



              </div>
              <div class="item">
                <img src="img/slide1.jpg" alt="...">
                <div class="carousel-caption">

                  <div class="slides-data">
                 <h3 class="mini-font">A BETTER WAY</h3>
                <h1>LEARN TECHNOLOGY</h1>
                <h3>Nam varius accumsan elementum aliquam</h3><br />
                <a href="#" class="btn btn-outline btn-xl page-scroll">Get Started</a>
                </div>

                </div>
              </div>

                 <div class="item">
                <img src="img/slide1.jpg" alt="...">
                <div class="carousel-caption">

                  <div class="slides-data">
                 <h3 class="mini-font">A BETTER WAY</h3>
                <h1>LEARN TECHNOLOGY</h1>
                <h3>Nam varius accumsan elementum aliquam</h3><br />
                <a href="#" class="btn btn-outline btn-xl page-scroll">Get Started</a>
                </div>

                </div>
              </div>


                 <div class="item">
                <img src="img/slide1.jpg" alt="...">
                <div class="carousel-caption">

                  <div class="slides-data">
                 <h3 class="mini-font">A BETTER WAY</h3>
                <h1>LEARN TECHNOLOGY</h1>
                <h3>Nam varius accumsan elementum aliquam</h3><br />
                <a href="#" class="btn btn-outline btn-xl page-scroll">Get Started</a>
                </div>

                </div>
              </div>

                 <div class="item">
                <img src="img/slide1.jpg" alt="...">
                <div class="carousel-caption">

                  <div class="slides-data">
                 <h3 class="mini-font">A BETTER WAY</h3>
                <h1>LEARN TECHNOLOGY</h1>
                <h3>Nam varius accumsan elementum aliquam</h3><br />
                <a href="#" class="btn btn-outline btn-xl page-scroll">Get Started</a>
                </div>

                </div>
              </div>

            </div>


            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

  </header> --->


<section id="about" class="text-center">
    <div class="container">
        <div class="row">
            <div style="height: 25px;" class="col-md-12">
            </div>
            <div class="col-md-12">

                <div class="col-md-1"></div>

                <div class="col-md-5 text-center">
                    <?php
                    $about_id = getPageIdbyTemplate('about_us');
                    ?>
                    <center><h1 class="heading-style"><?php echo getPageName($about_id); ?><span
                                class="line-boxes"></span></h1></center>

                    <p class="heading-p"><?php echo content_detail('eng_about_title', $about_id); ?></p>

                    <center><p
                            class="p-onworking"><?php echo strip_tags(content_detail('eng_about_desc', $about_id)); ?></p>
                    </center>
                    <a href="#" class="btn btn-outline btn-xl page-scroll">Learn more</a>

                </div>


                <div class="col-md-5 text-center">
                    <?php if (content_detail('eng_about_image_mkey_hdn', $about_id) != '') { ?>
                        <img style="max-width:460px; width: 100%; border: 2px solid #006ab2;"
                             src="<?php echo base_url(); ?>assets/script/<?php echo content_detail('eng_about_image_mkey_hdn', $about_id) ?>"/>
                    <?php } ?>

                </div>
                <div class="col-md-1"></div>

            </div>
            <div style="height: 40px;" class="col-md-12">
            </div>
            <?php
            $partners_id = getPageIdbyTemplate('comm_partners');
            ?>
            <div class="col-md-12">

                <div class="col-md-1"></div>

                <div class="col-md-5 text-center">

                    <?php if (content_detail('eng_partner_image_mkey_hdn', $partners_id) != '') { ?>
                        <img style="max-width:460px; width: 100%; border: 2px solid #006ab2;"
                             src="<?php echo base_url(); ?>assets/script/<?php echo content_detail('eng_partner_image_mkey_hdn', $partners_id); ?>"/>
                    <?php } ?>

                </div>


                <div class="col-md-5 text-center">

                    <center><h1 class="heading-style"><?php echo getPageName($partners_id); ?><span
                                class="line-boxes-to"></span></h1></center>
                    <p class="heading-p"><?php echo content_detail('eng_partner_title', $partners_id); ?></p>
                    <center><p
                            class="p-onworking-to"><?php echo strip_tags(content_detail('eng_partner_desc', $partners_id)); ?></p>
                    </center>
                    <a href="#" class="btn btn-outline btn-xl page-scroll">Learn more</a>

                </div>
                <div class="col-md-1"></div>

            </div>

        </div>
    </div>
</section>

<section id="products" class="products-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center">
                <?php
                $products_id = getPageIdbyTemplate('products');
                ?>
                <center><h1 class="main-heading-style"><?php echo getPageName($products_id); ?><span
                            class="line-boxes-heading"></span></h1></center>

            </div>
            <div class="col-md-12 text-center">

                <p class="heading-p-to"><?php echo content_detail('eng_product_title', $products_id); ?></p>

            </div>

            <div class="col-md-12 text-center">
                <?php
                $products = ListingContent($products_id);
                foreach ($products as $product) { ?>
                    <div class="col-md-3">
                        <div class="products-images">
                            <img
                                src="<?php echo base_url(); ?>assets/script/<?php echo content_detail('eng_product_image_mkey_hdn', $product->id); ?>"/>
                        </div>
                        <div class="heading-a-text">
                            <p class="products-heading"><?php echo getPageName($product->id); ?></p>
                            <p class="products-text"><?php echo strip_tags(content_detail('eng_product_desc', $product->id)); ?></p>
                        </div>
                    </div>
                <?php }
                ?>

            </div>

            <div style="padding-bottom: 70px;" class="col-md-12 text-center">

            </div>

        </div>
    </div>
</section>

<section id="accessories" style="background-image: url(img/testiom.jpg);" class="accessories-bg">
    <div style="background-color: #0065af; margin: -30px 0; opacity: 0.92;">

        <div style="opacity: 1 !important;" class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php $acc_id = getPageIdbyTemplate('accessories'); ?>
                    <center><h1 class="main-heading-style-white"><?php echo content_detail('eng_acc_title', $acc_id); ?>
                            <span class="line-boxes-heading-white"></span></h1></center>

                </div>

                <div class='col-md-offset-2 col-md-8'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            $i = 0;
                            $acc_listing = ListingContent($acc_id);
                            foreach ($acc_listing as $listing) { ?>
                                <li data-target="#quote-carousel" data-slide-to="<?php echo $i; ?>"
                                    class="<?php echo($i == '0' ? 'active' : ''); ?>"></li>
                                <?php $i++;
                            }
                            ?>
                        </ol>

                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">

                            <!-- Quote 1 -->
                            <?php
                            $i = 0;
                            $acc_listing = ListingContent($acc_id);
                            foreach ($acc_listing as $listing) { ?>
                                <div class="item <?php echo($i == '0' ? 'active' : ''); ?>">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <img class="img-circle"
                                                     src="<?php echo base_url(); ?>assets/script/<?php echo content_detail('eng_acc_image_mkey_hdn', $listing->id); ?>"
                                                     style="width: 100px;height:100px;">
                                                <p class="test-first-line"><?php echo getPageName($listing->id); ?></p>
                                                <p class="test-first-two"><?php echo strip_tags(content_detail('eng_acc_desc', $listing->id)); ?></p>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <?php $i++;
                            } ?>

                        </div>
                        <?php if (count($acc_listing) > 1) { ?>
                            <!-- Carousel Buttons Next/Prev -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i
                                    class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i
                                    class="fa fa-chevron-right"></i></a>
                        <?php } ?>
                    </div>

                </div>

                <div style="padding-bottom: 70px;" class="col-md-12 text-center">

                </div>


            </div>
        </div>
    </div>
</section>

<!--<section id="solutions" class="solutions-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center">
                <?php /*$solutions_id = getPageIdbyTemplate('solutions'); */?>
                <center><h1
                        class="main-heading-sample"><?php /*echo content_detail('eng_solution_title', $solutions_id); */?>
                        <span class="line-boxes-sample"></span></h1></center>

            </div>
            <div class="col-md-12 text-center">

                <p class="heading-p-sample"><?php /*echo strip_tags(content_detail('eng_solution_desc', $solutions_id)); */?></p>

            </div>

            <div class="col-md-12 text-center">

                <div class="col-md-1">

                </div>

                <style>


                </style>

                <div class="col-md-10">

                    <?php
/*                    $i = 0;
                    $solutions = ListingContent($solutions_id);
                    foreach ($solutions as $solution) { */?>
                        <div class="col-md-6 sec">

                            <div class="col-md-3">
                                <div class="icon-sample"><span class="icon-bg-Portfolio"></span></div>
                                <p class="icon-sample-text"><?php /*echo date('jS M', $solution->pro_date); */?></p>
                            </div>
                            <div class="col-md-9 text-left">
                                <h1 class="sample-headings"><?php /*echo getPageName($solution->id); */?></h1>
                                <p class="sample-text"><?php /*echo strip_tags(content_detail('eng_sol_child_desc', $solution->id)); */?></p>
                                <a href="#" class="btn btn-outline btn-xl-to page-scroll">Read more</a>

                            </div>

                        </div>
                        <?php /*if ($i % 2 == 0 && $i == 0) { */?>
                            <div style="padding-bottom: 40px;" class="col-md-6">
                            </div>
                            <div style="padding-bottom: 40px;" class="col-md-6">
                            </div>
                        <?php /*} */?>
                        <?php /*$i++;
                    } */?>


                </div>

                <div class="col-md-1">

                </div>

            </div>

            <div style="padding-bottom: 35px;" class="col-md-12 text-center">

            </div>

        </div>
    </div>
</section>-->


<div class="container-fluid">


    <div style="padding-top: 20px;" class="row">

        <div class="col-md-1"></div>
        <div style="padding-top: 50px;" class="col-md-5">
            <?php $where_id = getPageIdbyTemplate('where_we_are'); ?>
            <h1 class="heading-style-where"><?php echo content_detail('eng_where_title', $where_id); ?><span
                    class="line-boxes-where"></span></h1>

            <p class="p-onworking-where"><?php echo strip_tags(content_detail('eng_where_desc', $where_id)); ?></p>
            <a href="#" class="btn btn-outline btn-xl-where page-scroll">Read more</a>


        </div>
        <div class="col-md-6">
            <img style="max-width: 770px; width: 100%;"
                 src="<?php echo base_url(); ?>assets/script/<?php echo content_detail('eng_where_image_mkey_hdn', $where_id); ?>"/>
        </div>


    </div>

</div>

<section id="contact" class="contact-us">

    <div class="container">
        <form method="post" action="<?php echo base_url(); ?>page/submit">
            <div class="row">

                <div class="col-md-12 text-center">
                    <?php $contact_id = getPageIdbyTemplate('contact_us'); ?>
                    <center><h1 class="main-heading-style-white-to"><?php echo getPageName($contact_id); ?><span
                                class="line-boxes-heading-white-to"></span></h1></center>
                </div>

                <div style="padding-top: 30px;" class="col-md-12 text-center">

                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Name" class="form-control form-re"/>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" placeholder="Email" class="form-control form-re"/>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="company" placeholder="Compnay Name" class="form-control form-re"/>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="phone" placeholder="Phone No." class="form-control form-re"/>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="mobile" placeholder="Mobile No." class="form-control form-re"/>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="address" placeholder="Address" class="form-control form-re"/>
                    </div>

                </div>
                <div style="padding-top: 10px;" class="col-md-12 text-center">
                    <center><textarea name="message"
                                      style="max-width: 97.5% !important; width: 100%; max-height: 160px !important; min-height: 160px !important; height: auto !important;"
                                      class="form-control form-re" placeholder="Message"></textarea>
                    </center>
                    <div class="rc-anchor-light">
                        <div class="g-recaptcha" data-sitekey="6LchXAsUAAAAAFNSBehAnJtN25wDbouaKx-rQoWI"></div>
                    </div>

                    <button type="submit" class="btn btn-outline btn-xl-submit page-scroll">Submit</button>

                </div>

            </div>
        </form>

    </div>


</section>

<section class="contact-us">

    <div class="container">

        <div class="row">


            <div class="col-md-12 text-center">

                <div class="col-md-4">
                    <h3 class="footer-heading"><?php echo getPageName($about_id); ?></h3>
                    <p style="font-size: 17px !important;"
                       class="footer-text"><?php echo strip_tags(content_detail('eng_about_desc', $about_id)); ?></p>
                </div>

                <div class="col-md-4">
                    <h3 class="footer-heading">TWITTER FEED</h3>

                    <p style="float: left;" class="footer-text">
                        <img class="icon-footer-twt"
                             src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/twitter-icon.png"/>
                        <span style="float: left; margin: -2px 0 0 6px; max-width: 92%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum augue sed est porttitor, ac blandit</span>
                    </p>

                    <p style="float: left;" class="footer-text">
                        <img class="icon-footer-twt"
                             src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/twitter-icon.png"/>
                        <span style="float: left; margin: -2px 0 0 6px; max-width: 92%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum augue sed est porttitor, ac blandit</span>
                    </p>

                    <p style="float: left;" class="footer-text">
                        <img class="icon-footer-twt"
                             src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/twitter-icon.png"/>
                        <span style="float: left; margin: -2px 0 0 6px; max-width: 92%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum augue sed est porttitor, ac blandit</span>
                    </p>

                </div>

                <div class="col-md-4">
                    <h3 class="footer-heading">INSTAGRAM</h3>

                    <img style="padding-top:  20px; max-width: 300px ; width: 100%;"
                         src="<?php echo base_url(); ?>assets/frontend/jr_comm/img/travel-world.png"/>

                </div>

            </div>

            <div style="padding-top: 50px;" class="col-md-12">
                <div class="col-md-7">
                    <p class="footer-heading-call"><?php echo strip_tags(content_detail('eng_contact_desc', $contact_id)); ?></p>
                </div>
                <div class="col-md-5">
                    <img style="max-width: 460px !important; width: 100%;"
                         src="<?php echo base_url(); ?>assets/script/<?php echo content_detail('eng_card_image_mkey_hdn', $contact_id); ?>"/>
                </div>
            </div>


        </div>

    </div>

</section>

<footer>
    <div class="container">
        <p class="footer-copyright">2016 &copy; Copyrights All Reserved By JRComms</p>

    </div>
</footer>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/frontend/jr_comm/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/frontend/jr_comm/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/frontend/jr_comm/js/new-age.min.js"></script>


</body>

</html>
