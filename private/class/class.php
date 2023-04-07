<?php
error_reporting(0);
session_start();
class Conectar 
{
	public static function con()
	{
		$con=mysql_connect("mysql1212.ixwebhosting.com","A956517_naval","Naval12345");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("A956517_naval");
		return $con;
		
	}
}
//--------------------------------------------------------------------------------------------------------
class Logueo_usuario
{
	
	private $nombre=array();
	
	//***********************************************
	//Funci�n para que el usuario se loguee
	public function logueo()
	{
		
		$user=$_POST["user"];
		
		$pass_php=$_POST["pass"];
                
                
                echo $user.$pass_php;
		
		$sql="select * from usuario where login='$user' and password='$pass_php'";
		
		$res=mysql_query($sql,Conectar::con());
		if (mysql_num_rows($res)==0)
		{
			echo "<script type='text/javascript'>
			alert('Los datos ingresados no existen en la base de datos');
			window.location='index.php';
			</script>";
		}else
		{
			//echo "si existen";
			if ($reg=mysql_fetch_array($res))
			{
			     $_SESSION["id_usuario"]=$reg["id_usuario"];
                             $_SESSION["nombre"]=$reg["login"]; 
                                
                                if( $reg["permiso"] == 1)
                                {
				header("Location: admin.php");
                                }else{
                                    
                                    header("Location: index.php");
                                }
			}
		}
	}

	function deslogueo(){
		
	}

}

class Docente
{
    public function eliminarCadete($id) {
        $sql="DELETE FROM estudiantes where id = '$id'";
	$res=mysql_query($sql,Conectar::con());
        
        $sql2="DELETE FROM faltas_estudiantes where id_estudiante = '$id'";
	$res2=mysql_query($sql2,Conectar::con());
        
        $sql3="DELETE FROM cursos_estudiantes where id_estudiante = '$id'";
	$res3=mysql_query($sql3,Conectar::con());
        
        $sql4="DELETE FROM observados where id_estudiante = '$id'";
	$res4=mysql_query($sql4,Conectar::con());
    }
    public function desactivarFalta($id) {
        $sql="update reglamento set activo='1' where falta = '$id'";
	$res=mysql_query($sql,Conectar::con());
    }
    public function nuevaFalta($nro,$falta,$clase) {
        $puntos= Docente::buscarFaltas($clase);
        $pd1=0;
            $pd2=0;
            $pd3=0;
            $pd4=0;
            $tte1=0;
            $tte2=0;
            $tte3=0;
            $tte4=0;
            $tss1=0;
            $tss2=0;
            $tss3=0;
            $tss4=0;
        
        if($puntos != null)
        {
            $pd1=$puntos[0]["pd1"];
            $pd2=$puntos[0]["pd2"];
            $pd3=$puntos[0]["pd3"];
            $pd4=$puntos[0]["pd4"];
            $tte1=$puntos[0]["tte1"];
            $tte2=$puntos[0]["tte2"];
            $tte3=$puntos[0]["tte3"];
            $tte4=$puntos[0]["tte4"];
            $tss1=$puntos[0]["tss1"];
            $tss2=$puntos[0]["tss2"];
            $tss3=$puntos[0]["tss3"];
            $tss4=$puntos[0]["tss4"];
            
        }
      
        $sql="insert into reglamento values('','$nro','$falta','$clase','','$pd1','$tss1','$tte1','$pd2','$tss2','$tte2','$pd3','$tss3','$tte3','$pd4','$tss4','$tte4','0')";
	$res=mysql_query($sql,Conectar::con());
        
    }
     public function updateReglamentoPorClase($clase, $pd1,$pd2,$pd3,$pd4,$tte1,$tte2,$tte3,$tte4,$tss1,$tss2,$tss3,$tss4  ) {
        $sql="update reglamento set pd1='$pd1', pd2='$pd2' , pd3='$pd3' , pd4='$pd4', tte1='$tte1' , tte2='$tte2' , tte3='$tte3' , tte4='$tte4' , tss1='$tss1', tss2='$tss2', tss3='$tss3', tss4='$tss4' where clase = '$clase'";
	$res=mysql_query($sql,Conectar::con());
    }
    public function updateReglamento($id , $texto , $nombre_columna  ) {
        $sql="update reglamento set ".$nombre_columna."='$texto' where falta = '$id'";
	$res=mysql_query($sql,Conectar::con());
    }
    public function listarReglamento($filtro){
        $datos = null;
        if($filtro == 't')
        {
        $sql="select * from reglamento where activo='0' order by nro";           
        }else{
            $sql="select * from reglamento where clase='$filtro' and activo='0' order by nro";
        }
        $res=mysql_query($sql,Conectar::con());
	
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos; 
        
    }

