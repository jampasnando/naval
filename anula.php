<?php
	$cad=$_POST["cadc"];
	$fe=$_POST["fechac"];
$fa=$_POST["reg"];
//echo $cad;
//echo $fe;
echo $fa;


require_once "conector.php";
//mysql_query("update transf set estado='aceptado',fmodif='$hoy' where id='$reg'",$mio);
mysql_query("update faltas_estudiantes set  `pd` =  '0' WHERE  id ='$fa'",$mio);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onload="document.form1.submit();">
<form id="form1" name="form1" method="post" action="reportediario.php">
  <input name="fecha" type="hidden" id="fecha" value="<?php echo $fe;?>" />
  <input name="cadete" type="hidden" id="cadete" value="<?php echo $cad;?>" />
</form>
</body>
</html>


