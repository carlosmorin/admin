<?php
	namespace CONTROLLERS;

	use MODELS\login as login;
	
	class loginController{

		private $login;
		
		public function __construct(){
			$this->login = new login();
		}
		public function logout(){
			session_destroy();
			header("Location:".URL."login/");
		}
		
		public function index()
		{
			
		}

		public function verify(){
			
			if (!$_POST) {
				header("Location: ".URL."login/?error=Las credenciales no coinciden con nuestros registros");				
			}else{

				$this->login->set("mail", trim($_POST['mail']));
				$this->login->set("password", trim($_POST['password']));
				$this->login->validate();
			}
			
		}

	}
	
	$login = new loginController();
	
 ?>	