<?php
session_start();
include("db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<title>login</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
</head>

  		<body style="background-image:url(logos/sms%20logo6.png)">
			<table align="center" id="container" >
				<tr class="mini_tab" align="center">
     	   		   <td>&nbsp;</td>
       	        </tr>
		        <td>
        		<b>   <?php include('head.php'); ?> </b>
        
       		    <table width="272" height="90" align="center" border="0" cellpadding="0" cellspacing="0" id="wraper"  >
					<form method="post" action="validate.php">
    	    		  <tr>
       	        		  <td width="114" height="40" align="center" class="login">Username:</td>
        	       		  <td width="156"><input type="text" value=""  name="user" required="required" class="loginInputBg"/></td>
                    
	
    	             <tr height="20">
        	              <td width="114" align="center" valign="top" class="login">Password:</td>
            	          <td width="156" height="30" valign="top"><input type="password" value="" name="password" required="required" class="loginInputBg"/></td>
    	             </tr>
  	
        	         <tr>
            	         <td colspan="2" align="center" ><input type="submit" name="submit"   class="loginButton" value="Submit"/></td>
                	 </tr>
               	  </form>

                 	<tr height="10">
                    	<td colspan="2" align="center">
                    <?php
                    if(isset($_REQUEST['MSG']))
                       {
                        if($_REQUEST['MSG']!="")
						   {
                     ?>
                  
                   <?php echo "<font color = 'red'>".$_REQUEST['MSG']."</font>";
				   ?>
                   
                   <?php
                            }
                        }
                   ?>
                 </td>
            </tr>
          </tr> 
        </table>
      </td>
    </tr>
        </table>
   </body>
</html>

