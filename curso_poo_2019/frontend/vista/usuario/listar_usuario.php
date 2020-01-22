<?php
//validacion del permiso
include("../encabezado.php");
session_start();
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
$id_opc=2;
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
$obj_usu->est_usu="A";
$obj_usu->puntero=$obj_usu->listar();
?>
<!-- .row>.col-3*4 -->
<div class="row bg-primary text-center text-white align-content-center">
	<div class="col-3">Nombre</div>
	<div class="col-3">Apellido</div>
	<div class="col-3">Correo</div>
	<div class="col-3">Estatus</div>
</div>


<?php
while(($usuario=$obj_usu->extraer_dato())>0)
{
	//echo $usuario["nom_usu"]." ".$usuario["ape_usu"]."<br>";
	echo	"<div class='row text-center mt-2'>
			<div class='col-3'>$usuario[nom_usu]</div>
			<div class='col-3'>$usuario[ape_usu]</div>
			<div class='col-3'>$usuario[ema_usu]</div>
			<div class='col-3'>$usuario[est_usu]</div>
		</div>";
}
include("../pie.php");
}
?>

