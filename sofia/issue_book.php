<html lang="en">
<?php
session_start();
//require_once('include/header.php');
include "db.php";
?> 						                   
<body class="page-body loaded" data-url="http://neon.dev">
<div class="page-container">
<?php
//require_once('include/sidebar.php');
$selected_book_id = $_REQUEST['id'];
$selected_member_id = $_REQUEST['member_id'];
?> 	
<div class="main-content">		                       		
<div class="row">
	<div class="col-md-6 col-sm-8 clearfix" style="margin-left:3px;">	
		<ul class="user-info pull-left pull-none-xsm">
		<li class="profile-info dropdown" style="margin-top:-6px;">
			<span style="color:#522b76; font-size:14px;">Welcome,</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<strong style="color:#522b76; font-size:14px;">Admin</strong>
			</a>
		<ul class="dropdown-menu">
					
					<!-- Reverse Caret -->
					<li class="caret"></li>
					
					<!-- Profile sub-links -->
					<li>
						<a href="logout.php">
							<i class="glyphicon glyphicon-log-out"></i>
							Logout
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>	
</div>
<hr>									
<br />
<div class="row">
	<div class="col-md-12">
	<h2 style="padding-left:120px;">Issue Books</h2><br><br>
	
				<form role="form" class="form-horizontal form-groups-bordered"  action="" method="post" >				
					<div class="form-group" style="color:black;">
<?php

			if(isset ($_POST['submit']))
			{
			$name=$_POST['name'];
			$member=$_POST['member'];
			$book=$_POST['book'];			
			$mobile=$_POST['mobile'];
			$first=$_POST['first'];			
			$last=$_POST['last'];
			$start = strtotime('first');
			$end = strtotime('last');
			$days_between = ceil(abs($end - $start) / 86400);
			mysql_query("INSERT INTO issue_book set name='$name', member='$member', book='$book', mobile='$mobile', first='$first', last='$last', days='$days_between'");
			}
			?>							
	
						<label for="field-1" class="col-sm-3 control-label">Book Name</label>
						
						<div class="col-sm-5">
						<select class="form-control" name="book" required >
						
								<option value=""> Select</option>
								
<?php

    $query = "SELECT * FROM `book` ";
	$result = mysql_query($query);
	do{
		$row = mysql_fetch_array($result);
		
		if($row){
			
		$id = $row['book_id'];
		$name = $row['name'];				
?>																				
								<option value="<?php echo $name; ?>"> <?php echo $name; ?></option>
<?php  
		}
	}
	while($row);

?>
								</select>
							</div>												
						<br><br><br>
<?php
    $query = "SELECT * FROM `member` where member= '$selected_member_id' ";
	$result = mysql_query($query);

		$row = mysql_fetch_array($result);						
		$name1 = $row['name'];
		$mobile1 = $row['mobile'];			
?>		
						<label for="field-1" class="col-sm-3 control-label">Member ID</label>	
						<span style="text-align:center; color:blue; font-weight:bold;"><?php echo $error;?></span>
						<div class="col-sm-5">
							<input type="text" title="You can use letters." readonly class="form-control" name="member" required value="<?php echo $selected_member_id; ?>"/>
						</div><br><br><br>
						<label for="field-1" class="col-sm-3 control-label">Member Name </label>	
						<div class="col-sm-5">
							<input type="text" title="You can use letters." class="form-control" name="name" required value="<?php echo $name1; ?>"/>
						</div>
						<br><br><br>
						<label for="field-1" class="col-sm-3 control-label">Contact Number </label>	
						<div class="col-sm-5">
							<input type="text" title="You can use letters." class="form-control" name="mobile" required value="<?php echo $mobile1; ?>"/>
						</div>
						<br><br><br>
						<label for="field-1" class="col-sm-3 control-label">Issue</label>						
						<div class="col-sm-5">
							<input type="date" title="You can use date." class="form-control" name="first" required/>
						</div>
						<br><br><br>
						<label for="field-1" class="col-sm-3 control-label">Return</label>						
						<div class="col-sm-5">
							<input type="date" title="You can use date." class="form-control" name="last" required/>
						</div>
						<br><br><br><br><br>
						<div class="col-sm-offset-3 col-sm-5">
						<input value="submit" name="submit" class="btn btn-danger btn-block" type="submit">
						</div>
					</div>				
				</form>						
			</div>
		
		</div>
	
	</div>
</div>
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>
	<script type="text/javascript">
function CallMe(){
var oneDayFine=5;
var dateVariable=document.getElementById('txtDueDate').value;
var dueDate=new Date("dateVariable");
var currentDate=new Date();//Get the current Date
var differenceinDays=Math.Abs(currentDate.getTime()-dueDate.getTime());
if(differenceinDays>0)
{
var totalFine=oneDayFine*differenceinDays;
document.getElementById('txtFine').value=totalFine;
}
else
{
window.alert('No Fine');
}
}
</script>
</body>
</html>