<?php 
  namespace MODELS;
  
  class users 
  {
    public $id;
    public $data;
    public $name;
    public $last_name;
    public $email;
    private $password;
    public $phone;
    public $ranch;
    public $department;
    public $template;
    public $id_user;
    public $status;

    
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
      $sql = "SELECT * FROM users ORDER BY name";
      $data = $this->con->return_query($sql);
      return $data;
    } 
    public function validate_email($email)
    {
      $sql_validate = "SELECT * FROM users WHERE email = '$email'";
      $data = $this->con->return_query($sql_validate);
      $n_mail = mysqli_num_rows($data);
      return $n_mail;
    }
    public function create()
    {
      $n_mail = $this->validate_email($this->email);
      if ($n_mail == null) {
        $sql = "INSERT INTO users (name, last_name, mail, password, created_at, updated_at, deleted_at) VALUES (
          '{$this->name}',
          '{$this->last_name}',
          '{$this->mail}',
          '{$this->password}',
          NOW(),
          NOW(),
          null
        )";
        $this->con->simple_query($sql);
        $status = "success";
        $msg = "Usuario creado con exito";
        header("Location: ".URL."users/?msg=".$msg."&status=".$status);
      }else{
        $msg = "Ya existe un registro con este correo";
        header("Location: ".URL."users/add/?msg=".$msg);
      }

      
    }

    public function select()
    {
      $sql = "SELECT * FROM users WHERE id = '{$this->id}'";
      $data = $this->con->return_query($sql);
      $row = mysqli_fetch_assoc($data);
      return $row;
    }

    public function update()
    {
  
      $sql = "UPDATE users SET 
            name = '{$this->name}',
            last_name = '{$this->last_name}',
            mail = '{$this->mail}',
            updated_at = NOW()
            WHERE id = {$this->id}";
      $this->con->simple_query($sql);
      header("Location: ".URL."users/");
      
    }

    public function delete()
    {
      $sql = "DELETE FROM users WHERE id = '{$this->id}'";
      $this->con->simple_query($sql);
    }

  }
  
  

 ?>