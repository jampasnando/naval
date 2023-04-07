<?php

$ca=$_POST["cadc"];

if (isset($_POST["fechac"]))
	$fe=$_POST["fechac"];
else
	$fe="%";


if (isset($_POST["semc"]))
	$sem=$_POST["semc"];
else
	$sem="%";
	


require_once "conector.php";
$r=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where month(fecha) like'%$fe' and id_curso like '%$sem' and tb4.id_estudiante='$ca' order by fecha",$mio);
$registro=mysql_num_rows($r);


 if ($registro > 0) {
   require_once 'Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("Escuela Naval Militar");
  
  		$tituloReporte = "Reporte de Faltas del Cadete";
		$titulosColumnas = array('Nro', 'Semestre','Nombre Cadete', 'Oficial Sancionante', 'Falta', 'Clase', 'PD', 'TSS', 'TTE', 'FECHA');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:J1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A3',  $titulosColumnas[0])
		            ->setCellValue('B3',  $titulosColumnas[1])
        		    ->setCellValue('C3',  $titulosColumnas[2])
            		->setCellValue('D3',  $titulosColumnas[3])
					->setCellValue('E3',  $titulosColumnas[4])
		            ->setCellValue('F3',  $titulosColumnas[5])
        		    ->setCellValue('G3',  $titulosColumnas[6])
            		->setCellValue('H3',  $titulosColumnas[7])		            		->setCellValue('I3',  $titulosColumnas[8])
        		    ->setCellValue('J3',  $titulosColumnas[9])
            		->setCellValue('K3',  $titulosColumnas[10]);
  
$n = 1;
   $i = 4;    
   while ($registro = mysql_fetch_object ($r)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue('A'.$i, $registro->$n)
            ->setCellValue('B'.$i, $registro->Semestre)
			->setCellValue('C'.$i, $registro->Name)
			->setCellValue('D'.$i, $registro->nombre)
			->setCellValue('E'.$i, $registro->Texto)
			->setCellValue('F'.$i, $registro->clase)
			->setCellValue('G'.$i, $registro->pd)
			->setCellValue('H'.$i, $registro->tss)
			->setCellValue('I'.$i, $registro->tte)
			->setCellValue('J'.$i, $registro->fecha);
     $i++;
      $n++;
   }
   
   $estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
				'underline'    => true,
               	'size' =>16,
	            	'color'     => array(
    	            	'rgb' => '000000'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				//'color' => PHPExcel_Style_Fill::FILL_NONE
				//'color'	=> array('argb' => 'FF220835')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => True, 
				'size' =>10,                         
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'E2E3E4'
        		),
        		'endcolor'   => array(
            		'argb' => 'E2E3E4'
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			

		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A3:J3')->applyFromArray($estiloTituloColumnas);		
	
				
		for($i = 'A'; $i <= 'J'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Cadete');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

   
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ReporteDetalle.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;

?>