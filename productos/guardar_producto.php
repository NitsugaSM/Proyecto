<?php  
	require_once '../class/Producto.php';
	require_once '../class/Categoria.php';
	$categoria = Categoria::recuperarTodos();
	include('../template/header.php');

	$idProducto = (isset($_REQUEST['idProducto'])) ? $_REQUEST['idProducto'] : null;
	$url2 = (isset($_REQUEST['url2'])) ? $_REQUEST['url2'] : null;
	

	if ($idProducto) {
		
		$producto = Producto::buscarPorId($idProducto);
	}else{
		$producto = new Producto();
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if ($_FILES['url']['name'] != null){

			if ($_FILES['url']['type'] == 'image/jpg' || $_FILES['url']['type'] == 'image/jpeg' || $_FILES['url']['type'] == 'image/png') {
				
				$rutaServidor = 'uploads';
				$rutaTemporal = $_FILES['url']['tmp_name'];
				$nombreImagen = $_FILES['url']['name'];
				$rutaDestino = $rutaServidor.'/'.$nombreImagen;
				move_uploaded_file($rutaTemporal, $rutaDestino);

				
			}

		}else{
			$rutaDestino = $url2;
		}
		
		$nombreProducto = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : null;
		$precio = (isset($_POST['precio'])) ? $_POST['precio'] : null;
		$stock = (isset($_POST['stock'])) ? $_POST['stock'] : null;
		$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
		$idCategoria = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : null;
		
		$producto->setIdCategoria($idCategoria);
		$producto->setUrl($rutaDestino);
		$producto->setNombreProducto($nombreProducto);
		$producto->setPrecio($precio);
		$producto->setStock($stock);
		$producto->setDescripcion($descripcion);
					

		if(ctype_space($nombreProducto)){
    		echo '<script> 
				alert("ingresa un nombre "); 
				window.location.href="guardar_producto.php";
			</script>';
			}
		if(ctype_space($precio)){
    		echo '<script> 
				alert("ingresa un precio "); 
				window.location.href="guardar_producto.php";
			</script>';
			}
	    if(!is_numeric($precio)){
    		echo '<script> 
				alert("utiliza unicamente numeros en precio "); 
				window.location.href="guardar_producto.php";
			</script>';
			}
		if(ctype_space($stock)){
    		echo '<script> 
				alert("ingresa un precio "); 
				window.location.href="guardar_producto.php";
			</script>';
			}
	    if(!is_numeric($stock)){
    		echo '<script> 
				alert("utiliza unicamente numeros en precio "); 
				window.location.href="guardar_producto.php";
			</script>';
			}
		if(ctype_space($descripcion)){
    		echo '<script> 
				alert("ingresa una descripcion "); 
				window.location.href="guardar_producto.php";
			</script>';
			}
		else{
			$producto->guardar();
		}



		//echo $producto->getIdCategoria();
		//echo $producto->getUrl();
		//echo $producto->getNombreProducto();
		//echo $producto->getPrecio();
		//echo $producto->getStock();
		//echo $producto->getDescripcion();
		header('Location: index.php');
			
		
		
	}else{
?>

<div class="row">
	<div class="col-xs-12">
		<h1>Guardar Producto</h1>
		<form method="post" action="guardar_producto.php" enctype="multipart/form-data">
			<?php if ($producto->getIdProducto()): ?>
				<input type="hidden" name="idProducto" value="<?php echo $producto->getIdProducto() ?>"/>
			<?php endif; ?>
			<label>Imagen</label>
			<?php if ($producto->getIdProducto() !=null) { ?>
				<img src="<?php echo $producto->getUrl() ?>"height="100" width="100">
			<?php } ?>
			<input type="file" name="url" value="<?php echo $producto->getUrl() ?>"/>
			<br>
			<input type="text" name="url2" value="<?php echo $producto->getUrl() ?>" />
			<br>
			<label>Nombre</label>
			<input type="text" name="nombreProducto" value="<?php echo $producto->getNombreProducto() ?>" required />
			<br>
			<label>Precio</label>
			<input type="text" name="precio" value="<?php echo $producto->getPrecio() ?>" required />
			<br>
			<label>Stock</label>
			<input type="text" name="stock" value="<?php echo $producto->getStock() ?>" required />
			<br>
			<label>Descripción</label>
			<input type="text" name="descripcion" value="<?php echo $producto->getDescripcion() ?>" required />
			<br>
			<label for="team">Categoría</label>
			<select name="idCategoria" id="team">
          		<option value="">--Seleccione categoría--</option>
          		<?php           
            	$categoriaSelec=$producto->getIdCategoria();
            	foreach ($categoria as $item):
          		?>
            	<option value = "<?php echo $item['idCategoria']; ?>"<?php if($item['idCategoria']==$categoriaSelec) echo "selected";?>>
              	<?php echo $item['nombreCategoria'];?></option>
          		<?php
            	endforeach;
          		?>
      		</select></br>
			
			<input type="submit" value="Guardar"/>
			<a href="index.php">Cancelar</a>
		</form>
		<?php  } ?>
	</div>
</div>
<?php 
include('../template/footer.php');
?>