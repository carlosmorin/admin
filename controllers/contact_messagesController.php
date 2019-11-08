<?php
	namespace controllers;

	use models\contact_message as contact_message;

	class contact_messagesController {

    public $contact_message;

		public function __construct(){
			$this->contact_message = new contact_message();
		}
					
		public function index(){
			$data = $this->contact_message->list();
			return $data;
		}

		public function new(){
			return false;
		}

    public function create(){
      if($_POST){
        $this->contact_message->set('name', $_POST['name']);
        $this->contact_message->create();
      }
    }

		public function edit()
		{
			if ($_POST) {
				$this->contact_message->set('id', $_POST['id']);
				$this->contact_message->set('name', $_POST['name']);
				$this->contact_message->update();
			}else{
				$this->contact_message->set('id', $_GET['id']);
				$row = $this->contact_message->select();
				return $row;
			}

		}

		public function show()
		{
			$this->contact_message->set('id', $_GET['id']);
			$row = $this->contact_message->select();
			return $row;
		}

		public function delete()
		{
			if (isset($_GET['id'])) {
				$this->contact_message->set('id', $_GET['id']);
				$this->contact_message->delete();
			}else{
				return false;
			}
		}
			
	}

	$contact_messages = new contact_messagesController();

?>	