<?php

require_once("class/class.php");
$paginaActual="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
$longitudPagina=strlen($paginaActual);
$curso= $_GET["curso"];
$e= new Estudiante();
$d= new Docente();
$cursos = $d->cursoById($curso);
$e->leerObservados($curso);
$nroObservados = $e->observadosNovistos($curso);

$valor=$cursos[0]["valor"];
                   if($cursos[0]["nombre"] == "Primer Curso")
                   {
                       $rango = "C/1";
                       $restriccion = 40;
                   }
                   if($cursos[0]["nombre"] == "Segundo Curso")
                   {
                       $rango = "C/2";
                       $restriccion = 32;
                   }
                   if($cursos[0]["nombre"] == "Tercer Curso")
                   {
                       $rango = "C/3";
                       $restriccion = 25;
                   }
                   if($cursos[0]["nombre"] == "Cuarto Curso")
                   {
                       $rango = "C/4";
                       $restriccion = 20;
                   }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    

        
    <link rel="stylesheet" href="../css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="../css/creative.css" type="text/css">
      
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="../css/datepicker.css">
    
    
    
   
    </head>

 
<body>
        
	 <aside class="bg-dark">
  
            <div class="container bg-dark">
            
                <div class="text-center">
                    <h2 class="text-primary wow tada ">
                        <img class="" src="../images/logo2.png" style="width:120px;height: 120px"> Control disciplinario <small class="text-faded"><span class="glyphicon glyphicon-tower"></span></small> 
                    </h2>
                                        
                </div>
                        
               
            </div>
        
   
       </aside>
        
<div class="container-fluid">
        
          
       
        
          <div class="row">
		<div class="col-md-12">
                    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle active" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand page-scroll" > Menu</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
						
                                                <li >
                                                    <a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
						</li>
                                                <li>
                                                   <a href="listaEstudiantes.php?curso=<?php echo $curso;?>"><span class="glyphicon glyphicon-user"></span> Listar cadetes</a>
				                </li>
                                                
                                                <li>
                                                <a href="listaTte.php?curso=<?php echo $curso;?>"><span class="glyphicon glyphicon-list-alt"></span> Listar faltas</a>
				                </li>
                                                <li>
                                                <a href="reglamento.php?curso=<?php echo $curso;?>"><span class="glyphicon glyphicon-book"></span> Reglamento</a>
				            </li>
                                                
                                            
                                                 
                                        </ul>    
                                    
                                    
                                    <ul class="nav navbar-nav navbar-right">
                                        
                                        
						
						<li class="dropdown">
                                                    	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                           <span class="glyphicon glyphicon-apple"></span> <?php echo $cursos[0]["nombre"]." (".$cursos[0]["semestre"]."-".$cursos[0]["anio"].")";?> <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
                                                          <?php
                                                            $lCursos = $d->listaCursos();
                                                            for ($index = 0; $index < count($lCursos); $index++) {
                                                           ?>  
								<li>
						   <a href="<?php
                                                   $paginaActual[$longitudPagina-1]=$lCursos[$index]["id"];
                                                   echo $paginaActual;
                                                   ?>"> <?php echo $lCursos[$index]["nombre"]." (".$lCursos[$index]["semestre"]."-".$lCursos[$index]["anio"].")";?></a>
								</li>
								<?php 
                                                                if($index == 1 or $index == 3 or $index==5)
                                                                {
                                                                ?>
								<li class="divider">
								</li>
                                                              <?php
                                                                }
                                                            }
                                                              ?>  
								
							</ul>
						</li>
			            </ul>
                                   
                                    <?php
                                    if($nroObservados > 0)
                                    {
                                    ?>
                                    <ul class="nav navbar-nav navbar-right ">
                                        <li  class="active">
                                            <a href="observaciones.php?curso=<?php echo $curso;?>" class="">
                                                <div class="text-info" >
                                                <?php echo $nroObservados;?> <span class="glyphicon glyphicon-eye-open"> </span> Observaciones 
                                               </div>
                                            </a>
                                    </li> 
                                    </ul>
                                    <?php
                                    }else{
                                    ?>
                                    <ul class="nav navbar-nav navbar-right ">
                                        <li class="active">
                                            <a href="observaciones.php?curso=<?php echo $curso;?>" class="">
                                                <div  >
                                                <?php echo $nroObservados;?> <span class="glyphicon glyphicon-eye-open"> </span> Observaciones 
                                               </div>
                                            </a>
                                    </li> 
                                    </ul>
                                    
                                    
                                    <?php
                                    }
                                      ?>
                                               								
				</div>
				
			</nav>
		</div>
	</div> 
            
            
       <!-- ini page -->
       
       <div class="row">
           <h3 class="alert alert-info text-center">
               Lista de estudiantes observados para este curso ingresan a la lista los que pierden <?php echo $restriccion;?> PD <span class="glyphicon glyphicon-eye-close"></span>
           </h3>
       </div>    
       <div class="container">
           <div class="container">
               <table class="table table-responsive table-hover table-bordered">
                   <tr class="bg-info">
                   <td>
                       <p>
                       Cadete
                       </p>
                   </td>
                   <td>
                       <p>
                       Puntos Demerito
                       </p>
                   </td>
                   
                   <td>
                       <p>
                       Accion
                       </p>
                   </td>
                   
                   
                   </tr>
                   
                   <?php
                   $Ob = $e->listaObservados($curso);
                   for ($index = 0; $index < count($Ob); $index++) {
                       
                       $reg=$e->estudianteById($Ob[$index]["id_estudiante"]);
                   ?>
                   <tr>
                       
                       <td>
                       <p>
                       <?php
                       
                       echo $rango." ".$reg[0]["apellidoPaterno"]." ".$reg[0]["apellidoMaterno"]." ".$reg[0]["nombre"]
                       ;?>
                       </p>
                      </td>
                      
                      <?php
                      if($reg[0]["pd"]>60)
                      {    
                      ?>
                      <td class="alert alert-success">
                       <p>
                       <?php
                       echo $reg[0]["pd"]." APROBADO";  
                       ?>
                           <span class="glyphicon glyphicon-ok-sign"></span>
                       </p>
                       </td>
                      <?php
                      }else {
                      ?>
                       
                       <td class="alert alert-danger">
                       <p>
                       <?php
                       echo $reg[0]["pd"]." REPROBADO";  
                       ?>
                           <span class="glyphicon glyphicon-remove-circle"></span>
                       </p>
                       </td>
                       
                      <?php
                      }
                      ?> 
                   <td>
                       <a href="perfilCadete.php?id_estudiante=<?php echo $Ob[$index]["id_estudiante"]."&curso=".$curso;?>">
                       <button class="btn btn-sm btn-success">
                           
                           Ver <span class="glyphicon glyphicon-eye-open"></span>
                       </button>
                       </a>
                       
                   </td>
                       
                   </tr>
                   <?php
                   }
                   ?>
               </table>
           </div>
           
       </div>
        
        

       

    		
  		
	
	
	<!-- end #page --> 
