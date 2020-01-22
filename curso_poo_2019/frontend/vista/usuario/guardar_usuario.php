<?php 
session_start();
include("../../vista/encabezado.php");
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=1;
$obj_per->fky_opcion=$id_opc;
$obj_per->puntero=$obj_per->filtrar();
$permiso=$obj_per->extraer_dato();
// echo "cod_per:".$permiso["cod_per"]."<br>";
// echo "fky_usuario:".$permiso["fky_usuario"]."<br>";
// echo "fky_opcion:".$permiso["fky_opcion"]."<br>";

if (!$permiso) 
{
	echo "
	<div class='alert alert-danger text-center mt-5' >
		<p><b>MENSAJE:</b><strong><h1>No tiene permiso para esta opción</h1></strong></p>
	</div>";
}else
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guardar usuario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<form action="../../../backend/controlador/usuario.php" method="post">
		<input type="hidden" name="accion" value="insertar">
		<div class="container">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>Agregar Usuario</h4>
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Nombre:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="nom_usu" id="nom_usu" placeholder="Ingrese nombre" required="" maxlength="30" class="form-control">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Apellido:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="ape_usu" id="ape_usu" maxlength="30" placeholder="Ingrese Apellido" required="" class="form-control">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Correo:</div>
				<div class="col-md-8 col-6">
					<input type="email" name="ema_usu" id="ema_usu" placeholder="Ingrese correo:" maxlength="80" required="" class="form-control">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Clave:</div>
				<div class="col-md-8 col-6">
					<input type="password" name="cla_usu" id="cla_usu" placeholder="Ingrese Clave" maxlength="32" required="" class="form-control">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Estatus</div>
				<div class="col-md-8 col-6">
					<select name="est_usu" id="est_usu" class="form-control">
						<option value="X">Seleccione</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2 text-center">
				<div class="col-12">
					<input type="submit" value="Guardar Usuario" name="btnguardar" class="btn btn-primary">
				</div>
			</div>
		</div>		
	</form>
</body>
</html>

<?php 
}
 ?>
