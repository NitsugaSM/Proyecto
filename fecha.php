<form>
	
	<label>Email</label>
	<input type="email" name="email"><br>
	<label>Mensaje</label>
	<textarea name="mensaje" cols="16" rows="4"></textarea><br>
	<input type="hidden" name="fecha" value="<?php echo date('d-m-Y') ?>">
	<input type="hidden" name="estatus" value="0">
	<input type="submit" name="Enviar comentario">

</form>