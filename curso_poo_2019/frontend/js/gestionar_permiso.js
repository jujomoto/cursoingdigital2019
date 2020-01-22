function gestionar_permiso (cod_opc,cod_usu)
{
	// alert(accion)
	// alert(cod_opc)
	// alert(cod_usu)
	//instanciamos la clase XLMHttpRequest
	var obj_aja=new XMLHttpRequest

	var valida_check=document.getElementById(cod_opc).checked
	//alert(valida_check)
	if (valida_check==true) 
		accion="insertar"
	else
		accion="eliminar"

	


	/*la ruta tiene un nivel adicional, ya q se 
	debe considerar desde donde está el archivo php q invoca la funcion javascript*/
	obj_aja.open("GET","../../../backend/controlador/permiso.php?accion="+accion+"&fky_opcion="+cod_opc+"&fky_usuario="+cod_usu)
	{
		obj_aja.onreadystatechange=function()
		{
			if (obj_aja.status==200 && obj_aja.readyState==4 ) 
				{
					//imprimi mensajes del servidor(php)
					alert(obj_aja.responseText)
				}
		}


	}
obj_aja.send(null)

}//fin de funcion