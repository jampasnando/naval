<?php
//session_start();
require_once("class/class.php");

$e= new Estudiante();
$d= new Docente();
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

 
<body>
        
<aside class="label-primary">
  
            <div class="panel-warning">
            
                <div class="text-center">
                <h3 class="alert alert-info"> 
               </span>SISTEMA DE CONTROL DE DISCIPLINA</h3>
                <p><img src="../images/logo2.png" alt="Logo" width="156" height="172" class="center-block" style="width:200px;height: 200px"></p>
               </small></aside>
	 <div class="progress-bar">
	   <div class="progress-bar"><!-- ini page -->       </div>
</div>
          <div class="row text-center">
  
           <form class="form-inline" method="get" action="listaEstudiantes.php" id="formCurso" name="formCurso">
                 
               <div class="form-group-lg">
                   <select name="curso" class="form-control " id="curso">
               <option value="0">Ninguno</option>
               
              <form class="form-inline" method="get" action="../listaResumen.php" id="rptdet" name="rptdet">  
               <?php
               $reg = $d->listaCursos();
               for ($index = 0; $index < count($reg); $index++) {
                   
               
               ?>
               <option value="<?php echo $reg[$index]["id"];?>">
               <?php
               echo $reg[$index]["anio"]." ".$reg[$index]["nombre"]." (semestre ".$reg[$index]["semestre"].")";
               ?>
               </option>
               <?php
               }
               ?>
                 </select>
                   <div class="alert alert-danger" id="errorCurso" style="display: none" >
                       <p> <span class="glyphicon glyphicon-exclamation-sign"> </span> Ups... no selecciono ningun curso. Elija algun curso por favor.</p>  
                   </div>   
                  
               </div>
         </form>
           <div class="row">
               <br>
           <button class="btn btn-primary btn-lg" onclick="window.location.href='http://64.17.174.69/registracad.php'"><span class="glyphicon glyphicon-log-in" ></span> Ingresar</button>
           <p></p>
           <button class="btn btn-primary btn-lg" onclick="window.location.href='http://64.17.174.69/listaResumen.php'"><span class="glyphicon glyphicon-log-in" ></span> Planilla General</button>
           <p></p>
           <button class="btn btn-primary btn-lg" onclick="window.location.href='http://64.17.174.69/reportediario.php'"><span class="glyphicon glyphicon-log-in" ></span> Resumen Diario</button>
           <p></p>
           <button class="btn btn-primary btn-lg" onclick="window.location.href='http://64.17.174.69/resumensancion.php'"><span class="glyphicon glyphicon-log-in" ></span> Resumen Sancion</button>
                   <div class="row">
       
           </div>
            
       </div>
       <div class="clearfix">
           &zwj;
       </div>
<div class="row">
                            <div class="carousel slide" id="carousel-844716">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-844716">
					</li>
					<li data-slide-to="1" data-target="#carousel-844716">
					</li>
					<li data-slide-to="2" data-target="#carousel-844716">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
                                            <a href="">     
                                                <img class="img-responsive" alt="Carousel Bootstrap First" src="../images/banner4.jpg" >
					    </a>
                                                <div class="carousel-caption">
							<h4>
				
							</h4>
							<p>
				
							</p>
						</div>
					</div>
					<div class="item">
                                            <a href="">
                                                <img class="img-responsive" alt="Carousel Bootstrap Second" src="../images/banner5.jpg" >
                                            </a>					
                                            <div class="carousel-caption">
							<h4>
								
							</h4>
							<p>
								
                                              </p>
						</div>
					</div>
					<div class="item">
                                            <a href="detalleProducto.php">
                                                <img class="img-responsive" alt="Carousel Bootstrap Third" src="../images/banner6.jpg" >
                                            </a>	
                                            <div class="carousel-caption">
							<h4>
								
                                              </h4>
							<p>
								
                                              </p>
						</div>
					</div>
				</div> <a class="right carousel-control" href="#carousel-844716" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
</div>
       <?php 	
	$directory = "../upload_/";      
	$images = glob($directory . "*.*");
	?>
	
                                      
 
    		
  		
	
	
	<!-- end #page --> 


    <aside class="progress-bar">
        
        


   <section id="contact">
        <div class="container">
            <div class="row">
<!--                <div class="col-lg-8 col-lg-offset-2 text-center">--></div>
        </div>
    </section> 
       </aside>
    
    
       <!-- -Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content login-modal">
	      		<div class="modal-header login-modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title text-center" id="loginModalLabel">REGISTRO DE NUEVO ESTUDIANTE</h4>
	      		</div>
	      		<div class="modal-body">
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
                                                                <form action="registroCadetes.php" method="post" autocomplete="off"  enctype="multipart/form-data">
                                                                    <div class="form-group text-success">
                                                                      <label for="nombre" class="text-success"> Nombres:</label>  <input type="text" name="nombre" id="nombre">
                                                                    </div>
                                                                    <div class="form-group text-success">
                                                                      <label for="apellidoP" class="text-success"> Apellido P:</label>  <input type="text" name="apellidoP" id="apellidoP">
                                                                    </div>
                                                                    <div class="form-group text-success">
                                                                      <label for="apellidoM" class="text-success"> Apellido M:</label>  <input type="text" name="apellidoM" id="apellidoM">
                                                                    </div>
                                                                    
                                                                    
                                                                     
                                                                    
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="archivos" class="text-success"> Seleccione la imagen para el cadete</label>
                                                                    <input id="archivos" name="imagenes" type="file" class="file-loading" >
                                                                    </div>
                                                                    
                                                                    <div class="form-group text-success">
                                                                        <button  class="btn btn-primary"> Registrar <span class="glyphicon glyphicon-ok"></span> </button>   
                                                                    </div>
                                                                    
							  			
                                                                                <div class="login-modal-footer">
							  				
							  			</div>
									
						    	           
						    	</form>
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
    
<script>
function validarRegistro()
{
   var curso = document.getElementById("curso").value;
   
   if(curso == 0)
   {
       document.getElementById("errorCurso").style.display = "";
   }else{
            document.formCurso.submit() ;
        }
}

function repday()
{
          alert ("hol");
		    //document.rptdet.submit() ;
			window.open='http://www.yahoo.com';
      
}
</script>
<script>
$('#carousel-844716').carousel({
    interval: 4000
});
</script>
<script>
	$("#archivos").fileinput({
	 uploadUrl: "upload.php", 
         uploadAsync: false,
         minFileCount: 1,
         maxFileCount: 1,
	 showUpload: false, 
	 showRemove: false,
	 initialPreview: [
	<?php foreach($images as $image){?>
		"<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
	<?php } ?>],
    initialPreviewConfig: [<?php foreach($images as $image){ $infoImagenes=explode("/",$image);?>
	{caption: "<?php echo $infoImagenes[1];?>",  height: "120px", url: "borrar.php", key:"<?php echo $infoImagenes[1];?>"},
	<?php } ?>]
	}).on("filebatchselected", function(event, files) {
	
	
	
	});
	
	</script>



</html>
