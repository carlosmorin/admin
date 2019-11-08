<?php  

	namespace models;

	class conexion

	{
		///PRODUCCION
		/*private $datos = array(
			'host' => 'localhost',
			'user' => 'user78',
			'pass' => 'User78admin',
			'db' => 'hotelapp'
		);*/
		private $datos = array(
			'host' => 'localhost',
			'user' => 'root',
			'pass' => '',
			'db' => 'hotelapp'
		);

		private $con;

		public function __construct(){

			$this->con = new \mysqli(
				$this->datos['host'],
				$this->datos['user'],
				$this->datos['pass'],
				$this->datos['db']
			);

		}

		public function simple_query($sql){
			$this->con->query($sql);
		}

		public function return_query($sql){
			
			$datos = $this->con->query($sql);
			return $datos;

		}

	}

	

 ?>