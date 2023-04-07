<?php
$bo=$_POST["boy"];
$pass=$_POST["passy"];
require_once "conector.php";
$r=mysql_query("select id,nombre from oficialesx where login='$bo' and password='$pass'",$mio);
if(mysql_fetch_row($r)>0) 
{
	$f=mysql_fetch_row($r);
	echo $f[0].":".$f[1];
	//echo "si";
}
else echo "no";
?>