<?php  
require_once './class/class.php';
$e= new Estudiante();
$d= new Docente();
$curso = $_POST["curso"];
$cursos = $d->cursoById($curso);
$nroObservados = $e->observadosNovistos($curso);

                   if($cursos[0]["nombre"] == "Primer Curso")
                   {
                       $rango = "C/1";
                   }
                   if($cursos[0]["nombre"] == "Segundo Curso")
                   {
                       $rango = "C/2";
                   }
                   if($cursos[0]["nombre"] == "Tercer Curso")
                   {
                       $rango = "C/3";
                   }
                   if($cursos[0]["nombre"] == "Cuarto Curso")
                   {
                       $rango = "C/4";
                   }


$reg = $e->mostrarFaltasEstudiante($_POST["id_estudiante"]);
$sancionantes = $d->listaSancionantes();
$reg2=$e->estudianteById($_POST["id_estudiante"]);                
   
 $output = '';  
   

 $output .= '  
     
         <div class="row">
           <div class="col-md-2">
               
               <img src="../upload/'.$reg2[0]["foto"].'" class="img img-responsive active">
               <a href="javascript:;" data-toggle="modal" data-target="#loginModal"><div id="boton" class="alert alert-info" > <span class="glyphicon glyphicon-pencil"></span></div></a>
           </div>
            <div class="col-md-3 alert alert-success">
               <h4>Nombre:'.$rango.' '.$reg2[0]["apellidoPaterno"].' '.$reg2[0]["apellidoMaterno"].' '.$reg2[0]["nombre"].' </h4>
               <h4>PD: '.$reg2[0]["pd"].' </h4>
               <h4>TSS: '.$reg2[0]["tss"].' </h4>
               <h4>TTE: '.$reg2[0]["tte"].' </h4>
           </div>
           <div class="col-md-7 alert alert-success text-center">
               <h4>
                   Año academico: '.$cursos[0]["anio"].'
               </h4>
               <h4>
                   (Semestre '.$cursos[0]["semestre"].')
                   
               </h4>
               <h4>
                   '.$cursos[0]["nombre"].'
               </h4>
               <h4>
                   Escuela naval militar 
               </h4>
           </div>
           
       </div>




      <div class="table-responsive">  
           <table class="table table-bordered table-hover">  
                
                     <tr class="alert alert-info">
                   <th colspan="4" >
                       CODIGO DICIPLINA
                   </th>
                   <th colspan="3">
                       &zwj;
                   </th>
                   <th colspan="4">
                       Calificacion
                   </th>
                   <th colspan="7">
                       PDATMA
                   </th>
               </tr>
               <tr class="alert alert-info">
                   <th>
                       Fecha
                   </th>
                   <th>
                       Nro
                   </th>
                   <th>
                       Falta cometida
                   </th>
                   <th>
                       Falta sancionada por
                   </th>
                   <th>
                       Nro Parte
                   </th>
                   <th>
                       Clase
                   </th>
                   <th>
                       Reinc
                   </th>
                   <th>
                       PD
                   </th>
                   <th>
                       TSS
                   </th>
                   <th>
                       TTE
                   </th>
                   <th>
                   PDAS    
                   </th>
                   <th>
                       TTEA
                   </th>
                   <th>
                       TTEC
                   </th>
                   <th>
                       BTTE
                   </th>
                   <th>
                       TSSA
                   </th>
                   <th>
                       TSSC
                   </th>
                   <th>
                       BTSS
                   </th>
                   <th>
                       PDAT
                   </th>
               
                     
                </tr>'; 
  for ($index = 0; $index < count($reg); $index++) 
  {
      $falta = $e->faltaById($reg[$index]["id_falta"]);
              
 
           $output .= '  
                <tr>  
                     <td class="fecha" data-id1="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["fecha"].'</td>  
                     <td class="nro"   data-id2="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["nro"].'</td>  
                     <td >'.$falta[0]["texto"].'</td>
                     <td >
                    
                     <div class="col-md-11">'.$d->sancionadorById($reg[$index]["sancionante"])[0]["nombre"].'</div> 
                  <div class="col-md-5 col-xs-5">
                                     
                   <select name="sancionadorU" id="sancionadorU'.$reg[$index]["id"].'" class="form-control" onchange="updateSancionante('.$reg[$index]["id"].');"> <option value="0">cambiar</option>';
                    for ($index1 = 0; $index1 < count($sancionantes); $index1++) {
                    $output .='<option value="'.$sancionantes[$index1]["id"].'">'.$sancionantes[$index1]["nombre"].' </option>';
                    }
                   
                  $output .='</select>
                   <input type="hidden" name="idFalta" id="idFalta" value="'.$reg[$index]["id"].'">
                       
                   


                  </div>
                    </td>  
                     <td class="nroParte" data-id5="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["nroParte"].'</td>  
                     <td>'.$falta[0]["clase"].'</td> 
                     <td class="reinci" data-id6.1="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["reinci"].'</td>
                     <td class="pd" data-id7="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["pd"].'</td>
                     <td class="tss" data-id8="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["tss"].'</td>  
                     <td class="tte" data-id9="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["tte"].'</td>  
                    <td class="pdas" data-id10="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["pdas"].'</td>
                     <td class="ttea" data-id11="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["ttea"].'</td>   
                    <td class="ttec" data-id12="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["ttec"].'</td>
                    <td class="btte" data-id13="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["btte"].'</td>
                    <td class="tssa" data-id14="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["tssa"].'</td>
                     <td class="tssc" data-id15="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["tssc"].'</td>
                     <td class="btss" data-id16="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["btss"].'</td>
                     <td class="pdat" data-id17="'.$reg[$index]["id"].'" contenteditable>'.$reg[$index]["pdat"].'</td> 
                    <td><button type="button" name="delete_btn" data-id18="'.$reg[$index]["id"].'" class="btn btn-xs btn-danger btn_delete"> <span class="glyphicon glyphicon-trash"></span></button></td>       
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
                url:"select_ver.php",  
                method:"POST",
                data:{id_estudiante:<?php echo $_POST["id_estudiante"];?>,curso:<?php echo $_POST["curso"];?>},                  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }
</script>   

