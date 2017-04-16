<?php
require('conex.php');
require('sesion.php');
if (!isset($_SESSION['usuario'])) {
	if (!isset($_SESSION['contra'])) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ERROR</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/chuntarostyle.css">
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.js"></script>
</head>
<body>
	<div class="alert alert-warning">
  <strong>ERROR 0!</strong> No puedes estar aquí.
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
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/chuntarostyle.css">
	<script src="js/jquery-3.2.0.js"></script>
	<script src="js/bootstrap.js"></script>
	<title>Tienda</title>
</head>
<body>
<div class="well"><h2><span class=" glyphicon glyphicon-piggy-bank"></span> Productos</h2></div>
    <?php
					require('conex.php');
					$usuario=$_SESSION['usuario'];
					$contra=$_SESSION['contra'];
					$resultado= mysqli_query($miConexion,"SELECT * FROM `productos`");
							while ($renglon= mysqli_fetch_array($resultado)) {
								echo "<div class='panel panel-info'>";
									echo "<div class='panel-heading'>".$renglon['nombre']."<br>Precio:     $".$renglon['precio']."</div>";
									echo "<div class='panel-body'>".$renglon['descripcion']."</div>";
									echo "</div><br>";
						}
						$query=mysqli_query($miConexion,"SELECT * FROM users WHERE usuario='$usuario' and contra='$contra'"); //QUERY es una consulta
						$renglon= mysqli_fetch_assoc($query);
						$permiso=$renglon["tipo"];

						if ($permiso==1) {
			echo"<form action='cerrarsesion.php' method='POST'>";
			echo"<a href='gerente.php' class='btn btn-info' role='button'>Inicio</a>";
			echo"<input type='submit' class='btn btn-success' value='Cerrar sesión'>";
			echo"</form>";
						}else{
							if ($permiso==2) {
			echo"<form action='cerrarsesion.php' method='POST'>";
			echo"<a href='escritorio.php' class='btn btn-info' role='button'>Inicio</a>";
			echo"<input type='submit' class='btn btn-success' value='Cerrar sesión'>";
			echo"</form>";
							}
						}

					?>
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
					
						?>
