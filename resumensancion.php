<?php


	$cad=$_POST["cadete"];
	$fe=$_POST["fecha"];


require_once "conector.php";
$r=mysql_query("select nombre, sum(if(month(fecha)='7',1,0)) as Jul, sum(if(month(fecha)='8',1,0)) as Ago, sum(if(month(fecha)='9',1,0)) as Sep, sum(if(month(fecha)='10',1,0)) as Oct, sum(if(month(fecha)='11',1,0)) as Nov, sum(if(month(fecha)='12',1,0)) as Dic, count(nombre) as total from ((select * from faltas_estudiantes )as a left join (select nombre, id from oficiales) as b on a.sancionante=b.id) group by nombre order by total desc  ",$mio);
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
      <p>&nbsp;</p>
      <p>&nbsp;</p>

</form>

<form id="form1" name="form1" method="post" >
  <strong><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></strong><br />
  <table width="780" border="1" cellspacing="0" bordercolor="#CCCCCC" id="tabla">
    <tr bgcolor="#006699">
     <td width="34"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nro</font></div></td>
      
      <td width="432"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre Oficial</font></td>
      <td width="40"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Jul</font></div></td>
      
      <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Ago</font></div></td>
      <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Sep</font></div></td>
      
      
      <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oct</font></div></td>
          <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nov</font></div></td>
   <td width="35"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Dic</font></div></td>
       <td width="44"><div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Total</font></div></td>
  
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

		echo "<tr ><td>".$n."</td><td>".$f[0]."</td><td>".$f[1]."</td><td>".$f[2]."</td><td>".$f[3]."</td><td>".$f[4]."</td><td>".$f[5]."</td><td>".$f[6]."</td><td>".$f[7]."</td></tr>";$n++;
				
	
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
