<?php 
	class Conexion{
		private $con;
		public function __construct($server, $username, $password, $database)
		{
			$this->con = mysqli_connect($server, $username, $password, $database) or die('Error al conectar con SQL Server.');
		}
		public function ConsultarDatos($query) {
			return mysqli_query($this->con, $query) or die($this->con->error);
		}
		public function EjecutarConsulta($query)
		{
			$consult = mysqli_query($this->con, $query) or die($this->con->error);
			if ($consult) {
				$data = mysqli_fetch_array($consult);
				
				//LIBERA LOS RESULTADOS ANTERIORES DEL BUFFER DE MYSQL PARA REALIZAR OTRA CONSULTA
				mysqli_free_result($consult);
				while(mysqli_more_results($this->con) && mysqli_next_result($this->con)) {
				    $dummyResult = mysqli_use_result($this->con);
				    if($dummyResult instanceof mysqli_result) {
				        mysqli_free_result($this->con);
				    }
				}
				return $data;
			}
			else
			{
				return false;
			}
		}
		public function Commit()
		{
			$query = "CALL p_COMMIT();";
	    	return mysqli_query($this->con, $query) or die($this->con->error);
		}
		public function Rollback()
		{
			$query = "CALL p_ROLLBACK();";
	    	return mysqli_query($this->con, $query);
		}
	}
 ?>