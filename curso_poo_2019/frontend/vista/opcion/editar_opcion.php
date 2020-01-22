<?php 
	include("../encabezado.php");
	//valida permiso 
	session_start();
	require("../../../backend/clase/permiso.class.php");
	$obj_per=new permiso;
	$obj_per->fky_usuario=$_SESSION["fky_usuario"];
	$id_opc=16;
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
	$codigo=$_REQUEST["cod_mod"]; //rescato el cod_mod para agregar atributo selected al select dinamico

	require("../../../backend/clase/opcion.class.php");
	$obj_opc=new opcion;
	$obj_opc->cod_opc=$_REQUEST["cod_opc"];
	$obj_opc->puntero=$obj_opc->filtrar();
	$opcion=$obj_opc->extraer_dato();
 ?>

	<div class="container">
		<form action="../../../backend/controlador/opcion.php" method="POST">
			<input type="hidden" name="accion" value="modificar">
			<input type="hidden" name="cod_opc" value=" <?php echo $opcion['cod_opc']; ?> ">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>Editar Opción</h4>
				</div>
				
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre:</div>
				<div class="col-8">
					<input type="text" name="nom_opc" id="nom_opc" placeholder="Ingrese nombre de la opción" class="form-control" required="" value=" <?php echo $opcion['nom_opc'] ?> ">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Descripción:</div>
				<div class="col-8">
					<input type="text" name="des_opc" id="des_opc" placeholder="Ingrese descripción de la opción" class="form-control"       value=" <?php echo $opcion['des_opc'] ?> ">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre Archivo:</div>
				<div class="col-8">
					<input type="text" name="url_opc" id="url_opc" placeholder="URL opción" class="form-control" required="" value=" <?php echo $opcion['url_opc'] ?> ">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Módulo:</div>
				<div class="col-8">
					<select name="fky_modulo" id="fky_modulo" class="form-control">
						<option value="">Seleccione...</option>
						<?php 
							$obj_mod->puntero=$obj_mod->filtrar();
							while(($modulo=$obj_mod->extraer_dato())>0)
							{
								if ($modulo["cod_mod"]==$codigo) 
								
									echo "<option value='$modulo[cod_mod]' selected>$modulo[nom_mod]</option>";
								else
									echo "<option value='$modulo[cod_mod]'>$modulo[nom_mod]</option>";
							}



						 ?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Estatus:</div>
				<div class="col-8">
					<select name="est_opc" id="est_opc" class="form-control">
						<option value="">Seleccione...</option>
						<?php $seleccionado=($opcion['est_opc']=="A")?"selected":""; ?>
						<option value="A" <?php echo $seleccionado ?> >Activo</option>
						<?php $seleccionado=($opcion['est_opc']=="I")?"selected":""; ?>
						<option value="I" <?php echo $seleccionado ?> >Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2 text-center">
				<div class="col-12">
					<input type="submit" name="" value="Enviar" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
<?php 
include("../pie.php");
}
 ?>