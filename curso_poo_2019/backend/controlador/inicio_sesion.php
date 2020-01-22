<?php 
session_start(); 
require("../../backend/clase/usuario.class.php");
$obj_usu=new usuario;
$obj_usu->ema_usu=$_POST["ema_usu"];
$obj_usu->cla_usu=md5($_POST["cla_usu"]);
$obj_usu->puntero=$obj_usu->valida_inicio_sesion();
$usuario=$obj_usu->extraer_dato();




if ($usuario["est_usu"]=="A") 
{
	// echo "ingresó al controlador de inicio_sesion.php <br>";
	// echo "el valor recibido de correo es: ".$_POST['ema_usu']."<br>";
	// echo "el valor recibido de clave es: ".$_POST['cla_usu']."<br>";
	$_SESSION["fky_usuario"]=$usuario["cod_usu"];
	header("Location: ../../menu.php");
	
}else
	$obj_usu->mensaje();

 ?>