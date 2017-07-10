  <!--middle_body_wrap-->
          <div class="middle_body_wrap">
               
               
               
               <div class="content_row">
               
                 <div class="logo_wrap"><img src="assets/images/logo_backend.png" width="250px" height="56px" /></div>
                 
                 <div class="cms_icon"><img src="assets/images/cms.png" width="70" height="41" /></div>
                 
                 </div>
               
               
               
               
               
             <div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              <div class="login_new">Login</div>
              
              </div>
             
              <div class="black_shadow"></div>
             
             </div>  
             
             
             <!--gray_panel-->
             <div class="gray_panel" >
             
             
               <!--login_panel_box-->
               <div class="login_panel_box">
               
                <div class="website_name_panel">
                  <div class="client_name_heading"><?php echo site_name('1');?> </div>
                  <div class="website_heading"> Website</div>
                </div>
                
                
                
                
                <!--login_formwrap-->
                <div class="login_formwrap">
              
                <?php echo form_open('ems/admin_login/login',array('method'=>'post','id'=>'login_form'));?>
                  <div class="field_row">
                             
                             <div class="field_top_shadow"></div>
                              <div class="filed_input_row"> <input name="username" id="username" type="text"  placeholder="Username" class="required"/></div>
                             
                             </div>
                         
                               <div class="field_row"> 
                              <div class="filed_input_row"> <input name="password" type="password" placeholder="Password" id="password" class="required" /></div>
                              <div class="field_bottom_shadow"></div>
                              
                              </div>
                          
                          
                          <div class="field_row">
                          <div class="forgot_password"><a style="cursor:pointer" id="pop">Forgot password</a>
                           
                          </div>
                          
                         <?php if(validation_errors()){ echo _erMsg2(validation_errors());}
				if($this->session->flashdata('message')) {echo $this->session->flashdata('message');} ?> 
                          
                        
                            <div class="logn_button"><button type="submit" style="background:none; border:none; cursor:pointer" ><img src="assets/images/login_button.png" width="79" height="36" /></button></div>
                          
                          </div>
                 <?php echo form_close();?> 
                </div><!--login_formwrap-->
                
                
                
               
               
               </div><!--login_panel_box-->
             
             </div><!--gray_panel-->
      
            
                
        </div><!--middle_body_wrap-->