    public function eliminarFalta($id)
    {
        $falta = Docente::faltaEstById($id);
        Estudiante::updatePuntosEstudiante($falta[0]["id_estudiante"],$falta[0]["pd"] ,$falta[0]["tte"] ,$falta[0]["tss"]);
        $sql="DELETE FROM faltas_estudiantes where id='$id'";           
	$res=mysql_query($sql,Conectar::con());
        
        
    }


    
    public function updateFoto($foto,$id){
         $sql="update estudiantes set foto='$foto' where id='$id'";
            
	$res=mysql_query($sql,Conectar::con());
    }
    
    public function listarTte($curso,$fechaIni,$fechaFin){
         $sql="SELECT r.texto as falta, fe.tte, fe.fecha, e.nombre as nombre_estudiante, e.apellidoPaterno , e.apellidoMaterno, c.valor, r.clase, fe.tss 
FROM cursos c , cursos_estudiantes ce, estudiantes e , faltas_estudiantes fe , reglamento r 
WHERE c.id = '$curso'
AND c.id = ce.id_curso 
AND ce.id_estudiante = e.id 
AND e.id = fe.id_estudiante 
AND r.falta = fe.id_falta
AND fe.fecha BETWEEN '$fechaIni' AND '$fechaFin'
order by e.apellidoPaterno";
            
	$res=mysql_query($sql,Conectar::con());
	$datos=null;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos; 
        
    }

    public function numeroDeReincidencias($id_falta,$id_estudiante)
    {
        $sql="SELECT count(*) from faltas_estudiantes where id_falta='$id_falta' AND id_estudiante='$id_estudiante'";
            
	$res=mysql_query($sql,Conectar::con());
	if ($row = mysql_fetch_row($res)) {
            $respuesta = trim($row[0]);
        }        
	    return $respuesta;
            
    }
    
    public function tipoFalta($falta)
    {
        $respuesta = null;
        $sql="SELECT clase from reglamento where falta='$falta'";
            
	$res=mysql_query($sql,Conectar::con());
	if ($row = mysql_fetch_row($res)) {
            $respuesta = trim($row[0]);
        }        
	    return $respuesta;
            
    }

    public function registrarMulta($texto,$id_estudiante,$pd1,$tss1,$tte1,$sancionador,$nro,$nroParte,$fecha,$curso,$valor) {
        $sql ="insert into faltas_estudiantes values('$texto','$id_estudiante','$pd1','$tss1','$tte1','$sancionador','$nro','$nroParte','$fecha','','0','0','0','0','0','0','0','0','')";
                $resp= mysql_query($sql,Conectar::con());
                
                $resPd= Docente::pdEstudiante($id_estudiante) - $pd1;
                $resTss= Docente::tssEstudiante($id_estudiante) + $tss1;
                $resTte= Docente::tteEstudiante($id_estudiante)+ $tte1;
                        
        $sql2 ="update estudiantes set pd='$resPd', tss='$resTss' , tte= '$resTte' WHERE id = '$id_estudiante'";
                $resp2= mysql_query($sql2,Conectar::con());
                $estaObservado = Estudiante::estaObservado($id_estudiante);
                    if($resPd <= 60 && $valor == 1 && !$estaObservado)
                    {
                     $sql3 ="insert into observados values('','$id_estudiante','0')";
                     $resp3= mysql_query($sql3,Conectar::con());
                    echo "<script type='text/javascript'>
                     alert('La ultima falta ingresada esta en observacion el estudiante multado fue llevado a la sala de observaciones');
                     </script>";
                    }
                    if($resPd <= 68 && $valor == 2 && !$estaObservado)
                    {
                     $sql3 ="insert into observados values('','$id_estudiante','0')";
                     $resp3= mysql_query($sql3,Conectar::con());
                     echo "<script type='text/javascript'>
                     alert('La ultima falta ingresada esta en observacion el estudiante multado fue llevado a la sala de observaciones');
                     </script>";
                    }
                    if($resPd <= 75 && $valor == 3 && !$estaObservado)
                    {
                     $sql3 ="insert into observados values('','$id_estudiante','0')";
                     $resp3= mysql_query($sql3,Conectar::con());
                     echo "<script type='text/javascript'>
                     alert('La ultima falta ingresada esta en observacion el estudiante multado fue llevado a la sala de observaciones');
                     </script>";
                    }
                    if($resPd <= 80 && $valor == 4 && !$estaObservado)
                    {
                     $sql3 ="insert into observados values('','$id_estudiante','0')";
                     $resp3= mysql_query($sql3,Conectar::con());
                     echo "<script type='text/javascript'>
                     alert('La ultima falta ingresada esta en observacion el estudiante multado fue llevado a la sala de observaciones');
                     </script>";
                    }
                 
                echo "<script type='text/javascript'>
			
			window.location='../registracad.php?id_estudiante=".$id_estudiante."&curso=".$curso."';
			</script>";
		
    }
    public function pdEstudiante($id) {
        
        $sql="SELECT pd from estudiantes where id=$id";
            
	$res=mysql_query($sql,Conectar::con());
	if ($row = mysql_fetch_row($res)) {
            $pd = trim($row[0]);
        }        
	    return $pd;
        
    }
    
