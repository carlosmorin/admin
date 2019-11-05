<?php 
  namespace MODELS;
  
  class rooms 
  {
    public $id;
    public $name;
    public $m2;
    public $capacity;
    public $price;
    public $price_hollidays;
    public $id_room; 
    public $id_bed;
    public $id_entertainment;
    public $quantity;
    public $id_space;


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
      $sql = "SELECT * FROM rooms ORDER BY m2";
      $data = $this->con->return_query($sql);
      return $data;
    } 

    public function create()
    {
      if ($_POST) {
        $sql = "INSERT INTO rooms (name, description, m2, capacity, price, price_hollidays, created_at, updated_at) VALUES (
          '{$this->name}',
          '',
          '{$this->m2}',
          '{$this->capacity}',
          '{$this->price}',
          '{$this->price_hollidays}',
          NOW(),
          NOW()
        )";
        $this->con->simple_query($sql);
        $status = "success";
        $msg = "Habitacion creado con exito";
        header("Location: ".URL."rooms/?msg=".$msg."&status=".$status);
      }else{
        $msg = "Ya existe un registro con este correo";
        header("Location: ".URL."users/add/?msg=".$msg);
      }
    }

    public function select()
    {
      $sql = "SELECT * FROM rooms WHERE id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      $row = mysqli_fetch_assoc($data);
      return $row;
    }

    public function update()
    {
      $sql = "UPDATE rooms  SET 
            name = '{$this->name}',
            description = '',
            m2 = '{$this->m2}',
            capacity = '{$this->capacity}',
            price = '{$this->price}',
            price_hollidays = '{$this->price_hollidays}'
            WHERE id = {$this->id}";
      $this->con->simple_query($sql);
      header("Location: ".URL."rooms/");
      
    }



    public function delete()
    {
      $sql = "DELETE FROM rooms WHERE id = '{$this->id}'";
      $this->con->simple_query($sql);
    }

    public function delete_rooms(){
      $sql = "DELETE FROM rooms_beds WHERE id_room = {$this->id}";
      $this->con->simple_query($sql);
    }

    public function delete_extras(){
      $sql = "DELETE FROM rooms_extras WHERE id_room = {$this->id}";
      $this->con->simple_query($sql);
    }

    public function delete_entertainment(){
      $sql = "DELETE FROM rooms_entertainment WHERE id_room = {$this->id}";
      $this->con->simple_query($sql);
    }

    public function delete_spaces(){
      $sql = "DELETE FROM rooms_spaces WHERE id_room = {$this->id}";
      $this->con->simple_query($sql);
    }

    public function add_rooms(){
      $sql = "INSERT INTO rooms_beds(id_room, id_bed, quantity) VALUES ({$this->id_room}, {$this->id_bed}, {$this->quantity})";
      $this->con->simple_query($sql);
    }

    public function add_extra(){
      $sql = "INSERT INTO rooms_extras ( id_room, id_extra, quantity ) VALUES({$this->id_room}, {$this->id_extra} , 0)";
      $this->con->simple_query($sql);
    }

    public function add_entertainment(){
      $sql = "INSERT INTO rooms_entertainment ( id_room, id_entertainment ) VALUES({$this->id_room}, {$this->id_entertainment} )";
      $this->con->simple_query($sql);
    }

    public function add_space(){
      $sql = "INSERT INTO rooms_spaces ( id_room, id_space, quantity ) VALUES({$this->id_room}, {$this->id_space}, 0 )";
      $this->con->simple_query($sql);
    }
    //JOINS

    public function get_beds()
    {
      $sql = "SELECT 
                t1.id as id_room,
                t2.id_bed as id_bed,
                t2.quantity as quantity,
                t3.name
              FROM rooms as t1
              JOIN rooms_beds as t2 ON t1.id = t2.id_room
              JOIN beds as t3 on t2.id_bed = t3.id
              WHERE t1.id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      return $data;
    }

    public function get_entertainment()
    {
      $sql = "SELECT 
                t1.id as id_room,
                t3.id as id_entertainment,
                t3.name
              FROM rooms as t1
              JOIN rooms_entertainment as t2 ON t1.id = t2.id_room
              JOIN entertainment as t3 on t2.id_entertainment = t3.id
              WHERE t1.id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      return $data;
    }

    public function get_room_spaces()
    {
      $sql = "SELECT 
                t1.id as id_room,
                t2.quantity as quantity,
                t2.id_space as id_space,
                t3.name
              FROM rooms as t1
              JOIN rooms_spaces as t2 ON t1.id = t2.id_room
              JOIN extras as t3 on t2.id_space = t3.id
              WHERE t1.id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      return $data;
    }

    public function get_room_extras()
    {
      $sql = "SELECT 
                t1.id as id_room,
                t3.name,
                t3.id as id_extra
              FROM rooms as t1
              JOIN rooms_extras as t2 ON t1.id = t2.id_room
              JOIN extras as t3 on t2.id_extra = t3.id
              WHERE t1.id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      return $data;
    }
    
    //Catalogos
    public function beds()
    {
      $sql = "SELECT * FROM beds ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    }

    public function entertainment()
    {
      $sql = "SELECT * FROM entertainment ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    } 

    public function get_spaces()
    {
      $sql = "SELECT * FROM spaces ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    } 

    public function get_extras(){
      $sql = "SELECT * FROM extras ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    } 

  }
  
 ?>