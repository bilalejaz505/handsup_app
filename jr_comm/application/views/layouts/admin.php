<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo site_name('1');?></title>
<link href="<?php echo base_url();?>assets/css/main_style.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/ico" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/html5.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
 
$(document).ready(function(){
	
$('#submit_form').click(function(){
		
		$('#overlay_form').submit();
		});
$('#overlay_form').validate();		
			
//open popup
$("#pop").click(function(){
$("#overlay_form").fadeIn(1000);
positionPopup();

});

$("#pop2").click(function(){
$("#overlay_form").fadeIn(1000);
positionPopup();
});
 
//close popup
$("#close").click(function(){
$("#overlay_form").fadeOut(500);
});
});
 
//position the popup at the center of the page
function positionPopup(){
if(!$("#overlay_form").is(':visible')){
return;
}
$("#overlay_form").css({
left: ($(window).width() - $('#overlay_form').width()) / 2,
top: ($(window).height() - $('#overlay_form').height()) / 2,
height:170,
width:400,
position:'absolute'
});
}
 
//maintain the popup at center of the page when browser resized
$(window).bind('resize',positionPopup);
 $("#overlay_form").focus();
 
 
 
</script>
</head>

<body>
<form id="overlay_form"  name="overlay_form" style="display:none" method="post" action="ems/admin_login/forgot_password" >
<table width="100%"  border="0" class="edit_table">
	  <tbody>
	   <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php  echo $msg?> </font></td></tr>
	  <tr class="blue_row">
	    <td width="2%">&nbsp;</td>
	    <td width="98%">Forgot Password</td><div class="forgot_button"><a id="close"><img src="assets/images/close.png"></a></div>
	  </tr>
	  <tr class="gray_row">
	    <td>&nbsp;</td>
	    <td>
    
    
    
      <!--edit_data_table-->
       <div class="edit_data_table">
       
       
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Username</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="" name="name" id="name" placeholder="name"></div>
             
             
             </div>
             
               <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Email</div>
               <div class="edit_data_table_col2"><input placeholder="email" type="text" class="input_field required email"  value="" name="email" id="email"></div>
             
             
             </div>
             
               
             
             
             
             
                 <div class="edit_data_table_row">
             
               <div ></div>
               <div class="edit_data_table_coln"><a style="cursor:pointer" id="submit_form"><img src="assets/images/submitBtn.png"></a></div>
             
             
             </div>
               
       
       
       </div><!--edit_data_table-->
    
    
    
    </td>
  </tr>
</tbody></table>


</form>
<div id="wrapper">
<!--header-->
 <div id="header">
   <!--header_wrap-->
    <div id="header_wrap">
    
     <div class="header_blue_line"></div>
    
      <div class="header_shadow"></div>
    
    </div><!--header_wrap-->

     </div><!--header-->


		<!--content-->
        <div id="content">
        {content}
        </div><!--content-->
        
        
        <!--footer-->
        <div id="footer">
        
              <!--footer_wrap-->
              <div class="footer_wrap">
              
              </div> <!--footer_wrap-->   
        
        </div><!--footer-->

   </div>
</body>
</html>
<script language="javascript">
$().ready(function() {
	// validate the comment form when it is submitted
	$("#login_form").validate();

});
</script>