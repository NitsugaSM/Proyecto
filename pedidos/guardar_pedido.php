<?php  
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
	require_once '../class/Pedido.php';
	include('../template/header.php');

	$idPedido = (isset($_REQUEST['idPedido'])) ? $_REQUEST['idPedido'] : null;
	

	if ($idPedido) {
		$pedido = Pedido::buscarPorId($idPedido);
	}else{
		$Pedido = new Pedido();
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : null;
		$producto = (isset($_POST['producto'])) ? $_POST['producto'] : null;
		$total = (isset($_POST['total'])) ? $_POST['total'] : null;
		$metodoPago = (isset($_POST['metodoPago'])) ? $_POST['metodoPago'] : null;
		$metodoEnvio = (isset($_POST['metodoEnvio'])) ? $_POST['metodoEnvio'] : null;
		$fechaPedido = (isset($_POST['fechaPedido'])) ? $_POST['fechaPedido'] : null;
		$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : null;
		$pedido->setIdUsuario($idUsuario);
		$pedido->setProducto($producto);
		$pedido->setTotal($total);
		$pedido->setMetodoPago($metodoPago);
		$pedido->setMetodoEnvio($metodoEnvio);
		$pedido->setFechaPedido($fechaPedido);
		$pedido->setEstatus($estatus);
		$pedido->guardar();
		header('Location: index.php');
	}
?>

<div class="row">
	<div class="col-xs-12">
		<h1>Guardar Pedido</h1>
		<form method="post" action="guardar_pedido.php">
			<?php if ($pedido->getIdPedido()): ?>
				<input type="hidden" name="idPedido" value="<?php echo $pedido->getIdPedido() ?>"/>
			<?php endif; ?>
			<label>Usuario</label>
			<input type="text" name="idUsuario" value="<?php echo $pedido->getIdUsuario() ?>" required />
			<br>
			<label>Producto(s)</label>
			<input type="text" name="producto" value="<?php echo $pedido->getProducto() ?>" required />
			<br>
			<label>Total</label>
			<input type="text" name="total" value="<?php echo $pedido->getTotal() ?>" required />
			<br>
			<label>Método de pago</label>
			<input type="text" name="metodoPago" value="<?php echo $pedido->getMetodoPago() ?>" required />
			<br>
			<label>Método de envío</label>
			<input type="text" name="metodoEnvio" value="<?php echo $pedido->getMetodoEnvio() ?>" required />
			<br>
			<label>Fecha del pedido</label>
			<input type="text" name="fechaPedido" value="<?php echo $pedido->getFechaPedido() ?>" required />
			<br>
			<label for="estatus">Estatus</label>
			<select name="estatus" id="estatus">
  				<option velue="">Default select</option>
  				<?php           
		            $estatusSelect = $pedido->getEstatus();
		          ?>
  				<option value="En proceso" <?php if('En proceso' == $estatusSelect) echo "selected";?> >En proceso</option>
  				<option value="Enviado" <?php if('Enviado' == $estatusSelect) echo "selected";?> >Enviado</option>
  				<option value="Completado" <?php if('Completado' == $estatusSelect) echo "selected";?> >Completado</option>
			</select>
			<br>
			<input type="submit" value="Guardar"/>
			<a href="index.php">Cancelar</a>
		</form>
	</div>
</div>
<?php 
include('../template/footer.php');
	}
}
?>