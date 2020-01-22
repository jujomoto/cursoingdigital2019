<script src="../../js/gestionar_permiso.js"></script>
<?php 
	include("../encabezado.php");
	session_start();
	require("../../../backend/clase/usuario.class.php");
	require("../../../backend/clase/opcion.class.php");
	$obj_opc=new opcion;
	require("../../../backend/clase/permiso.class.php");
	$obj_per=new permiso;
	require("../../../backend/clase/modulo.class.php");
	$obj_mod=new modulo;

	//este es necesario con el cod_usu traer los otros datos dle usuario
	$obj_usu=new usuario;
	$obj_usu->cod_usu=$_REQUEST["cod_usu"];
	$obj_usu->puntero=$obj_usu->filtrar();
	$usuario=$obj_usu->extraer_dato();
	$obj_per->fky_usuario=$usuario["cod_usu"];

	//paginacion
	$fila_pagina=10;
	$pagina=$_REQUEST["pagina"];
	$fila_inicial=($pagina-1)*$fila_pagina;
	$obj_opc->fila_ini=$fila_inicial;
	$obj_opc->nro_fila=$fila_pagina;


 ?>


	<div class="container">
		<div class="row bg-primary text-white text-center">
			<div class="col-12">
				ASIGNAR PERMISOS AL USUARIO: <?php echo $usuario['nom_usu']. " ".$usuario['ape_usu']." correo: ". $usuario['ema_usu']; ?> 
			</div>
			
		</div>
		<div class="row bg-primary text-white text-center">
			<div class="col-1">N°</div>
			<div class="col-1">Código</div>
			<div class="col-2">Nombre Opción</div>
			<!-- <div class="col-3">Descripcion Opcion</div> -->
			<div class="col-2">Nombre Archivo</div>
			<div class="col-3">Módulo</div>
			<div class="col-1">Asignar</div>
		</div>
	

<?php 
	$i=1;
	$obj_opc->est_opc="A";
	$obj_opc->puntero=$obj_opc->filtrar_paginado();
	while(($opcion=$obj_opc->extraer_dato())>0) 
	{
		//las siguientes permiten consultar si el permiso ya está asignado
		$obj_per->fky_opcion=$opcion["cod_opc"];
		$obj_per->puntero=$obj_per->filtrar();
		$permiso=$obj_per->extraer_dato();
		$checked=($permiso["cod_per"]!="")?"checked":"";

		//las siguientes permiten mostrar el nombre del modulo
		$obj_mod->cod_mod=$opcion["fky_modulo"];
		$obj_mod->puntero=$obj_mod->filtrar();
		$modulo=$obj_mod->extraer_dato();

		echo "  
			<div class='row text-center'>
				<div class='col-1 bg-light mt-1'>$i</div>
				<div class='col-1 bg-light mt-1'>$opcion[cod_opc]</div>
				<div class='col-2 bg-light mt-1'>$opcion[nom_opc]</div>
				<!--<div class='col-3 bg-light mt-1'>$opcion[des_opc]</div>-->
				<div class='col-2 bg-light mt-1'>$opcion[url_opc]</div>
				<div class='col-3 bg-light mt-1'>$modulo[nom_mod] </div>
				<div class='col-1'>
					<input type='checkbox' class='form-check-input' name='' id='$opcion[cod_opc]' onclick=gestionar_permiso($opcion[cod_opc],$usuario[cod_usu]) $checked>
				</div>
			</div>
		";
		$i++;
	}
?>	

	<div class="row mt-2">
		<div class="col-4 text-right">Páginas:</div>
		<div class="col-8">
			<nav>
				<?php
				$obj_opc->tabla="opcion";
				$obj_opc->puntero=$obj_opc->contar_registros();
				$count=$obj_opc->extraer_dato();
				$paginas=$count["total"]/$fila_pagina;
				$p="<ul class='pagination d-flex justify-content-start'>";
				for ($pag=1; $pag < $paginas+1 ; $pag++) 
				{ 
					$p.="<li class='page-item'>
							<a href='asignar_permiso.php?pagina=$pag&cod_usu=$usuario[cod_usu]' class='page-link'>$pag</a>
						</li>";
				}
				$p.="</ul>";
				echo "$p";
				?>
			</nav>
		</div>
	</div>
<?php 
include("../pie.php");
 ?>