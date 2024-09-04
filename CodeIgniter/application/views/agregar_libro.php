<div class="error">
          <?php
           echo validation_errors();
          ?>
        </div>


<br><br>
<h1>Agregar libro</h1>
<br>
<?php
      $atributos=array('class'=>'form-control','id'=>'agregar_libro');
      ?>

<?php
echo form_open_multipart("Libros_controlador/agregarbd",$atributos);
?>

<input type="text" class="form-control" name="titulov" placeholder="Escribe el titulo" required>
<input type="text" class="form-control" name="autorv" placeholder="Escribe el autor" minlength="3" maxlength="20" required>
<input type="text" class="form-control" name="isbnv" placeholder="Escribe isbn" required>
<input type="number" class="form-control" name="anioPublicacionv" placeholder="Escribe cuando fue publicado" required>
<input type="text" class="form-control" name="categoriav" placeholder="Escribe la categoria" required>
<input type="text" class="form-control" name="ubicacionv" placeholder="Escribe la ubicacion" required>
<input type="tex" class="form-control" name="editorialv" placeholder="Escribe la editorial" required>
<input type="number" class="form-control" name="deweyv" placeholder="Escribe el codigo deway" required>
<input type="text" class="form-control" name="cutterv" placeholder="Escribe el codigo cutter " required>
<button type="submit" class="btn btn-success">Agregar libro</button>
	
<?php
echo form_close();
?>