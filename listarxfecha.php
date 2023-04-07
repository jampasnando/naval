<?php
require_once "conector.php";
$anoactual=date("Y");
$rr=mysql_query("select registro.p2 from registro where registro.obs='enviado'",$mio);
$nr=mysql_num_rows($rr);
if (isset($_POST["ano"]))
{
	$mes=$_POST["mes"];
	$ano=$_POST["ano"];
	if ($mes>0)
		$r=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd1, tss1, tte1,fecha from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where year(fecha)='$ano' and month(fecha)='$mes' and id_curso='2' order by Semestre, Name asc",$mio);
	else
		$r=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd1, tss1, tte1,fecha from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where year(fecha)='$ano' and id_curso='2' order by Semestre, Name asc",$mio);
		//echo "aqui".$mes.$ano;
}
else
	if (isset($_GET["i"]))
	{
		$limi=$_GET["i"];$lims=$_GET["s"];$np=$_GET["np"];
		$cade="select registro.p2,registro.p2,registro.p1,registro.p23,registro.obs,registro.p11 from registro where registro.obs='enviado' order by registro.p1,p2 asc limit ".$limi.",30";
		$r=mysql_query($cade,$mio);
	}
	else
			$r=mysql_query("select registro.p2,registro.p2,registro.p1,registro.p23,registro.obs,registro.p11 from registro where registro.obs='enviado' order by registro.p1,p2 asc limit 30",$mio);

	//$s=mysql_query("select transf.*,datos.*,proyectos.codigo from (transf inner join proyectos on (transf.destino=proyectos.codigo)) inner join datos on transf.dato=datos.codigo where transf.destino='$bo'",$mio);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
//pa="<?php echo $pass;?>";
function axml()
{
	if ((document.all.ff1.value.length<10) || (document.all.ff2.value.length<10) || (document.all.ff3.value.length<10))
		alert("Formato de fecha incorrecto!");
	else
	{
		document.all.f1.value=document.all.ff1.value;
		document.all.f2.value=document.all.ff2.value;
		document.all.f3.value=document.all.ff3.value;
		document.form6.submit();
	}
}
function va()
{
	document.all.mes.value=document.all.meses[document.all.meses.selectedIndex].value;
	document.all.ano.value=document.all.anos[document.all.anos.selectedIndex].value;
	document.form5.submit();
}
function firmar(nom,pr)
{
cad="Escriba su PASSWORD para  Firmar y ACEPTAR la Transferencia de:\r ---> " + nom;
f=prompt(cad,"");
if (f!=null)
{
	if (f==pa)
	{
		document.form2.reg.value=pr;
		document.form2.submit();
	}
}
} 
function firmar2(nom2,pr2)
{
cad="Escriba su PASSWORD para  RECHAZAR la Transferencia de:\r ---> " + nom2;
f=prompt(cad,"");
if (f!=null)
{
	if (f==pa)
	{
		document.form3.reg3.value=pr2;
		document.form3.submit();
	}
}
} 
function firmar3(nom,pr)
{
	cad="Marcar como PROCESADA la cancelacion de: " + nom + " ?";
	//f=prompt(cad,"");
	//if (est!="aceptado") alert("Aun no puede procesar esta transferencia");
	//else
	//{
		alert(pr);
		if (confirm(cad))
		{
				document.form4.regt.value=pr;
				document.form4.submit();
		}
	//}
} 
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salidas</title>
<style type="text/css">
<!--
.boton {
	color: #FFFFFF;
	background-color: #006699;
	border-top-color: #006699;
	border-right-color: #006699;
	border-bottom-color: #006699;
	border-left-color: #006699;
	font-size: 9px;
}
-->
</style>
</head>

<body topmargin="0">
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"><a href="javascript:window.location='index.html'">Salir</a></div></td>
  </tr>
