<?php 
	class Utilidad 
	{
		private $nom_ser="localhost"; //nombre del servidor
		private $usu_ser="root"; //usuario del servidor
		private $cla_ser=""; //clave del servidor
		private $nom_bda="curso_poo"; //nombre de base de datos
		private $con_bda; //conexion bd
		public  $que_bda; // el query que quiero ejecutar en la bd
		public  $resultado; //variable que guarda el resultado del query
		public  $puntero;  // sirve para guardar el puntero a la primera fila luego de un  select, p/leer los datos q retorna el metodo fetch_assoc()
		public $tabla;//recibe el nombre de tabla para hacer count
		function __construct()
		{
			//$this->nom_ser="localhost"; 
			//$this->usu_ser="root"; 
			//$this->cla_ser=""; 
			//$this->nom_bda="curso_poo"; 
			$this->conectar();
		}


		public function conectar()
		{
			$this->con_bda = new mysqli($this->nom_ser,$this->usu_ser,$this->cla_ser,$this->nom_bda);
		}//fin funcion conectar

		public function ejecutar()
		{
			//echo "$this->que_bda";
			return $this->con_bda->query($this->que_bda);
		}//fin funcion ejecutar

		public function mensaje()
		{
			if ($this->resultado==true) 
			{
				echo "Registro procesado exitosamente";
			}else
			{
				
				echo "Error al procesar registro";
			}

		}//fin funcion mensaje

		//1er metodo para asignar_valor
		// public function asignar_valor($atributo,$valor)
		// {
		// 	$this->$atributo=$valor;
		// }

		//2a metodo de asignar_valor
		public function asignar_valor($vector)
		{
			foreach ($vector as $atributo => $valor) 
			{
				$this->$atributo=$valor;
			}
			
		}

		public function extraer_dato()
		{
			return $this->puntero->fetch_assoc();
		}

		public function contar_registros()
		{
			$this->que_bda="SELECT count(*) as total from $this->tabla;";
			return $this->ejecutar();
		}

		
	}
 ?>