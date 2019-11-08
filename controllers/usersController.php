<?php
  namespace controllers;

  use models\users as users;
  use controllers\encrypt as encrypt;

  class usersController {

    public $users;
    public $encrypt;
    public $cadena;

    public function __construct(){
      $this->users = new users();
      $this->encrypt = new encrypt();
      
    }
          
    public function index(){
      $data = $this->users->list();
      return $data;
    }
        
    public function new(){
      if ($_POST) {
        
        $pass_encryp = $this->encrypt->openCypher('encrypt',$_POST['password']);
        $this->users->set('name', $_POST['name']);
        $this->users->set('last_name', $_POST['last_name']);
        $this->users->set('mail', $_POST['mail']);
        $this->users->set('password', $pass_encryp);
        $this->users->create();

      }else{
        return false;
      }
      
    }

    public function edit()
    {
      if ($_POST) {
        $this->users->set('id', $_POST['id']);
        $this->users->set('name', $_POST['name']);
        $this->users->set('last_name', $_POST['last_name']);
        $this->users->set('mail', $_POST['mail']);
        $this->users->update();
      }else{
        $this->users->set('id', $_GET['id']);
        $row = $this->users->select();
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
        $this->users->set('id', $_GET['id']);
        $this->users->delete();
      }else{
        return false;
      }
    }
      
  }

  $users = new usersController();

?>  