<?php 
session_start();
include("../../vista/encabezado.php");
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=5;
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

require("../../../backend/clase/usuario.class.php");
$obj_usu=new usuario;
$obj_usu->asignar_valor($_REQUEST);
$obj_usu->puntero=$obj_usu->filtrar();
$vector=$obj_usu->extraer_dato();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar usuario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<form action="../../../backend/controlador/usuario.php" method="post">
		<input type="hidden" name="accion" value="modificar">
		<input type="hidden" name="cod_usu" value="<?php echo $vector['cod_usu']; ?>">
		<div class="container">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>Editar Usuario</h4>
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Nombre:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="nom_usu" id="nom_usu" placeholder="Ingrese nombre" required="" maxlength="30" class="form-control"
					value=" <?php echo $vector['nom_usu']; ?>">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Apellido:</div>
				<div class="col-md-8 col-6">
					<input type="text" name="ape_usu" id="ape_usu" maxlength="30" placeholder="Ingrese Apellido" required="" class="form-control" value=" <?php echo $vector['ape_usu']; ?>">
				</div>
			</div>
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Correo:</div>
				<div class="col-md-8 col-6">
					<input type="email" name="ema_usu" id="ema_usu" placeholder="Ingrese correo:" maxlength="80" required="" class="form-control" value=" <?php echo $vector['ema_usu']; ?>">
				</div>
			</div>
			
			<div class="row mt-2 justify-content-center">
				<div class="col-md-4 col-2">Estatus</div>
				<div class="col-md-8 col-6">
					<select name="est_usu" id="est_usu" class="form-control">
						<?php $seleccionado=($vector['est_usu']=='A')?"selected":"";   ?>
						<option value="A" <?php echo $seleccionado ?>>Activo</option>
						<?php $seleccionado=($vector['est_usu']=='I')?"selected":"";   ?>
						<option value="I" <?php echo $seleccionado ?>>Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2 text-center">
				<div class="col-12">
					<input type="submit" value="Editar Usuario" name="btnguardar" class="btn btn-primary">
				</div>
			</div>
		</div>		
	</form>
</body>
</html>

<?php 
}
?>