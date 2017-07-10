<script type="text/javascript">
                     $(document).ready(function () {
        //$("#select").trigger('click');
		$("div.cmsUserContentRow #select").click( function( e ) {
			var i=$(this).val();
			if ($(this).attr('checked')){							
				$("input[name=create_" + i + "]").prop('checked', true);
				$("input[name=read_" + i + "]").prop('checked', true);
				$("input[name=upd_" + i + "]").prop('checked', true);
				$("input[name=del_" + i + "]").prop('checked', true);
				$("input[name=pub_" + i + "]").prop('checked', true);								
			}
			else{
				$("input[name=create_" + i + "]").prop('checked', false);
				$("input[name=read_" + i + "]").prop('checked', false);
				$("input[name=upd_" + i + "]").prop('checked', false);
				$("input[name=del_" + i + "]").prop('checked', false);
				$("input[name=pub_" + i + "]").prop('checked', false);					
			}
			//alert($(this).val());
		});
		//$("div.cmsUserContentRow ")
});</script>

<div class="content_row">            

              <div class="light_shadow_bar"></div>  
              <div class="black_bar_main">             

              <div class="inner_left_wrap">

              <div class="inner_left_heading"><?php echo getsiteTitle(1);?></div>
<div class="inner_left_headingsmalll">Website</div>

</div>            

              <div class="inner_mid_heading">CMS Groups - Edit</div>
               <div class="get_help">Get Help <span style="padding-top:20px; padding-left:8px; float:right"><img src="assets/images/hepl_icon.png" width="20" height="20" /></span></div>

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
                 <?php $pub = $results[0]['grp_pub'];?>
                 <?php echo get_status_bar($pub);?>               
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

                  <?php echo form_open('ems/cmsInnGroups/update_grp',array('method'=>'post','id'=>'site_form'));?>

                  <input type="hidden" value="<?php echo $results[0]['grp_pub'] ;?>" id="pub_val" name="pub_val">

                  <input type="hidden" value="<?php echo $results[0]['id'] ;?>" id="gid" name="gid">

                           <table width="100%" border="0" class="edit_table"> 

  <tr class="gray_row">

    <td>&nbsp;</td>

    <td>

      <!--edit_data_table-->

       <div class="edit_data_table" style="margin-bottom:0px;">
       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1"> Group Title</div>

               <div class="edit_data_table_col2"><input value="<?php echo $results[0]['eng_grp_title'] ;?>" name="eng_web_title" id="eng_web_title" type="text" class="input_field required" /></div>            

             </div>

      </div><!--edit_data_table-->     

        <!--edit_data_table-->

       <div class="edit_data_table" style="margin-top:0px;">       

             <div class="edit_data_table_row">            

               <div class="edit_data_table_col1"> Role</div>

               <div class="cmsUserGridColumn"><div class="cmsUserContentRow">                           

                           <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_style_gray2">

  <tr class="top_row">  

    <td  width="400"  class="text_table_space"> <div class="squaredtwo"><input type="checkbox" style='color:red;' name="checkbox12" id="select_all1" /><label for="select_all1"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> Website</div></td>   

     <td width="120"  class="text_table_space "> <div class="squaredtwo"><input type="checkbox" name="checkbox12" id="select_all2" /><label for="select_all2"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> Create</div></td> 
     <td width="120"  class="text_table_space"><div class="squaredtwo"><input type="checkbox" name="checkbox12" id="select_all4" /><label for="select_all4"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> Update</div></td>
     <td width="120"  class="text_table_space "><div class="squaredtwo"><input type="checkbox" name="checkbox12" id="select_all5" /><label for="select_all5"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;">Delete</div></td>
     <td width="120"  class="text_table_space "><div class="squaredtwo"><input type="checkbox" name="checkbox12" id="select_all6" /><label for="select_all6"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;">Publish</div></td>
     <td width="120"  class="text_table_space "> <div class="squaredtwo"><input type="checkbox" name="checkbox12" id="select_all3" /><label for="select_all3"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Menu</div></td>      

    </tr>

    </tr>

     <?php
	  $count=1;
	  $gid=$this->uri->segment(5);	  
	  foreach($siteList as $result){
//		 print_r($result);

		 foreach($result as $v){

		 ?>

  <tr class="odd">

  

      <td width="400" class="text_table_space" id="select_<?php echo $v['id']?>">

          <input style="visibility:visible;"  value="<?php echo $v['id']?>" type="checkbox" name="select[<?php echo $count?>]" id="select" <?php $val=check2($v['id'],$gid) ; if($val[0]['grp_sec_create']==1 || $val[0]['grp_sec_read']==1 || $val[0]['grp_sec_update']==1 || $val[0]['grp_sec_delete']==1 || $val[0]['grp_sec_pub']==1){ ?> checked="checked"<?php }?> /><label for="<?php echo $v['id']?>"></label><?php echo $v['sec_title']?></td>

    

       <td width="120"  class="text_table_space " >

         <input style="visibility:visible" type="checkbox" name="create_<?php echo $v['id']?>" id="select2" value="1" <?php $val=check2($v['id'],$gid) ; if($val[0]['grp_sec_create']==1){ ?> checked="checked"<?php }?> onclick="hidemaster(1,'<?php echo $v['id']?>');"/><label for="create_<?php echo $v['id']?>"></label></td>

        <td width="120"  class="text_table_space " >

         <input style="visibility:visible" type="checkbox" name="upd_<?php echo $v['id']?>" id="select4" value="1" <?php $val=check2($v['id'],$gid) ; if($val[0]['grp_sec_update']==1){ ?> checked="checked"<?php }?> onclick="hidemaster(1,'<?php echo $v['id']?>');"/><label for="upd_<?php echo $v['id']?>"></label></td>

        <td width="120"  class="text_table_space " >

         <input style="visibility:visible" type="checkbox" name="del_<?php echo $v['id']?>" id="select5" value="1" <?php $val=check2($v['id'],$gid) ; if($val[0]['grp_sec_delete']==1){ ?> checked="checked"<?php }?> onclick="hidemaster(1,'<?php echo $v['id']?>');"/><label for="del_<?php echo $v['id']?>"></label></td>

        <td width="120"  class="text_table_space " style="border:none;">

         <input style="visibility:visible" type="checkbox" name="pub_<?php echo $v['id']?>" id="select6" value="1" <?php $val=check2($v['id'],$gid) ; if($val[0]['grp_sec_pub']==1){ ?> checked="checked"<?php }?> onclick="hidemaster(1,'<?php echo $v['id']?>');"/><label for="pub_<?php echo $v['id']?>"></label></td>
        

        <td width="120"  class="text_table_space " >

         <input style="visibility:visible" type="checkbox" name="read_<?php echo $v['id']?>" id="select3" value="1" <?php $val=check2($v['id'],$gid) ; if($val[0]['grp_sec_read']==1){ ?> checked="checked"<?php }?> onclick="hidemaster(1,'<?php echo $v['id']?>');"/><label for="read_<?php echo $v['id']?>"></label></td>        

  </tr>

         <?php

		  $count++;}

		  }
		  ?>
</table>
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