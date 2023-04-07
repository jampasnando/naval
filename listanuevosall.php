<?php


/*if (isset($_POST["cadete"]))
	$cad=$_POST["cadete"];
else
	$cad="%";*/
	
	
	$fe=$_POST["fecha"];
//echo $fe;
require_once "conector.php";
$r=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha,  if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte ,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, a.id as me from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe'  and id_curso='7' order by Name",$mio);
$nr=mysql_num_rows($r);


$g=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha, if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte ,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, a.id as me from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe'  and id_curso='5' order by Name",$mio);
$gr=mysql_num_rows($g);





$t=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha, if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte ,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, a.id as me from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe'  and id_curso='3' order by Name",$mio);
$tr=mysql_num_rows($t);







$c=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha, if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte ,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, a.id as me from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe'  and id_curso='1' order by Name",$mio);
$cr=mysql_num_rows($c);





// if ($nr > 0) {
   require_once 'Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("Escuela Naval Militar");
  
  		$tituloReporte = "Reporte de Faltas del Cadete";
		$primerReporte = "Cuarto Curso";
		$segundoReporte = "Tercero Curso";
		$tercerReporte = "Segundo Curso";
		$cuartoReporte = "Primer Curso";
		$titulosColumnas = array('Nro','Nro Parte' ,'Nombre Cadete', 'Oficial Sancionante', 'Falta', 'Clase', 'PD', 'TSS', 'TTE', 'FECHA', 'COMENTARIO');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:K1');
					//->mergeCells('A1:B1')

						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$tituloReporte)
					->setCellValue('A2',$primerReporte)
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
					->setCellValue('L3',  $titulosColumnas[11]);
  