    public function tssEstudiante($id) {
        
        $sql="SELECT tss from estudiantes where id=$id";
            
	$res=mysql_query($sql,Conectar::con());
	if ($row = mysql_fetch_row($res)) {
            $tss = trim($row[0]);
        }        
	    return $tss;
        
    }
    public function tteEstudiante($id) {
        
        $sql="SELECT tte from estudiantes where id=$id";
            
	$res=mysql_query($sql,Conectar::con());
	if ($row = mysql_fetch_row($res)) {
            $tte = trim($row[0]);
        }        
	    return $tte;
        
    }
    public function existeEstudiante($nombre,$apellidoP,$apellidoM,$curso) 
    {
        $res = false;
	$sql = "select * from estudiantes, cursos, cursos_estudiantes 
                WHERE estudiantes.id = cursos_estudiantes.id_estudiante
                AND cursos_estudiantes.id_curso = cursos.id
                AND cursos.id = '$curso'
                AND estudiantes.nombre = '$nombre'
                AND estudiantes.apellidoPaterno = '$apellidoP'
                AND estudiantes.apellidoMaterno = '$apellidoM'";
        
        $resp= mysql_query($sql,Conectar::con());
        if ($row = mysql_fetch_row($resp)) 
        {
           $res = true;
        }        
	 return $res; 
                
    }
    
    
    
    public function registrarEstudiante($nombre,$apellidoP,$apellidoM,$foto,$pd,$tss,$tte,$curso,$matricula)
	{
            if(!Docente::existeEstudiante($nombre,$apellidoP,$apellidoM,$curso))
            {
        
                $datos= null;
		$sql = "insert into estudiantes values('','$nombre','$apellidoP','$apellidoM','$foto','$pd','$tss','$tte','$matricula')";   
                $resp= mysql_query($sql,Conectar::con());
                $id = mysql_insert_id();
                $sql2="insert into cursos_estudiantes values('$curso','$id')";
                $resp2= mysql_query($sql2,Conectar::con());
            }else{
                   
            }   
                	
	}
        public function ultimoId(){
            
            
        $sql="SELECT MAX(id) AS id FROM estudiantes";
            
	$res=mysql_query($sql,Conectar::con());
	if ($row = mysql_fetch_row($res)) {
            $id = trim($row[0]);
                
			return $id;
           }
        }

        public function buscarFaltas($clase)
        {
          $sql="SELECT *
            From reglamento
            where clase = '$clase' and activo='0'";
	$res=mysql_query($sql,Conectar::con());
	$datos=null;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                           
			return $datos;   
        }
        public function buscarFaltasCN($clase,$nro)
        {
          $sql="SELECT *
            From reglamento
            where clase = '$clase' and nro='$nro' and activo='0'";
	$res=mysql_query($sql,Conectar::con());
	$datos=null;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                           
			return $datos;   
        }
        public function faltaById($falta){
            $datos = null;
             $sql="SELECT *
             From reglamento
            WHERE falta = '$falta'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
    
        }
        public function faltaEstById($id){
             $sql="SELECT *
             From faltas_estudiantes
            WHERE id = '$id'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
    
        }
        public function sancionadorById($id){
             $sql="SELECT *
             From oficiales
            WHERE id = '$id'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
    
        }
        
