<?php 
	namespace MODELS;

	use CONTROLLERS\encrypt as encrypt;

	class login 
	{
		public $encrypt; 
		public $email; 
		public $pass; 
		public $array = array(); 
		public $con; 

		public function __construct(){
			$this->con = new conexion();
			$this->encrypt = new encrypt();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		
		public function get($atributo){
			return $this->$atributo;
		}

		public function validate(){
					
			$sql = "SELECT * FROM users WHERE mail = '{$this->mail}'";

			$datos = $this->con->return_query($sql);
			$row = mysqli_fetch_array($datos);
			$n_rows = mysqli_num_rows($datos);
			$pass_decrypted = $this->encrypt->openCypher('decrypt', $row['pass'] );

			if ($n_rows == 1) {
				if ($pass_decrypted == $this->pass) {
	  				$array = array('id' => $row['id'],
									'name' => $row['name'],
									'mail' => $row['mail']
								);
	  				$_SESSION['user'][] = $array;
	  				header("Location: ".URL."dashboard/");
				}else{
					header("Location: ".URL."/login/?error=Las credenciales no coinciden con nuestros registros");
				}
			}else{
				header("Location: ".URL."/login/?error=Las credenciales no coinciden con nuestros registros");
			}
		}
	}

	$login = new login();
 ?>