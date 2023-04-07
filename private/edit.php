
 <?php  
 require_once './class/class.php';  
 $e = new Estudiante();
 $id = $_POST["id"];
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];
 $e->updateFalta($id , $text , $column_name);

   
 ?>  