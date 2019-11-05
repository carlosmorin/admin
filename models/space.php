<?php 
  namespace MODELS;
  
  class space
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
      $sql = "SELECT * FROM spaces ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    } 
    
    public function select()
    {
      $sql = "SELECT * FROM spaces WHERE id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      $row = mysqli_fetch_assoc($data);
      return $row;
    }

    public function create()
    {
      if ($_POST) {
        $sql = "INSERT INTO spaces (name) VALUES ('{$this->name}')";
        $this->con->simple_query($sql);
        $status = "success";
        header("Location: ".URL."spaces/?msg=".$msg."&status=".$status);
      }else{
        header("Location: ".URL."users/add/?msg=".$msg);
      }
    }

    public function update()
    {
  
      $sql = "UPDATE spaces SET 
            name = '{$this->name}'
            WHERE id = {$this->id}";
      $this->con->simple_query($sql);
      header("Location: ".URL."spaces/");
      
    }

    public function delete()
    {
      $sql = "DELETE FROM spaces WHERE id = '{$this->id}'";
      $this->con->simple_query($sql);
    }

  }


 ?>