<?php
require_once('admin/class/Usuario.php');
include('template/header.php');
require_once 'lib/carrito_compra.php';


$idUsuario = $_SESSION['idUsuario'];

$usuario = Usuario::buscarPorId($idUsuario);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
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
	$usuario->setPassword($password);
	$usuario->setEstatus($estatus);
	$usuario->setPrivilegios($privilegios);
	$usuario->guardar();
	echo '<script>  
				window.location.href="metodoPago.php";
			</script>';
}
?>
<div class="row"><!--row 2-->
	<div class="col-xs-1"></div>
		<div class="col-xs-10">
		<nav class="navbar" style="background-color: #A9E2F3;" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
				            data-target=".navbar-ex2-collapse" style="background-color: #ffffff;">
					<span class="sr-only">Desplegar navegación</span>
					<span class="icon-bar" style="background-color: #A9E2F3;"></span>
					<span class="icon-bar" style="background-color: #A9E2F3;"></span>
					<span class="icon-bar" style="background-color: #A9E2F3;"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse navbar-ex2-collapse">
				<ul class="nav navbar-nav">
					<li class="nav-item" style="background-color: #82FA58;">
					    <a class="nav-link" href="#">Datos personales</a>
					</li>
					<li class="nav-item disabled">
					    <a class="nav-link" href="metodoPago.php" >Método de pago</a>
					</li>
					<li class="nav-item disabled">
					    <a class="nav-link disabled" href="metodoEnvio.php" >Método de envío</a>
					</li>
					<li class="nav-item disabled">
					    <a class="nav-link disabled" href="resumenPedido.php" >Resumen de pedido</a>
					</li>	    
				</ul>
			</div>
		</nav>
	</div>
	<div class="col-xs-1"></div>
</div><!-- fin row 2-->

