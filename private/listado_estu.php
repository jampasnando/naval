<?php
$idcurso=$_POST["idcurso"];
require_once "conector.php";
$r=mysql_query("select * from estudiantes order by apellidoPaterno",$mio);
echo "<select name='lestu' id='lestu' onchange='vecalif(this);'>";
echo "<option value=''>Ninguno</option>";
while($f=mysql_fetch_row($r))
{
	echo "<option value='".$f[0]."'>".$f[2]." ".$f[3]." ".$f[1]."</option>";
}
echo "</select>";
mysql_close($mio);
?>