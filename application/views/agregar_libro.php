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
<input type="text" class="form-control" name="isbnv" placeholder="Escribe isbn" required>
<input type="text" class="form-control" name="ubicacionv" placeholder="Escribe la ubicacion" required>
<input type="text" class="form-control" name="codigocutterv" placeholder="Escribe el codigo cutter " required>
<input type="number" class="form-control" name="categoria_idv" placeholder="Escribe la categoria" required>
<input type="number" class="form-control" name="editorial_idv" placeholder="Escribe la editorial" required>
<button type="submit" class="btn btn-success">Agregar libro</button>
	
<?php
echo form_close();
?>