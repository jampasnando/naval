<?php
require_once "conector.php";
$tipo=$_POST["tipo"];
$r=mysql_query("select falta, nro, texto from reglamento where clase='$tipo' order by nro",$mio);
echo "Seleccione Falta<br><select name='txtsan' id='txtsan'>";
echo "<option value=''>Ninguno</option>";
while($f=mysql_fetch_row($r))
{
	echo "<option value='".$f[0]."'>".$f[1].". ".$f[2]."</option>";
}
echo "</select>";
echo 'Descripcion:<textarea name="parte" id="parte" cols="45" rows="5"></textarea><br>';
echo "<input type='button' name='btnenvia' id='btnenvia' value='Registrar' onclick='sancionacon();'>";
?>