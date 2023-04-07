<!DOCTYPE html>

<html>
<head>

<meta charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tv Shopping</title>

<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">

    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    

    
    <link rel="stylesheet" href="../../css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/creative.css" type="text/css">
    
    <script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../../css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">

<link href="../../css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />


<script src="../../js/fileinput.min.js" type="text/javascript"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

   
</head>
<body>
     
    <!-- inicio de nav-->

    <div class="container-fluid">
	 <aside class="bg-dark">
        
        


  
        <div>
            <div class="row">
                <div class="text-center">
                    <h2 class="text-primary wow tada">
                        <span class="glyphicon glyphicon-shopping-cart"></span> TvShopping <small class="text-faded"><span class="glyphicon glyphicon-globe"></span> Bolivia </small> 
                                </h2>
                                        
                </div>
                                        
                  
			
                            
                            
                            
                                                                
			
	
                        
                </div>
            </div>
        
   
       </aside>
          
	<div class="row">
		<div class="col-md-12">
                    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle active" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand page-scroll" href="indexAdmin.php"><span class="glyphicon glyphicon-flag"></span> Inicio</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
						
                                                <li>
                                                    <a href="hogarProductos.php"><span class="glyphicon glyphicon-home"></span> Hogar</a>
						</li>
                                                <li>
                                                    <a href="cocinaProductos.php"><span class="glyphicon glyphicon-glass"></span> Cocina</a>
						</li>
                                                
                                                <li>
                                                    <a href="saludProductos.php"><span class="glyphicon glyphicon-heart"></span> Salud</a>
						</li>
                                                <li>
                                                    <a href="bellezaProductos.php"><span class="glyphicon glyphicon-sunglasses"></span> Belleza </a>
						</li>
                                                <li>
                                                    <a href="tecnologia.php"><span class="glyphicon glyphicon-cd"></span> Tecnologia</a>
						</li>
                                                
                                                <li>
                                                    <a href="allProductos.php"><span class="glyphicon glyphicon-th-list"></span> Todos</a>
						</li>
						
                                                <li>
					</ul>
                                    
                                    <form class="navbar-form navbar-right" role="search" name="buscarProducto">
						<button type="submit" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-search"></span>
						</button>
					</form>
                                    <ul class="nav navbar-nav navbar-right">
						 <li >
                                                    <a href="contactenos.php"><span class="glyphicon glyphicon-phone-alt"></span> Contactenos</a>
						</li>
					</ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="servicioTecnico.php">
                                                <span class="glyphicon glyphicon-wrench"></span> Servicio tecnico
                                            </a>
                                    </li> 
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="nuevoProducto.php">
                                                <span class="glyphicon glyphicon-plus"></span> Nuevo producto
                                            </a>
                                    </li> 
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="cerrar.php">
                                                <span class="glyphicon glyphicon-log-out"></span> Salir Modo administrador
                                            </a>
                                    </li> 
                                    </ul>
								
				</div>
				
			</nav>
		</div>
	</div>
    </div>
    
    <div class="container">
        
         <!-- fin de nav-->
         <div class="row">
             <div >
                 <form class="form-horizontal" name="nuevoProducto" action="upload.php" role="form" method="POST" enctype="multipart/form-data">
              
                     <h2 class="text-primary">Registro de productos </h2>
                 <div class="form-group">
                 <label for="nombre">
                     Nombre del producto
                 </label>
                 <input type="text" name="nombre"  id="nombre"  class="form-control">
                 </div>
                 <div class="form-group">
                 <label for="categoria">
                    
                     Selecione la categoria del producto:
                    
                 </label>
                 <div class="btn-group" data-toggle="buttons">
        		<label class="btn btn-primary ">
                            <input type="radio" name="categoria" id="option1" autocomplete="off" value="hogar" class="form-control" >Hogar
        		</label>

        		<label class="btn btn-primary">
                            <input type="radio" name="categoria" id="option2" autocomplete="off" value="belleza" class="form-control">Belleza
        		</label>

        		<label class="btn btn-primary">
                            <input type="radio" name="categoria" id="option3" autocomplete="off" value="tecnologia" class="form-control">Tecnologia
        		</label>
                     <label class="btn btn-primary">
                            <input type="radio" name="categoria" id="option3" autocomplete="off" value="cocina" class="form-control">Cocina
        		</label>


        		<label class="btn btn-primary">
                            <input type="radio" name="categoria" id="option4" autocomplete="off" value="salud"  class="form-control">salud
        		</label>
                     <label class="btn btn-primary active">
                         <input type="radio" name="categoria" id="option4" autocomplete="off" checked  value="otros" class="form-control">otros
        		</label>
        	</div>
                 </div>
                 <div class="form-group">
                 <label for="descripcionCorta">
                     Ingrese una descripcion corta max 200 caracteres
                 </label>
                     <input type="text" name="descripcionCorta"  id="descripcionCorta" maxlength="200"  class="form-control">
                 </div>

                 <div class="form-group ">
                     <label for="descripcion">Ingrese la descripcion Completa del producto:</label>
                     <textarea name="descripcion" class="form-control" rows="12" placeholder="Descripcion..."></textarea>
                 </div>
                 
                 <div class="form-group">
                     <label for="archivos"> Seleccione las imagenes que desea mostrar para el producto Elija imagenes preferentemente 640x420 para evitar un mal corte:</label>
                     <input id="archivos" name="imagenes[]" type="file" class="file-loading" multiple=true>
                     
                 </div>
                 <div class="form-group">
                     <label for="video"> Ingrese el enlace del video insertado de youtube:    </label>
                     <a id="modal-105744" href="#modal-container-105744" role="button" class="btn" data-toggle="modal">Como conseguir el codigo? ver aqui!</a>
			
			<div class="modal fade" id="modal-container-105744" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Como conseguir el codigo
							</h4>
						</div>
						<div class="modal-body">
                                                    <p>1.Ingrese a https://www.youtube.com/ y eliga el video que desea. </p>
                                                    <img src="../../tutorials/subVid1.png">
                                                    <p>2.Una vez dentro del video haga click en el boton compartir. </p>
                                                    <img src="../../tutorials/subVid2.png">
                                                    <p>3.Luego haga click en el boton insertar </p>
                                                    <img src="../../tutorials/subVid3.png">
                                                    <p>4. Como se nota aparece un codigo remarcado en azul copie este codigo y pegelo en el formulario </p>
                                                    <img src="../../tutorials/subVid4.png">
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Cerrar
							</button> 
							
						</div>
					</div>
					
				</div>
				
			</div>

                     <input type="text" name="video" id="video" placeholder="codigo de video" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="precio">Ingrese el precio del producto en Bs.</label>
                     <input type="number" name="precio" id="precio">
                     <label for="precioOferta">Ingrese el precio de oferta(Si no lo tiene dejar en blanco)</label>
                     <input type="number" name="precioOferta" id="precioOferta">
                     
                 </div>
                     
                     <div class="col-md-12 col-lg-offset-5">
                 <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
                 </div>
                     
               
	</form>
            <?php 	
	$directory = "../upload_/";      
	$images = glob($directory . "*.*");
	?>
	
             
             </div>
             
         </div>
	