</table>
<table border="0" cellspacing="4">
  <tr>
    <td bgcolor="#F8F8F8"><p>Filtrar  
        <select name="meses" id="meses">
          <option value="0" selected="selected"></option>
          <option value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>    
        <select name="anos" id="anos">
        <option value="<?php echo $anoactual;?>" selected="selected"></option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
      </select>
      <input type="button" name="button" id="button" value="Aceptar" onclick="va();" />
      <strong><font color="#006699" size="1" face="Verdana, Arial, Helvetica, sans-serif">
      <?php 
	  	if ($mes>0)
			echo "Mostrando registros del Mes: ".$mes." Gestion: ".$ano;
	  ?>
      </font></strong><br />
  </p>
      <form id="form7" name="form7" method="post" action="regcheck.php">
        Pagina: <?php echo $np;?> <a href="salidasobs.php">Observados</a><br />
          <table border="1" cellspacing="0">
            <tr bgcolor="#006699">
              <td width="28"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
      <td width="77"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Semestre</font></div></td>
      <td width="137"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cadete</font></td>
      <td width="127"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficial Sancionante</font></div></td>
      
      <td width="180"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Falta</font></div></td>
      
      <td width="41"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Clasel</font></div></td>
      <td width="22"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Td</font></div></td>
      <td width="28"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tss</font></div></td>
      <td width="20"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tte</font></div></td>
      <td width="58"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha</font></div></td>
            </tr>
            <?
            $c=0;
			while ($fr=mysql_fetch_row($r))
            {
                $c++;
				$aux=explode("-",$fr[2]);
                $fenv=$aux[2]."-".$aux[1]."-".$aux[0];
                if ($fr[3]==93) $verde=" bgColor='#66FF99' ";
					else $verde="";
			    //$aux=explode("-",$fr[5]);
                //$fmod=$aux[2]."-".$aux[1]."-".$aux[0];
                if ($fr[4]=="procesado") $comodin=" disabled"; else $comodin="";
                echo "<tr".$verde."><td>".$x."</td><td>".$f[0]."</td><td>".$f[1]."</td><td>".$f[2]."</td><td>".$f[3]."</td><td>".$f[4]."</td><td>".$f[5]."</td><td>".$f[6]."</td><td>".$f[7]."</td><td>".$f[8]."</td></tr>";
            }
        ?>
          </table>
              <table border="1" cellspacing="0">
                <tr>
                  <?php
					  $resto=$nr;
					  $limi=0;$nume=1;
					  while ($resto>0)
					  {
					  		echo "<td onclick=window.location='listarxfecha.php?np=".$nume."&i=".$limi."&s=".($limi+30)."' onmouseover='this.style.cursor=\"hand\"'>".$nume."</td>";
							$limi=$limi+30;
							$resto=$resto-30;
							$nume++;
					  }
				  ?>
                </tr>
              </table>
              <br />
              <input name="button3" type="submit" class="boton" id="button3" value="Guardar" />
              <input name="total" type="hidden" id="total" value="<?php echo $c;?>" />
      </form>
      <p align="left">&nbsp;</p>
      <form id="form1" name="form1" method="post" action="nuevo.php">
        <input name="bo" type="hidden" id="bo" value="<?php echo $bo;?>" />
        <input name="pass" type="hidden" id="pass" value="<?php echo $pass;?>" />
    </form></td>
  </tr>
  <tr>  </tr>
</table>

<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="actualiza.php">
  <input name="boy" type="hidden" id="boy" value="<?php echo $bo;?>" />
  <input name="passy" type="hidden" id="passy" value="<?php echo $pass;?>" />
  <input type="hidden" name="reg" id="reg" />
</form>
<form id="form3" name="form3" method="post" action="actualiza2.php">
  <input name="boz" type="hidden" id="boz" value="<?php echo $bo;?>" />
  <input name="passz" type="hidden" id="passz" value="<?php  echo $pass;?>" />
  <input type="hidden" name="reg3" id="reg3" />
</form>
<form id="form4" name="form4" method="post" action="actualiza3.php">
  <input name="bot" type="hidden" id="bot" value="<?php echo $bo;?>" />
  <input name="passt" type="hidden" id="passt" value="<?php echo $pass;?>" />
  <input type="hidden" name="regt" id="regt" />
</form>
<form id="form5" name="form5" method="post" action="listarxfecha.php">
  <input type="hidden" name="mes" id="mes" />
  <input type="hidden" name="ano" id="ano" />
</form>
<form id="form6" name="form6" method="post" action="axml.php">
  <input type="hidden" name="f1" id="f1" />
  <input type="hidden" name="f2" id="f2" />
  <input type="hidden" name="f3" id="f3" />
  <input name="mes1" type="hidden" id="mes1" value="<?php echo $mes;?>" />
  <input name="ano1" type="hidden" id="ano1" value="<?php echo $ano;?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
