<br><br>
<h1>Subir fotografia</h1>
<br>

<?php
echo form_open_multipart("estudiante/subir"); 
?>

<input type="text" class="form-control" name="idestudiante" value="<?php echo $arrayidEstudiante;?>">
<input type="file" name="userfile">
<button type="submit" class="btn btn-primary">Subir</button>
	
<?php
echo form_close();
?>