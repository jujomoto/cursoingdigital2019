<?php
//validacion del permiso
// session_start();
// include("../encabezado.php");
// require("../../../backend/clase/permiso.class.php");
// $obj_per=new permiso;
// $obj_per->fky_usuario=$_SESSION["fky_usuario"];
// $id_opc=18;
// $obj_per->fky_opcion=$id_opc;
// $obj_per->puntero=$obj_per->filtrar();
// $permiso=$obj_per->extraer_dato();
// if (!$permiso) 
// {
// 	echo "
// 		<div class='alert alert-danger text-center mt-5' >
// 			<p><b>MENSAJE:</b><strong><h1>No tiene permiso para esta opción</h1></strong></p>
// 		</div>";
// } else 
// {

session_start();
include("../encabezado.php");
require("../../../backend/clase/permiso.class.php");
$obj_per=new permiso;
$obj_per->fky_usuario=$_SESSION["fky_usuario"];
require("../../html2pdf_v4.01/html2pdf.class.php");
require("../../../backend/clase/usuario.class.php");
require("../../../backend/clase/opcion.class.php");

$obj_usu=new usuario;
$obj_opc=new opcion;
$obj_usu->cod_usu=$_SESSION["fky_usuario"];
$obj_usu->puntero=$obj_usu->filtrar();
$usuario=$obj_usu->extraer_dato();

$obj_pdf=new HTML2PDF("P","Letter","es",true,'UTF-8',array(10,0, 0, 10));

$encabezado="<page >
			 <page_header> 
				<!--<img src='../../img/banner.jpg'> --> 
			 </page_header>";

$reporte="<br><br><br><br><br><br><br><br><br><br>
			<table border='1'>
			<tr>
			 <td style='width:730px;background-color:yellow;' align='center'>
			 	<h3>Permisos de $usuario[nom_usu] $usuario[ape_usu]</h3>
			 </td>
			</tr> 
		  </table>";

$reporte.="<table border='1'>
			<tr style='background-color:yellow;' align='center'>
				<td style='width:80px;'>N°</td>
				<td style='width:150px;'>Opción</td>
				<td style='width:250px;'>Módulo</td>
				<td style='width:210px;'>URL</td>
			</tr>";

	  $i=1;
	  $obj_per->fila_ini=0;
	  $obj_per->nro_fila=100;
	  $obj_per->puntero=$obj_per->filtrar_reporte();
	  while(($permiso=$obj_per->extraer_dato())>0)
	  {
			$reporte.="<tr>
						<td style='width:80px;'>$i</td>
						<td style='width:150px;'>$permiso[nom_opc]]</td>
						<td style='width:250px;'>$permiso[nom_mod]</td>
						<td style='width:210px;'>$permiso[url_opc]</td>
					</tr>";	  	
	  $i++;
	  }
$reporte.="</table>";	  


$pie="<page_footer>
		<p>Fecha de Emisión: ".date('d-m-Y')."</p>
	  </page_footer>
	  </page>";

$imprimir=$encabezado.$reporte.$pie;  

$obj_pdf->writeHTML($imprimir,false);
$obj_pdf->Output("reporte.pdf","I");
//}//cierre del if q valida permiso
?>