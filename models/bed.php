<?php 
  namespace MODELS;
  
  class bed
  {
    public $id;
    public $name;
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
      $sql = "SELECT * FROM beds ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    } 
    
    public function select()
    {
      $sql = "SELECT * FROM beds WHERE id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      $row = mysqli_fetch_assoc($data);
      return $row;
    }

    public function create()
    {
      if ($_POST) {
        $sql = "INSERT INTO beds (name) VALUES ('{$this->name}')";
        $this->con->simple_query($sql);
        $status = "success";
        header("Location: ".URL."beds/?msg=".$msg."&status=".$status);
      }
    }

    public function update()
    {
  
      $sql = "UPDATE beds SET 
            name = '{$this->name}'
            WHERE id = {$this->id}";
      $this->con->simple_query($sql);
      header("Location: ".URL."beds/");
      
    }

    public function delete()
    {
      $sql = "DELETE FROM beds WHERE id = '{$this->id}'";
      $this->con->simple_query($sql);
    }

  }


 ?>