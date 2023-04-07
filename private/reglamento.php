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
    
    <style>

input[type=number]::-webkit-outer-spin-button,

input[type=number]::-webkit-inner-spin-button {

    -webkit-appearance: none;

    margin: 0;

}

 

input[type=number] {

    -moz-appearance:textfield;

}

</style>
        
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
                                            <li class="active">
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
           <h3>Reglamento de disciplina <span class="glyphicon glyphicon-book"></span> 
               
           </h3>
               <p>
                   Elija como desea ver la informacion:
               </p>
               <div class="form-group col-xs-4 col-lg-offset-4 ">
                   <select name="filtro" id="filtro" class="form-control" onchange="fetch_data();" >
                        <option value="0"> Ninguno</option>
                       <option value="t"> Todas</option>
                       <option value="A"> Clase A</option>
                       <option value="B1"> Clase B1</option>
                       <option value="B2"> Clase B2</option>
                       <option value="B3"> Clase B3</option>
                       <option value="B4"> Clase B4</option>
                       <option value="B5"> Clase B5</option>
                       <option value="B6"> Clase B6</option>
                       <option value="B7"> Clase B7</option>
                       <option value="B8"> Clase B8</option>
                       <option value="B9"> Clase B9</option>
                       <option value="B10"> Clase B10</option>
                       <option value="B11"> Clase B11</option>
                       <option value="B12"> Clase B12</option>
                       <option value="B13"> Clase B13</option>
                   </select>
                   
                   
                   
               </div>
              
       </div>
<div id="botonNueva" class="row text-center alert alert-info   " >
               <div id="buttonNuevaFalta">
                   <button onclick="mostrarNuevo();" class="btn btn-lg btn-success"> <span class="glyphicon glyphicon-plus"></span> Nueva Falta</button>
               </div>
         </div>
<div class="row" id="nuevaFalta" style="display: none">
            
            <div class="container">
            <table class="table table-bordered">
                 
                   <tr>
                       
                     <th width="8%" class="alert alert-info">Nro</th>  
                     <th width="84%" class="alert alert-info">Falta</th>  
                     <th width="8%" class="alert alert-info">Clase</th>  
                    
                    
                    </tr>
                <tr>
                <td class=" alert alert-info"   ><input type="number" class="form-control" id="nro"></td>
                <td class=" alert alert-info"   ><input type="text" class="form-control" id="falta"></td>
                <td class=" alert alert-info"   >
                <select name="clases" id="clases" class="form-control" >
                        <option value="0"> </option>
                       
                       <option value="A">A</option>
                       <option value="B1">B1</option>
                       <option value="B2">B2</option>
                       <option value="B3">B3</option>
                       <option value="B4">B4</option>
                       <option value="B5">B5</option>
                       <option value="B6">B6</option>
                       <option value="B7">B7</option>
                       <option value="B8">B8</option>
                       <option value="B9">B9</option>
                       <option value="B10">B10</option>
                       <option value="B11">B11</option>
                       <option value="B12">B12</option>
                       <option value="B13">B13</option>
                   </select>    
                </td>
                <td>
                    <button class="btn btn-success" onclick="nuevaFalta();"> <span class="glyphicon glyphicon-ok"></span> Registrar</button>
                </td>
                </tr>
                </table>
            </div>
         
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
<script>
    function mostrarNuevo(){
        document.getElementById("nuevaFalta").style.display="";
       
    }
    
    function nuevaFalta()  
      {  
          var nro1= document.getElementById("nro").value;
          var falta1=document.getElementById("falta").value;
          var clase1 = document.getElementById("clases").value;
          
           $.ajax({  
                url:"nuevaFalta.php",  
                method:"POST",  
                data:{nro:nro1,falta:falta1, clase:clase1},    
                success:function(data){  
                       $('#live_data').html(data); 
                }  
           });
          
      }
    
    function fetch_data()  
      {  
          
          document.getElementById("nuevaFalta").style.display="none";
          var filtros = document.getElementById("filtro").value;
           $.ajax({  
                url:"select_reglamento.php",  
                method:"POST",
                data:{filtro:filtros},
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
$(document).ready(function(){  
      
      
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
                url:"edit_reglamento.php",  
                method:"POST",  
                data:{id:id,text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                       
                }  
           });  
      }  
      
      $(document).on('blur', '.nro', function(){  
           var id = $(this).data("id1");  
           var fecha = $(this).text();  
           edit_data(id, fecha, "nro");  
      });  
      $(document).on('blur', '.falta', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "falta");  
      });
      $(document).on('blur', '.clase', function(){  
           var id = $(this).data("id3");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "clase");  
      });
      $(document).on('blur', '.pd1', function(){  
           var id = $(this).data("id4");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "pd1");  
      });
      $(document).on('blur', '.tss1', function(){  
           var id = $(this).data("id5");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tss1");  
      });
      $(document).on('blur', '.tte1', function(){  
           var id = $(this).data("id6");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tte1");  
      });
      $(document).on('blur', '.pd2', function(){  
           var id = $(this).data("id7");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "pd2");  
      });
      $(document).on('blur', '.tss2', function(){  
           var id = $(this).data("id8");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tss2");  
      });
      $(document).on('blur', '.tte2', function(){  
           var id = $(this).data("id9");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tte2");  
      });
      $(document).on('blur', '.pd3', function(){  
           var id = $(this).data("id10");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "pd3");  
      });
      $(document).on('blur', '.tss3', function(){  
           var id = $(this).data("id11");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tss3");  
      });
      $(document).on('blur', '.tte3', function(){  
           var id = $(this).data("id12");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tte3");  
      });
      $(document).on('blur', '.pd4', function(){  
           var id = $(this).data("id13");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "pd4");  
      });
      $(document).on('blur', '.tss4', function(){  
           var id = $(this).data("id14");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tss4");  
      });
      $(document).on('blur', '.tte4', function(){  
           var id = $(this).data("id15");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "tte4");  
      });
      
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id16");  
           if(confirm("Esta seguro de querer eliminar la falta esta falta estara desactivada por el sistema y no podra ser usada mas (las multas que usaron esta falta no seran modificadas)?"))  
           {  
                $.ajax({  
                     url:"deleteFalta.php",  
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

 
 
<script src="../js/jquery.fittext.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/creative.js"></script> 

<script>
$('#carousel-844716').carousel({
    interval: 4000
});
</script>



</html>
