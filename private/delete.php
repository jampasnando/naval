 <?php  
 require_once './class/class.php';
 $id = $_POST["id"];
 $d= new Docente();
 $d->eliminarFalta($id);
 
 ?>  