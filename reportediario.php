<?php

error_reporting(0);
	$cad=$_POST["cadete"];
	$fe=$_POST["fecha"];


require_once "conector.php";
$r=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha, me,  if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte ,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, id as me from faltas_estudiantes  as a left join (select nombre, id as of from oficiales) as b on a.sancionante=b.of)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe' and Name like'$cad' and id_curso='2' order by Name",$mio);
$nr=mysql_num_rows($r);

$g=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha, me,  if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm  from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, id as me from faltas_estudiantes  as a left join (select nombre, id as of from oficiales) as b on a.sancionante=b.of)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe' and Name like'$cad' and id_curso='4' order by Name",$mio);
$gr=mysql_num_rows($g);

$t=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha, me,  if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte ,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, id as me from faltas_estudiantes  as a left join (select nombre, id as of from oficiales) as b on a.sancionante=b.of)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe' and Name like'$cad' and id_curso='6' order by Name",$mio);
$tr=mysql_num_rows($t);

$c=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha, me,  if(nroParte REGEXP('[0-9]'),CAST(nroParte AS CHAR),concat('C-',CAST(me AS CHAR))) AS nroparte ,  if(nroParte REGEXP('[0-9]'),'',CAST(nroParte AS CHAR)) AS comm from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre, id as me from faltas_estudiantes  as a left join (select nombre, id as of from oficiales) as b on a.sancionante=b.of)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where fecha like'$fe' and Name like'$cad' and id_curso='8' order by Name",$mio);
$cr=mysql_num_rows($c);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="../menu1/stmenu.js">

</script>

<script type="text/javascript">
nu=0;
nr=<?php echo $nr;?>;







function recarga()
{
	
	document.form5.action="reportediario.php";
	document.form5.submit()
}

function envia(x)
{
	 document.form5.action="listanuevosall.php";
	 document.form5.submit();
}

function anula(a,b)
{

var txt;
var r = confirm("Esta Seguro de Anular esta Falta???");
if (r == true) {
    
	 document.getElementById("reg").value=a;
	 document.form1.action="anula.php";
	 document.form1.submit();
	 alert ("Anular");
} else {
    txt = "No hubo nunguna anulacion!";
}


}


function cambia(j)
{
	
	ne=j.value;
	alert(ne);
/*fila=x.parentElement.parentElement.rowIndex;
document.all.tabla.rows[fila].cells[6].innerHTML="<select name='ob"+fila+"' id='ob"+fila"><option value='Viaje'>Viaje</option></select><input type='hidden' name='obo"+fila+"' id='"+fila+"' value='"+document.all.tabla.rows[fila].cells[2].innerText+"'>";*/
}

</script>

</head>

<body leftmargin="0" topmargin="0" >
<script type="text/javascript" src="../menu1/menu1.js"></script>

<form id="form5" name="form5" method="post" action="reportediario.php">
      <p>
        <select name="fecha" id="fecha" onchange="document.form5.submit();">
          <option value="%" selected="selected">Fecha</option>
          <option value="%">All</option>
          <?php
      	//require_once "conector.php";
		$s=mysql_query("select fecha from faltas_estudiantes  group by fecha order by fecha desc",$mio);
		
		while ($fs=mysql_fetch_row($s))
		{
			
			if ($fe==$fs[0])
				echo '<option value="'.$fs[0].'" selected="selected">'.$fs[0].'</option>';
			else
				echo '<option value="'.$fs[0].'">'.$fs[0].'</option>';
		}
	  ?>
          
        </select>
      </p>
      <p>
        
        
        
        <select name="cadete" id="cadete" onchange="document.form5.submit();">
          <option value="%" selected="selected">Cadete</option>
          <option value="%">All</option>
          <?php
	  //echo $fe;
	  //echo $cad;
      	//require_once "conector.php";
		$s=mysql_query("select concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes  group by Name order by Name asc",$mio);
		
		while ($fs=mysql_fetch_row($s))
		{
			
			if ($cad==$fs[0])
				echo '<option value="'.$fs[0].'" selected="selected">'.$fs[0].'</option>';
			else
				echo '<option value="'.$fs[0].'">'.$fs[0].'</option>';
		}
	  ?>
          
        </select>
      </p>
      

</form>

