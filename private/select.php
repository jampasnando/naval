<?php  
require_once './class/class.php';
$e= new Estudiante();
$d= new Docente();
$reg = $e->mostrarFaltasEstudiante($_POST["id_estudiante"]);
$sancionantes = $d->listaSancionantes();
$reg2 = $e->estudianteById($_POST["id_estudiante"]);                
   
 $output = '';  
   

 $output .= '  
     
      <div class="row">
           
          
           <div class="col-md-2">
               <img src="../upload/'.$reg2[0]["foto"].'" class="img img-rounded img-responsive">
           </div>
           <div class="col-md-3 alert alert-success">
               <h4>Cadete: '.$reg2[0]["apellidoPaterno"].' '.$reg2[0]["apellidoMaterno"].' '.$reg2[0]["nombre"].' </h4>
               <h4>PD: '.$reg2[0]["pd"].' </h4>
               <h4>TSS: '.$reg2[0]["tss"].' </h4>
               <h4>TTE: '.$reg2[0]["tte"].' </h4>
           </div>
           
       </div>

      <div class="table-responsive">  
           <table class="table table-bordered">  
                
                     <tr class="alert alert-info">  
                     <th width="">Fecha</th>  
                     <th width="">Nro</th>  
                     <th width="">Falta</th>  
                     <th width="">Sancionada por</th>
                     <th width="">Nro Parte</th>
                     <th width="">Clase</th>
                     <th width="">PD</th>
                     <th width="">TSS</th>
                     <th width="">TTE</th>
                     <th width="">Eliminar</th>
                     
                </tr>'; 
  for ($index = 0; $index < count($reg); $index++) 
  {
      $falta = $e->faltaById($reg[$index]["id_falta"]);
              
 
           $output .= '  
                <tr>  
                     <td class="fecha" data-id1="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["fecha"].'</td>  
                     <td class="nro"   data-id2="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["nro"].'</td>  
                     <td >'.$falta[0]["texto"].'</td>
                     <td >'.$d->sancionadorById($reg[$index]["sancionante"])[0]["nombre"].' 
                  <div class="col-xs-1">
                                     
                   <select name="sancionadorU" id="sancionadorU'.$reg[$index]["id"].'" class="form-control" onchange="updateSancionante('.$reg[$index]["id"].');"> <option value="0">Ninguno</option>';
                    for ($index1 = 0; $index1 < count($sancionantes); $index1++) {
                    $output .='<option value="'.$sancionantes[$index1]["id"].'">'.$sancionantes[$index1]["nombre"].' </option>';
                    }
                   
                  $output .='</select>
                   <input type="hidden" name="idFalta" id="idFalta" value="'.$reg[$index]["id"].'">
                       
                   


                  </div>
                    </td>  
                     <td class="nroParte" data-id5="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["nroParte"].'</td>  
                     <td>'.$falta[0]["clase"].'</td>  
                     <td class="pd" data-id7="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["pd"].'</td>
                     <td class="tss" data-id8="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["tss"].'</td>  
                     <td class="tte" data-id9="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["tte"].'</td>  
                    
                    
                     <td><button type="button" name="delete_btn" data-id10="'.$reg[$index]["id"].'" class="btn btn-danger btn_delete">  <span class="glyphicon glyphicon-trash"></span></button></td>  
                </tr>  
           ';  
  }  
       
   
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  
<script>
     
    function updateSancionante(id)
      {
          var sancionadorU = document.getElementById("sancionadorU"+id).value;
          
          
          edit_data2(id, sancionadorU, "sancionante");
      }
      function edit_data2(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id,text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                       
                }  
           });
           fetch_data();
      }
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",
                data:{id_estudiante:<?php echo $_POST["id_estudiante"];?>,},                  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }
      
       
</script>   

