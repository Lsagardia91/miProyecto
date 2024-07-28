<br><br>
<h1>Agregar libro</h1>
<br>

<?php
echo form_open_multipart("c_libro/agregarbd");
?>

<input type="text" class="form-control" name="titulov" placeholder="Escribe el titulo" required>
<input type="text" class="form-control" name="autorv" placeholder="Escribe el autor" minlength="3" maxlength="20" required>
<input type="number" class="form-control" name="isbnv" placeholder="Escribe isbn" required>
<input type="text" class="form-control" name="categoriav" placeholder="Escribe la categoria" required>
<input type="number" class="form-control" name="numeroPaginasv" placeholder="Escribe el numero de papinas" required>
<input type="tex" class="form-control" name="editorialv" placeholder="Escribe la editorial" required>
<input type="number" class="form-control" name="anioPublicacion" placeholder="Escribe cuando fue publicado" required>


<button type="submit" class="btn btn-success">Agregar libro</button>
	
<?php
echo form_close();
?>