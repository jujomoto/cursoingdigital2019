<?php 
	//campos de tabla permiso
	//cod_per,fky_opcion,fky_usuario
	

	require_once("utilidad.class.php");
	class Permiso extends Utilidad
	{
		public $cod_per;
		public $fky_opcion;
		public $fky_usuario;
		public $fila_ini;
		public $nro_fila;

		public function insertar()
		{
			$this->que_bda="INSERT into permiso(fky_opcion,fky_usuario) 
			values('$this->fky_opcion','$this->fky_usuario');";
			return $this->ejecutar();
		}//fin del mètodo agregar

		public function eliminar()
		{
			$this->que_bda="DELETE from permiso where
			fky_opcion=$this->fky_opcion and
			fky_usuario=$this->fky_usuario;";
			return $this->ejecutar();
		}

		public function listar()
		{
			$this->que_bda="SELECT * from permiso;";
			return $this->ejecutar();
		}//fin del mètodo listar

		

		public function filtrar()
		{

			$this->que_bda="SELECT * from permiso where
			fky_opcion=$this->fky_opcion and
			fky_usuario=$this->fky_usuario;";
			return $this->ejecutar();
		}//fin del mètodo filtrar

		public function construir_menu()
		{
			$this->que_bda="SELECT m.nom_mod,m.url_mod,o.nom_opc,o.url_opc 
			from permiso p,modulo m,opcion o where
			p.fky_usuario='$this->fky_usuario' and
			p.fky_opcion=o.cod_opc and 
			o.fky_modulo=m.cod_mod and
			m.est_mod='A' and o.est_opc='A' 
			order by m.nom_mod,o.nom_opc;";
			return $this->ejecutar();
		}

		public function filtrar_reporte()
		{
			$this->que_bda="SELECT m.nom_mod,m.url_mod,o.nom_opc,o.url_opc 
			from permiso p,modulo m,opcion o where
			p.fky_usuario='$this->fky_usuario' and
			p.fky_opcion=o.cod_opc and 
			o.fky_modulo=m.cod_mod and
			m.est_mod='A' and o.est_opc='A'
			order by m.nom_mod,o.nom_opc
			limit $this->fila_ini,$this->nro_fila;";
			return $this->ejecutar();
		}

	}//fin de la clase
 ?>