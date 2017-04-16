<?php
require('sesion.php');
require('conex.php');
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
<?php
$usuario=$_SESSION['usuario'];
$contra=$_SESSION['contra'];
$query=mysqli_query($miConexion,"SELECT * FROM users WHERE usuario='$usuario' and contra='$contra'");
$renglon= mysqli_fetch_assoc($query);
$permiso=$renglon["tipo"];
if ($permiso==1) {

	?>
	<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/chuntarostyle.css">
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.js"></script>
		<title>Gerente</title>
	</head>
	<body>
		 <ul class="nav nav-tabs nav-justified">
	<li class="active"><a href="#">Gerente: <?php echo $_SESSION['usuario'];?></a></li>
    <li><a href="gerente.php">Home</a></li>
    <li><a href="creausuariom.php">Crear Usuario</a></li>
    <li><a href="borrausuariom.php">Eliminar Usuario</a></li>
    <li><a href="agregaproductom.php">Añadir Producto</a></li>
    <li><a href="borraproductom.php">Eliminar Producto</a></li>
    <li><a href="tienda.php">Tienda</a></li>
	<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>

  </ul>
  <br>
		
		
		
		
<!--Tabla de productos-->
<div class="container">
			<div class="well"><h2><span class=" glyphicon glyphicon-shopping-cart"></span> Productos</h2></div>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>id_p</th>
						<th>nombre</th>
						<th>precio</th>
						<th>descripción</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require('conex.php');
					$resultado= mysqli_query($miConexion,"SELECT * FROM `productos`");
							while ($renglon= mysqli_fetch_array($resultado)) {
								//id_usr, usuario, nombre, contra, ap_mat, ap_pat, edad, tipo
								echo "<tr>";
									echo "<td>".$renglon['id_p']."</td>";
									echo "<td>".$renglon['nombre']."</td>";
									echo "<td>".$renglon['precio']."</td>";
									echo "<td>".$renglon['descripcion']."</td>";
						}	echo "</tr>";
					?>
				</tbody>
			</table>
		</div>
		
		<div class="container">
			<h2>Eliminar producto</h2>
			<form action="borraproducto.php" method="POST">
				<div class="form-group col-xs-4">
				<label class="control-label col-sm-2" for="email">id_p:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="user_new" name="id_p" placeholder="Ingresa el id_usr">
				</div>
			</div>
			<div class="col-xs-4 col-md-4"></div>
			<div class="col-xs-4 col-md-4"></div>
			<div class="col-xs-4 col-md-4" align="center">
			<input type="submit" class="btn btn-danger" value="Eliminar Producto">
			</div>
			</form>
		</div>
		
		<form action="cerrarsesion.php" method="POST">
			<a href="tienda.php" class="btn btn-info" role="button">Tienda</a>
			<input type="submit" class="btn btn-success" value="Cerrar sesión">
		</form>
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
						else{
							if ($permiso==2) {
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
  <strong>ERROR2!</strong> No puedes estar aquí.
</div>
<div class="col-xs-4">
				<a href="escritorio.php" class="btn btn-success" role="button">Inicio</a>
			</div>
</body>
</html>
<?php
							}
						}
					}
					
						?>

