<?php
include("../encabezado.php");
//valida permiso 
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=8;
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

	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		Filtrar Módulo
	</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<!-- .container>.row*4>.col*2 
 Ctrl+Shift*G para agregar etiqueta
	-->
	<form action="filtrar_modulo_reporte.php" method="POST">
		<div class="container">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>Filtrar por Módulo</h4>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre del módulo:</div>
				<div class="col-8">
					<input type="text" name="nom_mod" id="nom_mod" placeholder="Nombre del Módulo" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Descripción:</div>
				<div class="col-8">
					<input type="text" name="des_mod" id="des_mod" placeholder="Descripción del Módulo" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Url del Módulo:</div>
				<div class="col-8">
					<input type="text" name="url_mod" id="url_mod" placeholder="modulo/" class="form-control">
				</div>
			</div>
			

			<div class="row mt-2">
				<div class="col-4">Estatus:</div>
				<div class="col-8">
					<select name="est_mod" id="est_mod" class="form-control">
						<option value="">Seleccione...</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4 text-center">
					<input type="submit" class="btn btn-primary" value="Filtrar">
				</div>
				<div class="col-4 text-center">
					<input type="reset" class="btn btn-primary" value="Limpiar">
				</div>
			</div>
		</div>
	</form>
</body>
</html>
<?php 
}//fin del if que valida el permiso
 ?>
