<?php session_start();
if(!isset($_SESSION['us']))
{
	echo("<script>location.href = 'index.php';</script>");
}

?>

<?php
	include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!------------------------------------>
  <link rel="stylesheet" href="public/css/zebra_datepicker.css" type="text/css">
        <link rel="stylesheet" href="examples/public/css/style.css" type="text/css">
       

        <script type="text/javascript" src="examples/public/javascript/jquery-1.7.2.js"></script>

        <script type="text/javascript" src="public/javascript/zebra_datepicker.js"></script>
        <script type="text/javascript" src="examples/public/javascript/functions.js"></script>

        <script type="text/javascript">
            SyntaxHighlighter.defaults['toolbar'] = false;
            SyntaxHighlighter.all();
        </script>
<!--------------------------------------->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Admission Form</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
-->
</style>

</head>
<link href="style.css" rel="stylesheet"/>
<body background="logos/bg_blue.png">
<table width="655" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td width="670" colspan="4"><?php include('head.php'); ?>
		</td>
	</tr>

    <tr>
		<?php include('navi_main.html'); ?>
    </tr>
    
    <tr align="center" bgcolor="#FFFFFF">
		<?php include('navi_stud.html'); ?>  
    </tr>
    
    <tr bgcolor="#FFFFFF">
       <td colspan="4" align="center" ><b style="font-size:24px; color:#009;">STUDENT DATA</b></td>
    </tr>
    
    <tr>
  		<td>
			 <tr align="center">
        <td>
			 <table bgcolor="#FFFFFF"  style="padding-left:10px; padding-right:10px;">
                <tr bgcolor="#FFFFFF" align="left">
                   <td colspan="4"><b style="font-size:24px; color:#000000; background-color:#33CC99;">STUDENT BIO-DATA</b></td>
                </tr>
  <form method="post" name="studentform" action="add_stud_data.php" onsubmit='return validateForm();'  enctype="multipart/form-data">
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
      				<td width="140"  align="left">Student Name:</td>
     			    <td width="174"  align="left"><input type="text" value="" name="sname" class="sub_input" " style="width:130px" />  </td>
                    <td width="152"  align="left">Mother's Name:</td>
                    <td width="198"  align="left"><input type="text" value="" name="mname" class="sub_input" " style="width:130px" /></td>
                </tr>
                
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
                    <td width="140" align="left">Father's Name:</td>
                    <td width="174" align="left"><input type="text" value="" name="fname" class="sub_input" " style="width:130px" /></td>
                    <td width="152" align="left">Father's CNIC#:</td>
                    <td width="198" align="left"><input type="text" name="nic_1" maxlength="5" size="3" value="" onkeyup= 					"moveOnMax(this,'nic_2')" class="sub_input"/>-&nbsp;<input type="text" size="5" name="nic_2" value="" class="sub_input" maxlength="7" onkeyup="moveOnMax(this,'nic_3')"/>-&nbsp;<input type="text" size="1" name="nic_3" maxlength="1" value="" class="sub_input"/>
	  <br />
	  <font color="#FF0000">eg. 12345-1234567-8</font>
	                </td>
                </tr>
    
	            <tr align="center" bgcolor="#FFFFFF" class="subheading">
                     <td width="140" align="left">Gender:</td>
                     <td width="174" align="center">
  <input type="radio" name="gender" checked="checked" value="Male" /> Male  <input type="radio" name="gender" value="Female" /> Female  </td>
                     <td width="152"  align="left">Religion:</td>
                     <td width="198"  align="left"><input type="text" name="relig" value="" class="sub_input" required="required" " style="width:130px" /></td>
	            </tr>
                
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
                   <td width="140"  align="left">Date of Birth:</td>
                   <td  width="174" align="left"><input type="text" value="" style="width:135px" name="dob" class="sub_input" required="required" id="datepicker-example7" /></td>
                   <td width="152"  align="left">Occupation:</td>
                   <td width="198"  align="left"><input type="text" value="" name="accu" class="sub_input" required="required" " style="width:130px" /></td>
                </tr>
                
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
                   <td width="140" align="left">Home Tel #:</td>
                   <td width="174" align="left"><input type="text" maxlength="3" size="3" name="tel_1" value=""  class="sub_input" onkeyup="moveOnMax(this,'tel_2')"/>-&nbsp;<input type="text" size="7" name="tel_2" value="" maxlength="7" class="sub_input"/>
