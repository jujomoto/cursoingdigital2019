<?php 
	require_once("utilidad.class.php");
	//campos de tabla opcion
	//cod_opc,nom_opc,des_opc,url_opc,fky_modulo,est_opc
	/*
	cod_opc	int	not null	primary key	auto_increment 	->cod opcion
	nom_opc	varchar(50)	not null						->nombre opcion
	des_opc	varchar(100)	not null					->descripcion opcion
	url_opc	varchar(100)	not null		unique 		->url opcion
	fky_modulo	int	not null							->fky modulo
	est_opc	char	not null							->estatus opcion
	*/

	class Opcion extends Utilidad
	{
		public $cod_opc;
		public $nom_opc;
		public $des_opc;
		public $url_opc;
		public $fky_modulo;
		public $est_opc;
		public $fila_ini;
		public $nro_fila;
		
		public function insertar()
		{
			$this->que_bda="insert into opcion(
					nom_opc,
					des_opc,
					url_opc,
					fky_modulo,
					est_opc) values(
					'$this->nom_opc',
					'$this->des_opc',
					'$this->url_opc',
					'$this->fky_modulo',
					'$this->est_opc');";

			return $this->ejecutar();
		}//fin del mètodo agregar

		public function modificar()
		{
			$this->que_bda="UPDATE opcion set
			nom_opc='$this->nom_opc',
			des_opc='$this->des_opc',
			url_opc='$this->url_opc',
			fky_modulo='$this->fky_modulo',
			est_opc='$this->est_opc'
			where cod_opc='$this->cod_opc';";
			return $this->ejecutar();
		}//fin del mètodo modificar

		public function listar()
		{
			$this->que_bda="SELECT * from opcion where est_opc='$this->est_opc'
			order by fky_modulo asc, nom_opc asc;";
			return $this->ejecutar();
		}//fin del mètodo listar

		public function eliminar()
		{
			$this->que_bda="DELETE from opcion where cod_opc='$this->cod_opc';";
			return $this->ejecutar();
		}//fin del mètodo eliminar

		public function filtrar()
		{
			$filtro1=($this->cod_opc!="")?" and cod_opc='$this->cod_opc'":"";
			$filtro2=($this->nom_opc!="")?" and nom_opc like '%$this->nom_opc%'":"";
			$filtro3=($this->des_opc!="")?" and des_opc like '%$this->des_opc%'":"";
			$filtro4=($this->url_opc!="")?" and url_opc like '%$this->url_opc%'":"";
			$filtro5=($this->est_opc!="")?" and est_opc='$this->est_opc'":"";
			$filtro6=($this->fky_modulo!="")?" and fky_modulo='$this->fky_modulo'":"";

			$this->que_bda="SELECT * from opcion where 1=1 
			$filtro1
			$filtro2
			$filtro3
			$filtro4
			$filtro5
			$filtro6;";
			return $this->ejecutar();
		}//fin del mètodo filtrar

		public function filtrar_paginado()
		{
			$this->que_bda="SELECT * from opcion
			where est_opc='$this->est_opc'
			order by fky_modulo asc,nom_opc asc
			limit $this->fila_ini,$this->nro_fila;";
			return $this->ejecutar();
		}


	}//fin de la clase
 ?>