<?php 
  namespace models;
  
  class event
  {
    public $id;
    public $title;
    public $short_description;
    public $date;
    public $body;
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
     
      $sql = "SELECT * FROM events ORDER BY date";
      $data = $this->con->return_query($sql);
      return $data;
    } 
    
    public function select()
    {
      $sql = "SELECT * FROM events WHERE id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      $row = mysqli_fetch_assoc($data);
      return $row;
    }

    public function create()
    {
      if ($_POST) {
        $sql = "INSERT INTO events (
                                  title,
                                  short_description, 
                                  date,
                                  body) 
                                  VALUES
                                  ( '{$this->title}',
                                    '{$this->short_description}',
                                    '{$this->date}',
                                    '{$this->body}')";
        $this->con->simple_query($sql);
        $status = "success";
        header("Location: ".URL."events/?msg=".$msg."&status=".$status);
      }else{
        header("Location: ".URL."users/add/?msg=".$msg);
      }
    }

    public function update()
    {
      $sql = "UPDATE events SET 
            title = '{$this->title}',
            short_description = '{$this->short_description}',
            date = '{$this->date}',
            body = '{$this->body}'
            WHERE id = {$this->id}";
      $this->con->simple_query($sql);
      header("Location: ".URL."events/");
      
    }

    public function delete()
    {
      $sql = "DELETE FROM events WHERE id = '{$this->id}'";
      $this->con->simple_query($sql);
    }

  }


 ?>