<?php
	namespace controllers;

	use models\entertainment as entertainment;

	class entertainmentController {

		public $beds;

		public function __construct(){
			$this->entertainment = new entertainment();
		}
					
		public function index(){
			$data = $this->entertainment->list();
			return $data;
		}
				
		public function new(){
			return false;
		}

        public function create(){
          if($_POST){
            $this->entertainment->set('name', $_POST['name']);
            $this->entertainment->create();
          }
        }

		public function edit()
		{
			if ($_POST) {
				$this->entertainment->set('id', $_POST['id']);
				$this->entertainment->set('name', $_POST['name']);
				$this->entertainment->update();
			}else{
				$this->entertainment->set('id', $_GET['id']);
				$row = $this->entertainment->select();
				return $row;
			}

		}

		public function delete()
		{
			if (isset($_GET['id'])) {
				$this->entertainment->set('id', $_GET['id']);
				$this->entertainment->delete();
			}else{
				return false;
			}
		}
			
	}

	$entertainment = new entertainmentController();

?>	