
 <?php  
 require_once './class/class.php';  
 $d = new Docente();
 $id = $_POST["id"];
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];
 $d->updateReglamento($id , $text , $column_name);

   
 ?>  