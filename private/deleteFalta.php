
 <?php  
 require_once './class/class.php';  
 $d = new Docente();
 $id=$_POST["id"];
 
 $d->desactivarFalta($id);

   
 ?>  