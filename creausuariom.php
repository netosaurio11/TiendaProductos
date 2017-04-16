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
		
		<div class="container">
			<div class="well"><h2><span class=" glyphicon glyphicon-user"></span> Usuarios</h2></div>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>id_usr</th>
						<th>usuario</th>
						<th>nombre</th>
						<th>contra</th>
						<th>Apellido materno</th>
						<th>Apellido paterno</th>
						<th>edad</th>
						<th>Tipo</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require('conex.php');
					$resultado= mysqli_query($miConexion,"SELECT * FROM `users`");
							while ($renglon= mysqli_fetch_array($resultado)) {
								//id_usr, usuario, nombre, contra, ap_mat, ap_pat, edad, tipo
								echo "<tr>";
										echo "<td>".$renglon['id_usr']."</td>";
										echo "<td>".$renglon['usuario']."</td>";
										echo "<td>".$renglon['nombre']."</td>";
										echo "<td>".$renglon['contra']."</td>";
										echo "<td>".$renglon['ap_mat']."</td>";
										echo "<td>".$renglon['ap_pat']."</td>";
										echo "<td>".$renglon['edad']."</td>";
										echo "<td>".$renglon['tipo']."</td>";
							}	echo "</tr>";
					?>
				</tbody>
			</table>
		</div>
		<div class="container">
			<h2>Crear usuario nuevo</h2>
			<form action="crearusuario.php" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Usuario:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="user_new" name="usuario" placeholder="Ingresa el usuario">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Contraseña:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="pwd" name="contra" placeholder="Ingresia Contraseña">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name_new" name="nombre" placeholder="Ingresa el Nombre">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Apellido paterno:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="appat_new" name="ap_pat" placeholder="Ingresa el apellido paterno">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Apellido materno:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apmat_new" name="ap_mat" placeholder="Ingresa el apellido materno">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Edad:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="age_new" name="edad" placeholder="Ingresa la edad">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Tipo:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tipo_new" name="tipo" placeholder="Ingresa el usuario">
					</div>
				</div>
				<div class="col-xs-4 col-md-4"></div>
				<div class="col-xs-4 col-md-4"></div>
				<div class="col-xs-4 col-md-4" align="center">
					<input type="submit" class="btn btn-primary" value="Crear Usuario">
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
					}
					
?>