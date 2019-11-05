<?php 
	namespace Views;
	session_start();
			
	$template = new template();
	class template{
		public function __construct(){
		ob_start();
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">	
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<title>CMS</title>
	<link rel="icon" 
      type="image/png" 
      href="<?= URL_IMG?>/favicon.ico" />
  <link rel="stylesheet" href="<?= URL?>/views/assets/css/helpers.css">
	<link rel="stylesheet" href="<?= URL?>/views/assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="<?= URL?>/views/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?= URL?>/views/assets/bower_components/bootstrap-timepicker/css/timepicker.less">
	<link rel="stylesheet" href="<?= URL?>/views/assets/css/main.css">
	<link rel="stylesheet" href="<?= URL?>/views/assets/css/jquery-ui.min.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Rubik:300,400" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <!-- <link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"> -->
	<!-- nuevos link -->
	
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="<?= URL?>/views/assets/bower_components/Ionicons/css/ionicons.min.css">
	  <!-- jvectormap -->
	  <link rel="stylesheet" href="<?= URL?>/views/assets/bower_components/jvectormap/jquery-jvectormap.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="<?= URL?>/views/assets/bower_components/bootstrap-select/css/boostrap-select.min.css">
	  <link rel="stylesheet" href="<?= URL?>/views/dist/css/AdminLTE.css">
	  <link rel="stylesheet" href="<?= URL?>/views/assets/css/animate.css">
	  <link rel="stylesheet" href="<?= URL?>/views/dist/css/skins/_all-skins.min.css">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <!-- <link href="https://unpkg.com/ionicons@4.2.4/dist/css/ionicons.min.css" rel="stylesheet"> -->
      <!-- Latest compiled and minified css -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="<?= URL?>/views/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="<?= URL?>/views/assets/css/all.min.css">
	  <link rel="stylesheet" href="<?= URL?>/views/assets/fonts/style.css">

	  <link rel="stylesheet" type="text/css" href="<?= URL?>/views/assets/datatables/dataTables.bootstrap.min.css"/>
	  <link rel="stylesheet" type="text/css" href="<?= URL?>/views/assets/datatables/buttons.bootstrap.min.css"/>
	  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">


</head>
<body class="hold-transition skin-green sidebar-mini fixed">
	<div class="wrapper">
		<div class="spinner">
			  <div class="bounce1"></div>
			  <div class="bounce2"></div>
			  <div class="bounce3"></div>
			  <span class="block s12">
			  	Cargando..
			  </span>
		</div>
		<div class="bgLightBlack"></div>
<?php if (isset($_SESSION['user'])){require "menu.php"; } ?>
	


	          
	        
	            <!-- /.box-header -->
	        
	        	<!-- contenido dinamico con la funcion destruct -->
	<?php	}	public function __destruct(){?>
			

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	 
	
	<script src="<?= URL?>/views/assets/js/bootstrap-select.js"></script>
	<script src="<?= URL?>/views/assets/js/ajax.js"></script>
	<script src="<?= URL?>/views/assets/js/ajax_controllers.js"></script>
	<script src="<?= URL?>/views/assets/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?= URL?>/views/assets/bower_components/bootstrap-select/js/bootstrap-select.min.js"></script>
	<script src="<?= URL?>/views/assets/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script src="<?= URL?>/views/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="<?= URL?>/views/assets/bower_components/bootstrap-datepicker/dist/js/datepicker-es.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= URL?>/views/assets/bower_components/chart.js/Chart.min.js"></script>
	<!-- <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
	<!-- <script src="http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"></script> -->

	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/jszip.min.js"></script>
	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= URL?>/views/assets/datatables/buttons.html5.min.js"></script>

	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

	<script src="<?= URL?>/views/assets/js/scripts.js"></script>
	<!-- nuevos scripts -->
	<!-- AdminLTE App -->
	<script src="<?= URL?>/views/dist/js/adminlte.min.js"></script>
	<script>
	//  $("#datepicker").datepicker($.datepicker.regional[ "es" ]);
	//  $('#datetimepicker3').datetimepicker({ format: 'LT'});
    //  $('#datetimepicker3').datetimepicker({ pickDate: false});
	</script>
	
</body>
</html>

<?php
	ob_end_flush();
		}
	}
	
?>