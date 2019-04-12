<?php
include_once('template/header.php');
require_once('admin/class/Producto.php');
$productos = Producto::recuperarTodos();
?>
<br>
<center>
<div class="row">
	<div class="col-xs-12">
	<br>
	<h1>Tienda</h1>
	<br>
	</div>

	<?php  
	if(count($productos)>0):

		foreach ($productos as $item):
	?>

 	<div class="col-xs-12 col-sm-4">
 		<div class="main">
 		<div class="view view-fifth">
                    <img src="admin/productos/<?php echo $item['url']?>" style="width:50%" class="center-block">                    <div class="mask">
                    	<br>
                        <h3 class="text-center"> <?php echo $item['nombreProducto']; ?> </h3>
                        <br>
                        <h4 class="text-center">$ <?php echo $item['precio']; ?></h4>
                        <br>
                        <form action="carrito.php" method="post">
 			
				 			<input type="hidden" name="idProducto" value="<?php echo $item['idProducto'] ?>">
				 			<input type="hidden" name="url" value="<?php echo $item['url'] ?>">
				 			<input type="hidden" name="nombreProducto" value="<?php echo $item['nombreProducto'] ?>">
				 			<input type="hidden" name="precio" value="<?php echo $item['precio'] ?>">
				 			<input type="hidden" name="stock" value="<?php echo $item['stock'] ?>">
				 			<input type="hidden" name="cantidad" value="1">
				 			<input type="submit" value="Agregar al carrito" class="btn btn-success center-block">

				 		</form>
                    </div>
                </div>
            </div>
 		
 		

 		

 		

 		

 	</div>

 	<?php 

 		endforeach;

 	else:

 		echo '<p class="alert alert-warning">No hay productos</p>';
 	endif;
 	?>

 </div>
</center>

<?php 
include_once('template/footer.php');
?>