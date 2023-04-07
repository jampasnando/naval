
<?php  
require_once './class/class.php';
$e= new Estudiante();
$d= new Docente();
$filtro = $_POST["filtro"];
$reg = $d->listarReglamento($filtro);

$output = '';  

if($filtro != "t"){
$output='
     
     <style>

input[type=number]::-webkit-outer-spin-button,

input[type=number]::-webkit-inner-spin-button {

    -webkit-appearance: none;

    margin: 0;

}

 

input[type=number] {

    -moz-appearance:textfield;

}

</style>
      <div class="row">
      <div class="col-md-4">
       <h3> Tabla de faltas tipo  '.$filtro.' </h3>
      </div>
      <div class="col-md-8 table-responsive" >
                <h4> Si desea modificar el valor de todas las faltas '.$filtro.' ingrese los valores y precione en modificar </h4>
                <table class="table table-bordered">
                <tr class="alert alert-info">  
                     
                     <th colspan="3"width="">1era Vez</th>
                     <th colspan="3" class="alert alert-success" width="">1era Reincidencia</th>
                     <th colspan="3"width="" class="alert alert-warning">2da Reincidencia</th>
                     <th colspan="3"width="" class="alert alert-danger">3era Reincidencia</th>
                     
                </tr>
                 
                <tr>
                 
                    <th width="" class="alert alert-info">PD</th>
                     <th width="" class="alert alert-info">TSS</th>
                     <th width="" class="alert alert-info">TTE</th>

                    <th width="" class="alert alert-success">PD</th>
                     <th width="" class="alert alert-success">TSS</th>
                     <th width="" class="alert alert-success">TTE</th>
                     
                     <th width="" class="alert alert-warning">PD</th>
                     <th width="" class="alert alert-warning">TSS</th>
                     <th width="" class="alert alert-warning">TTE</th>
                     
                     <th width="" class="alert alert-danger">PD</th>
                     <th width="" class="alert alert-danger">TSS</th>
                     <th width="" class="alert alert-danger">TTE</th>
                </tr>
                <tr>
                <td class="pd1E alert alert-info"   ><input type="number" class="form-control" id="pd1E"></td>
                <td class="pd1E alert alert-info"   ><input type="number" class="form-control" id="tss1E"></td>
                <td class="pd1E alert alert-info"   ><input type="number" class="form-control" id="tte1E"></td>
                <td class="pd1E alert alert-success"   ><input type="number" class="form-control" id="pd2E"></td>
                <td class="pd1E alert alert-success"   ><input type="number" class="form-control" id="tss2E"></td>
                <td class="pd1E alert alert-success"   ><input type="number" class="form-control" id="tte2E"></td>
                <td class="pd1E alert alert-warning"   ><input type="number" class="form-control" id="pd3E"></td>
                <td class="pd1E alert alert-warning"   ><input type="number" class="form-control" id="tss3E"></td>
                <td class="pd1E alert alert-warning"   ><input type="number" class="form-control" id="tte3E"></td>
                <td class="pd1E alert alert-danger"   ><input type="number" class="form-control" id="pd4E"></td>
                <td class="pd1E alert alert-danger"   ><input type="number" class="form-control" id="tss4E"></td>
                <td class="pd1E alert alert-danger"   ><input type="number" class="form-control" id="tte4E"></td>
                </tr>
                </table>
                <div class="alert alert-danger" id="errorVacios" style="display:none">
                  <h4> <span class="glyphicon glyphicon-warning-sign"></span> Error uno o varios campos estan vacios.</h4>
                </div>
               <div class="col-lg-offset-5">
               <input type="hidden" id="filtro" value="'.$filtro.'">
                <a onclick="editAllFaltas();">
                <button class="btn btn-lg bg bg-primary">
                Modificar <span class="glyphicon glyphicon-edit"></span> 
                </button>
                </a> 
                </div>
                <div class="clearfix"> &zwj;</div>
                
      </div>
      </div>

';
}
$output .= '  

        <div class="table-responsive">  
           <table class="table table-bordered">  
                
                <tr class="alert alert-info">  
                     <th colspan="3" width=""></th>  
                     <th colspan="3"width="">1era Vez</th>
                     <th colspan="3" class="alert alert-success" width="">1era Reincidencia</th>
                     <th colspan="3"width="" class="alert alert-warning">2da Reincidencia</th>
                     <th colspan="3"width="" class="alert alert-danger">3era Reincidencia</th>
                     
                </tr>
                <tr class="alert alert-info">  
                     <th width="" >Nro</th>  
                     <th width="">Falta</th>  
                     <th width="">Clase</th>  
                    
                     <th width="">PD</th>
                     <th width="">TSS</th>
                     <th width="">TTE</th>
                     
                    <th width="" class="alert alert-success">PD</th>
                     <th width="" class="alert alert-success">TSS</th>
                     <th width="" class="alert alert-success">TTE</th>
                     
                     <th width="" class="alert alert-warning">PD</th>
                     <th width="" class="alert alert-warning">TSS</th>
                     <th width="" class="alert alert-warning">TTE</th>
                     
                     <th width="" class="alert alert-danger">PD</th>
                     <th width="" class="alert alert-danger">TSS</th>
                     <th width="" class="alert alert-danger">TTE</th>
                     
                     
                </tr>'; 
  for ($index = 0; $index < count($reg); $index++) 
  {
     
              
 
           $output .= '  
                <tr>  
                     <td class="nro" data-id1="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["nro"].'</td>  
                     <td class="falta"   data-id2="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["texto"].'</td>  
                     <td class="clase"   data-id3="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["clase"].'</td>
                     <td class="pd1 alert alert-info"   data-id4="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["pd1"].'</td>    
                     <td class="tss1 alert alert-info"   data-id5="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tss1"].'</td>    
                     <td class="tte1 alert alert-info"   data-id6="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tte1"].'</td> 
                         
                    <td class="pd2 alert alert-success"   data-id7="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["pd2"].'</td>    
                     <td class="tss2 alert alert-success"   data-id8="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tss2"].'</td>    
                     <td class="tte2 alert alert-success"   data-id9="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tte2"].'</td>
                         
                     <td class="pd3 alert alert-warning"   data-id10="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["pd3"].'</td>    
                     <td class="tss3 alert alert-warning"   data-id11="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tss3"].'</td>    
                     <td class="tte3 alert alert-warning"   data-id12="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tte3"].'</td>   
                         
                      <td class="pd4 alert alert-danger"   data-id13="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["pd4"].'</td>    
                     <td class="tss4 alert alert-danger"   data-id14="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tss4"].'</td>    
                     <td class="tte4 alert alert-danger"   data-id15="'.$reg[$index]["falta"].'" contenteditable>'.$reg[$index]["tte4"].'</td>    
                         
                  

                                         
                     <td><button type="button" name="delete_btn" data-id16="'.$reg[$index]["falta"].'" class="btn btn-danger btn_delete">  <span class="glyphicon glyphicon-trash"></span></button></td>  
                </tr>  
           ';  
  }  
       
   
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  

