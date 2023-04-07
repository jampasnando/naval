

<?php
require_once './class/class.php';
require_once '../dompdf/dompdf_config.inc.php';

$e = new Estudiante();
$curso = $_GET["curso"];
$rango = $_GET["rango"];
$valor = $_GET["valor"];
$semestre = $_GET["semestre"];
$anio = $_GET["anio"];
$fecha= date("Y-m-d");



$nombreArch = "NotasCadetes".$rango." del ".$fecha.".pdf";
$output = '';


$output .= '
    <html>
    <head>
    </head>
    <body>
        <table style="font-size: 16px">
            <tr >
                <td colspan="3" >
                 ESCUELA NAVAL MILITAR
                </td>
            </tr>
            <tr >
                <td colspan="3" >
                 COMANDO DE BATALLON
                </td>
            </tr>
            <tr >
                <td colspan="3" >
                     BOLIVIA
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr >
                <td colspan="6" style="text-align: center">
                <u> <strong>   NOTAS DEL ';
 
                    if($semestre==1)
                    {
                        $semestre = "1ER.";
                    }
                    if($semestre==2)
                    {
                        $semestre = "2DO.";
                    }
                    
                    $output .= $semestre.' SEMESTRE DE DICIPLINA  DE ';
                        
                        if($valor == 1)
                        {
                            $valor= "1ER.";
                        }
                        if($valor == 2)
                        {
                            $valor= "2DO.";
                        }
                        if($valor == 3)
                        {
                            $valor= "3ER.";
                        }
                        if($valor == 4)
                        {
                            $valor= "4TO.";
                        }
                        
                            
                        $output.= $valor.' AÑO. <strong> </u>
                 </td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr >
                <td style="border: black 1px solid;" style="background-color: #cccccc">
                   <strong> Nro </strong>
                </td >
                <td style="border: black 1px solid;" style="background-color: #cccccc">
                   <strong> Grado</strong>
                </td>
                <td style="border: black 1px solid;" style="background-color: #cccccc">
                   <strong> Ap. Paterno</strong>
                </td>
                <td style="border: black 1px solid;" style="background-color: #cccccc">
                   <strong> Ap. Materno</strong>
                </td>
                <td style="border: black 1px solid;" style="background-color: #cccccc">
                   <strong> Nombres</strong>
                </td>
                <td style="border: black 1px solid;" style="background-color: #cccccc">
                   <strong> Nota</strong>
                </td>
                
                    
                   
                    
            </tr>';
             
                     $reg = $e->listarEstudiantes($curso);
                   for ($index = 0; $index < count($reg); $index++) {
                       
                   
           $output.=' <tr> 
                
                <td style="border: black 1px solid;">';
                    $output.= ($index+1).'
                </td>
                <td style="border: black 1px solid;">';
                    $output.= $rango.'
                </td>
                <td style="border: black 1px solid;">';
                   $output.=$reg[$index]["apellidoPaterno"].'
                </td>
                <td style="border: black 1px solid;">';
                   $output.=$reg[$index]["apellidoMaterno"].'
                </td >
                <td style="border: black 1px solid;">';
                    $output.=$reg[$index]["nombre"].'
                </td>
                <td style="border: black 1px solid;">';
                   $output.=$reg[$index]["pd"].'
                </td>';
                
                                
           $output.= '</tr>';
            
                   }
            
           $output.=' <tr>
               </table>
            <br>
            <br>
            <br>
            
            <table>
            <tr>
                <td colspan="7" style="text-align: center" style="border: black 1px solid;">
                    
                </td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center" style="border: black 1px solid;text-align: center;">
            <strong>JEFE DE LA DIVISIÓN DISCIPLINA DE LA E.N.M</strong>
                </td>
            </tr>
             <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
           <tr>
                <td colspan="7" style="text-align: center" style="border: black 1px solid;">
                    
                </td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center" style="border: black 1px solid;text-align: center;">
                    <strong>COMANDANTE DE BATALLÓN DE DD. Y CC.CC. DE LA E.N.M.</strong>   
                </td>
            </tr>
        </table>
       
    </body>
</html>';

      $codigoHTML='';



        
        
        
$codigoHTML= utf8_decode($output);

$dompdf=new DOMPDF();
 
$dompdf->set_paper("A4", "portrait");
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream($nombreArch.".pdf");     
      ?>


