<?php


	$cad=$_POST["cadete"];
	$fe=$_POST["fecha"];


require_once "conector.php";
$r=mysql_query("select id, id_curso as Semestre,Name,  sum(if(month(fecha)='1',1,0)) as Jul, sum(if(month(fecha)='2',1,0)) as Ago , sum(if(month(fecha)='3',1,0)) as Sep , sum(if(month(fecha)='4',1,0)) as Oct , sum(if(month(fecha)='5',1,0)) as Nov,  sum(if(month(fecha)='6',1,0)) as Dic,  format(sum(if(month(fecha)='1',pd,0)),1) as pdjul,  format(sum(if(month(fecha)='2',pd,0)),1) as pdago,  format(sum(if(month(fecha)='3',pd,0)),1) as pdsep,  format(sum(if(month(fecha)='4',pd,0)),1) as pdoct,  format( sum(if(month(fecha)='5',pd,0)),1) as pdnov,   format(sum(if(month(fecha)='6',pd,0)),1) as pddic,  sum(pd) as nota, if(id_curso=1,cast(1 as char),if(id_curso=3,cast(1.25 as char),if(id_curso=5,cast(1.65 as char),if(id_curso=7,cast(2 as char),'')))) as Semes from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante group by Name  order by Semestre,  Name  ",$mio);
$registro=mysql_num_rows($r);


 if ($registro > 0) {
   require_once 'Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("Escuela Naval Militar");
  
  		$tituloReporte = "Reporte Resumen de Faltas";
		$titulosColumnas = array('Nro','Sem','Nombre Cadete','Ene','Nota Ene','Feb','Nota Feb','Mar','Nota Mar','Abr','Nota Abr','May','Nota May','Jun','Nota Jun','PD Acum','Total Sem');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:Q1');
						
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
            		->setCellValue('H3',  $titulosColumnas[7])		            		
					->setCellValue('I3',  $titulosColumnas[8])
        		    ->setCellValue('J3',  $titulosColumnas[9])
					->setCellValue('K3',  $titulosColumnas[10])
					->setCellValue('L3',  $titulosColumnas[11])
					->setCellValue('M3',  $titulosColumnas[12])
					->setCellValue('N3',  $titulosColumnas[13])
					->setCellValue('O3',  $titulosColumnas[14])
					->setCellValue('P3',  $titulosColumnas[15])
					->setCellValue('Q3',  $titulosColumnas[16]);
  
$n = 1;
   $i = 4;    
   while ($registro = mysql_fetch_object ($r)) {
       
	   	$jul=(100-($registro->pdjul*$registro->Semes));
		$ago=(100-($registro->pdago*$registro->Semes));
		$sep=(100-($registro->pdsep*$registro->Semes));
		$oct=(100-($registro->pdoct*$registro->Semes));
		$nov=(100-($registro->pdnov*$registro->Semes));
		$dic=(100-($registro->pddic*$registro->Semes));

$tot= (($jul+$ago+$sep+$oct+$nov)/5);
		$tot = round($tot,2);
		
		if (($jul)>0){
		$jul=round($jul,1);
		}
		else
		{$jul=0;}
		
		if (($ago)>0){
		$ago=round($ago,1);
		}
		else
		{$ago=0;}
		
		if (($sep)>0){
		$sep=round($sep,1);
		}
		else
		{$sep=0;}
		
		if (($oct)>0){
		$oct=round($oct,1);
		}
		else
		{$oct=0;}
		
		if (($nov)>0){
		$nov=round($nov,1);
		}
		else
		{$nov=0;}
		
		if (($dic)>0){
		$dic=round($dic,1);
		}
		else
		{$dic=0;}

	   
		
      $objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue('A'.$i, $n)
            ->setCellValue('B'.$i, $registro->Semestre)
			->setCellValue('C'.$i, $registro->Name)
			->setCellValue('D'.$i, $registro->Jul)
			->setCellValue('E'.$i, $jul)
			->setCellValue('F'.$i, $registro->Ago)
			->setCellValue('G'.$i, $ago)
			->setCellValue('H'.$i, $registro->Sep)
			->setCellValue('I'.$i, $sep)
			->setCellValue('J'.$i, $registro->Oct)
			->setCellValue('K'.$i, $oct)
			->setCellValue('L'.$i, $registro->Nov)
			->setCellValue('M'.$i, $nov)
			->setCellValue('N'.$i, $registro->Dic)
			->setCellValue('O'.$i, $dic)
			->setCellValue('P'.$i, $registro->nota)
			->setCellValue('Q'.$i, $tot);
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
			

		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A3:Q3')->applyFromArray($estiloTituloColumnas);		
	
				
		for($i = 'A'; $i <= 'J'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Lista Resumen');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

   
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ReporteResumen.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
?>