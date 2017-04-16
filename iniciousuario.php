<?php
require('sesion.php');
require('conex.php');

if (empty($_POST['usuario']) || empty($_POST['contra'])) {
	echo "<center>";
	echo"<div class='alert alert-danger'>";
  	echo"<strong>Error!</strong>Te faltaron datos";
	echo"</div>";
	echo "<a href='index.html' class='btn btn-warning' role='button'>Regresa al login</a>";
	echo "</center>";
	//header("location: index.php");

}else{
$usuario=$_POST['usuario'];
//$nombre=$_POST['nombre'];
$contra=$_POST['contra'];
//$ap_mat=$_POST['ap_mat'];
//$ap_pat=$_POST['ap_pat'];
//$edad=$_POST['edad'];


	$query=mysqli_query($miConexion,"SELECT * FROM users WHERE usuario='$usuario' and contra='$contra'"); //QUERY es una consulta


	

	$existe = $query->num_rows;
	
	if ($existe !=0) {
		$renglon= mysqli_fetch_assoc($query);
		$nombre=$renglon["nombre"];
		$ap_pat=$renglon["ap_pat"];
		$ap_mat=$renglon["ap_mat"];
		$edad=$renglon["edad"];
		$permiso=$renglon["tipo"];

		if($permiso==1){
	echo "<center>";	
	echo"<div class='alert alert-info'>";
  	echo"<strong>Gerente!</strong>Hola Gerente!";
	echo"</div>";
	echo "<a href='index.html' class='btn btn-warning' role='button'>Regresa al login</a>";
	echo "</center>";

	session_start(); //PARA QUE SE CREE UNA SESIÓN ( DONDE SE ALMACENAN LOS DATOS DE LA COOKIE)

		
		//UNA VARIABLE DE SESIÓN ES UNA COOKIE QUE SE QUEDA ABIERTA HASTA QUE SE CERRE SESIÓN

		$_SESSION['usuario']=$usuario; //crea una cookie
		$_SESSION['nombre']=$nombre; //crea una cookie
		$_SESSION['contra']=$contra; //crea una cookie
		$_SESSION['ap_pat']=$ap_pat; //crea una cookie
		$_SESSION['ap_mat']=$ap_mat; //crea una cookie
		$_SESSION['edad']=$edad; //crea una cookie
		$_SESSION['tipo']=$permiso; //crea una cookPOST
		$hora=time();

		$hora=date("d-m-Y(H:i:s)",$hora);
		$_SESSION['hora']=$hora;
		echo $hora;

		echo"<br>";
		echo"<br>";

		print_r($_SESSION);

		header("Location: gerente.php");

		}elseif ($permiso==2) {
			session_start(); //PARA QUE SE CREE UNA SESIÓN ( DONDE SE ALMACENAN LOS DATOS DE LA COOKIE)

		
		//UNA VARIABLE DE SESIÓN ES UNA COOKIE QUE SE QUEDA ABIERTA HASTA QUE SE CERRE SESIÓN
		$_SESSION['nombre']=$nombre; //crea una cookie
		$_SESSION['usuario']=$usuario; //crea una cookie
		$_SESSION['contra']=$contra; //crea una cookie
		$_SESSION['ap_pat']=$ap_pat; //crea una cookie
		$_SESSION['ap_mat']=$ap_mat; //crea una cookie
		$_SESSION['edad']=$edad; //crea una cookie
		$_SESSION['tipo']=$permiso; //crea una cookie
		

		$hora=time();

		$hora=date("d-m-Y(H:i:s)",$hora);
		$_SESSION['hora']=$hora;
		echo $hora;

		echo"<br>";
		echo"<br>";

		print_r($_SESSION);

		header("Location: escritorio.php");

		}else{
	echo "<center>";	
	echo"<div class='alert alert-danger'>";
  	echo"<strong>Error!</strong>El usuario no existe o algun dato está erroneo";
	echo"</div>";
	echo "<a href='index.html' class='btn btn-warning' role='button'>Regresa al login</a>";
	echo "</center>";
		}


	}else{
	echo "<center>";	
	echo"<div class='alert alert-danger'>";
  	echo"<strong>Error!</strong>El usuario no existe o algun dato está erroneo";
	echo"</div>";
	echo "<a href='index.html' class='btn btn-warning' role='button'>Regresa al login</a>";
	echo "</center>";
	}

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sesión iniciada</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/chuntarostyle.css">
	<script src="js/jquery-3.2.0.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
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