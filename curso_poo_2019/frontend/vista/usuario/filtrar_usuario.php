<?php 
	include("../encabezado.php");
	//validacion del permiso
	session_start();
	require("../../../backend/clase/permiso.class.php");
	$obj_per=new permiso;
	$obj_per->fky_usuario=$_SESSION["fky_usuario"];
	$id_opc=4;
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
		# code...
	
	

	require("../../../backend/clase/usuario.class.php");
	$obj_usu=new usuario;
	$obj_usu->asignar_valor($_REQUEST); //obtenemos los valores del formulario filtrar_usuario.html
	$obj_usu->puntero=$obj_usu->filtrar();
?>

	<div class="row bg-primary text-center text-white align-content-center">
		<div class="col-1">Código</div>
		<div class="col-2">Nombre</div>
		<div class="col-3">Apellido</div>
		<div class="col-2">Correo</div>
		<div class="col-1">Estatus</div>
		<div class="col-1">Editar</div>
		<div class="col-1">Borrar</div>
		<div class="col-1">Permiso</div>
	</div>


<?php

$i=0;
while (($usuario=$obj_usu->extraer_dato())>0) 
{
	echo "
	<div class='row text-center bg-light mt-1'>
		<div class='col-1'>$usuario[cod_usu]</div>
		<div class='col-2 align-self-center text-left'>$usuario[nom_usu]</div>
		<div class='col-3 align-self-center text-left'>$usuario[ape_usu]</div>
		<div class='col-2 align-self-center text-left'>$usuario[ema_usu]</div>
		<div class='col-1'>$usuario[est_usu]</div>
		<div class='col-1'>
			<a href='editar_usuario.php?cod_usu=$usuario[cod_usu]'>Editar</a>
		</div>
		<div class='col-1'>
			<a onclick='return confirm_delete();' href='../../../backend/controlador/usuario.php?accion=eliminar&cod_usu=$usuario[cod_usu]'>Eliminar</a>
		</div>
		<div class='col-1'>
			<a href='../permiso/asignar_permiso.php?cod_usu=$usuario[cod_usu]&pagina=1'>Permiso</a>
		</div>
	</div>";
	$i++;

}

if ($i==0)
{
	echo "no hay usuarios registrado";
}


include("../pie.php");
}//fin del if que valida el permiso
?>