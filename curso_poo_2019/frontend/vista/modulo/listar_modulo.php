<?php 
include("../encabezado.php");
//valida permiso 
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=7;
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
	$obj_mod->est_mod="A";
	$obj_mod->puntero=$obj_mod->listar();
	?>

<div class="row bg-primary text-center text-white">
	<div class="col-2">Nombre:</div>
	<div class="col-2">Descripción:</div>
	<div class="col-3">URL:</div>
	<div class="col-2">Estatus:</div>
	<div class="col-3">Sub_Modulo:</div>
</div>

<?php

	while(($array=$obj_mod->extraer_dato())>0)
	{
		echo "  
			<div class='row mt-2'>
				<div class='col-2'>$array[nom_mod]</div>
				<div class='col-2'>$array[des_mod]</div>
				<div class='col-3'>$array[url_mod]</div>
				<div class='col-2'>$array[est_mod]</div>
				<div class='col-3'>$array[fky_modulo]</div>
			</div>";
	}



include("../pie.php");
}//fin del if que valida el permiso
 ?>