<?php 
  namespace models;
  
  class contact_message
  {
    public $id;
    public $name;
    public $mail;
    public $subject;
    public $body;
    public $created_at;
    public $data;
    public $con;
    
    public function __construct(){
      $this->con = new conexion();
    }

    public function set($atributo, $contenido){
      $this->$atributo = $contenido;
    }
    
    public function get($atributo){
      return $this->$atributo;
    }

    public function list()
    {
      $sql = "SELECT 
                t1.id,
                t1.name, 
                t2.name AS subject,
                t1.mail
              FROM contact_messages as t1
              JOIN subjects as t2 ON t1.subject = t2.id ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    } 
    
    public function select()
    {
      $sql = "SELECT 
                t1.id,
                t1.name, 
                t2.name AS subject,
                t1.mail,
                t1.created_at,
                t1.body
              FROM contact_messages as t1
              JOIN subjects as t2 ON t1.subject = t2.id WHERE t1.id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      $row = mysqli_fetch_assoc($data);
      return $row;
    }

    public function delete()
    {
      $sql = "DELETE FROM contact_messages WHERE id = '{$this->id}'";
      $this->con->simple_query($sql);
    }

  }


 ?>