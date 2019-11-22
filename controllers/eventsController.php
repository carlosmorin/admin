<?php
	namespace controllers;

	use models\event as event;

	class eventsController {

		public function __construct(){
			$this->event = new event();
		}

		public function index(){
			$data = $this->event->list();
			return $data;
		}
				
		public function new(){
			return false;
		}
    
    public function show(){
      if($_GET['id']){
        $this->event->set('id', $_GET['id']);
        $row = $this->event->select();
        return $row;
      }
    }

    public function create(){
      if($_POST){
        $this->event->set('title', $_POST['title']);
        $this->event->set('short_description', $_POST['short_description']);
        $this->event->set('date', $_POST['date']);
        $this->event->set('body', $_POST['body']);
        $this->event->create();
      }
    }

		public function edit()
		{
			if ($_POST) {
        $this->event->set('id', $_POST['id']);
        $this->event->set('title', $_POST['title']);
        $this->event->set('short_description', $_POST['short_description']);
        $this->event->set('date', $_POST['date']);
        $this->event->set('body', $_POST['body']);
				$this->event->update();
			}else{
				$this->event->set('id', $_GET['id']);
				$row = $this->event->select();
				return $row;
			}
      
		}

    private function update_events(){
      $this->events->delete_events();
      $i = 0;
      while ($i <= count($_POST['events'])) {
        $this->events->set('id_event', $_POST['id']);
        $this->events->set('id_bed', $_POST['events']['id'][$i]);
        $this->events->set('quantity', $_POST['events']['quantity'][$i]);
        $this->events->add_events();
        $i++;
      }
    }

    private function update_extras(){
      $this->events->delete_extras();
      $i = 0;
      while ($i <= count($_POST['extras']['id']) - 1) {
        $this->events->set('id_event', $_POST['id']);
        $this->events->set('id_extra', $_POST['extras']['id'][$i]);
        $this->events->add_extra();
        $i++;
      }
    }

    private function update_entertainment(){
      $this->events->delete_entertainment();
      $i = 0;
      while ($i <= count($_POST['entertainments']['id']) - 1) {
        $this->events->set('id_event', $_POST['id']);
        $this->events->set('id_entertainment', $_POST['entertainments']['id'][$i]);
        $this->events->add_entertainment();
        $i++;
      }
    }

    private function update_spaces(){
      $this->events->delete_spaces();
      $i = 0;
      while ($i <= count($_POST['spaces']['id']) - 1) {
        $this->events->set('id_event', $_POST['id']);
        $this->events->set('id_space', $_POST['spaces']['id'][$i]);
        $this->events->add_space();
        $i++;
      }
    }

    private function update_images(){
      $uploadDirectory = ROOT."views".DS."events".DS."images".DS;
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
                $this->events->set('id_event', $_POST['id']);
                $this->events->set('src', $name_array[$i]);
                $this->events->add_images();
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
			$this->events->set('id', $_GET['id']);
			$row = $this->events->select();
			return $row;
		}

		public function delete()
		{
			if (isset($_GET['id'])) {
				$this->event->set('id', $_GET['id']);
				$this->event->delete();
			}else{
				return false;
			}
		}

    public function delete_image()
    {
      if (isset($_GET['id_image'])) {
        $this->events->set('id_image', $_GET['id_image']);
        $this->events->delete_image();
      }else{
        return false;
      }
    }
        //JOINS
        public function get_beds()
        {
          $data = $this->events->get_beds();
          return $data;
        }
    
        public function get_spaces()
        {
          $data = $this->events->get_spaces();
          return $data;
        }
    
        public function get_entertainment()
        {
          $data = $this->events->get_entertainment();
          return $data;
        }
    
        public function get_event_spaces()
        {
          $data = $this->events->get_event_spaces();
          return $data;
        }
    
        public function get_event_extras(){
          $data = $this->events->get_event_extras();
          return $data;
        }
    
        public function get_extras()
        {
          $data = $this->events->get_extras();
          return $data;
        }

        public function get_images()
        {
          $data = $this->events->get_images();
          return $data;
        }
    
        
        //Catalogo
        public function beds(){
          $data = $this->events->beds();
          return $data;
        }
    
        public function entertainment(){
          $data = $this->events->entertainment();
          return $data;
        }
    
         public function spaces(){
          $data = $this->events->entertainment();
          return $data;
        }
			
	}

	$events = new eventsController();

?>	