<?php
$data = array("a","b","c","e","r","t","x","s","b","a","b","c");
$string= implode("", $data);
for($x=strlen($string)-1;$x>=0;$x--)
{
if(preg_match("/".substr($string, 0,$x)."$/",$string)==true)
{
	$string= substr($string, 0,$x); break;
}
}
$result=str_split($string);
$sequence = implode(',', $result);
echo "Most occurring string here is [".$sequence."]";
?>
