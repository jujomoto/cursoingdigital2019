<?php 
require("../clase/opcion.class.php");
$obj_opc=new opcion;

$obj_opc->asignar_valor($_REQUEST);


//$_REQUEST ES CUANDO VENGAN DATOS DEL FORMULARIO, probando las funciones con datos estaticos
	// $obj_opc->cod_mod="11";	
	// $obj_opc->nom_mod="uno";	
	// $obj_opc->des_mod="";	
	// $obj_opc->url_mod="uno/";	
	// $obj_opc->fky_modulo="";	
	// $obj_opc->est_mod="I";


switch ($accion=$_REQUEST["accion"]) 
{
	case 'agregar':
		$obj_opc->resultado=$obj_opc->insertar();
		$obj_opc->mensaje();
		break;
	case 'modificar':
		$obj_opc->resultado=$obj_opc->modificar();
		$obj_opc->mensaje();
		break;
	case 'eliminar':
		$obj_opc->resultado=$obj_opc->eliminar();
		$obj_opc->mensaje();
		break;
	default:
		# code...
		break;
}


	

 ?>