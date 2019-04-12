<?php  
	require_once 'admin/class/Usuario.php';
	include('template/header.php');

	$idUsuario = $_SESSION['idUsuario'];
	$imagen2 = (isset($_POST['imagen2'])) ? $_POST['imagen2'] : null;
	$usuario = Usuario::buscarPorId($idUsuario);


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if ($_FILES['imagen']['name'] != null){

			if ($_FILES['imagen']['type'] == 'image/jpg' || $_FILES['imagen']['type'] == 'image/jpeg' || $_FILES['imagen']['type'] == 'image/png') {
				
				$rutaServidor = 'uploads';
				$rutaTemporal = $_FILES['imagen']['tmp_name'];
				$nombreImagen = $_FILES['imagen']['name'];
				$rutaDestino = $rutaServidor.'/'.$nombreImagen;
				move_uploaded_file($rutaTemporal, 'admin/usuarios/'.$rutaDestino);

				
			}

		}else{
			$rutaDestino = $imagen2;
		}

			$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
			$calle = (isset($_POST['calle'])) ? $_POST['calle'] : null;
			$numero = (isset($_POST['numero'])) ? $_POST['numero'] : null;
			$colonia = (isset($_POST['colonia'])) ? $_POST['colonia'] : null;
			$cp = (isset($_POST['cp'])) ? $_POST['cp'] : null;
			$ciudad = (isset($_POST['ciudad'])) ? $_POST['ciudad'] : null;
			$estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;
			$referencia = (isset($_POST['referencia'])) ? $_POST['referencia'] : null;
			$email = (isset($_POST['email'])) ? $_POST['email'] : null;
			$password = (isset($_POST['password'])) ? $_POST['password'] : null;
			$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : null;
			$privilegios = (isset($_POST['privilegios'])) ? $_POST['privilegios'] : null;
			$usuario->setImagen($rutaDestino);
			$usuario->setNombre($nombre);
			$usuario->setApellidos($apellidos);
			$usuario->setCalle($calle);
			$usuario->setNumero($numero);
			$usuario->setColonia($colonia);
			$usuario->setCp($cp);
			$usuario->setCiudad($ciudad);
			$usuario->setEstado($estado);
			$usuario->setReferencia($referencia);
			$usuario->setEmail($email);

			if ($password == $usuario->getPassword()) {
				$usuario->setPassword($password);
			}else{
				$usuario->setPassword(sha1($password));
			}

			$usuario->setEstatus($estatus);
			$usuario->setPrivilegios($privilegios);
			$usuario->guardar();

				echo '<script> 
						alert("Cambio exitoso"); 
						window.location.href="perfil.php";
					</script>';
	 }

?>

<div class="row">
	<div class="col-xs-12">
		<center>
		<h1>Editar Perfil</h1>
		<form method="post" action="editarPerfil.php" enctype="multipart/form-data">

			<?php if ($usuario->getIdUsuario()): ?>
				<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>"/>
			<?php endif; ?>

			<?php if ($usuario->getIdUsuario() !=null) { ?>
				<img src="admin/usuarios/<?php echo $usuario->getImagen() ?>"height="100" width="100" style="border-radius: 50px 50px 50px 50px;">
			<?php } ?>
			<div class="row">
			<div class="form-group col-xs-3"></div>
			<div class="form-group col-xs-6">
			<input class="form-control" type="file" name="imagen" value="<?php echo $usuario->getImagen() ?>"/>
			</div>
			<div class="form-group col-xs-3"></div>
			</div>

			<input type="hidden" name="imagen2" value="<?php echo $usuario->getImagen() ?>" />

			
			<div class="row">
			<div class="form-group col-xs-6">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>"required/>
			</div>
			

			<div class="form-group col-xs-6">
			<label>Apellidos</label>
			<input class="form-control" type="text" name="apellidos" value="<?php echo $usuario->getApellidos() ?>" required/>
			</div>
			</div>

			<input type="hidden" name="calle" value="<?php echo $usuario->getCalle() ?>"/>

			<input type="hidden" name="numero" value="<?php echo $usuario->getNumero() ?>"/>

			<input type="hidden" name="colonia" value="<?php echo $usuario->getColonia() ?>"/>

			<input type="hidden" name="cp" value="<?php echo $usuario->getCp() ?>"/>

			<input type="hidden" name="ciudad" value="<?php echo $usuario->getCiudad() ?>" />

			<input type="hidden" name="estado" value="<?php echo $usuario->getEstado() ?>" />

			<input type="hidden" name="referencia" value="<?php echo $usuario->getReferencia() ?>" />

			<div class="row">
			<div class="form-group col-xs-6">
			<label>Email</label>
			<input class="form-control" type="email" name="email" value="<?php echo $usuario->getEmail() ?>" required />
			</div>
			
			<div class="form-group col-xs-6">
			<label>Password</label>
			<input class="form-control" type="password" name="password" value="<?php echo $usuario->getPassword() ?>" required />
			</div>
			</div>

			<input type="hidden" name="estatus" value="<?php if ($usuario->getIdUsuario()) {echo $usuario->getEstatus(); }else{ echo '1';} ?>" required />

			<input type="hidden" name="privilegios" value="<?php if ($usuario->getIdUsuario()) {echo $usuario->getPrivilegios(); }else{ echo '1';} ?>" required />
			<br>
			<input type="submit" value="Guardar"/>
			<a href="index.php">Cancelar</a>
		</form>
		</center>

	</div>
</div>
<?php 
include('template/footer.php');
?>