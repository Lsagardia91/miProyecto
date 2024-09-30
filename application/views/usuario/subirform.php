<br><br>
<h1>Subir fotografia</h1>
<br>

<?php
echo form_open_multipart("Usuarios_controlador/subir"); 
?>

<input type="hidden" class="form-control" name="idusuario" value="<?php echo $arrayidusuario;?>">
<input type="file" name="userfile">
<button type="submit" class="btn btn-primary">Subir</button>
	
<?php
echo form_close();
?>