<script language="javascript">

       function getGroup(gid){

$('#groupdiv').html('<div><img src="assets/images/loader.gif" height="50"></div>');

$.ajax({

  type: "POST",

  url: "ems/cmsInUsers/getGroupTable",

  data: {gid:gid}

  }).done(function(data) {

	$("#groupdiv").html(data);

 });

		                     

		   



 

}

 $(document).ready(function() {



        $("#pass").click(function() {

            var chars = "ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";

            var string_length = 8;

            var randomstring = '';

            var charCount = 0;

            var numCount = 0;



            for (var i = 0; i < string_length; i++) {

                // If random bit is 0, there are less than 3 digits already saved, and there are not already 5 characters saved, generate a numeric value. 

                if ((Math.floor(Math.random() * 2) == 0) && numCount < 3 || charCount >= 5) {

                    var rnum = Math.floor(Math.random() * 10);

                    randomstring += rnum;

                    numCount += 1;

                } else {

                    // If any of the above criteria fail, go ahead and generate an alpha character from the chars string

                    var rnum = Math.floor(Math.random() * chars.length);

                    randomstring += chars.substring(rnum, rnum + 1);

                    charCount += 1;

                }

            }

            $('#usr_pass').val(randomstring);

//            document.getElementById('usr_pass').Value = "randomstring";

//alert(randomstring);



        });

    });



</script>

<div class="content_row">

             

              <div class="light_shadow_bar"></div>
              <div class="black_bar_main">
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php echo getsiteTitle(1);?></div>
<div class="inner_left_headingsmalll">Website</div>

</div>

              <div class="inner_mid_heading">CMS Users - Add</div>


             <div class="get_help"><a  id="pop">Get Help</a><span style="padding-top:20px; padding-left:8px; float:right"><a  id="pop2"><img src="assets/images/hepl_icon.png" width="20" height="20" /></a></span></div>

               <div class="side_bar_wrap" style="border-left:1px solid #fff;"><span><img src="assets/images/sidebar_icon.png" width="15" height="15" /></span>Sidebar</div>

              </div>


              <div class="black_shadow"></div>

             </div>  

             <!--gray_panel-->

             <div class="inner_gray_panel" >


               <!--side_right-->

               <div class="side_right">


                 <div class="seprator_horizontal"></div>

                 
                 <!-- status bar - start-->  
                 <?php echo get_status_bar();?>               
                 <!-- status bar - end-->
               </div><!--side_right-->

                        <!--middle_content_areainner-->

                       <div class="middle_content_areainner" style="padding-top:0px; min-height:1100px;">

                     <!--inner_menu_bar-->

                       <div class="inner_menu_bar" style="width:22%;">

                     

                       <ul>

                     <li style="z-index:99; width:53%;"><a href="" id="submit" name="submit" >Save</a></li>

                       <li style="z-index:100; left:45%; width:53%;"><a onclick="javascript:history.back();">Cancel</a></li>

                      

                     </ul>

                     

                     </div><!--inner_menu_bar-->

                       

                         <div class="admin_manage_panel" style="padding-top:90px;">

                          

                         <div align="center"><?php if($this->session->flashdata('message')) {echo $this->session->flashdata('message');} ?> </div>

                           

                           <div class="table_content_row">

                  <?php echo form_open('ems/cmsInUsers/add_user',array('method'=>'post','id'=>'site_form'));?>

                  <input type="hidden" value="" id="pub_val" name="pub_val">

                           <table width="100%" border="0" class="edit_table">

  

  <tr class="gray_row">

    <td>&nbsp;</td>

    <td>

      <!--edit_data_table-->

       <div class="edit_data_table" style="margin-bottom:0px;">

             <div class="edit_data_table_row">
               <div class="edit_data_table_col1"> Username:</div>

               <div class="edit_data_table_col2"><input name="usr_uname" id="usr_uname" type="text" class="input_field required" /></div>
             </div>
             <div class="edit_data_table_row">

               <div class="edit_data_table_col1"> Phone No.</div>

               <div class="edit_data_table_col2"><input name="usr_phone" id="usr_phone" type="text" class="input_field required digits" /></div>

             

             

             </div>

             

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1"> Email:</div>

               <div class="edit_data_table_col2"><input name="usr_email" id="usr_email" type="text" class="input_field required email" /></div>

             

             

             </div>

             

             <div class="edit_data_table_row">

            <div class="edit_data_table_col1"> Password:</div>

            <div class="columnCMSUser"><input name="usr_pass" id="usr_pass" type="text" class="inputFieldForVoucher" /></div>

          

          <div class="edit_data_table_col3">

          

       <img id="pass" src="assets/images/generate_password.png" width="108" height="23"border="0" alt="" />

          

          </div>

         

          

          </div>

             

