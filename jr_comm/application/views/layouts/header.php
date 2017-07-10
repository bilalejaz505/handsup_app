<!doctype html>
<html>
<head>
<?php
switch($lang){
	
	case 'eng':
	$meta_title= $contents[0]->meta_title_eng;
	$meta_key= $contents[0]->meta_keywords_eng;
	$meta_desc = $contents[0]->meta_desc_eng;
	break;
	case 'arb':
	$meta_title= $contents[0]->meta_title_arb;
	$meta_key= $contents[0]->meta_keywords_arb;
	$meta_desc = $contents[0]->meta_desc_arb;
	}
?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="title" content="<?php echo $meta_title; ?>">
	<meta name="description" content="<?php echo $meta_key; ?>">
	<meta name="keywords" content="<?php echo $meta_desc; ?>">
	<title>Tajeer Finance</title>
    <link href="<?php echo base_url();?>assets/frontend/tajeer/css/animate.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>assets/frontend/tajeer/css/all.css" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo base_url();?>assets/frontend/tajeer/css/jquery-ui.css" rel="stylesheet" type="text/css" media="all">
	<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	
</head>
<body class="<?php echo ($lang == 'eng' ? 'ltr' : '');?>" >
<div id="wrapper">
		<div class="w1">
			<header id="header">
				<div class="holder">
					<a href="#" class="nav-opener"><span></span></a>
					<div class="logo"><a href="<?php echo lang_base_url();?>"><img src="<?php echo base_url();?>assets/frontend/tajeer/images/logo.jpg" alt="Tajeer Finance"></a></div>
					<div class="frame">
						<nav id="nav">
							<select class="lang" onChange="redirect(this.value);">
								<option value="eng" <?php echo ($lang == 'eng' ? 'selected' : '');?>>EN</option>
								<option value="arb" <?php echo ($lang == 'arb' ? 'selected' : '');?>>AR</option>
							</select>
							<ul>
                             <?php echo menus(1,$page_id,$parent_id);?>
								<!--<li><a href="about-us.html">نبذة عنا</a></li>
								<li class="has-drop"><a href="finance-page.html" class="sub-opener">التمويل</a>
									<ul>
										<li><a href="#">حاسبة التمويل</a></li>
										<li><a href="#">تقديم طلب التمويل</a></li>
									</ul>
								</li>
								<li><a href="offers.html">عروضنا</a></li>
								<li class="has-drop"><a href="#" class="sub-opener">خدمات العملاء</a>
									<ul>
										<li><a href="customer-services1.html">السداد</a></li>
										<li><a href="customer-services2.html">التأمين</a></li>
										<li><a href="customer-services3.html">التفويض</a></li>
										<li><a href="customer-services4.html">مبادئ حماية العملاء</a></li>
										<li><a href="customer-services5.html">رسوم الخدمات الإضافية</a></li>
									</ul>
								</li>
								<li><a href="branches.html">فروعنا</a></li>
								<li><a href="contact-us.html">إتصل بنا</a></li>-->
							</ul>
						</nav>
						<div class="contact-bar">
							<!--<ul class="login">
								<li><a href="#"><?php echo ($lang == 'eng' ? 'login' : 'تسجيل الدخول');?></a></li>
								<li><a href="#"><?php echo ($lang == 'eng' ? 'New user' : 'مستخدم جديد');?></a></li>
							</ul> -->
							<a href="tel:<?php echo phone();?>" class="tel"><?php echo phone();?></a>
						</div>
					</div>
				</div>
			</header>
            
 <!-- just defining variable that create problems when we are on other pages -->
<?php echo "<script>
var downpayment_min = '';
var downpayment_min1 = '';
var downpayment_max = '';
var downpayment_max1 = '';
var downpayment_mid = '';
var downpayment_mid1 = '1';
var ballonpayment_min = '';
var ballonpayment_max = '';
var ballonpayment_min1 = '';
var ballonpayment_max1 = '';
var ballonpayment_mid = '';
var ballonpayment_mid1 = '1';
var murabaha = '';
var insurance = '';
var admin_fee = '';
var monthly_income_should_b = '';
var second = '';
var slider_car_price = '50000';
var slider_duration = '3';
var slider_monthly_income = '5000';
var apply_button_click = false;
</script>"; 
?>          