<?php 	

	if(isset($_SESSION['user'])){
		header("Location: ".URL."personal/");
	}
 ?>

	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="CSS/ICONS/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="IMG/icon.ico" type="image/x-icon"/>

</head>

<style>	
	.panelLogin{
		width: 90%;
		max-width: 400px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translateX(-50%)  translateY(-50%);
		background: red;
		box-shadow: 0px 0px 7px rgba(0,0,0,.6);
	}
	.headerPanel{
		display: block;
		background:#b01c2e; #FF5722; #b01c2e;
		color: blue;
		text-align: center;
		padding: 30px;
	}
	.imgContent{
		background-color: #fff;
		margin: 0 auto;
		width: 100px;
		height: 100px;
		border-radius: 100%;
		padding: 10px;
		margin-bottom: 10px;
		overflow: hidden;
	}
	.iconUser{
		width: 40px;
		height: 40px;
		background: rgba(0,0,0,.2);
		text-align: center;
		padding-top: 10px;
		box-sizing: border-box;
		border-radius: 10px;
		font-size: 18px;
		margin-bottom: 5px;
	}
	.formPanel{
		display: block;
		height: 240px;
		background: #fff;
		position: relative;
		padding: 30px 40px;		
		box-sizing: border-box;
	}

	.formPanel::after{
		content: "";
		position: absolute;
		z-index: 10;
		top: -12px;
		left: 50%;
		transform: translateX(-50%);
		border-left: 15px solid transparent;
		border-right: 15px solid transparent;
		border-bottom: 15px solid #fff;
	}
	.inputStyle2{
		width: 100%;
	    height: 40px;
	    border-radius: 3px;
	    outline: none;
	   	padding: 5px;
	    color: #000 !important;
	    border: 1px solid #adb1b3;
	    margin-bottom: 10px;
	    box-sizing: border-box;
	}
	input:focus{
		border: 1px solid #4646bb;
	}
	body{
		background: #d2d6de!important;
	}
	.button{
		padding: 16px 10px;
    	/*border-radius: 4px;*/
	    background:#b01c2e; #FF5722;   #891818;
	    border: none;
	    display: block;
	    width: 100%;
	    margin-top: 10px;
	    color: #fff;
	    cursor: pointer;
	    /*border-bottom: 4px solid #811522;
	    border-left: 2px solid #811522;*/
	    border:none;
	    outline: none;
	    transition: all .3s;
	}
	.button:focus{
		border: none;
	}
	.button:hover{
		background-color: #801416; #E64A19;
	}
	.erromsg{
		font-size: 12px;
		color: #b01c2e;
		text-align: center;
		padding: 5px;
		font-weight: 600;
		display: block;
	}
	.hidden{
		display: none;
	}
	h5{
		margin-top: -20px;
	}
</style>

<body class="login">	
	<div class="panelLogin">	
		<div class="headerPanel">
			<div class="imgContent">
				<img src="<?= URL_IMG ?>/logo.jpg" width="100%">
			</div>
		</div>
	     
		<div class="formPanel">	
			<form action="<?= URL ?>/login/verify" class="formLogin" method="POST" onsubmit="login()" autocomplete="off">
					<h5 class="text-center"><strong>Iniciar Sesión</strong></h5>
					<div class="form-group has-feedback">
				        <input type="mail" name="mail" class="form-control inputStyle2" placeholder="Direccion de correo" required="">
				        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			        </div>

					

					<div class="form-group has-feedback">
				        <input type="password" name="password" class="form-control inputStyle2" placeholder="Contraseña" required="">
				        <span class="fa fa-lock form-control-feedback"></span>
			        </div>

					
					
					<button class="button" type="submit"><i class="fa fa-sign-in-alt"></i> ENTRAR </button>
					<?php if (isset($_GET['error'])){
						echo '<p class="erromsg text-uppercase text-600">'.$_GET['error'].' </p>';
					} ?>
			</form>
				
			
		</div>
	</div>
	<script src="<?=URL?>VIEWS/resources/JS/login.js"></script>
	
</body>
</html>
