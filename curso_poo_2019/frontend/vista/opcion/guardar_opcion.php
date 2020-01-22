<?php 
	include("../../vista/encabezado.php");
	//valida permiso
	session_start();
	require("../../../backend/clase/permiso.class.php");
	$obj_per=new permiso;
	$obj_per->fky_usuario=$_SESSION["fky_usuario"];
	$id_opc=11;
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
	$obj_mod->est_mod="A";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guardar Opción</title>
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="container">
		<form action="../../../backend/controlador/opcion.php" method="POST">
			<input type="hidden" name="accion" value="agregar">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>Agregar Opción</h4>
				</div>
				
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre:</div>
				<div class="col-8">
					<input type="text" name="nom_opc" id="nom_opc" placeholder="Ingrese nombre de la opción" class="form-control" required="">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Descripción:</div>
				<div class="col-8">
					<input type="text" name="des_opc" id="des_opc" placeholder="Ingrese descripción de la opción" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">URL Opción:</div>
				<div class="col-8">
					<input type="text" name="url_opc" id="url_opc" placeholder="URL opción" class="form-control" required="">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Módulo:</div>
				<div class="col-8">
					<select name="fky_modulo" id="fky_modulo" class="form-control">
						<option value="">Seleccione...</option>
						<?php 
							$obj_mod->puntero=$obj_mod->listar();
							while(($array=$obj_mod->extraer_dato())>0)
							{
								echo "<option value='$array[cod_mod]'>$array[nom_mod]</option>";
							}



						 ?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Estatus:</div>
				<div class="col-8">
					<select name="est_opc" id="est_opc" class="form-control">
						<option value="X">Seleccione...</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2 text-center">
				<div class="col-12">
					<input type="submit" name="" value="Guardar Opción" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</body>
</html>
<?php 
}//fin del if que valida el permiso
 ?>