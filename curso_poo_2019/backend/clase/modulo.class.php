<?php 
	//campos de tabla modulo
	//cod_mod,nom_mod,des_mod,url_mod,fky_modulo,est_mod
	/*
	cod_mod	int	not null	primary key				->cod modulo
	nom_mod	varchar(50)	not null					->nombre modulo
	des_mod	varchar(100)							->descripcion modulo
	url_mod	varchar(100)	not null		unique 	->url modulo
	fky_modulo	int	not null						->fky modulo
	est_mod	char	not null						->estatus modulo
	*/
	require_once("utilidad.class.php");
	class Modulo extends Utilidad
	{
		public $cod_mod;	
		public $nom_mod;	
		public $des_mod;	
		public $url_mod;	
		public $fky_modulo;	
		public $est_mod;
			
		public function insertar()
		{
			$this->que_bda="insert into modulo(
			nom_mod,
			des_mod,
			url_mod,
			est_mod,
			fky_modulo
			) values(
			'$this->nom_mod',
			'$this->des_mod',
			'$this->url_mod',
			'$this->est_mod',
			'$this->fky_modulo'
			);";
			return $this->ejecutar();
		}//fin del mètodo agregar

		public function modificar()
		{
			$this->que_bda="UPDATE modulo set 
				nom_mod='$this->nom_mod',	
				des_mod='$this->des_mod',	
				url_mod='$this->url_mod',	
				fky_modulo='$this->fky_modulo',	
				est_mod='$this->est_mod' 
				where (cod_mod='$this->cod_mod');";
			return $this->ejecutar();
		}//fin del mètodo modificar

		public function listar()
		{
			$this->que_bda="SELECT * from modulo where est_mod='$this->est_mod';";
			return $this->ejecutar();
		}//fin del mètodo listar

		public function eliminar()
		{
			$this->que_bda="DELETE from modulo where cod_mod='$this->cod_mod'";
			return $this->ejecutar();
		}//fin del mètodo eliminar

		public function filtrar()
		{
			$filtro1=($this->cod_mod!="")?" and cod_mod='$this->cod_mod'":"";
			$filtro2=($this->nom_mod!="")?" and nom_mod like '%$this->nom_mod%'":"";
			$filtro3=($this->des_mod!="")?" and des_mod like '%$this->des_mod%'":"";
			$filtro4=($this->url_mod!="")?" and url_mod like '%$this->url_mod%'":"";
			$filtro5=($this->est_mod!="")?" and est_mod='$this->est_mod'":"";

			$this->que_bda="SELECT * from modulo where 1=1
			$filtro1
			$filtro2
			$filtro3
			$filtro4
			$filtro5;";
			return $this->ejecutar();
		}//fin del mètodo filtrar


	}//fin de la clase
 ?>