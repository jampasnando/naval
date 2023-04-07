<?php


	$cad=$_POST["cadete"];
	$fe=$_POST["fecha"];


require_once "conector.php";
$r=mysql_query("select id, id_curso as Semestre,Name,  sum(if(month(fecha)='1',1,0)) as Jul, sum(if(month(fecha)='2',1,0)) as Ago , sum(if(month(fecha)='3',1,0)) as Sep , sum(if(month(fecha)='4',1,0)) as Oct , sum(if(month(fecha)='5',1,0)) as Nov,  sum(if(month(fecha)='6',1,0)) as Dic,  format(sum(if(month(fecha)='1',pd,0)),1) as pdjul,  format(sum(if(month(fecha)='2',pd,0)),1) as pdago,  format(sum(if(month(fecha)='3',pd,0)),1) as pdsep,  format(sum(if(month(fecha)='4',pd,0)),1) as pdoct,  format( sum(if(month(fecha)='5',pd,0)),1) as pdnov,   format(sum(if(month(fecha)='6',pd,0)),1) as pddic,  sum(pd) as nota, if(id_curso=1,cast(1 as char),if(id_curso=3,cast(1.25 as char),if(id_curso=5,cast(1.6 as char),if(id_curso=7,cast(2 as char),'')))) as Semes from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre from faltas_estudiantesps  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantesps) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where id_curso='$fe' group by Name  order by Name  ",$mio);
$nr=mysql_num_rows($r);


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




function guarda()
{
	document.getElementById("nr").value=nu;
	document.form1.action="guardaNuevosall.php";
	document.form1.submit();
}



function ver(a,b,c)
{
	
	
	
	document.getElementById("cadc").value=a;
	document.getElementById("fechac").value=b;
	if (c==1) document.form1.action="listadetalle.php";
	if (c==2) document.form1.action="listaResumenExcel.php";
	if (c==3) document.form1.action="listanuevo.php";
	document.form1.submit();
	
}


function imp(p)
{
	
	
	
document.form1.action="listaResumenExcel.php";

	document.form1.submit();
	
}


function envia(x,y,z)
{

	document.getElementById("cadc").value=x;
	document.getElementById("semc").value=y;
	document.form1.action="listadetalle.php";
	document.form1.submit();
}




</script>

</head>

<body leftmargin="0" topmargin="0" >
<script type="text/javascript" src="../menu1/menu1.js"></script>

<form id="form5" name="form5" method="post" action="listaResumen.php">
      <p>
        <select name="fecha" id="fecha" onchange="document.form5.submit();">
          <option value="%" selected="selected">Semestre</option>
          <option value="%">All</option>
          <?php
      	//require_once "conector.php";
		$s=mysql_query("select id_curso from cursos_estudiantes  group by id_curso order by id_curso asc",$mio);
		
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
      <p>&nbsp;</p>

</form>

<form id="form1" name="form1" method="post" >
  <strong><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></strong><br />
  <table width="780" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla">
    <tr bgcolor="#006699">
     <td width="34"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
      
      <td width="32"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Sem</font></td>
      <td width="424"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre Cadete</font></div></td>
      
      <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Ene</font></div></td>
      <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota Ene</font></div></td>
      
      
      <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Feb</font></div></td>
          <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota Feb</font></div></td>
   <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Mar</font></div></td>
       <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota Mar</font></div></td>
   <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Abr</font></div></td>
       <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota Abr</font></div></td>
   <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">May</font></div></td>
       <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota May</font></div></td>
   <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">J</font><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">un</font></div></td>
        <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota Jun</font></div></td>
        <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">PD Acum</font></div></td><td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Total Sem</font></div></td>
        </tr>
    <?php
	$n=1;
	
    while ($f=mysql_fetch_row($r))
	{
		$jul=100-($f[9]*$f[16]);
		$ago=100-($f[10]*$f[16]);
		$sep=100-($f[11]*$f[16]);
		$oct=100-($f[12]*$f[16]);
		$nov=100-($f[13]*$f[16]);
		$dec=100-($f[14]*$f[16]);
				
		
			$tot= (($jul+$ago+$sep+$oct+$nov)/5);
		$tot = round($tot,2);
		
		if (($jul)>0){
		$color="bgcolor='#00FF00'";
		//$jul=$f[9];
		}
		else
				{$color="bgcolor='#FF0000'";
				$jul=0;}
		
		if (($ago)>0){
		$color1="bgcolor='#00FF00'";
		//$ago=$f[10];
		}
		else
		{$color1="bgcolor='#FF0000'";
		$ago=0;}
		
		if (($sep)>0){
		$color2="bgcolor='#00FF00'";
		//$sep=$f[11];
		}
		else
		{
		$color2="bgcolor='#FF0000'";
		$sep=0;}
		
		if (($oct)>0){
		$color3="bgcolor='#00FF00'";
		//$oct=$f[12];
		}
		else
		{
		$color3="bgcolor='#FF0000'";
		$oct=0;}
		
		if (($nov)>0){
		$color4="bgcolor='#00FF00'";
		//$nov=$f[13];
		}
		else
		{
		$color4="bgcolor='#FF0000'";
		$nov=0;}
		
		if (($dec)>0){
		$color5="bgcolor='#00FF00'";
		//$dec=$f[14];
		}
		else
		{
		$color5="bgcolor='#FF0000'";
		$dec=0;}
			
	
		
	

					
		
		if (($tot)>65)
		$color6="bgcolor='#00FF00'";
		else
		$color6="bgcolor='#FF0000'";

		echo "<tr ><td>".$n."</td><td><div align='center'><a href='javascript:envia(\"".$f[0]."\",\"".$f[1]."\" ,1);'>".$f[1]."</a></div></td><td>".$f[2]."</td><td><div align='center'><a href='javascript:ver(\"".$f[0]."\",1,1);'>".$f[3]."</a></div></td><td  align='center'".$color.">".$jul."</td><td><div align='center'><a href='javascript:ver(\"".$f[0]."\",2,1);'>".$f[4]."</a></div></td><td width=35 align='center'".$color1.">".$ago."</td><td><div align='center'><a href='javascript:ver(\"".$f[0]."\",3,1);'>".$f[5]."</a></div></td><td align='center'".$color2.">".$sep."</td><td><div align='center'><a href='javascript:ver(\"".$f[0]."\",4,1);'>".$f[6]."</a></div></td><td align='center'".$color3.">".$oct."</td><td><div align='center'><a href='javascript:ver(\"".$f[0]."\",5,1);'>".$f[7]."</a></div></td><td align='center'".$color4.">".$nov."</td><td><div align='center'><a href='javascript:ver(\"".$f[0]."\",6,1);'>".$f[8]."</a></div></td><td align='center'".$color5.">".$dec."</td><td align='center'>".$f[15]."</td><td align='center'".$color6.">".$tot."</td></tr>";$n++;
				
	
	}
	?>
    
  </table>
  
  <p>
    <input type="hidden" name="button" id="button" value="Guardar Cambios" onclick="guarda();" />
    
    <input type="hidden" name="rest" id="rest" value="Restaurar" onclick="recarga();" />
  </p>
  <p><br />
    Los seleccionados: <a href="javascript:imp(1);">Imprimir</a> 

  <input name="fechac" type="hidden" id="fechac" value="" />
  <input name="cadc" type="hidden" id="cadc" value="<?php echo $cad;?>" />
   <input name="semc" type="hidden" id="semc" value="<?php echo $f[1];?>" /> 

</form>
<?php include("../../forms.php");?>
</body>
</html>
