<?php
include("../encabezado.php");
//valida permiso
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=17;
$obj_per->fky_opcion=$id_opc;
$obj_per->puntero=$obj_per->filtrar();
$permiso=$obj_per->extraer_dato();
if (!$permiso) {
	echo "
				<div class='alert alert-danger text-center mt-5' >
					<p><b>MENSAJE:</b><strong><h1>No tiene permiso para esta opción</h1></strong></p>
				</div>";
} else {
	



require("../../../backend/clase/opcion.class.php");
$obj_opc=new opcion;
require("../../../backend/clase/modulo.class.php");
$obj_mod=new modulo;
$obj_opc->asignar_valor($_REQUEST); //para llenar las variables del formulario
$obj_opc->puntero=$obj_opc->filtrar();


?>

<div class="row bg-primary text-center text-white">
	<div class="col-3">Nombre</div>
	<!-- <div class="col-2">Descripción</div> -->
	<div class="col-3">Nombre archivo</div>
	<div class="col-2">Módulo</div>
	<div class="col-1">Estatus</div>
	<div class="col-1">Editar</div>
	<div class="col-1">Eliminar</div>
</div>

<?php 

	while (($opcion=$obj_opc->extraer_dato())>0) 
	{
		$obj_mod->cod_mod=$opcion['fky_modulo'];
		$obj_mod->puntero=$obj_mod->filtrar();
		$modulo=$obj_mod->extraer_dato();
		echo "  
			<div class='row bg-light mt-1'>
				<div class='col-3'>$opcion[nom_opc]</div>
				<!-- <div class='col-2'>$opcion[des_opc]</div> -->
				<div class='col-3'>$opcion[url_opc]</div>
				<div class='col-2'>$modulo[nom_mod]</div>
				<div class='col-1'>$opcion[est_opc]</div>
				<div class='col-1'><a href='editar_opcion.php?cod_opc=$opcion[cod_opc]&cod_mod=$modulo[cod_mod]'>Editar</a>
				</div>
				<div class='col-1'><a onclick='return confirm_delete();' href='../../../backend/controlador/opcion.php?accion=eliminar&cod_opc=$opcion[cod_opc]'>Eliminar</a>
				</div>
			</div>";
	}
include("../pie.php");
}//fin de if q valida permiso
 ?>