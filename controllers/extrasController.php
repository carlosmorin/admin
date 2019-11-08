<?php
	namespace controllers;

	use models\extra as extra;

	class extrasController {

    public $extra;

		public function __construct(){
			$this->extra = new extra();
		}
					
		public function index(){
			$data = $this->extra->list();
			return $data;
		}

		public function new(){
			return false;
		}

        public function create(){
          if($_POST){
            $this->extra->set('name', $_POST['name']);
            $this->extra->create();
          }
        }

		public function edit()
		{
			if ($_POST) {
        
				$this->extra->set('id', $_POST['id']);
				$this->extra->set('name', $_POST['name']);
				$this->extra->update();
			}else{
				$this->extra->set('id', $_GET['id']);
				$row = $this->extra->select();
				return $row;
			}

		}

		public function getById()
		{
			$this->users->set('id', $_GET['id']);
			$row = $this->users->select();
			return $row;
		}

		public function delete()
		{
			if (isset($_GET['id'])) {
				$this->extra->set('id', $_GET['id']);
				$this->extra->delete();
			}else{
				return false;
			}
		}
			
	}

	$extras = new extrasController();

?>	