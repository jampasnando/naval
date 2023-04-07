
 <?php  
 require_once './class/class.php';  
 $d = new Docente();
 $nro=$_POST["nro"];
 $falta=$_POST["falta"];
 $clase=$_POST["clase"];
 
 
 
 $d->nuevaFalta($nro, $falta , $clase );

   
 ?>
  