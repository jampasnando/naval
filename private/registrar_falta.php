<?php
$bbo=$_POST["bbo"];
$ppass=$_POST["ppass"];
$idest=$_POST["idest"];
$fechasan=implode("-",array_reverse(explode("-",$_POST["fechasan"])));
$txtsan=$_POST["txtsan"];
$parte=$_POST["parte"];
require_once "conector.php";
$o=mysql_query("select id from oficialesx where login='$bbo' and password='$ppass'",$mio);
$fo=mysql_fetch_row($o);
$idoficial=$fo[0];
$s=mysql_query("select count(*) FROM faltas_estudiantes where id_estudiante='$idest' and id_falta='$txtsan'",$mio);
$fs=mysql_fetch_row($s);
$aux=$fs[0] + 1;
if($aux>4) $aux=4;
$pd="pd".$aux;
$tss="tss".$aux;
$tte="tte".$aux;
$q=mysql_query("select $pd,$tss,$tte from reglamento where falta='$txtsan'",$mio);
$fq=mysql_fetch_row($q);
$pdx=$fq[0];
$tssx=$fq[1];
$ttex=$fq[2];
$cad="insert into faltas_estudiantes values('$txtsan','$idest','$pdx','$tssx','$ttex','$idoficial','$txtsan','$parte','$fechasan',null,'0','0','0','0','0','0','0','0','')";
mysql_query($cad,$mio);
$r=mysql_query("select * from faltas_estudiantes where id_estudiante='$idest' order by fecha",$mio);
$n=0;
echo "Históricos del sancionado:";
echo "<table id='tbreg'>";
echo "<tr><th scope='col'>IdFalta</th><th scope='col'>pd</th><th scope='col'>tss</th><th scope='col'>tte</th><th scope='col'>Parte</th><th scope='col'>Fecha</th></tr>";
while($f=mysql_fetch_row($r))
{
	$n++;
	//$nombre=$f[2]." ".$f[3]." ".$f[1];
	//if($f[5]>60) $color=" bgcolor='#00CC33'"; else $color=" bgcolor='#FF0000'";
	if(is_numeric($f[7])) $elparte=$f[7]; else $elparte=$f[9];
	echo "<tr><td>".$f[0]."</td><td>".$f[2]."</td><td>".$f[3]."</td><td>".$f[4]."</td><td>".$elparte."</td><td>".$f[8]."</td></tr>";
}
echo "</table>";
mysql_close($mio);
?>