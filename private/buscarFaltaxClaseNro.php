<?php
include './class/class.php';
$clase = $_POST["clase"];
$nro = $_POST["num"];
$san = $_POST["sancionador"];
$d = new Docente();
$sancionantes = $d->listaSancionantes();

$datos = $d->buscarFaltasCN($clase,$nro);
echo "<div><label for='texto'> Falta de clase ".$clase." nro ".$nro." continuacion:</label>";
echo "<select name='texto' id='texto' class='form-control'  >";

    if($datos != NULL)
    {
    echo '<option value="'.$datos[0]["falta"].'">'.$datos[0]["nro"].".".$datos[0]["texto"].'</option>';
    }else{
        echo '<option value="0"> Upss.. El numero de falta no pertenece a la clase '.$clase.'</option>';
    }

echo "</select> </div>";

echo '             
                   <div>
                   <div class="col-md-8 ">
                   <label> Falta sancionada por:</label>
                   <select name="sancionador" class="form-control" id="sancionador">';
for ($index1 = 0; $index1 < count($sancionantes); $index1++) {
    if($sancionantes[$index1]["id"] == $san)
    {
        echo '<option value="'.$sancionantes[$index1]["id"].'" selected>'.$sancionantes[$index1]["nombre"].' </option>';
    }else{
         echo '<option value="'.$sancionantes[$index1]["id"].'">'.$sancionantes[$index1]["nombre"].' </option>';
         }
}
                   
echo '             </select>
                   </div>
                   <div class="col-md-2"
                   <label for="nro"> Nro </label>
                   <input type="number" name="nro" onblur="setFaltaAuto();" class="form-control" id="nro" value="'.$nro.'">
                   </div>
                   <div class="col-md-2"
                   <label for="nroParte"> Nro Parte</label>
                   <input type="number" name="nroParte" class="form-control" id="nroParte">
                   </div>
                   </div>
               ';
?>


