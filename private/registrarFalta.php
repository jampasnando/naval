<?php
error_reporting(0);
require_once './class/class.php';
$d= new Docente();
$fecha = $_POST["fecha"];
$fecha = $fecha[6].$fecha[7].$fecha[8].$fecha[9].$fecha[5].$fecha[0].$fecha[1].$fecha[2].$fecha[3].$fecha[4];
$clase = $_POST["clase"];
$texto = $_POST["texto"];
$valor = $_POST["valor"];
$curso = $_POST["curso"];
$multiplicador = 0;
if($valor == 1)
{
    $multiplicador = 1;
}
if($valor == 2)
{
    $multiplicador = 1;
}
if($valor == 3)
{
    $multiplicador = 1;
}
if($valor == 4)
{
    $multiplicador = 1;
}

$reincidencias = $_POST["reincidencias"];
$sancionador = $_POST["sancionador"];
$nro = $_POST["nro"];
$nroParte= $_POST["nroParte"];
$id_estudiante = $_POST["id_estudiante"];
$t=$d->tipoFalta($texto);
if($t != "A")
{
$pd1 = $_POST["pd1"] * $multiplicador;
$pd1 = round($pd1, 2);
$tss1 = $_POST["tss1"];
$tte1 = $_POST["tte1"];

$pd2 = $_POST["pd2"] * $multiplicador;
$pd2 = round($pd2, 2);
$tss2 = $_POST["tss2"];
$tte2 = $_POST["tte2"];

$pd3 = $_POST["pd3"] * $multiplicador;
$pd3 = round($pd3, 2);
$tss3 = $_POST["tss3"];
$tte3 = $_POST["tte3"];

$pd4 = $_POST["pd4"] * $multiplicador;
$pd4 = round($pd4, 2);
$tss4 = $_POST["tss4"];
$tte4 = $_POST["tte4"];


$d = new Docente();
if($reincidencias == 0)
{
$d->registrarMulta($texto,$id_estudiante,$pd1,$tss1,$tte1,$sancionador,$nro,$nroParte,$fecha,$curso,$valor);
    
}
if($reincidencias == 1)
{
$d->registrarMulta($texto,$id_estudiante,$pd2,$tss2,$tte2,$sancionador,$nro,$nroParte,$fecha,$curso,$valor);
    
}
if($reincidencias == 2)
{
$d->registrarMulta($texto,$id_estudiante,$pd3,$tss3,$tte3,$sancionador,$nro,$nroParte,$fecha,$curso,$valor);
    
}
if($reincidencias >= 3)
{
$d->registrarMulta($texto,$id_estudiante,$pd4,$tss4,$tte4,$sancionador,$nro,$nroParte,$fecha,$curso,$valor);
    
}
}else{
$pdP = $_POST["pdP"];
$tssP = $_POST["tssP"];
$tteP = $_POST["tteP"];
$d->registrarMulta($texto,$id_estudiante,$pdP,$tssP,$tteP,$sancionador,$nro,$nroParte,$fecha,$curso,$valor);
    
}

?>
