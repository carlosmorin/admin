<?php
	namespace CONTROLLERS;

	use MODELS\bed as bed;

	class bedsController {

		public $beds;

		public function __construct(){
			$this->bed = new bed();
		}
					
		public function index(){
			$data = $this->bed->list();
			return $data;
		}
				
		public function new(){
			return false;
		}

    public function create(){
      if($_POST){
        $this->bed->set('name', $_POST['name']);
        $this->bed->create();
      }
    }

		public function edit()
		{
			if ($_POST) {
				$this->bed->set('id', $_POST['id']);
				$this->bed->set('name', $_POST['name']);
				$this->bed->update();
			}else{
				$this->bed->set('id', $_GET['id']);
				$row = $this->bed->select();
				return $row;
			}

		}

		public function delete()
		{
			if (isset($_GET['id'])) {
				$this->bed->set('id', $_GET['id']);
				$this->bed->delete();
			}else{
				return false;
			}
		}
			
	}

	$beds = new bedsController();

?>	