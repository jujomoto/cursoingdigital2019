<?php
include("../encabezado.php");
//valida permiso 
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=10;
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
	//$obj_mod->est_mod="A";
	$obj_mod->asignar_valor($_REQUEST);
	$obj_mod->puntero=$obj_mod->filtrar();
	$modulo=$obj_mod->extraer_dato();
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		EDITAR Módulo
	</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<!-- .container>.row*4>.col*2 
 Ctrl+Shift*G para agregar etiqueta
	-->
	<form action="../../../backend/controlador/modulo.php" method="POST">
		<input type="hidden" name="accion" value="modificar">
		<input type="hidden" name="cod_mod" value=" <?php echo $modulo['cod_mod']; ?> ">
		<div class="container">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>EDITAR Módulo</h4>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre:</div>
				<div class="col-8">
					<input type="text" name="nom_mod" id="nom_mod" placeholder="Nombre del Módulo" class="form-control" value=" <?php echo $modulo['nom_mod']; ?> ">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Descripción:</div>
				<div class="col-8">
					<input type="text" name="des_mod" id="des_mod" placeholder="Descripción del Módulo" class="form-control" value=" <?php echo $modulo['des_mod']; ?> ">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Url del Módulo:</div>
				<div class="col-8">
					<input type="text" name="url_mod" id="url_mod" placeholder="modulo/" class="form-control" value=" <?php echo $modulo['url_mod']; ?> ">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Sub-Modulo:</div>
				<div class="col-8">
					<select name="fky_modulo" id="fky_modulo" class="form-control">
						<?php
						$obj_mod->puntero=$obj_mod->listar();
						while ( ($vector=$obj_mod->extraer_dato())>0 ) 
						{
							echo " 
							<option value='$vector[cod_mod]'>$vector[des_mod]</option>";
						}
						
						?>
						

					</select>	
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Estatus:</div>
				<div class="col-8">
					<select name="est_mod" id="est_mod" class="form-control">
						<option value="">Seleccione...</option>
						<?php $seleccionado=($modulo["est_mod"]=="A")?"selected":"";  ?>
						<option value="A" <?php echo $seleccionado; ?>>Activo</option>
						<?php $seleccionado=($modulo["est_mod"]=="I")?"selected":""; ?>
						<option value="I" <?php echo $seleccionado; ?>>Inactivo</option>
						
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-12 text-center">
					<input type="submit" class="btn btn-primary" value="Guardar">
				</div>
			</div>
		</div>
	</form>
</body>
</html>
<?php 
}//fin del if que valida permiso
 ?>