        public function listaSancionantes()
        {
          $sql="SELECT *
            From oficiales
            ";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;   
        }
        
        public function listaCursos()
        {
          $sql="SELECT *
            From cursos
           
            ";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;   
        }
         public function cursoById($id){
             $sql="SELECT *
             From cursos
            WHERE id = '$id'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
         }
        

}

class Estudiante
{
    public function updatePuntosEstudiante($id,$pd ,$tte ,$tss) {
        
        $estudiante= Estudiante::estudianteById($id);
        $pdF = $estudiante[0]["pd"] + $pd;
        $tteF = $estudiante[0]["tte"] - $tte;
        $tssF = $estudiante[0]["tss"] - $tss;
        
        $sql="update estudiantes set pd='$pdF', tss='$tssF',tte='$tteF' where id ='$id'";
	$res=mysql_query($sql,Conectar::con());
    }
    public function updateFalta($id , $texto , $nombre_columna  ) {
        $sql="update faltas_estudiantes set ".$nombre_columna."='$texto' where id = '$id'";
	$res=mysql_query($sql,Conectar::con());
    }
    
    public function deleteFalta($id_estudiante,$id_falta  , $texto , $nombre_columna  ) {
        $sql="update faltas_estudiantes set ".$nombre_columna."='$texto' where id_falta = '$id_falta' AND id_estudiante='$id_estudiante'";
	$res=mysql_query($sql,Conectar::con());
    }
    
    
    public function estaObservado($id_estudiante) {
        
        $datos = null;
        $sql="select count(*) as estudiante from observados where id_estudiante='$id_estudiante'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
            $nro= $datos[0]["estudiante"];
            if($nro == 0)
            {
                $res = false;
            }else{
                $res=true;
            }
            return $res;
    }
    
    public function leerObservados($curso) {
        
        $observaciones=Estudiante::listaObservadosNovistos($curso);
        $datos = null;
        for ($index = 0; $index < count($observaciones); $index++) {
        $id=$observaciones[$index]["id"];
        $sql="update observados set visto='1'
             where id='$id'";
	$res=mysql_query($sql,Conectar::con());    
        }
        
        
	
        
        
    }
    
    
    public function listaObservadosNovistos($curso) {
        $datos = null;
        $sql="SELECT observados.id
From observados, cursos_estudiantes, cursos
WHERE visto='0'
AND observados.id_estudiante = cursos_estudiantes.id_estudiante
AND cursos_estudiantes.id_curso= cursos.id
AND cursos.id='$curso'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
        
        
    }
    
    
    public function listaObservados($curso) {
        $datos = null;
        $sql="SELECT observados.id_estudiante       
From observados, cursos_estudiantes, cursos
WHERE observados.id_estudiante = cursos_estudiantes.id_estudiante
AND cursos_estudiantes.id_curso= cursos.id
AND cursos.id='$curso'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
        
        
    }
    
    
    public function observadosNovistos($curso) {
        $datos = null;
        $sql="SELECT count(*) as noVistos
From observados, cursos_estudiantes, cursos
WHERE visto='0'
AND observados.id_estudiante = cursos_estudiantes.id_estudiante
AND cursos_estudiantes.id_curso= cursos.id
AND cursos.id='$curso'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos[0]["noVistos"];
        
        
    }
    
    public function listarEstudiantes($curso) {
        $datos = null;
        $sql="SELECT *
From cursos_estudiantes ce, estudiantes e
WHERE ce.id_curso ='$curso'
AND ce.id_estudiante = e.id
order by e.apellidoPaterno asc";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
    }
    
    public function estudianteById($id) {
        $datos=null;
        $sql="SELECT *
            From estudiantes
            WHERE id = '$id'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
    }
    public function mostrarFaltasEstudiante($id) {
        $datos = null;
        $sql="SELECT *
            From faltas_estudiantes
            WHERE id_estudiante = '$id'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
    }
    
    public function faltaById($id){
        $datos= null;
        $sql="SELECT *
            From reglamento
            WHERE falta = '$id'";
	$res=mysql_query($sql,Conectar::con());
	$datos;
        while ($reg=mysql_fetch_assoc($res))
		{
			$datos[]=$reg;
		}
                
			return $datos;
        
    }
    
}



?>