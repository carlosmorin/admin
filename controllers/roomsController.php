<?php
	namespace controllers;

	use models\rooms as rooms;

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
      $uploadDirectory = ROOT."views".DS."rooms".DS."images".DS;
      if(isset($_FILES['images'])){

          //almacenamos las propiedades de las imagenes
          $name_array     = $_FILES['images']['name'];
          $tmp_name_array = $_FILES['images']['tmp_name'];
          $type_array     = $_FILES['images']['type'];
          $size_array     = $_FILES['images']['size'];
          $error_array    = $_FILES['images']['error'];

          //recorremos el array de imagenes para subirlas al simultaneo
          for($i = 0; $i < count($tmp_name_array); $i++){
            $name_array[$i] = $this->random().".jpg";

              if(move_uploaded_file($tmp_name_array[$i], $uploadDirectory.$name_array[$i])){
                //Aqui debera de ir la funcion para insrtar en la base de datos
                $this->rooms->set('id_room', $_POST['id']);
                $this->rooms->set('src', $name_array[$i]);
                $this->rooms->add_images();
              }
              else
              {
                //si ocurre algún problema 
                echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
              }
          }
      }
    }
    function random(){

      $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwx yz234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmn opqrstuvwxyz234567890";
      $cad = "";
      for($i=0;$i<10;$i++) {
      $cad .= substr($str,rand(0,120),1);
      }
      return $cad;
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

    public function delete_image()
    {
      if (isset($_GET['id_image'])) {
        $this->rooms->set('id_image', $_GET['id_image']);
        $this->rooms->delete_image();
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

        public function get_images()
        {
          $data = $this->rooms->get_images();
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