<script>
    function fetch_data()  
      {  
          var filtros = document.getElementById("filtro").value;
           $.ajax({  
                url:"select_reglamento.php",  
                method:"POST",
                data:{filtro:filtros},
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
    function editAllFaltas()  
      {  
            var pd1= document.getElementById("pd1E").value;
            var pd2= document.getElementById("pd2E").value;
            var pd3= document.getElementById("pd3E").value;
            var pd4= document.getElementById("pd4E").value;
            
            var tss1= document.getElementById("tss1E").value;
            var tss2= document.getElementById("tss2E").value;
            var tss3= document.getElementById("tss3E").value;
            var tss4= document.getElementById("tss4E").value;
            
            var tte1= document.getElementById("tte1E").value;
            var tte2= document.getElementById("tte2E").value;
            var tte3= document.getElementById("tte3E").value;
            var tte4= document.getElementById("tte4E").value;
            var filtros= document.getElementById("filtro").value;
            
            if(pd1 != '' &&  pd2 != '' &&  pd3 != '' &&  pd4 != '' &&  tss1 != '' &&  tss2 != '' &&  tss3 != '' &&  tss4 != '' &&  tte1 != '' &&  tte2 != '' &&  tte3 != '' &&  tte4 != '')
            {    
            
                 $.ajax({  
                url:"edit_falta_por_clase.php",  
                method:"POST",  
                data:{filtro:filtros,pd1:pd1,pd2:pd2,pd3:pd3,pd4:pd4,tss1:tss1,tss2:tss2,tss3:tss3,tss4:tss4,tte1:tte1,tte2:tte2,tte3:tte3,tte4:tte4,},    
                success:function(data){  
                    
                }
                
                });
                fetch_data();
          }else{
              document.getElementById("errorVacios").style.display="";
          }
          
          
     }  
</script>    