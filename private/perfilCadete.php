<?php
//session_start();
require_once("class/class.php");

$e= new Estudiante();
$d= new Docente();
$curso = $_GET["curso"];
$cursos = $d->cursoById($curso);
$nroObservados = $e->observadosNovistos($curso);

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

 
<body>
        
	 <aside class="bg-dark">
  
            <div class="container bg-dark">
            
                <div class="text-center">
                    <h2 class="text-primary wow tada ">
                        <img class="" style="width:120px;height: 120px" src="../images/logo2.png" > Control disciplinario <small class="text-faded"><span class="glyphicon glyphicon-tower"></span></small> 
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
                                        <li >
                                                   <a><span class="glyphicon glyphicon-apple"></span> <?php echo $cursos[0]["nombre"]." (".$cursos[0]["semestre"]."-".$cursos[0]["anio"].")";?>  </a>
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
       <style type="text/css">
           #boton {background: #33ccff;
        float: left;
        position: absolute;
         
        }
img.active{float: left;}   
 
</style>
 
 
 

       
       <div class="row alert-info text-center">
           <h3>Registro Individual de diciplina <span class="glyphicon glyphicon-paste"></span> 
               <a href="imprimirPerfil.php?id_estudiante=<?php echo $_GET["id_estudiante"]."&curso=".$curso;?>">  <button class="btn btn-danger">
                   <span class="glyphicon glyphicon-print">
                       PDF
                   </span>
                    </button>
                   </a>
           </h3>
       </div>
      
       
       
       <div  id="live_data" >
         
              
       </div>
	
                                  
 
    		
  		
	
	
	<!-- end #page --> 
</div>

   <aside class="bg-dark">
        
        


   <section id="contact">
        <div class="container">
            <div class="row">
<!--                <div class="col-lg-8 col-lg-offset-2 text-center">-->
                <div class="col-lg-8 col-lg-offset-2 text-center">    
                    <h2 class="section-heading">&nbsp;</h2>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    
                  <h1 class="wow tada" > <span class="glyphicon glyphicon-phone-alt"></span></h1> <h3 class="wow tada text-primary">&nbsp;</h3>
                </div>
                <div class="col-lg-4 text-center">
                   
                    <h1 class="text-primary wow tada"><span class="glyphicon glyphicon-send"></span></h1> <h4 class="text-primary wow tada">&nbsp;</h4>
                        
                </div>
                
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
	        		<h4 class="modal-title text-center" id="loginModalLabel">Cambiar foto perfil</h4>
	      		</div>
	      		<div class="modal-body">
	      			<div class="text-center">
		      			<div role="tabpanel" class="login-tab">
						  	<!-- Nav tabs -->
						  	<ul class="nav nav-pills nav-stacked" role="tablist">
						    	<li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">Elija una foto para el cadete</a></li>
						    	
						  	</ul>
						
						  	<!-- Tab panes -->
						 	<div class="tab-content">
						    	<div role="tabpanel" class="tab-pane active text-center" id="home">
						    		&nbsp;&nbsp;
						    		
						    		<div class="clearfix"></div>
                                                                <form action="editarFoto.php?id_estudiante=<?php echo $_GET["id_estudiante"];?>&curso=<?php echo $_GET["curso"];?>" method="post" autocomplete="off"  enctype="multipart/form-data">
                                                                    
                                                                    <div class="form-group">
                                                                    <input id="archivos" name="imagenes" type="file" class="file-loading" >
                                                                    <input type="hidden" name="curso" value="<?php echo $curso;?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group text-success">
                                                                        <button  class="btn btn-primary"> Cambiar  <span class="glyphicon glyphicon-refresh"></span> </button>   
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
  
    
       <?php 	
	$directory = "../upload_/";      
	$images = glob($directory . "*.*");
	?>

    
<!-- end #footer -->
</body>
<script>
$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_ver.php",  
                method:"POST",
                data:{id_estudiante:<?php echo $_GET["id_estudiante"];?>, curso:<?php echo $_GET["curso"];?>},                  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var first_name = $('#first_name').text();  
           var last_name = $('#last_name').text();  
           if(first_name == '')  
           {  
                alert("Enter First Name");  
                return false;  
           }  
           if(last_name == '')  
           {  
                alert("Enter Last Name");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{first_name:first_name, last_name:last_name},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });
      
      function updateSancionante()
      {
          var sancionadorU = document.getElementById("sancionadorU");
         
      }
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id,text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                       
                }  
           });  
      }  
      $(document).on('blur', '.fecha', function(){  
           var id = $(this).data("id1");  
           var fecha = $(this).text();  
           edit_data(id, fecha, "fecha");  
      });  
      $(document).on('blur', '.nro', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "nro");  
      });
      $(document).on('blur', '.nroParte', function(){  
           var id = $(this).data("id5");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "nroParte");  
      });
      $(document).on('blur', '.pd', function(){  
           var id = $(this).data("id7");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "pd");  
      });
      $(document).on('blur', '.tss', function(){  
           var id = $(this).data("id8");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tss");  
      });
      $(document).on('blur', '.tte', function(){  
           var id = $(this).data("id9");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tte");  
      });
      $(document).on('blur', '.pdas', function(){  
           var id = $(this).data("id10");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "pdas");  
      });
      $(document).on('blur', '.ttea', function(){  
           var id = $(this).data("id11");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "ttea");  
      });
      $(document).on('blur', '.ttec', function(){  
           var id = $(this).data("id12");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "ttec");  
      });
      $(document).on('blur', '.btte', function(){  
           var id = $(this).data("id13");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "btte");  
      });
      $(document).on('blur', '.tssa', function(){  
           var id = $(this).data("id14");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tssa");  
      });
      $(document).on('blur', '.tssc', function(){  
           var id = $(this).data("id15");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tssc");  
      });
      $(document).on('blur', '.btss', function(){  
           var id = $(this).data("id16");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "btss");  
      });
      $(document).on('blur', '.pdat', function(){  
           var id = $(this).data("id17");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "pdat");  
      });
      $(document).on('blur', '.reinci', function(){  
           var id = $(this).data("id6.1");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "reinci");  
      });
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id18");  
           if(confirm("Esta seguro que desea eliminar la falta los PD TSS TTE seran restablecidos?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                            
                          fetch_data();  
                     }  
                });  
           }  
      });  
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
 
<script src="../js/jquery.fittext.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/creative.js"></script> 

<script>
$('#carousel-844716').carousel({
    interval: 4000
});
</script>



</html>
