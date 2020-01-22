<?php 
	//campos de tabla usuario
	//cod_usu,nom_usu,ape_usu,ema_usu,cla_usu,est_usu
	/*
	cod_usu	int	not null	primary key	auto_increment 	-> cod.usuario
	nom_usu	varchar(30)	not null						-> nombre usuario
	ape_usu	varchar(30)	not null						-> apellido usuario
	ema_usu	varchar(80)	not null		unique 			-> email usuario
	cla_usu	varchar(32)	not null						-> clave usuario
	est_usu	char	not null							-> estatus usuario
	*/
	require_once("utilidad.class.php");
	class Usuario extends Utilidad
	{
		public $cod_usu;
		public $nom_usu;
		public $ape_usu;
		public $ema_usu;
		public $cla_usu;
		public $est_usu;

		

		public function insertar()
		{
			//variable local, se pasa la clave x la funcion md5 para cifrarla
			$clave=md5($this->cla_usu);
			//ojo: la variable ($this->que_bda pertenece a la clase utilidad y se 
			// esta heredando de utilidad, po lo cual se accesa desde la clase hija, en este caso usuario.class)
			$this->que_bda="INSERT into usuario
			(nom_usu,
			ape_usu,
			ema_usu,
			cla_usu,
			est_usu)
			values('$this->nom_usu','$this->ape_usu','$this->ema_usu','$clave','$this->est_usu');";
			return parent::ejecutar();
			
		}//fin del mètodo agregar

		public function modificar()
		{
			$this->que_bda="UPDATE usuario set
			nom_usu='$this->nom_usu',
			ape_usu='$this->ape_usu',
			ema_usu='$this->ema_usu',
			cla_usu='$this->cla_usu',
			est_usu='$this->est_usu'
			where cod_usu='$this->cod_usu';";
			return parent::ejecutar();
		}//fin del mètodo modificar

		public function listar()
		{
			$this->que_bda="SELECT * from usuario where est_usu='$this->est_usu';";
			return parent::ejecutar();
		}//fin del mètodo listar

		public function eliminar()
		{
			$this->que_bda="DELETE from usuario where cod_usu='$this->cod_usu';";
			return parent::ejecutar();
		}//fin del mètodo eliminar

		public function filtrar()
		{
			$filtro1=($this->cod_usu!="")?" and cod_usu='$this->cod_usu'":"";
			$filtro2=($this->nom_usu!="")?" and nom_usu like '%$this->nom_usu%'":"";
			$filtro3=($this->ape_usu!="")?" and ape_usu like '%$this->ape_usu%'":"";
			$filtro4=($this->ema_usu!="")?" and ema_usu like '%$this->ema_usu%'":"";
			$filtro5=($this->est_usu!="")?" and est_usu='$this->est_usu'":"";

			//el where 1=1 es para q se cumpla la primera condicion(1=1 true) y luego concatena con los valos de los if ternarios
			$this->que_bda="SELECT * from usuario where 1=1 
			$filtro1
			$filtro2
			$filtro3
			$filtro4
			$filtro5
			 ;";
			 return parent::ejecutar();
		}//fin del mètodo filtrar

		public function valida_inicio_sesion()
		{
			$this->que_bda="SELECT cod_usu,est_usu from usuario where
			ema_usu='$this->ema_usu' and
			cla_usu='$this->cla_usu';";
			return parent::ejecutar();
		}

		public function cerrar()
		{
			session_start();
			session_destroy();
			
			header ("Location: ../../index.php");
			exit();
		}



	}//fin de la clase
 ?>