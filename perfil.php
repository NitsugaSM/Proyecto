<?php  
	require_once 'admin/class/Usuario.php';
	include('template/header.php');

	$idUsuario = $_SESSION['idUsuario'];
	$usuario = Usuario::buscarPorId($idUsuario);
?>

<div class="row">
	<div class="col-xs-12">
		<center>
		<h1><i>Mi Perfil</i></h1>
		<form method="post" action="guardar_usuario.php" enctype="multipart/form-data" >

			<div class="row">
			<div class="form-group col-xs-12">
			<?php if ($usuario->getIdUsuario()): ?>
				<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>"/>
			<?php endif; ?>
			<?php if ($usuario->getIdUsuario() !=null) { ?>
				<img src="admin/usuarios/<?php echo $usuario->getImagen() ?>"height="100" width="100" style="border-radius: 50px 50px 50px 50px;">
			<?php } ?>
			</div>
			</div>

			<div class="row">
			<div class="form-group col-xs-6">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>"readonly/>
			</div>

			<div class="form-group col-xs-6">
			<label>Apellidos</label>
			<input class="form-control" type="text" name="apellidos" value="<?php echo $usuario->getApellidos() ?>" readonly/>
			</div>
			</div>

			<div class="row">
			<div class="form-group col-xs-6">
			<label>Email</label>
			<input class="form-control" type="email" name="email" value="<?php echo $usuario->getEmail() ?>" readonly />
			</div>

			<div class="form-group col-xs-6">
			<label>Password</label>
			<input class="form-control" type="password" name="password" value="<?php echo $usuario->getPassword() ?>" readonly />
			</div>
			</div>
			<br>
			<a class="btn btn-primary" href="editarPerfil.php">Editar</a>
		</form>
		</center>
	</div>
</div>
<?php 
include('template/footer.php');
?>