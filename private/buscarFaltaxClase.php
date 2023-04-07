<?php
error_reporting(0);
include './class/class.php';
$clase = $_POST["clase"];
$d = new Docente();
$sancionantes = $d->listaSancionantes();

$datos = $d->buscarFaltas($clase);
echo "<div><label for'texto'> Seleccione la falta de tipo ".$clase." a continuacion:</label>";
echo "<select name='texto' id='texto' class='form-control' onchange='mostrarPuntaje();';>";
echo "<option value='0'> Ninguno</option>";
for ($index = 0; $index < count($datos); $index++) {
    
    echo '<option value="'.$datos[$index]["falta"].'">'.$datos[$index]["nro"].".".$datos[$index]["texto"].'</option>';
}

echo "</select> </div>";

echo '             
                   <div>
                   <div class="col-md-8 ">
                   <label> Falta sancionada por:</label>
                   <select name="sancionador" class="form-control" id="sancionador">';
for ($index1 = 0; $index1 < count($sancionantes); $index1++) {
    echo '<option value="'.$sancionantes[$index1]["id"].'">'.$sancionantes[$index1]["nombre"].' </option>';
}
                   
echo '             </select>
                   </div>
                   <div class="col-md-2"
                   <label for="nro"> Nro </label>
                   <input type="number" name="nro" onblur="setFaltaAuto();" class="form-control" id="nro">
                   </div>
                   <div class="col-md-2"
                   <label for="nroParte"> Nro Parte</label>
                   <input type="number" name="nroParte" class="form-control" id="nroParte">
                   </div>
                   </div>
               ';
?>


