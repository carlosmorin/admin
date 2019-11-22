  <?php 
	date_default_timezone_set('America/Monterrey');
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);

	//LOCAL->
	//define('URL', "http://hoteldonfelipe.com.mx/admin/");
  define('URL', "http://localhost/admin/");

	//PRODUCCION (NO BORRAR)->
	//define('URL', "http://lasalbardas.com/ADMIN/");

	define('URL_IMG', URL."views/assets/img/");

	require_once "config/autoload.php";
	require_once "views/template.php";

	config\autoload::run();
	config\enrutador::run(new config\request());

//predios
//ciclos

?>