<br />
<font color="#FF0000">eg. 061-1234567</font></td>
                   <td width="152"  align="left">Mobile #:</td>
                   <td width="198"  align="left"><input type="text" maxlength="4" size="3" name="mob_no_1" value="" class="sub_input" onkeyup="moveOnMax(this,'mob_no_2')"/>-&nbsp;<input type="text" name="mob_no_2" maxlength="7" size="7" value="" class="sub_input" id="mob_no_2"/>
	  <br />
	                 <font color="#FF0000">eg. 03009639034</font></td>
                </tr>
                
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
                    <td width="140" align="left">E-mail:</td>
                    <td width="174" align="left"><input type="text" value="" name="email" class="sub_input" required="required" " style="width:130px" /></td>
                    <td width="152" align="left">Address:</td>
                    <td width="198" align="left"><input type="text" name="adrs" value="" class="sub_input" " style="width:130px"/></td>
                </tr>
                
                <tr align="left" bgcolor="#FFFFFF" class="subheading">
	                <td >Living In Hostel:</td>
	                <td ><select name="hostel" class="sub_input">
                         <option value="Yes">Yes</option>
                         <option value="No" >No</option>
                         </select>
                    </td>
                    <td>Add Photo:</td>
                    <td><input type="file" name="img" accept="image/jpeg" class="sub_input" " style="width:85px"/></td>
                </tr>
                
                <tr bgcolor="#FFFFFF" align="left" class="subheading">
				    <td colspan="4"><b style="font-size:24px; color:#000000; background-color:#33CC99;">PREVIOUS INSTITUTION DATA</b></td>
                </tr>
                
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
	                <td  align="left">Institution Name:</td>
	                <td  align="left"><input type="text" name="adname" value="" class="sub_input" " style="width:130px"/></td>
	                <td  align="left">Admission #:</td>
	                <td  align="left"><input type="text" name="adno" value="" class="sub_input" " style="width:130px"/></td>
                </tr>
                
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
	                <td  align="left">Crt. Issue Date:</td>
	                <td  align="left"><input type="text" name="Cdate" value="" style="width:130px" class="sub_input" id="datepicker-example5" /></td>
	                <td  align="left">Institution Phone#</td>
	                <td  align="left"><input type="text" maxlength="3" size="3" name="phone_no_1" value=""  class="sub_input" onkeyup="moveOnMax(this,'phone_no_2')"/>-&nbsp;<input type="text" size="7" name="phone_no_2" value="" maxlength="7" class="sub_input"/>
