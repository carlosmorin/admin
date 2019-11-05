<?php
	namespace CONTROLLERS;

	use MODELS\rooms as rooms;

	class roomsController {

		public function __construct(){
			$this->rooms = new rooms();
		}

		public function index(){
			$data = $this->rooms->list();
			return $data;
		}
				
		public function new(){
			return false;
		}

    public function show(){
      if($_GET['id']){
        $this->rooms->set('id', $_GET['id']);
        $row = $this->rooms->select();
        return $row;
      }
    }

    public function create(){
      if($_POST){
        $this->rooms->set('name', $_POST['name']);
        $this->rooms->set('m2', $_POST['m2']);
        $this->rooms->set('capacity', $_POST['capacity']);
        $this->rooms->set('price', $_POST['price']);
        $this->rooms->set('price_hollidays', $_POST['price_hollidays']);
        $this->rooms->create();
      }
    }

		public function edit()
		{
			if ($_POST) {
				$this->rooms->set('id', $_POST['id']);
        $this->rooms->set('name', $_POST['name']);
        $this->rooms->set('m2', $_POST['m2']);
        $this->rooms->set('capacity', $_POST['capacity']);
        $this->rooms->set('price', $_POST['price']);
        $this->rooms->set('price_hollidays', $_POST['price_hollidays']);
				$this->rooms->update();
        $this->update_rooms();
        $this->update_extras();
        $this->update_entertainment();
        $this->update_spaces();
        $this->update_images();

			}else{
				$this->rooms->set('id', $_GET['id']);
				$row = $this->rooms->select();
        $beds = $this->rooms->beds();
        error_log(print_r($beds, true));
				return $row;
			}

		}

    private function update_rooms(){
      $this->rooms->delete_rooms();
      $i = 0;
      while ($i <= count($_POST['rooms'])) {
        $this->rooms->set('id_room', $_POST['id']);
        $this->rooms->set('id_bed', $_POST['rooms']['id'][$i]);
        $this->rooms->set('quantity', $_POST['rooms']['quantity'][$i]);
        $this->rooms->add_rooms();
        $i++;
      }
    }

    private function update_extras(){
      $this->rooms->delete_extras();
      $i = 0;
      while ($i <= count($_POST['extras']['id']) - 1) {
        $this->rooms->set('id_room', $_POST['id']);
        $this->rooms->set('id_extra', $_POST['extras']['id'][$i]);
        $this->rooms->add_extra();
        $i++;
      }
    }

    private function update_entertainment(){
      $this->rooms->delete_entertainment();
      $i = 0;
      while ($i <= count($_POST['entertainments']['id']) - 1) {
        $this->rooms->set('id_room', $_POST['id']);
        $this->rooms->set('id_entertainment', $_POST['entertainments']['id'][$i]);
        $this->rooms->add_entertainment();
        $i++;
      }
    }

    private function update_spaces(){
      $this->rooms->delete_spaces();
      $i = 0;
      while ($i <= count($_POST['spaces']['id']) - 1) {
        $this->rooms->set('id_room', $_POST['id']);
        $this->rooms->set('id_space', $_POST['spaces']['id'][$i]);
        $this->rooms->add_space();
        $i++;
      }
    }

    private function update_images(){
      //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
      foreach($_FILES["images"]['tmp_name'] as $key => $tmp_name)
      {
        //Validamos que el archivo exista
        if($_FILES["images"]["name"][$key]) {
          $filename = $_FILES["images"]["name"][$key]; //Obtenemos el nombre original del archivo
          $source = $_FILES["images"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
          
          $directorio = '../views/assets/img/rooms/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
          
          //Validamos si la ruta de destino existe, en caso de no existir la creamos
          if(!file_exists($directorio)){
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");  
          }
          
          $dir=opendir($directorio); //Abrimos el directorio de destino
          $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
          
          //Movemos y validamos que el archivo se haya cargado correctamente
          //El primer campo es el origen y el segundo el destino
          if(move_uploaded_file($source, $target_path)) { 
            echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
            } else {  
            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
          }
          closedir($dir); //Cerramos el directorio de destino
        }
      }
    }


  	public function select()
		{
			$this->rooms->set('id', $_GET['id']);
			$row = $this->rooms->select();
			return $row;
		}

		public function delete()
		{
			if (isset($_GET['id'])) {
				$this->rooms->set('id', $_GET['id']);
				$this->rooms->delete();
			}else{
				return false;
			}
		}
    //JOINS
    public function get_beds()
    {
      $data = $this->rooms->get_beds();
      return $data;
    }

    public function get_spaces()
    {
      $data = $this->rooms->get_spaces();
      return $data;
    }

    public function get_entertainment()
    {
      $data = $this->rooms->get_entertainment();
      return $data;
    }

    public function get_room_spaces()
    {
      $data = $this->rooms->get_room_spaces();
      return $data;
    }

    public function get_room_extras(){
      $data = $this->rooms->get_room_extras();
      return $data;
    }

    public function get_extras()
    {
      $data = $this->rooms->get_extras();
      return $data;
    }


    
    //Catalogo
    public function beds(){
      $data = $this->rooms->beds();
      return $data;
    }

    public function entertainment(){
      $data = $this->rooms->entertainment();
      return $data;
    }

     public function spaces(){
      $data = $this->rooms->entertainment();
      return $data;
    }
			
	}

	$rooms = new roomsController();

?>	