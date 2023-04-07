<?php
require_once "conector.php";
$hoy=date("d-m-Y");
$r=mysql_query("select distinct clase from reglamento order by clase",$mio);
echo "Fecha: <input type='text' name='fechasan' id='fechasan' value='".$hoy."' onclick='calendario();' readonly='readonly'><br>";
echo "Tipo Sancion<br><select name='tipos' id='tipos' onchange='eligetipo(this)'>";
echo "<option value=''>Ninguno</option>";
while($f=mysql_fetch_row($r))
{
	echo "<option value='".$f[0]."'>".$f[0]."</option>";
}
echo "</select>";
?>