<br />
                    <font color="#FF0000">eg. 061-1234567</font></td>
                </tr>
                
                <tr align="center" bgcolor="#FFFFFF" class="subheading">
	                <td  align="left">Class:</td>
	                <td  align="left"><select name="pclass" class="sub_input">
	                  <?php  
 $sql="select * from class ";
 $resultss=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($resultss))
			{
			$cname=$row['Class'];
			$cid=$row['C_id'];	
		?>
	                  <option value="<?php echo $cname;?>">
	                    <?php
	 echo $cname;
			
				
 ?>
                      </option>
	                  <?php } ?>
                  </select></td>
	                <td  align="left">Institution Address:</td>
	                <td  align="left"><input type="text" name="ins_add" value="" class="sub_input" " style="width:130px"/></td>
                </tr>
                
                <tr bgcolor="#FFFFFF" align="left" class="subheading">
	                <td colspan="4"><b style="font-size:24px; color:#000000; background-color:#33CC99;">RELATIVES STUDYING IN THIS SCHOOL</b></td>
                </tr>
                
                <tr  bgcolor="#FFFFFF" class="subheading">
                     <td  align="left">1.Student Name:</td>
                     <td><input type="text" name="sname1" class="sub_input" " style="width:130px" /></td>
                     <td  align="left">2.Student Name:</td>
                     <td align="left"><input type="text" name="sname2" class="sub_input" " style="width:130px" /></td>
                </tr>
                
                <tr  bgcolor="#FFFFFF" class="subheading">
                     <td  align="left">1.Father's Name:</td>
                     <td><input type="text" name="fname1" class="sub_input" " style="width:130px" /></td>
                     <td  align="left">2.Father's Name:</td>
                     <td  align="left"><input type="text" name="fname2" class="sub_input" " style="width:130px" /></td>
                 </tr>
                 
                 <tr bgcolor="#FFFFFF" class="subheading">
                     <td  align="left">1.Class:</td>
                     <td><select name="class1" class="sub_input">
                       <?php  
 $sql="select * from class ";
 $resultss=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($resultss))
			{
			$cname=$row['Class'];
			$cid=$row['C_id'];	
		?>
                       <option value="<?php echo $cname;?>">
                         <?php
	 echo $cname;
			
				
 ?>
                       </option>
                       <?php } ?>
                   </select></td>
                     <td  align="left">2.Class:</td>
                     <td  align="left"><select name="class2" class="sub_input">
                       <?php  
 $sql="select * from class ";
 $resultss=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($resultss))
			{
			$cname=$row['Class'];
			$cid=$row['C_id'];	
		?>
                       <option value="<?php echo $cname;?>">
                         <?php
	 echo $cname;
			
				
 ?>
                       </option>
                       <?php } ?>
                     </select></td>
                 </tr>
                 
                 <tr bgcolor="#FFFFFF" class="subheading">
                     <td  align="left">1.Adm. #:</td>
                     <td  align="left"><input type="text" name="adno1" class="sub_input" " style="width:130px" /></td>
                     <td  align="left">2.Adm. #:</td>
                     <td align="left"><input type="text" name="adno2" class="sub_input" " style="width:130px" /></td>
                 </tr>
                 
            	      <td colspan="4"><b style="font-size:24px; color:#000000; background-color:#33CC99;">FOR OFFICE USE ONLY</b></td>
                 </tr>
                 
                 <tr align="center" bgcolor="#FFFFFF" class="subheading">
	                 <td>Date of Admission:</td>
	                 <td align="left"><input type="text" name="add_date" value="" style="width:130px" class="sub_input" id="datepicker-example6" /></td>
	                 <td  align="left">Adm. In Class:</td>
	                 <td  align="left"><select name="class" class="sub_input">
 <?php  
 $sql="select * from class ";
 $resultss=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($resultss))
			{
			$cname=$row['Class'];
			$cid=$row['C_id'];	
		?>
 <option value="<?php echo $cname;?>">
 <?php
	 echo $cname;
			
				
 ?> 
 </option><?php } ?>
  </select>
  <!--<input type="text" name="class" value="<?php // echo $class; ?>" />--></td>
                </tr>
                 
                <tr  align="center" bgcolor="#FFFFFF" class="subheading">
                <td  align="left">Section:</td>
                <td  align="left"><input type="text" name="section" value=""class="sub_input" " style="width:130px"/></td>
                <td  align="left">Session:</td>
                <td  align="left"><input type="text" name="session" value="" class="sub_input" " style="width:130px" /></td>
                </tr>
            
                <tr  align="center" bgcolor="#FFFFFF" class="subheading">
                <td  align="left">Fee Status:</td>
                <td  align="left"><select name="fee_status" class="sub_input">
                                  <option value="paid">Paid</option>
                                  <option value="Not-Paid">Not Paid</option>
                                  <option value="Delay">Delay</option>
                                  </select></td>
                                  
                <td  align="left">Admission:</td>
                <td  align="left"><select name="adm" class="sub_input">
                                  <option value="Approved"\>Approved</option>
                                  <option value="Not-Approved"\>Not Approved</option>
                                  </select></td>
                </tr>
                
                <tr class="subheading" align="center" bgcolor="#FFFFFF">
                <td align="left"><p>Regist #:</p></td>
                <td colspan="2" align="left"><input type="text" name="reg" value="" class="sub_input" " style="width:130px" /></td>
                </tr>
                
                <tr bgcolor="#FFFFFF">
                <td colspan="4" align="center"><input type="reset" name="reset" value="Reset" class="loginButton" />&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" class="loginButton"/></td>
               </tr>
                    </form>
                <tr>
                   <td>&nbsp;</td>
                </tr>
                    </table>
                </td> 
                </tr>
                    </table>


<script language="javascript">

	function validateForm(frm)

