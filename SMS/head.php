<table width="684" align="center" background="logos/head.jpg">
<?php
include("db.php");
		$sql="select * from  code_head";
 		$result=mysql_query($sql)or die(mysql_error());
		while($row=mysql_fetch_array($result))
			{
			$hd_id=$row['hd_id'];	
		?>
<tr class="head">
<td width="676" height="46" align="center" style="font-size:20px"><img src="logos/pakistan.gif" width="86" height="80" align="absmiddle" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row['head_code']; ?></b><!--<img src="logos/new_b.gif" height="31" width="56">--></td>
</tr>
<?php
}
?>
<!--<tr>
 <td height="20" colspan="4" align="center">
<font color="#FFFFFF">
<marquee behavior="alternate" bgcolor="" truespeed="truespeed"><?php //echo(date("l dS-F-Y")); ?></marquee></font></td>
  </tr>-->
</table>	
