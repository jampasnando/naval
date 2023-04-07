<?php
require_once "conector.php";
$r=mysql_query("select * from cursos",$mio);
echo "<select name='cursos' id='cursos' onchange='vacurso(this);'>";
echo "<option value=''>Ninguno</option>";
while($f=mysql_fetch_row($r))
{
	echo "<option value='".$f[0]."'>".$f[3]." ".$f[1]." (semestre:".$f[2]."</option>";
}
echo "</select>";
mysql_close($mio);
?>