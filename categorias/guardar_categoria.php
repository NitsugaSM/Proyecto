<?php  
session_start();
if ($_SESSION) {

	if ($_SESSION['privilegios'] == 1) {
	require_once '../class/Categoria.php';
	include('../template/header.php');

	$idCategoria = (isset($_REQUEST['idCategoria'])) ? $_REQUEST['idCategoria'] : null;
	

	if ($idCategoria) {
		$categoria = Categoria::buscarPorId($idCategoria);
	}else{
		$categoria = new Categoria();
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nombreCategoria = (isset($_POST['nombreCategoria'])) ? $_POST['nombreCategoria'] : null;
		$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
		$categoria->setNombreCategoria($nombreCategoria);
		$categoria->setDescripcion($descripcion);
			if(ctype_space($nombreCategoria)){
    	echo '<script> 
				alert("ingresa un nombre valido"); 
				window.location.href="guardar_categoria.php";
			</script>';
		}
		if(ctype_space($descripcion)){
    	echo '<script> 
				alert("ingresa una descripcion valido"); 
				window.location.href="guardar_categoria.php";
			</script>';
		}
		else{
		$categoria->guardar();
		header('Location: index.php');
		}
	}
?>

<div class="row">
	<div class="col-xs-12">
		<h1>Guardar Categoría</h1>
		<form method="post" action="guardar_categoria.php">
			<?php if ($categoria->getIdCategoria()): ?>
				<input type="hidden" name="idCategoria" value="<?php echo $categoria->getIdCategoria() ?>"/>
			<?php endif; ?>
			<label>Nombre</label>
			<input type="text" name="nombreCategoria" value="<?php echo $categoria->getNombreCategoria() ?>" required />
			<br>
			<label>Descripción</label>
			<input type="text" name="descripcion" value="<?php echo $categoria->getDescripcion() ?>" required />
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