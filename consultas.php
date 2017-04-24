<?php
	require ("conexionMysql.php");

	class Consultas extends Conexion
	{

		public function Consultas(){
			parent::__construct();
		}
		#CLUES,NOMBRE,EGRESO,afeccion_principal

		public function get_0001()
		{
			$resultado= $this->conexion_db->query('select * from _0001');
			
			$datos= $resultado->fetch_all(MYSQLI_ASSOC);

			return $datos;
		}
		public function consulta($valor)
		{
			$resultado= $this->conexion_db->query($valor);
			
			$datos= $resultado->fetch_all(MYSQLI_ASSOC);

			return $datos;
		}

		public function lista_afeccion($valor)
		{
			$array = explode(",", $valor);
			$sql="SELECT * FROM principal._11111 where (afeccion_principal LIKE '%".$array[0]."%') and ((egreso between '".$array[1]."' and '".$array[2]."') and SEXO ='".$array[3]."') group by afeccion_principal order by conteo_afeccion_principal DESC";
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;

		}
		public function main($valor)
		{
			$resultado= $this->conexion_db->query('SELECT *FROM principal._0100');
			
			$datos= $resultado->fetch_all(MYSQLI_ASSOC);

			return $datos;
		}
		public function sinsexo($valor)
		{
			$array = explode(",", $valor);
			$sql="SELECT * FROM principal.tabla_busqueda where (afeccion_principal LIKE '%".$array[0]."%') and (egreso between '".$array[1]."' and '".$array[2]."') group by afeccion_principal order by conteo_NOMBRE_EGRESO_afeccion_principal_sexo DESC";
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;

		}
		public function ubicaciones($valor)
		{
			$array = explode(",", $valor);
			$sql= "SELECT * FROM principal.lugares";
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;
		}
		public function hospital($valor)
		{
			$array = explode(",", $valor);
			$sql= "SELECT affecion_principal, nombre, conteo_nombre_afeccion_principal FROM principal._0101 group by  affecion_principal limit 0,5";
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;
		}
		public function instituciones($valor)
		{
			$sql= "select * from principal.derechos";
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;
		}

		public function words_nube($valor)
		{
			$sql= "SELECT * FROM principal._0001 order by conteo_afeccion_principal desc limit 0,5";
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;
		}
		public function grafica($valor)
		{
			$sql= "SELECT * FROM principal._0001 order by conteo_afeccion_principal desc limit 0,5";
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;
		}
		public function mini_Btn($valor)
		{
			$sql=$valor;
			$resultado= $this->conexion_db->query($sql);
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			return $datos;
		}

	}
	/*$instancia = new Consultas();
	$r=$instancia -> lista_afeccion('GRI');
	print_r($r);
	echo json_encode($r);*/
?>