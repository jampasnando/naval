<?php
//session_start();
error_reporting(0);
require_once("class/class.php");
$curso= $_GET["curso"];
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
						
						
                                            <li>
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
       
       
       <form method="post" action="registrarFalta.php" name="formMulta" id="formMulta">
       <div class="row">
           <h3 class="alert alert-info text-center">
            <?php $ma=$_GET["id_estudiante"];
			require_once "conector.php";
           $s=mysql_query("select concat(apellidoPaterno,' ',apellidoMaterno,' ',nombre) as Name, id from estudiantes where id=$ma ",$mio);
		   while ($fs=mysql_fetch_row($s))
		{  $za=$fs[0];
		}
		   ?>
               <?php echo $rango;?> <?php echo $za;?>:
           </h3>
           
           <div class="col-md-2">
           
               <div id="fechaMulta">
                    <label for="fecha"> Ingrese la fecha de la multa</label>
                    <input type="text" name="fecha" id="fecha" class="datepicker form-control">
             </div> 
               
               <div class="form-group">
                <label for="clase">Seleccione la clase de falta:</label>
                <select name="clase" id="clase" onchange="mostrarFaltas();" class="form-control" >
                    <option value="0"> ninguno</option>
                    <option value="A*"> A*</option>
                    <option value="A"> A</option>
                    <option value="B1"> B1</option>
                    <option value="B2"> B2</option>
                    <option value="B3"> B3</option>
                    <option value="B4"> B4</option>
                    <option value="B5"> B5</option>
                    <option value="B6"> B6</option>
                    <option value="B7"> B7</option>
                    <option value="B8"> B8</option>
                    <option value="B9"> B9</option>
                    <option value="B10"> B10</option>
                    <option value="B11"> B11</option>
                    <option value="B12"> B12</option>
                    <option value="B13"> B13</option>
                </select>
             </div>
               
               
           
           </div>
           <div class="col-md-6" id="faltasDisponibles">
              
               
               
           </div>
                
           <div class="col-md-4 alert alert-danger" id="puntajeFalta" style="display: none">
                
         </div>    
                   
          
       </div>
               
       
           <div class="col-md-7 alert alert-warning text-center" id="boton" style="display: none">
              
               <h4> <span class="glyphicon glyphicon-alert"></span> Esta es la informacion que se registrara en la base de datos desea...</h4>
               <button class="btn btn-danger btn-lg" type="button" id="multar" name="multar" onclick="validarSancion();"> SANCIONAR <span class="glyphicon glyphicon-check"></span> </button>
           </div>
            <input type="hidden" name="id_estudiante" value="<?php echo $_GET["id_estudiante"];?>">
               <input type="hidden" name="valor" value="<?php echo $valor;?>">
               <input type="hidden" name="curso" value="<?php echo $curso;?>">
       </form>
       
      
	
       <div id="live_data"></div>                                  
 
    		
  		
	
	
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
    
    
  
  

    
<!-- end #footer -->
</body>
<script>
    function validarSancion()
    {
        var idFalta=document.getElementById("texto").value;
        
        if(idFalta != 0)
        {
        document.getElementById("formMulta").submit();
        }else{
             alert("Ups.. el formulario enviado no es valido revise la informacion que esta enviando por favor!");
        }
    }
    function setFaltaAuto()
    {
        var nro=document.getElementById("nro").value;
        var clas=document.getElementById("clase").value;
        document.getElementById("boton").style.display = "none";
        document.getElementById("puntajeFalta").style.display = "none";
        var san = document.getElementById("sancionador").value;
       
        var url = "buscarFaltaxClaseNro.php";
        $.ajax({
            type: 'POST',
            url: url,
            data:{clase:clas,num:nro,sancionador:san},
            
            success: function (datos) {
                        $("#faltasDisponibles").html(datos);
                        mostrarPuntaje();
                    }
        })
        
    }
    function mostrarFaltas()
    {
        
        var clas=document.getElementById("clase").value;
        document.getElementById("boton").style.display = "none";
        document.getElementById("puntajeFalta").style.display = "none";
       
        var url = "buscarFaltaxClase.php";
        $.ajax({
            type: 'POST',
            url: url,
            data:{clase:clas},
            
            success: function (datos) {
                        $("#faltasDisponibles").html(datos);
                    }
        })
    }
    
     function mostrarPuntaje()
    {
        
        var falt=document.getElementById("texto").value;
        
        var url = "puntajeFalta.php";
        document.getElementById("boton").style.display = "";
        document.getElementById("puntajeFalta").style.display = "";
        $.ajax({
            type: 'POST',
            url: url,
            data:{falta:falt,valor:<?php echo $valor;?>,id_estudiante:<?php echo $_GET["id_estudiante"];?>},
            
            success: function (datos) {
                        $("#puntajeFalta").html(datos);
                                           }
        })
    }
    </script>

<script src="../js/jquery.fittext.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/creative.js"></script> 

  <script>
    $(function(){
       $('.datepicker').datepicker(); 
      
    });
    
    $(function(){
         var nowTemp = new Date();
         var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
         var checkin = $('#fecha').datepicker({
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
  $('#clase')[0].focus();
}).data('datepicker');
var checkout = $('#fecha').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
    });
    
   
    </script>   
    
    
<script>
    
$('#carousel-844716').carousel({
    interval: 4000
});
</script>

<script>
$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",
                data:{id_estudiante:<?php echo $_GET["id_estudiante"];?>,},                  
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
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id10");  
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


</html>