<!--             <div class="edit_data_table_row">-->

<!--            <div class="edit_data_table_col1"> Messages:</div>-->

<!--          <div class="columnForcheckBox">-->

<!--          -->

<!--             <div class="left_allign"><div class="squaredOne"><input name="usr_msg"  id="group"type="radio" value="0" / ><label for="group"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;"> Within Group</div> </div>-->

<!--               <div class="left_allign"><div class="squaredOne"><input name="usr_msg" id="group2" type="radio" value="1" /><label for="group2"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;"> All</div> </div>-->

<!--          -->

<!--          </div>-->

<!--          -->

<!--          -->

<!--                   -->

<!--          </div>-->

             

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Group:</div>

               <div class="edit_data_table_col2">

                  

                  <div class="selected">

                       <select id="usr_grp_id" name="usr_grp_id" onchange="javacsript:getGroup(this.value)" class="required">

                          <option value="">Select</option>

                       <?php foreach($groups as $result=>$val){

						   

						   foreach($val as $value){

						   ?>   

                          <option value="<?php echo $value['id'];?>"><?php echo $value['eng_grp_title'];?></option>

                       <?php 

					     }

					   }?>

                       </select>

                   </div>      

               </div>

             

             

             </div>

             

      </div><!--edit_data_table-->

       

     

        <!--edit_data_table-->

       <div class="edit_data_table" style="margin-top:0px;">

       

       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1"> Role:</div>

               <div class="cmsUserGridColumn"><div class="cmsUserContentRow">

               

              <div id="groupdiv" class="groupdiv"><!-- Table Generated Dynamically -->             

                           <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_style_gray2">

  <tr class="top_row">

  

    <td  width="400"  class="text_table_space"><div class="squaredtwo"> <input value="none" type="checkbox" name="website" /><label for="website"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Sections</div></td>

    

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="website" /><label for="create"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;">Create</div></td>

     

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="website" /><label for="create"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;">Read</div></td>

     

     <td width="120"  class="text_table_space"><div class="squaredtwo"><input value="none" type="checkbox" name="website" /><label for="create"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> Update</div></td>

     

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="website" /><label for="create"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Delete</div></td>

     

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="website" /><label for="create"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Publish</div></td>

     

    </tr>

     

	

	 <?php

	  $count=1;

	  foreach($siteList as $result=>$val){

		 

		

		 ?>

  <tr class="odd">

  

    <td width="400" class="text_table_space"><div class="squaredOne"><input value="<?php echo $val['id']?>" type="checkbox" name="select[<?php echo $count?>]" id="select[<?php echo $count?>]" /><label for="select[<?php echo $count?>]"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> <?php echo $val['sec_title']?></div></td>

    

       <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

         <input type="checkbox" name="create_<?php echo $val['id']?>" id="create_<?php echo $val['id']?>" value="1"/><label for="create_<?php echo $val['id']?>"></label></div>

       </span></td>

        <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

         <input type="checkbox" name="read_<?php echo $val['id']?>" id="read_<?php echo $val['id']?>" value="1"/><label for="read_<?php echo  $val['id']?>"></label></div>

       </span></td>

        <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

         <input type="checkbox" name="upd_<?php echo $val['id']?>" id="upd_<?php echo $val['id']?>" value="1"/><label for="upd_<?php echo $val['id']?>"></label></div>

       </span></td>

        <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

         <input type="checkbox" name="del_<?php echo $val['id']?>" id="del_<?php echo $val['id']?>" value="1"/><label for="del_<?php echo $val['id']?>"></label></div>

       </span></td>

        <td width="120"  class="text_table_space " style="border:none;"><span class="  " ><div class="squaredOne">

         <input type="checkbox" name="pub_<?php echo $val['id']?>" id="pub_<?php echo $val['id']?>" value="1"/><label for="pub_<?php echo $val['id']?>"></label></div>

       </span></td>

  </tr>

         <?php

		  $count++;

		  }

		  

		  ?>

   

 

</table>

</div><!-- Table Generated Dynamically -->

                           

                           </div></div>

             

             

             </div>

             

            

              

     

       

       </div><!--edit_data_table-->

    

       

    </td>

  </tr>

</table>



  <?php echo form_close();?> 

                           

                           </div>

                           

                           

                           

                           

                           

                            

                       

                       

                            

                            

                         </div> 

                            

                 

                         

                       </div><!--middle_content_areainner-->

             