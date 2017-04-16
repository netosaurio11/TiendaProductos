<?php
require('conex.php');
if (!isset($_POST['usuario']) || !isset($_POST['nombre']) || !isset($_POST['contra']) || !isset($_POST['ap_mat']) || !isset($_POST['ap_pat']) || !isset($_POST['edad'])) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/chuntarostyle.css">
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.js"></script>
</head>
<body>
	<div class="alert alert-danger">
  <strong>ERROR!</strong> Te faltaron datos.
</div>
<div class="col-xs-4">
				<a href="registro.html" class="btn btn-success" role="button">Regresar</a>
			</div>
				<nav class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
			<span class="sr-only">Footer</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><span class=" glyphicon glyphicon-user"></span> Contacto</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
			<ul class="nav navbar-nav">
				<li><a href="https://www.facebook.com/netosaurio1014">Facebook</a></li>
				<li><a href="https://twitter.com/tiendaNeto?lang=es">Twitter</a></li>
				<li><a href="https://github.com/netosaurio11">GitHub</a></li>
				<li><a href="https://www.instagram.com/netosaurio11/">Instagram</a></li>
			</ul>
		</div>
	</div>
</nav>
</body>
</html>
<?php
}else{
?>
<?php
$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$contra=$_POST['contra'];
$ap_mat=$_POST['ap_mat'];
$ap_pat=$_POST['ap_pat'];
$edad=$_POST['edad'];
$tipo=2;

$checkuser=mysqli_query($miConexion,"SELECT * FROM users WHERE usuario='$usuario'");
$check_user=mysqli_num_rows($checkuser);
if($check_user>0){
	echo '<script language="javascript">alert("Ya existe este usuario"); </script>';
}else{
	$query = "INSERT INTO `users` (id_usr, usuario, nombre, contra, ap_mat, ap_pat, edad, tipo ) VALUES (NULL, '".$usuario."','".$nombre."','".$contra."', '".$ap_mat."', '".$ap_pat."', '".$edad."', '".$tipo."');";

mysqli_query($miConexion,$query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/chuntarostyle.css">
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.js"></script>
</head>
<body>
	<div class="alert alert-success">
  <strong>Correcto!</strong> Se registró en la base de datos.
</div>
<div class="col-xs-4">
				<a href="index.html" class="btn btn-success" role="button">Inicio</a>
			</div>
				<nav class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
			<span class="sr-only">Footer</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><span class=" glyphicon glyphicon-user"></span> Contacto</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
			<ul class="nav navbar-nav">
				<li><a href="https://www.facebook.com/netosaurio1014">Facebook</a></li>
				<li><a href="https://twitter.com/tiendaNeto?lang=es">Twitter</a></li>
				<li><a href="https://github.com/netosaurio11">GitHub</a></li>
				<li><a href="https://www.instagram.com/netosaurio11/">Instagram</a></li>
			</ul>
		</div>
	</div>
</nav>
</body>
</html>
<?php 
}
}
?>

