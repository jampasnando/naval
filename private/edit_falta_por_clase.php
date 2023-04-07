
 <?php  
 require_once './class/class.php';  
 $d = new Docente();
 $pd1=$_POST["pd1"];
 $pd2=$_POST["pd2"];
 $pd3=$_POST["pd3"];
 $pd4=$_POST["pd4"];
 
 $tte1=$_POST["tte1"];
 $tte2=$_POST["tte2"];
 $tte3=$_POST["tte3"];
 $tte4=$_POST["tte4"];
 
 $tss1=$_POST["tss1"];
 $tss2=$_POST["tss2"];
 $tss3=$_POST["tss3"];
 $tss4=$_POST["tss4"];
 
 $clase = $_POST["filtro"];
 $d->updateReglamentoPorClase($clase, $pd1,$pd2,$pd3,$pd4,$tte1,$tte2,$tte3,$tte4,$tss1,$tss2,$tss3,$tss4 );

   
 ?>  