<?php
	require ("conexionMysql.php");

	class Consultas extends Conexion
	{

		public function Consultas(){
			parent::__construct();
		}
		
		public function consulta($valor)
		{
			$resultado= $this->conexion_db->query($valor);
			
			$datos= $resultado->fetch_all(MYSQLI_ASSOC);

			return $datos;
		}

	}
?>
