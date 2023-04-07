<?php
$idcurso=$_POST["idcurso"];
require_once "conector.php";
$r=mysql_query("select estudiantes.* from estudiantes inner join cursos_estudiantes on estudiantes.id=cursos_estudiantes.id_estudiante where cursos_estudiantes.id_curso='$idcurso'",$mio);
$n=0;
echo "<table id='tbest'>";
echo "<tr><th scope='col'>N</th><th scope='col'>Cadete</th><th scope='col'>Puntos</th><th scope='col'>Accion</th></tr>";
while($f=mysql_fetch_row($r))
{
	$n++;
	$nombre=$f[2]." ".$f[3]." ".$f[1];
	if($f[5]>60) $color=" bgcolor='#00CC33'"; else $color=" bgcolor='#FF0000'";
	echo "<tr><td>".$n."</td><td>".$nombre."</td><td ".$color.">".$f[5]."</td><td><input type='button' id='btnest' value='Ins' onclick='sanciona(".$f[0].",\"".$nombre."\")' class='azul'></td></tr>";
}
echo "</table>";
mysql_close($mio);
?>