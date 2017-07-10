<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<form method="post" action="<?php echo base_url();?>api/createProject" enctype="multipart/form-data">
        	<input type="hidden" name="image_count" value="5">
        	<input type="text" name="user_id" value="1">
            <input type="text" name="category_id" value="1">
            <input type="text" name="project_type" value="3">
            <input type="text" name="title" value="Test Project">
            <input type="text" name="to_date" value="2017-06-16">
            <input type="text" name="from_date" value="2017-06-20">
            <input type="text" name="country_id" value="1">
            <input type="text" name="city_id" value="1">
            <input type="text" name="project_description" value="dhfkksdhfk dskf hksdh fkash fkasd">
            <input type="text" name="no_of_volunteers" value="3">
            <input type="text" name="language_ids" value="1,2,3">
            <input type="text" name="gender" value="1">
            <input type="text" name="age" value="21">
            <input type="text" name="skill_ids" value="1,2,3">
            <input type="text" name="video_link" value="http://handsup.schopfen.com/">
            <input type="text" name="active_status" value="1">
            <input type="text" name="latitude" value="31.34534534">
            <input type="text" name="longitude" value="71.35345343">
            <input type="file" name="image1">
            <input type="file" name="image2">
            <input type="file" name="image3">
            <input type="file" name="image4">
            <input type="file" name="image5">
            <input type="submit" value="Submit">
        </form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>