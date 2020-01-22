<?php 

	require ("../clase/permiso.class.php");

	/*Instancio un objeto de la clase permiso*/

	$obj_per=new permiso;

	$obj_per->asignar_valor($_REQUEST);

	//Accion me dira que debo hacer

	switch ($_REQUEST["accion"]) //El request es POST y GET al mismo tiempo y no muestra nada por la url pero se puede modificar por la url
	{
		case 'insertar':  
					$obj_per->resultado=$obj_per->insertar(); 
					$obj_per->mensaje();
					break;
		case 'modificar': 
					$obj_per->resultado=$obj_per->modificar(); 
					$obj_per->mensaje();
					break;
		case 'eliminar':  
					$obj_per->resultado=$obj_per->eliminar(); 
					$obj_per->mensaje();
					break;
	}

 ?>