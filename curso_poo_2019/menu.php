<?php
session_start();
require("backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Control</title>
	<link rel="stylesheet" href="frontend/bootstrap-4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="frontend/css/estilo.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<div class="contenedor">
	<div class="superior text-center fondo-morado  text-white">
		<h2 class="centrar-vertical">Sistema </h2>
	</div>
	<div class="izquierda bg-light">
	  <div id="acordion" role="tablist" aria-multiselectable="true">
		<ul class="mt-3">
	<?php
		$i=0;
		$mod_ant="";
		$obj_per->puntero=$obj_per->construir_menu();
		while(($permiso=$obj_per->extraer_dato())>0)
		{
			$url=$permiso["url_mod"]."/".$permiso["url_opc"];	

			if($mod_ant!=$permiso['nom_mod'])
			{
			   if($i>0)
			  	{
			  		echo "</div>";	//cierre del div id=collapse q contiene los li
			  	}
			  		
			  	//pinta el nombre del primer modulo si es la 1a vez o si cambia de modulo 
			 	echo "	<li class='fondo-morado text-center'>
				 			<a href='#collapse$i' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse$i' class='<text-white></text-white> titulo'>$permiso[nom_mod]
				 			</a>
			 			</li>";
				 $mod_ant=$permiso['nom_mod'];
				 //pinta el div asociado al collapse anterior, el cual contendrá los LI de las opciones
				 echo "<div id='collapse$i' class='collapse' role='tabpanel' aria-labelledby='heading$i'>";
				 $i++;
			}//fin del if q valida si los modulos son !=

			echo "<li class='menu-opcion'>
					<a href='$url' target='destino'>
						$permiso[nom_opc]
					</a>
				</li>";
		}//fin del while		
	?>	
				</div> <!-- cierre del div id=collapse, ya q la ultima vez no entra el if($i>0) -->
			<li class='fondo-morado text-center'>
				<a href='index.php?accion=cerrar'>
				  Cerrar Sesión
				</a>		
			</li>

		

		</ul><!-- lista desordenada del aocordion -->
	  </div><!-- cierre del acordion acordion -->
	</div><!-- izquierda -->

	<div class="derecha iframe-container">
		<iframe src="frontend/bienvenida.html" frameborder="0" name="destino" width="80%" height="1000" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="inferior text-center fondo-morado text-white">
		<p><h4  class="centrar-vert-med">Sistema Creado por JUAN MONCADA</h4></p>
	</div>
</div><!-- cierre contenedor -->

	<script src="frontend/bootstrap-4.0/js/jquery-3.2.1.min.js"></script>
	<script src="frontend/bootstrap-4.0/js/popper-1.12.6.min.js"></script>
	<script src="frontend/bootstrap-4.0/js/bootstrap.min.js"></script>
</body>
</html>