$n = 1;
   $i = 4;    
   while ($nr = mysql_fetch_object ($r)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue('A'.$i, $n)
            ->setCellValue('B'.$i, $nr->nroparte)
			->setCellValue('C'.$i, $nr->Name)
			->setCellValue('D'.$i, $nr->nombre)
			->setCellValue('E'.$i, $nr->Texto)
			->setCellValue('F'.$i, $nr->clase)
			->setCellValue('G'.$i, $nr->pd)
			->setCellValue('H'.$i, $nr->tss)
			->setCellValue('I'.$i, $nr->tte)
			->setCellValue('J'.$i, $nr->fecha)
			->setCellValue('K'.$i, $nr->comm);
     $i++;
      $n++;
   }
   
   $x = $i+3; 
   $p= $i+2;
   $objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$p,$segundoReporte)
    ->setCellValue('A'.$x,  $titulosColumnas[0]) 
		            ->setCellValue('B'.$x,  $titulosColumnas[1])
        		    ->setCellValue('C'.$x,  $titulosColumnas[2])
            		->setCellValue('D'.$x,  $titulosColumnas[3])
					->setCellValue('E'.$x,  $titulosColumnas[4])
		            ->setCellValue('F'.$x,  $titulosColumnas[5])
        		    ->setCellValue('G'.$x,  $titulosColumnas[6])
            		->setCellValue('H'.$x,  $titulosColumnas[7])		            		
					->setCellValue('I'.$x,  $titulosColumnas[8])
        		    ->setCellValue('J'.$x,  $titulosColumnas[9])
					->setCellValue('K'.$x,  $titulosColumnas[10]);
   $d = $i+4;  
 	$n = 1;			  
   while ($gr = mysql_fetch_object ($g)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
	  	    ->setCellValue('A'.$d, $n)
            ->setCellValue('B'.$d, $gr->nroparte)
			->setCellValue('C'.$d, $gr->Name)
			->setCellValue('D'.$d, $gr->nombre)
			->setCellValue('E'.$d, $gr->Texto)
			->setCellValue('F'.$d, $gr->clase)
			->setCellValue('G'.$d, $gr->pd)
			->setCellValue('H'.$d, $gr->tss)
			->setCellValue('I'.$d, $gr->tte)
			->setCellValue('J'.$d, $gr->fecha)
			->setCellValue('K'.$d, $gr->comm);
			

     $d++;
      $n++;
   }   

	
	  $y = $d+3; 
       $p= $d+2;

    $objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$p,$tercerReporte)
    ->setCellValue('A'.$y,  $titulosColumnas[0]) 
		            ->setCellValue('B'.$y,  $titulosColumnas[1])
        		    ->setCellValue('C'.$y,  $titulosColumnas[2])
            		->setCellValue('D'.$y,  $titulosColumnas[3])
					->setCellValue('E'.$y,  $titulosColumnas[4])
		            ->setCellValue('F'.$y,  $titulosColumnas[5])
        		    ->setCellValue('G'.$y,  $titulosColumnas[6])
            		->setCellValue('H'.$y,  $titulosColumnas[7])		            		
					->setCellValue('I'.$y,  $titulosColumnas[8])
        		    ->setCellValue('J'.$y,  $titulosColumnas[9])
					->setCellValue('K'.$y,  $titulosColumnas[10]);
   
        $o = $d+4;   
		$n = 1; 
   while ($tr = mysql_fetch_object ($t)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
	  
	  	    ->setCellValue('A'.$o, $n)
            ->setCellValue('B'.$o, $tr->nroparte)
			->setCellValue('C'.$o, $tr->Name)
			->setCellValue('D'.$o, $tr->nombre)
			->setCellValue('E'.$o, $tr->Texto)
			->setCellValue('F'.$o, $tr->clase)
			->setCellValue('G'.$o, $tr->pd)
			->setCellValue('H'.$o, $tr->tss)
			->setCellValue('I'.$o, $tr->tte)
			->setCellValue('J'.$o, $tr->fecha)
			->setCellValue('K'.$o, $tr->comm);
			

     $o++;
      $n++;
   }
   
   $z = $o+3;
   $p = $o+2;
   $objPHPExcel->setActiveSheetIndex(0)
 
	->setCellValue('A'.$p,$cuartoReporte)
	    ->setCellValue('A'.$z,  $titulosColumnas[0]) 
		            ->setCellValue('B'.$z,  $titulosColumnas[1])
        		    ->setCellValue('C'.$z,  $titulosColumnas[2])
            		->setCellValue('D'.$z,  $titulosColumnas[3])
					->setCellValue('E'.$z,  $titulosColumnas[4])
		            ->setCellValue('F'.$z,  $titulosColumnas[5])
        		    ->setCellValue('G'.$z,  $titulosColumnas[6])
            		->setCellValue('H'.$z,  $titulosColumnas[7])		            		
					->setCellValue('I'.$z,  $titulosColumnas[8])
        		    ->setCellValue('J'.$z,  $titulosColumnas[9])
					->setCellValue('K'.$z,  $titulosColumnas[10]);
   
      $m = $o+4;  
	  $n = 1;  
   while ($cr = mysql_fetch_object ($c)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
	  
	  	    ->setCellValue('A'.$m, $n)
            ->setCellValue('B'.$m, $cr->nroparte)
			->setCellValue('C'.$m, $cr->Name)
			->setCellValue('D'.$m, $cr->nombre)
			->setCellValue('E'.$m, $cr->Texto)
			->setCellValue('F'.$m, $cr->clase)
			->setCellValue('G'.$m, $cr->pd)
			->setCellValue('H'.$m, $cr->tss)
			->setCellValue('I'.$m, $cr->tte)
			->setCellValue('J'.$m, $cr->fecha)
			->setCellValue('K'.$m, $cr->comm);
			

     $m++;
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
		$objPHPExcel->getActiveSheet()->getStyle('A'.$x.':K'.$x)->applyFromArray($estiloTituloColumnas);		
        $objPHPExcel->getActiveSheet()->getStyle('A'.$y.':K'.$y)->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$z.':K'.$z)->applyFromArray($estiloTituloColumnas);
		
				
		for($i = 'A'; $i <= 'K'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Reporte');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

   
//}



header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ReporteDiario.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
//exit;

//header('Content-Type: application/vnd.ms-excel');
//$nomarch='Content-Disposition: attachment;filename="ReporteDiario.xls"';
//header($nomarch);
//header('Cache-Control: max-age=0');
//$escribe2003=new PHPExcel_Writer_Excel5($objPHPExcel);
////$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//
//$escribe2003->save('php://output'); 
//
?>