</div>

    <aside class="bg-dark">
        
        


   <section id="contact">
        <div class="container">
            <div class="row">
<!--                <div class="col-lg-8 col-lg-offset-2 text-center">-->
                <div class="col-lg-8 col-lg-offset-2 text-center">    
                    <h2 class="section-heading">Entremos en contacto!</h2>
                 <hr class="primary">
                    <p>
                           StormPage es una herramienta muy util para la administracion del control disciplinario de la Escuela Naval Militar de Bolivia. Es tan facil crear y compartir gracias a esta herramienta. Cualquier duda o consulta no dude en contactarse con nosotros.
                    </p>
                
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    
                    <h1 class="wow tada" > <span class="glyphicon glyphicon-phone-alt"></span></h1> <h3 class="wow tada text-primary"> 72744188</h3>
                </div>
                <div class="col-lg-4 text-center">
                   
                    <h1 class="text-primary wow tada"><span class="glyphicon glyphicon-send"></span></h1> <h4 class="text-primary wow tada"><a href="mailto:dar_blade@hotmail.com">dar_blade@hotmail.com</a></h4>
                        
                </div>
                
            </div>
        </div>
    </section> 
       </aside>
    
    
  
  

    
<!-- end #footer -->
</body>


<script src="../js/jquery.fittext.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/creative.js"></script> 

    <script>
     function generarTteList()
    {
        
        var fechIni=document.getElementById("fechaIni").value;
        var fechFin=document.getElementById("fechaFin").value;
        var url = "generarlistaTte.php";
        $.ajax({
            type: 'POST',
            url: url,
            data:{fechaIni:fechIni,fechaFin:fechFin,curso:<?php echo $curso;?>},
            
            success: function (datos) {
                        $("#listaTte").html(datos);
                    }
        })
    }
    
    </script>
    <script>
    $(function(){
       $('.datepicker').datepicker(); 
       
    });
    
    $(function(){
         var nowTemp = new Date();
         var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
         var checkin = $('#fechaIni').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#fechaFin')[0].focus();
}).data('datepicker');
var checkout = $('#fechaFin').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
    });
    
   
    </script>
    <script>
    
    </script>


</html>
