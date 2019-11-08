<?php
	namespace controllers;

	use models\space as space;

	class spacesController {

        public $space;
    
		public function __construct(){
			$this->space = new space();
		}
					
		public function index(){
			$data = $this->space->list();
			return $data;
		}

		public function new(){
			return false;
		}
    
        public function create(){
          if($_POST){
            $this->space->set('name', $_POST['name']);
            $this->space->create();
          }
        }

		public function edit()
		{
			if ($_POST) {
        
				$this->space->set('id', $_POST['id']);
				$this->space->set('name', $_POST['name']);
				$this->space->update();
			}else{
				$this->space->set('id', $_GET['id']);
				$row = $this->space->select();
				return $row;
			}

		}

		public function delete()
		{
			if (isset($_GET['id'])) {
				$this->space->set('id', $_GET['id']);
				$this->space->delete();
			}else{
				return false;
			}
		}
    
	}

	$spaces = new spacesController();

?>	