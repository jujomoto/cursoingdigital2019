<?php
include("../encabezado.php");
//valida permiso
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=12;
$obj_per->fky_opcion=$id_opc;
$obj_per->puntero=$obj_per->filtrar();
$permiso=$obj_per->extraer_dato();
if (!$permiso) 
{
	echo "
				<div class='alert alert-danger text-center mt-5' >
					<p><b>MENSAJE:</b><strong><h1>No tiene permiso para esta opción</h1></strong></p>
				</div>";
} else {
	



require("../../../backend/clase/modulo.class.php");
$obj_mod=new modulo;
require("../../../backend/clase/opcion.class.php");
$obj_opc=new opcion;
$obj_opc->est_opc="A";
$obj_opc->puntero=$obj_opc->listar();
?>

	<div class="row bg-primary text-white text-center">
		<div class="col-3">Nombre</div>
		<!-- <div class="col-3">Descripción</div> -->
		<div class="col-2">URL</div>
		<div class="col-2">Módulo</div>
		<div class="col-2">Estatus</div>
	</div>		


<?php
	
	while(($opcion=$obj_opc->extraer_dato())>0)
	{
		$obj_mod->cod_mod=$opcion["fky_modulo"];
		$obj_mod->puntero=$obj_mod->filtrar();
		$modulo=$obj_mod->extraer_dato();
		echo "    
		<div class='row text-center mt-2'>
			<div class='col-3'>$opcion[nom_opc]</div>
			<!-- <div class='col-3'>$opcion[des_opc]</div> -->
			<div class='col-2'>$opcion[url_opc]</div>
			<div class='col-2'>$modulo[nom_mod]</div>
			<div class='col-2'>$opcion[est_opc]</div>
		</div>";
	}



include("../pie.php");
}
?>