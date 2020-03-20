<?php 
	require "database.php";
	class Conexion{
		private $con;
		private $server = "35.239.178.56";
		private $username = "gelagos_ultra";
		private $password = "d43m0nt00l5";
		private $database = "gelagos_ge_legos";
		public function __construct()
		{
			$this->con = mysqli_connect($this->server, $this->username, $this->password, $this->database) or die('Error al conectar con el servidor.');
		}
		public function ConsultarDatos($query) {
			return mysqli_query($this->con, $query) or die($this->con->error);
		}
		public function EjecutarConsulta($query)
		{
			$consult = mysqli_query($this->con, $query) or die($this->con->error);
			if ($consult) {
				$data = mysqli_fetch_array($consult);
				$this->LiberarMemoria($consult);
				return $data;
			}
			else
			{
				return false;
			}
		}
		//LIBERA LOS RESULTADOS ANTERIORES DEL BUFFER DE MYSQL PARA REALIZAR OTRA CONSULTA
		public function LiberarMemoria($consulta) 
		{
			mysqli_free_result($consulta);
			while(mysqli_more_results($this->con) && mysqli_next_result($this->con)) {
			    $dummyResult = mysqli_use_result($this->con);
			    if($dummyResult instanceof mysqli_result) {
			        mysqli_free_result($this->con);
			    }
			}
		}
	}
 ?>