<?php
include './class/class.php';
//$falta = $_POST["falta"];
//$id_estudiante = $_POST["id_estudiante"];
//$valor= $_POST["valor"];

$falta = 223;
$id_estudiante = 407;
$valor= 6;

$multiplicador = 0;
if($valor == 1)
    {
      $multiplicador = 1;
    }
if($valor == 2)
    {
      $multiplicador = 1.25;
    }
if($valor == 3)
    {
      $multiplicador = 1.60;
    }
if($valor == 4)
    {
      $multiplicador = 2;
    }

$d = new Docente();

$reincidencias = 0;
$reincidencias = $d->numeroDeReincidencias($falta, $id_estudiante);



$datos = $d->faltaById($falta);
echo '<h5>Valores de la falta ('.$reincidencias.' reincidencias)  <span class="bg bg-primary">(PD x '.$multiplicador.') <span></h5>';
$t=$d->tipoFalta($falta);
if($t != "A")
{
if($reincidencias == 0)
{
    
echo '<div class="col-md-3 bg bg-primary">1era Vez';
echo '<h5>PD = -'.$datos[0]['pd1'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss1'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte1'].'</h5> </div>';

}else{
echo '<div class="col-md-3">1era Vez';
echo '<h5>PD = -'.$datos[0]['pd1'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss1'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte1'].'</h5> </div>';

}

if($reincidencias == 1)
{

echo '<div class="col-md-3 bg bg-primary">1R';
echo '<h5>PD = -'.$datos[0]['pd2'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss2'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte2'].'</h5> </div>';

    
}else{

echo '<div class="col-md-3">1R';
echo '<h5>PD = -'.$datos[0]['pd2'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss2'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte2'].'</h5> </div>';
    
}


echo '<input type="hidden" name="pd1" value="'.$datos[0]['pd1'].'">';
echo '<input type="hidden" name="tss1" value="'.$datos[0]['tss1'].'">';
echo '<input type="hidden" name="tte1" value="'.$datos[0]['tte1'].'">';


echo '<input type="hidden" name="pd2" value="'.$datos[0]['pd2'].'">';
echo '<input type="hidden" name="tss2" value="'.$datos[0]['tss2'].'">';
echo '<input type="hidden" name="tte2" value="'.$datos[0]['tte2'].'">';

if($reincidencias == 2)
{
echo '<div class="col-md-3 bg bg-primary">2R';
echo '<h5>PD = -'.$datos[0]['pd3'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss3'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte3'].'</h5> </div>';

    
}else{
echo '<div class="col-md-3">2R';
echo '<h5>PD = -'.$datos[0]['pd3'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss3'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte3'].'</h5> </div>';

    
}


echo '<input type="hidden" name="pd3" value="'.$datos[0]['pd3'].'">';
echo '<input type="hidden" name="tss3" value="'.$datos[0]['tss3'].'">';
echo '<input type="hidden" name="tte3" value="'.$datos[0]['tte3'].'">';

if($reincidencias >= 3){
echo '<div class="col-md-3 bg bg-primary">3R';
echo '<h5>PD = -'.$datos[0]['pd4'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss4'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte4'].'</h5> </div>';
    
}else{
    echo '<div class="col-md-3">3R';
echo '<h5>PD = -'.$datos[0]['pd4'].'</h5>';
echo '<h5>TSS= +'.$datos[0]['tss4'].'</h5>';
echo '<h5>TTE= +'.$datos[0]['tte4'].'</h5> </div>';

}

echo '<input type="hidden" name="pd4" value="'.$datos[0]['pd4'].'">';
echo '<input type="hidden" name="tss4" value="'.$datos[0]['tss4'].'">';
echo '<input type="hidden" name="tte4" value="'.$datos[0]['tte4'].'">';
echo '<input type="hidden" name="reincidencias" value="'.$reincidencias.'">';
}else{


    
echo '<h4> Ingrese los valores de la multa ALFA</h4>'; 
echo '<div class="col-md-4">PD:</div><div class="col-md-8"><input type="number" name="pdP" class="form-control"></div> ';
echo '<div class="col-md-4">TSS: </div> <div class="col-md-8"><input type="number" name="tssP" class="form-control"></div> ';
echo '<div class="col-md-4"> TTE: </div> <div class="col-md-8"><input type="number" name="tteP" class="form-control"></div>';
echo '<input type="hidden" name="reincidencias" value="'.$reincidencias.'">';
}
?>


