<?php 
	class ConexionFTP {
		private $ftp_server = '35.232.160.123';
		private $ftp_username = 'alan_legos';
		private $ftp_userpass = 'aggropla';
		private $ftp_conn;
		public function __construct() {
			$this->ftp_conn = ftp_connect($this->ftp_server) or die("No se ha podido conectar a $ftp_server");
			ftp_login($this->ftp_conn, $this->ftp_username, $this->ftp_userpass) or die ("Error en autenticacion FTP");
		}

		public function SetImage($nombre, $file) {
			if (ftp_put($this->ftp_conn, $nombre, $file, FTP_BINARY)) {
				ftp_close($this->ftp_conn);
				return true;
			}
			else {
				ftp_close($this->ftp_conn);
				return false;
			}
		}

		public function GetImage($local_file, $server_file) {
			if (file_exists($local_file)) {
				unlink($local_file);
			}
			if (ftp_get($this->ftp_conn, $local_file, $server_file, FTP_BINARY)) {
				ftp_close($this->ftp_conn);
				echo "<img src='temp/vehiculo.jpg?".rand(1, 1000)."' id='imagen'>";
			}
			else {
				ftp_close($this->ftp_conn);
				echo false;
			}
		}
	}
 ?>