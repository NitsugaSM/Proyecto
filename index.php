<?php
session_start();
//Validación de privilegios

if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
	

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyecto TWFF</title>
	<link rel="stylesheet" type="text/css" href="../template/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../template/css/style.css">
	<link rel="icon" type="image/ico" href="../images/icon.png">
	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/scripts.js"></script>
</head>
<body>
	<div class="container"><!--container-->

		<div class="row">
			<div class="col-xs-12">
				<center><h1>CPANEL</h1></center>


			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<nav class="navbar navbar-expand-sm bg-info navbar-light">
					  <ul class="nav navbar-nav">
					    <li class="nav-item">
					      <a class="nav-link" href="../index.php">Ver página</a>
					    <li class="nav-item">
					      <a class="nav-link" href="../logout.php">Cerrar sesi&oacute;n</a>
					    </li>
					  </ul>
					</nav>		
				</div>

		<div class="row">
			<div class="col-xs-4">
				<a class="nav-link" href="usuarios/index.php"><img class="imagen img-responsive" src="../images/usuarios.png"></a>
			</div>
			<div class="col-xs-4">
				<a class="nav-link" href="productos/index.php"><img class="imagen img-responsive" src="../images/productos.png"></a>
			</div>
			<div class="col-xs-4">
				<a class="nav-link" href="categorias/index.php"><img class="imagen img-responsive" src="../images/categorias.png"></a>
			</div>
			<div class="col-xs-4">
				<a class="nav-link" href="comentarios/index.php"><img class="imagen img-responsive" src="../images/comentarios.png"></a>
			</div>
			<div class="col-xs-4">
				<a class="nav-link" href="contacto/index.php"><img class="imagen img-responsive" src="../images/contacto.png"></a>
			</div>
			<div class="col-xs-4">
				<a class="nav-link" href="faq/index.php"><img class="imagen img-responsive" src="../images/faqs.png"></a>
			</div>
			<div class="col-xs-4">
				<a class="nav-link" href="pedidos/index.php"><img class="imagen img-responsive" src="../images/pedidos.png"></a>
			</div>
			<div class="col-xs-4">
				<a class="nav-link" href="slide/index.php"><img class="imagen img-responsive" src="../images/slide.png"></a>
			</div>
		</div>

		
<?php
include_once('template/footer.php');
		# code...
	}
}
?>



		