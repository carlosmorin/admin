<?php
  namespace controllers;

  use models\users as users;

  class profileController {

    public $users;
    public $encrypt;
    public $cadena;

    public function __construct(){
      $this->users = new users();
    }
          
    public function index(){
      $this->users->set('mail', $_GET['mail']);
      $data = $this->users->select_mail();
      return $data;
    }
      
  }

  $profile = new profileController();

?>  