</div>
<br>
    <aside class="bg-dark">
        
        


   <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Entremos en contacto!</h2>
                    <hr class="primary">
                    <p>
Tv Shopping incursiona en el mercado nacional hace ya más de 15 años, consolidándose como la primera empresa importadora de productos exclusivos orientados al campo del hogar, belleza, salud, cocina, fitness, música y entretenimiento. 
                    Cualquier inquietud que usted tenga no dude en comunicarse con nosotros. 
                    </p>
                
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    
                    <h1 class="wow tada" > <span class="glyphicon glyphicon-phone-alt"></span></h1> <h1 class="wow tada text-primary"> 2791001</h1>
                </div>
                <div class="col-lg-4 text-center">
                   
                    <h1 class="text-primary wow tada"><span class="glyphicon glyphicon-send"></span></h1> <h1 class="text-primary wow tada"><a href="mailto:your-email@your-domain.com">tvshopping@hotmail.com</a></h1>
                        
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Buscanos en facebook <span class="glyphicon glyphicon-thumbs-up"></span></h2>
                    
                    <hr class="primary">
                    <div class="fb-page" data-href="https://www.facebook.com/tvshoppingbolivia/" data-tabs="timeline" data-width="300" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                                </div>
                    
                    
                
                </div>
            </div>
        </div>
    </section> 
       </aside>
    
</body>
<script src="../../js/jquery.fittext.js"></script>
<script src="../../js/wow.min.js"></script>
<script src="../../js/creative.js"></script>
<script>
	$("#archivos").fileinput({
	 uploadUrl: "upload.php", 
         uploadAsync: true,
         minFileCount: 1,
         maxFileCount: 20,
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
       
<script>
$('#carousel-844716').carousel({
    interval: 4000
});
</script>
</html>

