<?php 
  namespace CONFIG;

  class enrutador
  {
    public static function run(Request $request){
      $controlador = $request->getControlador() . "Controller";
      $ruta = ROOT . "controllers" .DS . $controlador.".php";
      //error_log($ruta);
      
      $metodo = $request->getMetodo();
      if ($metodo == "index.php") {
        $metodo = "index";   
      }   

      $argumento = $request->getArgumento();
      if (is_readable($ruta)) {
        //error_log($ruta);

        require_once $ruta;
        $mostrar = "controllers\\".$controlador;
        $controlador = new $mostrar;
        //error_log($mostrar);

        if (!isset($argumento)) {
          $datos = call_user_func(array($controlador, $metodo));
          

        }else{
          $datos = call_user_func_array(array($controlador, $metodo), $argumento);
          //error_log(print_r($datos,true));
        }
      }

      //CARGAR VISTA
      $ruta = ROOT . "views" . DS . $request->getControlador() . DS . $request->getMetodo() . ".php";
      // print $ruta;
      if (is_readable($ruta)) {
        
        if ($request->getControlador() == "login") {
          require_once $ruta;
        }else if (!isset($_SESSION['user'])) {
          header("Location:".URL."login/");
        }else{
          require_once $ruta;
        }
      }else{
        require ROOT."views/404/404.php";
      }
    }
  }  

?>