<form id="form1" name="form1" method="post" action="listanuevosall.php">
  <strong><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></strong>PRIMER A&Ntilde;O<br />
  <table width="950" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla">
    <tr bgcolor="#006699">
     <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
     <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro Parte</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Curso</font></div></td>
      <td width="153"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cadete</font></td>
      <td width="173"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficial Sancionante</font></div></td>
      
      <td width="118"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Falta</font></div></td>
      
      <td width="49"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Clase</font></div></td>
      <td width="23"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Td</font></div></td>
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tss</font></div></td>
      <td width="25"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tte</font></div></td>
      <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha</font></div></td>
      <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Commentario</font></div></td>
    </tr>
    <?php
	$n=1;
	$dif="";$idy=0;
	$dif2="";
    while ($f=mysql_fetch_row($r))
	{
		
			
				echo "<tr ><td>".$n."</td><td>".$f[10]."</td><td>".$f[0]."</td><td>".$f[1]."</td><td>".$f[2]."</td><td>".$f[3]."</td><td><div id='".$n."' value='".$f[4]."' onclick='cambia(this)'  style='cursor: pointer;'>".$f[4]."</div></td><td>".$f[5]."</td><td>".$f[6]."</td><td>".$f[7]."</td><td>".$f[8]."</td><td>".$f[11]."</td><td width=10><div align='center'><font size=1><a href='javascript:anula(\"".$f[9]."\",1);'>Anular</a></div></td><td width=10><div align='center'><font size=1><a href='javascript:edit(\"".$f[9]."\",2);'>Eliminar</a></div></tr>";$n++;
	
	}
	?>
    
  </table>
  
  <p>
    <input type="hidden" name="button" id="button" value="Guardar Cambios" onclick="guarda();" />
    
    <input type="hidden" name="rest" id="rest" value="Restaurar" onclick="recarga();" />
  </p>
  <p>SEGUNDO A&Ntilde;O
  <table width="90%" border="0" cellpadding="0" cellspacing="0" id="tbenvia">
  </table>
  <table width="899" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla2">
    <tr bgcolor="#006699">
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro Parte</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Curso</font></div></td>
      <td width="153"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cadete</font></td>
      <td width="173"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficial Sancionante</font></div></td>
      <td width="118"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Falta</font></div></td>
      <td width="49"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Clasel</font></div></td>
      <td width="23"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Td</font></div></td>
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tss</font></div></td>
      <td width="25"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tte</font></div></td>
      <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha</font></div></td>
         <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Commentario</font></div></td>
    </tr>
    <?php
	$ng=1;
	
    while ($fg=mysql_fetch_row($g))
	{
		
				echo "<tr ><td>".$ng."</td><td>".$fg[10]."</td><td>".$fg[0]."</td><td>".$fg[1]."</td><td>".$fg[2]."</td><td>".$fg[3]."</td><td>".$fg[4]."</td><td>".$fg[5]."</td><td>".$fg[6]."</td><td>".$fg[7]."</td><td>".$fg[8]."</td><td>".$fg[11]."</td><td width=10><div align='center'><font size=1><a href='javascript:anula(\"".$fg[9]."\",1);'>Anular</a></div></td></tr>";$ng++;
				
	}
	?>
  </table>
  <p>&nbsp;</p>

<p>TERCER A&Ntilde;O</p>
  <table width="90%" border="0" cellpadding="0" cellspacing="0" id="tbenvia">
  </table>
  <table width="899" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla2">
    <tr bgcolor="#006699">
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro Parte</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Curso</font></div></td>
      <td width="153"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cadete</font></td>
      <td width="173"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficial Sancionante</font></div></td>
      <td width="118"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Falta</font></div></td>
      <td width="49"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Clasel</font></div></td>
      <td width="23"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Td</font></div></td>
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tss</font></div></td>
      <td width="25"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tte</font></div></td>
      <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha</font></div></td>
         <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Commentario</font></div></td>
    </tr>
    <?php
	$tg=1;
	
    while ($ft=mysql_fetch_row($t))
	{
		
				echo "<tr ><td>".$tg."</td><td>".$ft[10]."</td><td>".$ft[0]."</td><td>".$ft[1]."</td><td>".$ft[2]."</td><td>".$ft[3]."</td><td>".$ft[4]."</td><td>".$ft[5]."</td><td>".$ft[6]."</td><td>".$ft[7]."</td><td>".$ft[8]."</td><td>".$ft[11]."</td><td width=10><div align='center'><font size=1><a href='javascript:anula(\"".$ft[9]."\",1);'>Anular</a></div></td></tr>";$tg++;
				
	}
	?>
  </table>
  <p>&nbsp;</p>
  
  <p>CUARTO A&Ntilde;O</p>
  <table width="90%" border="0" cellpadding="0" cellspacing="0" id="tbenvia">
  </table>
  <table width="899" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla2">
    <tr bgcolor="#006699">
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro Parte</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Curso</font></div></td>
      <td width="153"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cadete</font></td>
      <td width="173"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficial Sancionante</font></div></td>
      <td width="118"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Falta</font></div></td>
      <td width="49"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Clasel</font></div></td>
      <td width="23"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Td</font></div></td>
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tss</font></div></td>
      <td width="25"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tte</font></div></td>
      <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha</font></div></td>
         <td width="68"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Commentario</font></div></td>
    </tr>
    <?php
	$tc=1;
	
    while ($fc=mysql_fetch_row($c))
	{
		
				echo "<tr ><td>".$tc."</td><td>".$fc[10]."</td><td>".$fc[0]."</td><td>".$fc[1]."</td><td>".$fc[2]."</td><td>".$fc[3]."</td><td>".$fc[4]."</td><td>".$fc[5]."</td><td>".$fc[6]."</td><td>".$fc[7]."</td><td>".$fc[8]."</td><td>".$fc[11]."</td><td width=10><div align='center'><font size=1><a href='javascript:anula(\"".$fc[9]."\",1);'>Anular</a></div></td></tr>";$tc++;
				
	}
	?>
  </table>
  <p>&nbsp;</p>
  

  
  <p><br />
    Los seleccionados: <a href="javascript:envia(1);">Exportar Reporte</a> 

  <input name="fechac" type="hidden" id="fechac" value="<?php echo $fe;?>" />
  <input name="cadc" type="hidden" id="cadc" value="<?php echo $cad;?>" />
   <input name="reg" type="hidden" id="reg" value="<?php echo $fa;?>" />
  </p>
</form>

</body>
</html>
