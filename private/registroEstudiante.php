<?php
require_once './class/class.php';

$d = new Docente();
$d->registrarEstudiante($_POST['nombre'],$_POST['apellidoP'],$_POST['apellidoM']);

?>