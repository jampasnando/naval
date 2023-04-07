<?php
//$fe=$_GET["fecha"];


$ca=$_POST["cadc"];




if (isset($_POST["fechac"]))
	$fe=$_POST["fechac"];
else
	$fe="%";;


if (isset($_POST["semc"]))
	$sem=$_POST["semc"];
else
	$sem="%";
	

require_once "conector.php";
$r=mysql_query("select  id_curso as Semestre, Name, nombre, Texto, clase, pd, tss, tte,fecha,pd, if(left(clase,1)='B' and pd=0,'Anulado',''),nroParte from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where month(fecha) like'%$fe' and id_curso like '%$sem' and tb4.id_estudiante='$ca' order by fecha",$mio);
$nr=mysql_num_rows($r);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="../menu1/stmenu.js">

</script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" onload="primero();">
<script type="text/javascript" src="../menu1/menu1.js"></script>

<script type="text/javascript">
function envia(x)
{
    
	
	
	document.form1.submit();

}
</script>
<form id="form5" name="form5" method="post" action="listarexp.php">
  <input name="fechac" type="hidden" id="fechac" value="<?php echo $fe;?>" />
  <input name="cadc" type="hidden" id="cadc" value="<?php echo $ca;?>" />
   <input name="semc" type="hidden" id="semc" value="<?php echo $sem;?>" /> 
</form>

<form id="form1" name="form1" method="post" action="listarexp.php">
  <p><strong><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></strong></p>
  <p><br />
  </p>
   <table width="910" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla">
    <tr bgcolor="#006699">
     <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro Parte</font></div></td>
      <td width="37"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Curso</font></div></td>
      <td width="153"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cadete</font></td>
      <td width="173"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficial Sancionante</font></div></td>
      
      <td width="118"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Falta</font></div></td>
      
      <td width="49"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Clase</font></div></td>
      <td width="23"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Pd</font></div></td>
      <td width="30"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tss</font></div></td>
      <td width="25"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tte</font></div></td>
      <td width="73"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha</font></div></td>
      
        
          <td width="23"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Observacion</font></div></td>
    
    </tr>
    <?php
	$n=1;
	$dif="";$idy=0;
	$dif2="";
    while ($f=mysql_fetch_row($r))
	{
		if (($f[4])>65)
		$color6="bgcolor='#00FF00'";
		else
		$color6="bgcolor='#FF0000'";
		
				if($f[8]=="si") $tiq=" checked='checked'"; else $tiq="";
				echo "<tr ><td>".$n."</td><td>".$f[11]."</td><td>".$f[0]."</td><td>".$f[1]."</td><td>".$f[2]."</td><td>".$f[3]."</td><td>".$f[4]."</td><td>".$f[5]."</td><td>".$f[6]."</td><td>".$f[7]."</td><td>".$f[8]."</td><td align='center'>".$f[10]."</td></tr>";$n++;
				$dif=$f[5];
	
	}
	?>
    
  </table>
  <table width="90%" border="0" cellpadding="0" cellspacing="0" id="tbenvia">
  </table>
  <br />
Los seleccionados: <a href="javascript:envia(1);">Exportar a Excel</a> 
<input name="nr" type="hidden" id="nr" value="<?php echo $n;?>" />
<input name="boc" type="hidden" id="boc" value="<?php echo $bo;?>" />
  <input name="fechac" type="hidden" id="fechac" value="<?php echo $fe;?>" />
  <input name="cadc" type="hidden" id="cadc" value="<?php echo $ca;?>" />
   <input name="semc" type="hidden" id="semc" value="<?php echo $sem;?>" /> 
 
</form>
<?php include("../forms.php");?>
<script type="text/javascript">

</script>
</body>
</html>