{

var sname=document.forms["studentform"]["sname"].value
var mname=document.forms["studentform"]["mname"].value
var fname=document.forms["studentform"]["fname"].value
//var gender=document.forms["studentform"]["gender"].value
var relig=document.forms["studentform"]["relig"].value

var nic_1=document.forms["studentform"]["nic_1"].value
var nic1=nic_1.length
var nic_2=document.forms["studentform"]["nic_2"].value
var nic2=nic_2.length
var nic_3=document.forms["studentform"]["nic_3"].value
var nic3=nic_3.length

var dob=document.forms["studentform"]["dob"].value

var accu=document.forms["studentform"]["accu"].value
var tel_1=document.forms["studentform"]["tel_1"].value
var phone1=tel_1.length
var tel_2=document.forms["studentform"]["tel_2"].value
var phone2=tel_2.length
var mob_no_1=document.forms["studentform"]["mob_no_1"].value
var mob1=mob_no_1.length
var mob_no_2=document.forms["studentform"]["mob_no_2"].value
var mob2=mob_no_2.length
var email=document.forms["studentform"]["email"].value
//var hostel=document.forms["studentform"]["hostel"].value
var adrs=document.forms["studentform"]["adrs"].value
//var photo=document.forms["studentform"]["photo"].value

var adname=document.forms["studentform"]["adname"].value
var adno=document.forms["studentform"]["adno"].value

var Cdate=document.forms["studentform"]["Cdate"].value
var phone_no_1=document.forms["studentform"]["phone_no_1"].value
var phone_1=phone_no_1.length
var phone_no_2=document.forms["studentform"]["phone_no_2"].value
var phone_2=phone_no_2.length
var pclass=document.forms["studentform"]["pclass"].value

var ins_add=document.forms["studentform"]["ins_add"].value
var add_date=document.forms["studentform"]["add_date"].value
//var class=document.forms["studentform"]["class"].value
var section=document.forms["studentform"]["section"].value
var session=document.forms["studentform"]["session"].value
var fee_status=document.forms["studentform"]["fee_status"].value
var adm=document.forms["studentform"]["adm"].value
var reg=document.forms["studentform"]["reg"].value

if ((sname==null) || (sname==""))

  {

  alert("Please enter Student Name");

  return false;

  //}
  
  if (sname!="")
{
	var filter=/^[a-zA-Z _]+$/;
	var test_bool = filter.test(sname);
		if(test_bool==false)
		{
		alert('Please enter only alphabets in Student name');
		return false;
		}
		if (trim(sname)== "")
		{
		alert('Please enter Student name in correct format');
		return false;
		}
}	}

if ((mname==null) || (mname==""))

  {

  alert("Please enter Mother Name");

  return false;

 // }

if (mname!="")
{
	var filter=/^[a-zA-Z _]+$/;
	var test_bool = filter.test(mname);
		if(test_bool==false)
		{
		alert('Please Enter Only Alphabets For Mother Name');
		return false;
		}
		if (trim(mname)== "")
		{
		alert('Please enter Mother name in correct format');
		return false;
		}
}	}

if ((fname==null) || (fname==""))

  {

  alert("Please enter Father Name");

  return false;

  //}

if (fname!="")
{
	var filter=/^[a-zA-Z _]+$/;
	var test_bool = filter.test(fname);
		if(test_bool==false)
		{
		alert('Please Enter Only Alphabets For Father Name');
		return false;
		}
		if (trim(fname)== "")
		{
		alert('Please enter Father name in correct format');
		return false;
		}
}	}

/*if ((gender==null) || (gender==""))

  {

  alert("Please select Gender");

  return false;

  }*/
  
if(nic_1=="" || nic_1=="null")
{
alert("please enter CNIC #");
		return false; 
}
if(nic_2=="" || nic_2=="null")
{
alert("please enter CNIC #");
		return false; 
}
if(nic_3=="" || nic_3=="null")
{
alert("please enter CNIC #");
		return false; 
}


  if ((relig==null) || (relig==""))

  {

  alert("Please enter Religion");

  return false;

  }
  

if (dob == "" || dob == "null")
{
alert("Please enter Date of Birth");

	return false;
}

if (accu == "" || accu == "null")
{
alert("Please enter Occupation");

	return false;
}

if (tel_1 == "" || tel_1 == "null")
{
alert("Please enter Home Tell#");

	return false;
}

if (tel_1 == "" || tel_2 == "null")
{
alert("Please enter Home Tell#");

	return false;
}


if (mob_no_1 == "" || mob_no_1 == "null" )
{ 
		alert("please enter numeric value for Mobile No#");
	
	return false;
}

if (mob_no_2 == "" || mob_no_2 == "null" )
{ 
		alert("please enter numeric value for Mobile No#");
	
	return false;
}


if (email == "" || email == "null")
{
alert("Please enter Email ");

	return false;
}


if (adrs == "" || adrs == "null")
{
alert("Please enter Address ");

	return false;
}


if (adname == "" || adname == "null")
{
alert("Please enter Insitute Name ");

	return false;
}

if (adno == "" || adno == "null")
{
alert("Please enter Admission No");

	return false;
}


if (Cdate == "" || Cdate == "null")
{
alert("Please enter Certificate Issue Date");

	return false;

}


if (phone_no_1 == "" || phone_no_1 == "null" )
{ 
		alert("please enter numeric value for Institution Phone No#");
	
	return false;
}

if (phone_no_2 == "" || phone_no_2 == "null" )
{ 
		alert("please enter numeric value for Institution Phone No#");
	
	return false;
}

if (pclass == "" || pclass == "null")
{
alert("Please enter previous Class ");

	return false;

}

if (ins_add == "" || ins_add == "null")
{
alert("Please enter Institution Address ");

	return false;

}

if (add_date == "" || add_date == "null")
{
alert("Please enter Date of Admission");

	return false;

}
/*
if (photo == "" || photo == "null")
{
alert("Please enter photo ");

	return false;

}
*/
if (section == "" || section == "null")
{
alert("Please enter Section");

	return false;

}

if (session == "" || session == "null")
{
alert("Please enter Session");

	return false;

}

if (fee_status == "" || fee_status == "null")
{
alert("Please Select Fee Status");

	return false;

}

if (adm == "" || adm == "null")
{
alert("Please Select Admission");

	return false;

}

if (reg == "" || reg == "null")
{
alert("Please enter Remarks ");

	return false;

}

		}
</script>

</body>
</html>
