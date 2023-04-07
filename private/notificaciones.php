<?php
require_once './class/class.php';
   
     $d = new Docente();
     $out="";
     if($d->existeEstudiante($_POST['nombre'],$_POST['apellidoP'],$_POST['apellidoM'],$_POST['curso']))
     {
         $out = '<div class="alert alert-info"><p>  <span class="glyphicon glyphicon-exclamation-sign"></span>Estudiante '.$_POST['nombre'].' '.$_POST['apellidoP'].' '.$_POST['apellidoM']. ' '.$_POST['curso'].' registrado exitosamente!  </p> </div>';
     }else{
         $out = '<div class="alert alert-danger"><p>  <span class="glyphicon glyphicon-exclamation-sign"></span>Upss.. no se registro al cadete su nombre ya existe en la lista de este curso.  </p> </div>';
          }
          echo $out;
     
  
  


  
?>