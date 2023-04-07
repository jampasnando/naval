<?php
require_once '../dompdf/dompdf_config.inc.php';
require_once './class/class.php';
$e= new Estudiante();
$d= new Docente();

$sancionantes = $d->listaSancionantes();
$curso = $_GET["curso"];
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
$todos= $e->listarEstudiantes($curso);


$output = '';  


    $output .= '  
        
         
   <!DOCTYPE html>
<html>
<head>

    
    
   
    </head>

 
<body>';

for ($in = 0; $in < count($todos); $in++) {
    
$id_estudiante = $todos[$in]["id"];

$reg = $e->mostrarFaltasEstudiante($id_estudiante);
$reg2= $e->estudianteById($id_estudiante);

//--------------------------------------------------


        

    $output .= '           <table style="font-size:11px">
               <tr>
               <td>
               <img src="../upload/'.$reg2[0]["foto"].'" class="img img-responsive" width="130px" heigth="50px">
               </td>
               <td>
               <h4>'.$rango.' '.$reg2[0]["apellidoPaterno"].' '.$reg2[0]["apellidoMaterno"].' '.$reg2[0]["nombre"].'</h4>
               <h4>PD:'.$reg2[0]["pd"].' </h4>
               <h4>TSS:'.$reg2[0]["tss"].' </h4>
               <h4>TTE:'.$reg2[0]["tte"].' </h4>
               </td>
               <td>
               </td>
               <td>
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
               </td>          
	      </tr>
             </table>


      
              <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="font-size:10px">  

                        <tr  style="background-color: #99ccff">
                      <th colspan="4" >
                          CODIGO DICIPLINA
                      </th>
                      <th colspan="3">
                          
                      </th>
                      <th colspan="4">
                          Calificacion
                      </th>
                      <th colspan="7">
                          PDATMA
                      </th>
                  </tr>
                  <tr  style="background-color: #99ccff">
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
                        <td >'.$reg[$index]["fecha"].'</td>  
                        <td '.$reg[$index]["nro"].'</td>  
                        <td >'.$falta[0]["texto"].'</td>
                        <td >'.$d->sancionadorById($reg[$index]["sancionante"])[0]["nombre"].' 
                     

                      ';
                       

                     $output .='
                       </td>  
                        <td>'.$reg[$index]["nroParte"].'</td>  
                        <td>'.$falta[0]["clase"].'</td> 
                        <td>'.$reg[$index]["reinci"].'</td>
                        <td>'.$reg[$index]["pd"].'</td>
                        <td>'.$reg[$index]["tss"].'</td>  
                        <td>'.$reg[$index]["tte"].'</td>  
                        <td>'.$reg[$index]["pdas"].'</td>
                        <td>'.$reg[$index]["ttea"].'</td>   
                        <td>'.$reg[$index]["ttec"].'</td>
                        <td>'.$reg[$index]["btte"].'</td>
                        <td>'.$reg[$index]["tssa"].'</td>
                        <td>'.$reg[$index]["tssc"].'</td>
                        <td>'.$reg[$index]["btss"].'</td>
                        <td>'.$reg[$index]["pdat"].'</td>    
                     </tr>  
              ';  
     }  


    $output .= '</table>  
         

<br><table style="page-break-after:always;"></br></table><br>';

}
    
   $output .= '</body>
    </html>
    ';  
     

//--------------------------------------------------



$codigoHTML='';
$titulo="prueba";


        
        
        
//$codigoHTML= utf8_decode($output);

//$dompdf=new DOMPDF();
 
//$dompdf->set_paper("A4", "landscape");
//$dompdf->load_html($codigoHTML);
//ini_set("memory_limit","128M");
//$dompdf->render();
//$dompdf->stream($titulo.".pdf");
echo $codigoHTML;
?>