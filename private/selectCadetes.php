<?php
require_once './class/class.php';
$e = new Estudiante();
$curso = $_POST["curso"];
$rango = $_POST["rango"];
$output= '';
$output .=' 
           <div class="container">
               <table class="table table-responsive table-hover table-bordered">
                   <tr class="bg-info">
                   <td>
                       <p>
                       Cadete
                       </p>
                   </td>

                   
                   <td>
                       <p>
                       Accion
                       </p>
                   </td>
                   
                   
                   </tr>
                   
                ';
                   $reg = $e->listarEstudiantes($curso);
                   for ($index = 0; $index < count($reg); $index++) {
                       
                       
                   
         $output.= '   <tr>
                       
                       <td>
                       <p>
                       
                       
                       '.$rango.' '.$reg[$index]["apellidoPaterno"].' '.$reg[$index]["apellidoMaterno"].' '.$reg[$index]["nombre"]
                       .'
                       </p>
                      </td>
                      
                      ';
                     /* if($reg[$index]["pd"]>60)
                      {    
                      
            $output.=' <td class="alert alert-success">
                       <p>
                       
                       '.$reg[$index]["pd"].' APROBADO'.'  
                       
                           <span class="glyphicon glyphicon-ok-sign"></span>
                       </p>
                       </td>
                      ';
                      }else {
                      
                       
                  $output.= ' <td class="alert alert-danger">
                       <p>
                       
                       '.$reg[$index]["pd"].' REPROBADO'.'  
                       
                           <span class="glyphicon glyphicon-remove-circle"></span>
                       </p>
                       </td>
                       
                      ';
                      }*/
                       
             $output.='   <td>
                      
                       <a href="anotarFalta.php?id_estudiante='.$reg[$index]["id"].'&curso='.$curso.'"> <button class="btn btn-sm btn-danger">
                            Anotar Falta <span class="glyphicon glyphicon-copy"></span>
                       </button></a>
                       
                      
                             <span class="glyphicon glyphicon-trash"></span>
                       </button>
                   </td>
                       
                   </tr>
                  ';
                   }
                   
         $output .='      </table>
           </div>';
         
         echo $output;
?>
