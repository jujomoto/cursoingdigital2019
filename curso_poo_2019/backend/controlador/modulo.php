<?php 
require("../clase/modulo.class.php");
$obj_mod=new modulo;

$obj_mod->asignar_valor($_REQUEST);


//$_REQUEST ES CUANDO VENGAN DATOS DEL FORMULARIO, probando las funciones con datos estaticos
	// $obj_mod->cod_mod="11";	
	// $obj_mod->nom_mod="uno";	
	// $obj_mod->des_mod="";	
	// $obj_mod->url_mod="uno/";	
	// $obj_mod->fky_modulo="";	
	// $obj_mod->est_mod="I";


switch ($accion=$_REQUEST["accion"]) 
{
	case 'agregar':
		$obj_mod->resultado=$obj_mod->insertar();
		$obj_mod->mensaje();
		break;
	case 'modificar':
		$obj_mod->resultado=$obj_mod->modificar();
		$obj_mod->mensaje();
		break;
	case 'eliminar':
		$obj_mod->resultado=$obj_mod->eliminar();
		$obj_mod->mensaje();
		break;
	default:
		# code...
		break;
}
?>