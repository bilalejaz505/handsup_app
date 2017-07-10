<?php session_start();
if(!isset($_SESSION['us']))
{
	echo("<script>location.href = 'index.php';</script>");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>School  Management  System</title>
<link rel="stylesheet" href="style.css" type="text/css"  />
<style type="text/css">
<!--
body {
	margin-top: 0px;
	background-image:url(logos/bg_blue.png) !important;
}
-->
</style></head>
	<body class="body">
				<table width="687" align="center" border="0" style="margin-top:0px;">
					<tr align="center">
						<td width="681" height="48" colspan="5"  style="background:url(logos/head.jpg) repeat-x;">
								<?php include('head.php'); ?>
                        </td>
					</tr>

					<tr align="center">
								<?php include('navi_main.html'); ?>
					</tr>
					<tr>
						<td height="459" align="center" bgcolor="#009999">

						<table width="511" border="0" align="center" bgcolor="#FFFFFF">
							<tr align="center">
  								<td width="484" >
    								<table>
                                    	<tr><td>
                                    <p><b><font color="#669999" size="+2">"School Management  System&quot;</font></b></p>
    								<p ><strong>INTRODUCTION TO ORGANIZATION</strong></p>
										</td>
                                          <td>&nbsp;</td></tr>
                                        </table>
        							           <p style="margin-left:10px; margin-right:10px; font-size:15px;" align="left">  
                                     		
                                               </strong>Zakariyan Educational System Layyah   is located at multan road near by GPO office Layyah. This institution was 
                                               established in1990. Now it has three campuses, main is working in Layyah and other two are in Kot sultan and Chok Azam. Approximately one thousand 
                                               students are studying in  education system. Every  year at least two hundred students leave the school after matriculation 
                                               and  same students comes in new classes.</p>
        							           <p style="margin-left:10px; margin-right:10px; font-size:15px;" align="left">&nbsp;</p>
        							           <p style="margin-left:10px; margin-right:10px; font-size:15px;" align="left">&nbsp;</p>
				              <p align="center"><b>Bahauddin Zakariya University Multan</b>    						</p></td>
                          </tr>
							<tr align="center">
							  <td >&nbsp;</td>
						  </tr>
					    </table>

</td>
</tr>

</table>
<div style="background-image:url(logos/head.jpg); height:20px; width:685px; margin:0 auto; padding-top:7px;">
<p style="display:inline; color:#FFF; font-size:12px;"> &nbsp;&nbsp;Bahauddin Zakariya University Multan </p>
<p style="display:inline; color:#FFF; font-size:12px; margin-left:140px;">  Copyright © 2015 All Rights Reserved.</p> 

 </div>
</body>
</html>
