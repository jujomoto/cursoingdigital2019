<?php
include("../../vista/encabezado.php");
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$id_opc=3;
$obj_per->fky_opcion=$id_opc;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
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
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filtrar Usuario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<form action="filtrar_usuario.php" method="POST">
		
		<div class="container">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>Filtrar Usuario</h4>
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Código:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="cod_usu" id="cod_usu" placeholder="Ingrese código" maxlength="30" class="form-control">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Nombre:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="nom_usu" id="nom_usu" placeholder="Ingrese nombre" maxlength="30" class="form-control">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Apellido:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="ape_usu" id="ape_usu" maxlength="30" placeholder="Ingrese Apellido" class="form-control">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Correo:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="ema_usu" id="ema_usu" placeholder="Ingrese correo:" maxlength="80" class="form-control">
				</div>
			</div>
			
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Estatus</div>
				<div class="col-md-8 col-6">
					<select name="est_usu" id="est_usu" class="form-control">
						<option value="">Seleccione</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2 text-center">
				<div class="col-4">
					<input type="submit" value="Filtrar" name="btnfiltrar" class="btn btn-primary">
				</div>
				<div class="col-4">
					<input type="reset" value="Resetear" name="" class="btn btn-primary">
				</div>
			</div>
		</div>		
	</form>
</body>
</html>

<?php 
}
 ?>