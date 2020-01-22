<?php
session_start();
if(@$_GET["accion"]=="cerrar")
{
	session_destroy();
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Ingresar al Sistema</title>
 	<link rel="stylesheet" href="../bootstrap-4.0/css/bootstrap.min.css">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 </head>
 <body>
 	<form action="backend/controlador/inicio_sesion.php" method="POST">
		<div class="container">
			<div class="row justify-content-center mt-5">
				<div class="col-6">
					<div class="row mt-2">
						<div class="col bg-primary text-white text-center">
							<h4>Iniciar Sesión</h4>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-4">Correo:</div>
						<div class="col-8">
							<input type="email" name="ema_usu" required="" maxlength="80" class="form-control" placeholder="Ingrese correo">
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-4">Clave:</div>
						<div class="col-8">
							<input type="text" placeholder="Ingrese clave" required="" maxlength="32" class="form-control" name="cla_usu">
						</div>
					</div>
					<div class="row mt-2">
						<div class="col text-center">
							<input type="submit" name="btnenviar" class="btn btn-primary" value="Enviar">
						</div>
					</div>
				</div>
			</div>
		</div>


 	</form>
 </body>
 </html>