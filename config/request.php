<?php 
	namespace CONFIG;

	class request {
		private $controlador;
		private $metodo;
		private $argumento;

		public function __construct()
		{
			if (isset($_GET['url'])) {
				//error_log("elmo");
				$ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$ruta = explode("/", $ruta);
				$ruta = array_filter($ruta);

				if ($ruta[0] == "index.php") {
					$this->controlador = "login";
				}else{
					$this->controlador = strtolower(array_shift($ruta));
				}
			
				$this->metodo = strtolower(array_shift($ruta));

				if (!$this->metodo) {
					$this->metodo = "index";
				}
				$this->argumento = $ruta;
			
			}else{
				$this->controlador = "login";
				$this->metodo = "index";
			}
		}

		public function getControlador(){
			return $this->controlador;
		}

		public function getMetodo(){
			return $this->metodo;
		}

		public function getArgumento(){
			return $this->argumento;
		}
	}
?>