<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<center><h2><u> Datos personales</u></h2></center>
		<hr>
		<form method="post" action="datosPersonales.php">
			<?php if ($usuario->getIdUsuario()): ?>
				<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>"/>
			<?php endif; ?>

			<div class="row">

			<div class="form-group col-xs-6">
			<label for="nombre"><h4><b>Nombre:</b></h4></label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>" required id="nombre"/>
			</div>

			<div class="form-group col-xs-6">
			<label for="apellidos"><h4><b>Apellidos:</b></h4></label>
			<input class="form-control" type="text" name="apellidos" value="<?php echo $usuario->getApellidos() ?>" required id="apellidos"/>
			</div>

			</div>

			<div class="row">

			<div class="form-group col-xs-4">
			<label for="calle"><h4><b>Calle:</b></h4></label>
			<input class="form-control" type="text" name="calle" value="<?php echo $usuario->getCalle() ?>" required id="calle"/>
			</div>

			<div class="form-group col-xs-4">
			<label for="numero"><h4><b>Número:</b></h4></label>
			<input class="form-control" type="text" name="numero" value="<?php echo $usuario->getNumero() ?>" required id="numero"/>
			</div>

			<div class="form-group col-xs-4">
			<label for="colonia"><h4><b>Colonia:</b></h4></label>
			<input class="form-control" type="text" name="colonia" value="<?php echo $usuario->getColonia() ?>" required id="colonia"/>
			</div>

			</div>


			<div class="row">

			<div class="form-group col-xs-3">
			<label for="cp"><h4><b>Código Postal:</b></h4></label>
			<input class="form-control" type="text" name="cp" value="<?php echo $usuario->getCp() ?>" required id="cp"/>
			</div>

			<div class="form-group col-xs-4">
			<label for="ciudad"><h4><b>Ciudad:</b></h4></label>
			<input class="form-control" type="text" name="ciudad" value="<?php echo $usuario->getCiudad() ?>" required id="cp"/>
			</div>

			<div class="form-group col-xs-5">
			<label for="estado"><h4><b>Estado:</b></h4></label>
			<select class="form-control" name="estado" id="estado">
				<option value="0">---Selecciona el estado---</option>
				<?php           
		            $estadoSelect = $usuario->getEstado();
		        ?>
				<option value="Aguascalientes" <?php if('Aguascalientes' == $estadoSelect) echo "selected";?>>Aguascalientes</option>
				<option value="Baja California" <?php if('Baja California' == $estadoSelect) echo "selected";?>>Baja California</option>
				<option value="Baja California Sur" <?php if('Baja California Sur' == $estadoSelect) echo "selected";?>>Baja California Sur</option>
				<option value="Campeche" <?php if('Campeche' == $estadoSelect) echo "selected";?>>Campeche</option>
				<option value="Coahuila de Zaragoza" <?php if('Coahuila de Zaragoza' == $estadoSelect) echo "selected";?>>Coahuila de Zaragoza</option>
				<option value="Colima" <?php if('Colima' == $estadoSelect) echo "selected";?>>Colima</option>
				<option value="Chiapas" <?php if('Chiapas' == $estadoSelect) echo "selected";?>>Chiapas</option>
				<option value="Chihuahua" <?php if('Chihuahua' == $estadoSelect) echo "selected";?>>Chihuahua</option>
				<option value="Distrito Federal" <?php if('Distrito Federal' == $estadoSelect) echo "selected";?>>Distrito Federal</option>
				<option value="Durango" <?php if('Durango' == $estadoSelect) echo "selected";?>>Durango</option>
				<option value="Guanajuato" <?php if('Guanajuato' == $estadoSelect) echo "selected";?>>Guanajuato</option>
				<option value="Guerrero" <?php if('Guerrero' == $estadoSelect) echo "selected";?>>Guerrero</option>
				<option value="Hidalgo" <?php if('Hidalgo' == $estadoSelect) echo "selected";?>>Hidalgo</option>
				<option value="Jalisco" <?php if('Jalisco' == $estadoSelect) echo "selected";?>>Jalisco</option>
				<option value="Mexico" <?php if('Mexico' == $estadoSelect) echo "selected";?>>México</option>
				<option value="Michoacan de Ocampo" <?php if('Michoacan de Ocampo' == $estadoSelect) echo "selected";?>>Michoacán de Ocampo</option>
				<option value="Morelos" <?php if('Morelos' == $estadoSelect) echo "selected";?>>Morelos</option>
				<option value="Nayarit" <?php if('Nayarit' == $estadoSelect) echo "selected";?>>Nayarit</option>
				<option value="Nuevo Leon" <?php if('Nuevo Leon' == $estadoSelect) echo "selected";?>>Nuevo León</option>
				<option value="Oaxaca" <?php if('Oaxaca' == $estadoSelect) echo "selected";?>>Oaxaca</option>
				<option value="Puebla" <?php if('Puebla' == $estadoSelect) echo "selected";?>>Puebla</option>
				<option value="Queretaro" <?php if('Queretaro' == $estadoSelect) echo "selected";?>>Querétaro</option>
				<option value="Quintana Roo" <?php if('Quintana Roo' == $estadoSelect) echo "selected";?>>Quintana Roo</option>
				<option value="San Luis Potosi" <?php if('San Luis Potosi' == $estadoSelect) echo "selected";?>>San Luis Potosí</option>
				<option value="Sinaloa" <?php if('Sinaloa' == $estadoSelect) echo "selected";?>>Sinaloa</option>
				<option value="Sonora" <?php if('Sonora' == $estadoSelect) echo "selected";?>>Sonora</option>
				<option value="Tabasco" <?php if('Tabasco' == $estadoSelect) echo "selected";?>>Tabasco</option>
				<option value="Tamaulipas" <?php if('Tamaulipas' == $estadoSelect) echo "selected";?>>Tamaulipas</option>
				<option value="Tlaxcala" <?php if('Tlaxcala' == $estadoSelect) echo "selected";?>>Tlaxcala</option>
				<option value="Veracruz de Ignacio de la Llave" <?php if('Veracruz de Ignacio de la Llave' == $estadoSelect) echo "selected";?>>Veracruz de Ignacio de la Llave</option>
				<option value="Yucatan" <?php if('Yucatan' == $estadoSelect) echo "selected";?>>Yucatán</option>
				<option value="Zacatecas" <?php if('Zacatecas' == $estadoSelect) echo "selected";?>>Zacatecas</option>
			</select>
			</div>

			</div>

			<div class="row">

			<div class="form-group col-xs-7">
			<label for="referencia"><h4><b>Referencias:</b></h4></label>
			<input class="form-control" type="text" name="referencia" value="<?php echo $usuario->getReferencia() ?>" required id="referencia"/>
			</div>

			<div class="form-group col-xs-5">
			<label for="email"><h4><b>Email:</b></h4></label>
			<input class="form-control" type="email" name="email" value="<?php echo $usuario->getEmail() ?>" required id="email"/>
			</div>

			</div>

			<input type="hidden" name="password" value="<?php echo $usuario->getPassword() ?>" required />
			<input type="hidden" name="estatus" value="<?php if ($usuario->getIdUsuario()) {echo $usuario->getEstatus(); }else{ echo '1';} ?>" required />
			<input type="hidden" name="privilegios" value="<?php if ($usuario->getIdUsuario()) {echo $usuario->getPrivilegios(); }else{ echo '1';} ?>" required />
			<br>
			<center><a href="carrito.php" class="btn btn-danger">Cancelar</a>
			<input type="submit" value="Continuar" class="btn btn-success" /></center>
		</form>
	</div>
	<div class="col-xs-1"></div>
</div>
<?php 
include('template/footer.php');
?>
