<?php
error_reporting(0);
//session_start();
require_once("class/class.php");
$curso=$_GET["curso"];
$paginaActual="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
$longitudPagina=strlen($paginaActual);


$e= new Estudiante();
$d= new Docente();
$cursos = $d->cursoById($curso);
$nroObservados = $e->observadosNovistos($curso);
$valor=$cursos[0]["valor"];
                   if($cursos[0]["nombre"] == "Primer Curso")
                   {
                       $rango = "C/1";
                   }
                   if($cursos[0]["nombre"] == "Segundo Curso")
                   {
                       $rango = "C/2";
                   }
                   if($cursos[0]["nombre"] == "Tercer Curso")
                   {
                       $rango = "C/3";
                   }
                   if($cursos[0]["nombre"] == "Cuarto Curso")
                   {
                       $rango = "C/4";
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
    <link href="../css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="../js/fileinput.min.js" type="text/javascript"></script>
 </head>

   <style>
  
  .flotante {
        display:scroll;
        position:fixed;
        bottom:0px;
        right: 20%;
        
}
  </style>
<body>
    
   
        
	 <aside class="bg-dark">
  
            <div class="container bg-dark">
            
                <div class="text-center">
                    <h2 class="text-primary wow tada ">
                        <span><img class="" src="../images/logo2.png" style="width:120px;height: 120px"></span> Control disciplinario <small class="text-faded"><span class="glyphicon glyphicon-tower"></span> </small> 
                    </h2>
                                        
                </div>
                        
               
            </div>
        
   
       </aside>
        
        <div class="container">
        
          
       
        
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
						
                                            <li>
                                                    <a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
				            </li>
                                            <li class="active">
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
                                        <li >
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
           <div class="col-md-12 alert alert-info">
               <h3 class="text-center">
                   <?php
                   $cursos = $d->cursoById($curso);
                   if($cursos[0]["nombre"] == "Primer Curso")
                   {
                       $rango = "C/1";
                   }
                   if($cursos[0]["nombre"] == "Segundo Curso")
                   {
                       $rango = "C/2";
                   }
                   if($cursos[0]["nombre"] == "Tercer Curso")
                   {
                       $rango = "C/3";
                   }
                   if($cursos[0]["nombre"] == "Cuarto Curso")
                   {
                       $rango = "C/4";
                   }
                   ?>
                   Lista de estudiantes del <?php echo $cursos[0]["nombre"]." (semestre ".$cursos[0]["semestre"]."-".$cursos[0]["anio"].")";?> 
               </h3>
           </div>
           <div class="row text-center">
            <a href="javascript:;" data-toggle="modal" data-target="#loginModal">
           <button class="btn btn-lg btn-success"> Nuevo cadete <span class="glyphicon glyphicon-user"></span></button>
           
          
            </a>
               <a href="imprimirLista.php?curso=<?php echo $curso;?>">   
               <button class="btn btn-lg btn-danger"> PDF <span class="glyphicon glyphicon-print"></span></button>  
               </a>
               
               <a href="ImportarNotasExcel.php?curso=<?php echo $curso;?>&rango=<?php echo $rango;?>&valor=<?php echo $valor;?>&semestre=<?php echo $cursos[0]["semestre"];?>&anio=<?php echo $cursos[0]["anio"];?>">   
               <button class="btn btn-lg btn-primary"> importar a excel <span class="glyphicon glyphicon-export"></span></button>  
               </a>
               <br>
           <br>
           </div>
           
           <div id="live_data">
               
           </div>
            
                                                                   
       </div>

                                             
            
        
            
        
            
            
     
                                      
 
    		
       
	
	<!-- end #page --> 
</div>

    <aside class="bg-dark">
        
        


   <section id="contact">
        <div class="container">
            <div class="row">
<!--                <div class="col-lg-8 col-lg-offset-2 text-center">-->
                
                
                
                
            </div>
        </div>
    </section> 
       </aside>
    
    
       <!-- -Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content login-modal">
	      		<div class="modal-header login-modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title text-center" id="loginModalLabel">REGISTRO DE NUEVOS CADETES</h4>
	      		</div>
	      		<div class="modal-body">
                            <div class="content flotante"  id="noti">  </div>
                            <div class="alert alert-info">
                                 
                            </div>
                              
	      			<div class="text-center">
		      			<div role="tabpanel" class="login-tab">
						  	<!-- Nav tabs -->
						  	<ul class="nav nav-pills nav-stacked" role="tablist">
						    	<li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">Complete los siguientes campos:</a></li>
						    	
						  	</ul>
						
						  	<!-- Tab panes -->
						 	<div class="tab-content">
						    	<div role="tabpanel" class="tab-pane active text-center" id="home">
						    		&nbsp;&nbsp;
						    		
						    		<div class="clearfix"></div>
                                                               
                                                                    <div class="form-group text-success">
                                                                        <label for="nombre" class="text-success"> Nombres:</label>  <input class="nombre" type="text" name="nombre" id="nombre" >
                                                                    </div>
                                                                    <div class="form-group text-success">
                                                                      <label for="apellidoP" class="text-success"> Apellido P:</label>  <input type="text" name="apellidoP" id="apellidoP">
                                                                    </div>
                                                                    <div class="form-group text-success">
                                                                      <label for="apellidoM" class="text-success"> Apellido M:</label>  <input type="text" name="apellidoM" id="apellidoM">
                                                                    </div>
                                                                    <div class="form-group text-success">
                                                                      <label for="matricula" class="text-success"> Matricula:</label>  <input type="text" name="matricula" id="matricula">
                                                                    </div>
                                                                    
                                                                    
                                                                     
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <div class="form-group text-success">
                                                                        <button  class="btn btn-primary btn_add_cadete" name="btn_add_cadete" type="button" > Registrar <span class="glyphicon glyphicon-ok"></span> </button>  
                                                                    </div>
                                                                  
                                                                <div class="row alert alert-danger" style="display: none" id="error">
                                                                    <h4> <span class="glyphicon glyphicon-alert"></span> Ups... uno o varios campos vacios no se realizo ningun registro</h4>
                                                                </div>
                                                                    <div class="clearfix">
                                                                        &zwj;
                                                                    </div>
                                                                    <div class="clearfix">
                                                                        &zwj;
                                                                    </div>
                                                                    <div class="clearfix">
                                                                        &zwj;
                                                                    </div>
                                                                    <div class="clearfix">
                                                                        &zwj;
                                                                    </div>
                                                                    
                                                                                <div class="login-modal-footer">
							  				
							  			</div>
									
						    	           
						    	
                                                                
						  	</div>
						</div>
	      				
	      			</div>
	      		</div>
	      		
	    	</div>
	   </div>
 	</div>
        </div>
 	<!-- - Login Model Ends Here -->
  

    
<!-- end #footer -->
</body>

    <script src="../js/jquery.fittext.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/creative.js"></script> 
   
<script type="text/javascript">
      
$(document).ready(function(){   

  
  
  function fetch_data()  
      {  
           $.ajax({  
                url:"selectCadetes.php",  
                method:"POST",
                data:{curso:<?php echo $curso;?>,rango:'<?php echo $rango;?>'},                  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }
      fetch_data();
      
      
      
      function notificacion(){
      document.getElementById("noti").style.display = "";
      setTimeout(function() {
        $(".content").fadeOut(1500);
        },3000);
    }
      
        
  
  
  $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Esta seguro de querer eliminar al cadete? tenga en cuenta que se eliminaran todo tipo de registros del cadete (faltas, observaciones, etc.)"))  
           {  
       $.ajax({  
                url:"eliminarCadete.php",
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                 fetch_data();          
                }  
             });
             
          }
      });
  $(document).on('click', '.btn_add_cadete', function(){
        
          var nom = document.getElementById("nombre").value;
          var apeP = document.getElementById("apellidoP").value;
          var apeM = document.getElementById("apellidoM").value;         
          var matri = document.getElementById("matricula").value;
          
          
          if(nom != '' && apeP != '' && apeM != '' && matri != ''){
           $.ajax({  
                url:"registroCadetes.php",
                type:"POST",  
                data:{nombre:nom,apellidoP:apeP, apellidoM:apeM , curso: <?php echo $curso;?> , matricula:matri},  
                dataType:"text",  
                success:function(data){
                     $('#noti').html(data);
                     fetch_data();
                     notificacion(); 
                              
                }  
           });
           
                     
           document.getElementById("error").style.display = 'none';
           document.getElementById("nombre").value = '';
           document.getElementById("apellidoP").value = '';
           document.getElementById("apellidoM").value = '';
           document.getElementById("matricula").value = '';
          
                    
           }else{
                  document.getElementById("error").style.display = '';
               }
           
           
    
     
   });
});
  
     
   
  
     
</script>

       
</html>
