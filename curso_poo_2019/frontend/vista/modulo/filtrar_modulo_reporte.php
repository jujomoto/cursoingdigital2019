<?php
include("../encabezado.php");
//valida permiso 
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=9;
$obj_per->fky_opcion=$id_opc;
$obj_per->puntero=$obj_per->filtrar();
$permiso=$obj_per->extraer_dato();
if (!$permiso) 
{
	echo "
			<div class='alert alert-danger text-center mt-5' >
				<p><b>MENSAJE:</b><strong><h1>No tiene permiso para esta opción</h1></strong></p>
			</div>";
} else 
{

	require("../../../backend/clase/modulo.class.php");
	$obj_mod=new modulo;
	$obj_mod->asignar_valor($_REQUEST);
	$obj_mod->puntero=$obj_mod->filtrar();
	?>
<div class="row bg-primary text-white text-center">
	<div class="col-2">Nombre</div>
	<div class="col-3">Descripción</div>
	<div class="col-2">URL</div>
	<div class="col-2">Sub-Modulo</div>
	<div class="col-1">Estatus</div>
	<div class="col-1">EDIT</div>
	<div class="col-1">DELETE</div>
</div>

<?php
while (($modulo=$obj_mod->extraer_dato())>0) 
{
	echo "  
		<div class='row text-center'>
			<div class='col-2'>$modulo[nom_mod]</div>
			<div class='col-3'>$modulo[des_mod]</div>
			<div class='col-2'>$modulo[url_mod]</div>
			<div class='col-2'>$modulo[fky_modulo]</div>
			<div class='col-1'>$modulo[est_mod]</div>
			<div class='col-1'>
				<a href='editar_modulo.php?cod_mod=$modulo[cod_mod]'>Editar</a>
			</div>
			<div class='col-1'>
				<a onclick='return confirm_delete();' href='../../../backend/controlador/modulo.php?accion=eliminar&cod_mod=$modulo[cod_mod]'>Eliminar</a>
			</div>

			


		</div>
	";
}

include("../pie.php");
}//fin del if que valida el permiso
?>