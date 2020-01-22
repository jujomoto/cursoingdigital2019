<?php 
	require("../clase/usuario.class.php");
	/*instancio un objeto de la clase usuario*/
	$obj_usu=new usuario;
	
	/* llenado manual de variables publicas de la clase usuario
	$obj_usu->cod_usu=6;
	$obj_usu->nom_usu="gladys";
	$obj_usu->ape_usu="lopez";
	$obj_usu->ema_usu="glopez@gmail.com";
	$obj_usu->cla_usu="1";
	$obj_usu->est_usu="A";
	*/

	//tomo variable del formulario(vista) llamada accion
	
	//el @ antes de la variable evita el warning cuando ejecuta el formulario
	/* con el $_REQUEST capturamos las variables de los formularios q vienen x post or get, sin embargo se utilizara un metodo mas practico a través de foreach y una funcion de utilidad-> asignar_valor */
	// @$obj_usu->cod_usu=$_REQUEST["cod_usu"];
	// @$obj_usu->nom_usu=$_REQUEST["nom_usu"];
	// @$obj_usu->ape_usu=$_REQUEST["ape_usu"];
	// @$obj_usu->ema_usu=$_REQUEST["ema_usu"];
	// @$obj_usu->cla_usu=$_REQUEST["cla_usu"];
	// @$obj_usu->est_usu=$_REQUEST["est_usu"];

	/*foreach es un ciclo que recorre un objeto o array ($_GET,$_POST,$_REQUEST) toma el nombre de campo ($key) y su valor($value) y los envia al metodo asignar_valor q se ejecuta a través del objeto $obj_usu de la clase usuario, la cual hereda la funcion de la clase utilidad*/
	
	//primera forma de hacerlo
	// foreach ($_REQUEST as $atributo => $valor) 
	// {
	// 	$obj_usu->asignar_valor($atributo,$valor);
	// }

	//2a forma: envia el $_REQUEST con el metodo asignar_valor
	
	$obj_usu->asignar_valor($_REQUEST);

	switch ($_REQUEST["accion"]) 
	{
		case 'insertar':
				$obj_usu->resultado=$obj_usu->insertar(); 
				$obj_usu->mensaje();
				break;
		case 'modificar':
				$obj_usu->resultado=$obj_usu->modificar(); 
				$obj_usu->mensaje();
				break;
		case 'eliminar':
				$obj_usu->resultado=$obj_usu->eliminar(); 
				$obj_usu->mensaje();
				break;
	}
	


?>