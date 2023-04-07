<?php
require_once "conector.php";

$r=mysql_query("select id_curso as Semestre, Name, nombre, Texto, clase, pd1, tss1, tte1,fecha from (select * from (select * from ((select id_falta, id_estudiante, pd, tss,tte,sancionante,nro,nroParte,fecha, b.nombre from faltas_estudiantes  as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id)  as c left join (select id, concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name from estudiantes) as tb on c.id_estudiante = tb.id)) as tb1 left join (select falta, texto, clase,  pd1, tss1, tte1 from reglamento) as tb2 on tb1.id_falta = tb2.falta) as tb3 left join (select id_curso,id_estudiante from cursos_estudiantes) as tb4 on tb3.id = tb4.id_estudiante where id_curso='2' order by Semestre, Name asc",$mio);
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


function todo(x)
{

	nr=nr+1;
	if (x==true)
	{
		for (k=1;k<=nr;k++)
		eval("document.all.a" + k + ".checked=true;");
		
	}
	else
	{
		for (k=1;k<=nr;k++)
		eval("document.all.a" + k + ".checked=false;");
	}

}

function cambiaTiq(x)
{
	nu++;
	if(!x.checked) 
	{
		nf=document.getElementById("tbenvia").insertRow();
		nc=nf.insertCell();
		nc.innerHTML="<input type='text' id='cod"+nu+"' name='cod"+nu+"' value='"+x.value+"'><input type='text' id='dato"+nu+"' name='dato"+nu+"' value='no'>";
	}
	else
	{
		nf=document.getElementById("tbenvia").insertRow();
		nc=nf.insertCell();
		nc.innerHTML="<input type='text' id='cod"+nu+"' name='cod"+nu+"' value='"+x.value+"'><input type='text' id='dato"+nu+"' name='dato"+nu+"' value='si'>";
		
	}
	
}
function guarda()
{
	document.getElementById("nr").value=nu;
	document.form.action="guardaNuevos.php";
	document.form1.submit();
}

function recarga()
{
	
	document.form5.action="listanuevos.php";
	document.form5.submit()
}

function envia(x)
{
	if (x==1) document.form1.action="imprime.php";
	if (x==2) document.form1.action="control.php";
	if (x==3) document.form1.action="guardanuevos.php";

	document.form1.submit();
}
function primero()
{
	//document.getElementById("rest").style.visibility="hidden";
	n=1;
	while (n<document.all.tabla.rows.length)
	{
		if (document.all.tabla.rows[n].cells[0].innerText=="")
			document.all.tabla.rows[n].style.display="none";
		n++;
	}
}

</script>

</head>

<body leftmargin="0" topmargin="0" onload="primero();">
<script type="text/javascript" src="../menu1/menu1.js"></script>

<form id="form5" name="form5" method="post" action="listanuevos.php">
  <input name="fechac" type="hidden" id="fechac" value="<?php echo $fe;?>" />
<input name="regionc" type="hidden" id="regionc" value="<?php echo $re;?>" />
    </form>

<form id="form1" name="form1" method="post" action="imprimenuevos.php">
  <strong><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $bo;?></font></strong><br />
  <table width="792" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla">
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
      <td width="28"><input type="checkbox" name="checkbox" id="checkbox" onclick="todo(this.checked)"/>
      <label for="che"></label></td>
    </tr>
    <?php
	$n=1;
$x=0;
    while ($f=mysql_fetch_row($r))
	{
$x++;
			echo "<tr ><td>".$x."</td><td>".$f[0]."</td><td>".$f[1]."</td><td>".$f[2]."</td><td>".$f[3]."</td><td>".$f[4]."</td><td>".$f[5]."</td><td>".$f[6]."</td><td>".$f[7]."</td><td>".$f[8]."</td><td><input type='checkbox' value='".$f[2]."' name='a".$n."' id='a".$n."' onclick='cambiaTiq(this)' ".$tiq."></td></tr>";$n++;
		
	}
	?>
  </table>
  <table width="90%" border="0" cellpadding="0" cellspacing="0" id="tbenvia">
  </table>
  <p>&nbsp;</p>
  
  <p><br />
    Los seleccionados: <a href="javascript:envia(1);">ImprimirCarta</a> <a href="javascript:envia(2);">ImprimirControl</a>
  <input name="nr" type="hidden" id="nr" value="<?php echo $n;?>" />
  <input name="boc" type="hidden" id="boc" value="<?php echo $bo;?>" />
  <input name="passc" type="hidden" id="passc" value="<?php echo $pass;?>" />
  <input name="fechac" type="hidden" id="fechac" value="<?php echo $fe;?>" />
  <input name="regionc" type="hidden" id="regionc" value="<?php echo $re;?>" />
  </p>
 
</form>
<?php include("../forms.php");?>
</body>
</html>
