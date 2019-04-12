<?php  
	require_once '../class/Usuario.php';
	include('../template/header.php');

	$idUsuario = (isset($_REQUEST['idUsuario'])) ? $_REQUEST['idUsuario'] : null;
	$imagen2 = (isset($_REQUEST['imagen2'])) ? $_REQUEST['imagen2'] : null;

	if ($idUsuario) {
		$usuario = Usuario::buscarPorId($idUsuario);
	}else{
		$usuario = new Usuario();
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if ($_FILES['imagen']['name'] != null){

			if ($_FILES['imagen']['type'] == 'image/jpg' || $_FILES['imagen']['type'] == 'image/jpeg' || $_FILES['imagen']['type'] == 'image/png') {
				
				$rutaServidor = 'uploads';
				$rutaTemporal = $_FILES['imagen']['tmp_name'];
				$nombreImagen = $_FILES['imagen']['name'];
				$rutaDestino = $rutaServidor.'/'.$nombreImagen;
				move_uploaded_file($rutaTemporal, $rutaDestino);

				
			}

		}else{
			$rutaDestino = $url2;
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
			$usuario->setPassword($password);  //(sha1($password));
			$usuario->setEstatus($estatus);
			$usuario->setPrivilegios($privilegios);

			if(ctype_space($nombre)){
    		echo '<script> 
				alert("ingresa un nombre "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($apellidos)){
    		echo '<script> 
				alert("ingresa un apellido "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($calle)){
    		echo '<script> 
				alert("ingresa una calle "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($numero)){
    		echo '<script> 
				alert("ingresa un nombre "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(!is_numeric($numero)){
    		echo '<script> 
				alert("utiliza unicamente numeros en el campo numeros  "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($colonia)){
    		echo '<script> 
				alert("ingresa un nombre "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($cp)){
    		echo '<script> 
				alert("ingresa un nombre "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
					    if(!is_numeric($cp)){
    		echo '<script> 
				alert("utiliza unicamente numeros en el cp  "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($ciudad)){
    		echo '<script> 
				alert("ingresa una ciudad "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($estado)){
    		echo '<script> 
				alert("ingresa un estado "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($referencia)){
    		echo '<script> 
				alert("ingresa una referencia  "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($email)){
    		echo '<script> 
				alert("ingresa un correo "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
				 		if (ctype_space($email)) {
    		echo '<script> 
				alert("ingresa un correo valido"); 
				window.location.href="guardar_usuario.php";
			</script>';
  			}
						if(ctype_space($password)){
    		echo '<script> 
				alert("ingresa una contrasenia valida "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($estatus)){
    		echo '<script> 
				alert("ingresa un estatus "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(!is_numeric($estatus)){
    		echo '<script> 
				alert("utiliza unicamente numeros en el campo estatus "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(ctype_space($privilegios)){
    		echo '<script> 
				alert("define los privelegios "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
						if(!is_numeric($privilegios)){
    		echo '<script> 
				alert("utiliza unicamente numeros en el campo privilegios "); 
				window.location.href="guardar_usuario.php";
			</script>';
			}
			else{
			$usuario->guardar();
			header('Location: index.php');
   			}
   		}
	
?>

<div class="row">
	<div class="col-xs-12">
		<h1>Guardar Usuario</h1>
		<form method="post" action="guardar_usuario.php" enctype="multipart/form-data">
			<?php if ($usuario->getIdUsuario()): ?>
				<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>"/>
			<?php endif; ?>
			<label>Imagen</label>
			<?php if ($usuario->getIdUsuario() !=null) { ?>
				<img src="<?php echo $usuario->getImagen() ?>"height="100" width="100">
			<?php } ?>
			<input type="file" name="imagen" value="<?php echo $usuario->getImagen() ?>"/>
			<br>
			<input type="hidden" name="imagen2" value="<?php echo $usuario->getImagen() ?>" />
			<br>
			<label>Nombre</label>
			<input type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>" required />
			<br>
			<label>Apellidos</label>
			<input type="text" name="apellidos" value="<?php echo $usuario->getApellidos() ?>" required />
			<br>
			<label>Calle</label>
			<input type="text" name="calle" value="<?php echo $usuario->getCalle() ?>" required />
			<br>
			<label>Numero</label>
			<input type="text" name="numero" value="<?php echo $usuario->getNumero() ?>" required />
			<br>
			<label>Colonia</label>
			<input type="text" name="colonia" value="<?php echo $usuario->getColonia() ?>" required />
			<br>
			<label>Código Postal</label>
			<input type="text" name="cp" value="<?php echo $usuario->getCp() ?>" required />
			<br>
			<label>Ciudad</label>
			<input type="text" name="ciudad" value="<?php echo $usuario->getCiudad() ?>" required />
			<br>
			<label>Estado</label>
			<input type="text" name="estado" value="<?php echo $usuario->getEstado() ?>" required />
			<br>
			<label>Referencias</label>
			<input type="text" name="referencia" value="<?php echo $usuario->getReferencia() ?>" required />
			<br>
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $usuario->getEmail() ?>" required />
			<br>
			<label>Password</label>
			<input type="password" name="password" value="<?php echo $usuario->getPassword() ?>" required />
			<br>
			<label>Estatus</label>
			<input type="text" name="estatus" value="<?php if ($usuario->getIdUsuario()) {echo $usuario->getEstatus(); }else{ echo '1';} ?>" required />
			<br>
			<label>Privilegios</label>
			<input type="text" name="privilegios" value="<?php if ($usuario->getIdUsuario()) {echo $usuario->getPrivilegios(); }else{ echo '1';} ?>" required />
			<br>
			<input type="submit" value="Guardar"/>
			<a href="index.php">Cancelar</a>
		</form>
	
	</div>
</div>
<?php 
include('../template/footer.php');
?>