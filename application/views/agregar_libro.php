<div class="error">
    <?php echo validation_errors(); ?>
</div>

<br><br>
<h1>Agregar libro</h1>
<br>

<?php
    // Atributos para el formulario
    $atributos = array('class' => 'form-control', 'id' => 'agregar_libro');
    echo form_open_multipart("Libros_controlador/agregarbd", $atributos);
?>

<!-- Campo para ingresar el título del libro -->
<label for="titulov">Título:</label>
<input type="text" class="form-control" name="titulov" placeholder="Escribe el título" required>

<!-- Campo para ingresar el ISBN del libro -->
<label for="isbnv">ISBN:</label>
<input type="text" class="form-control" name="isbnv" placeholder="Escribe el ISBN" required>

<!-- Campo para ingresar la ubicación del libro -->
<label for="ubicacionv">Ubicación:</label>
<input type="text" class="form-control" name="ubicacionv" placeholder="Escribe la ubicación" required>

<!-- Campo para ingresar el código Cutter -->
<label for="codigocutterv">Código Cutter:</label>
<input type="text" class="form-control" name="codigocutterv" placeholder="Escribe el código Cutter" required>

<!-- Campo para ingresar la cantidad de ejemplares -->
<div class="form-group">
    <label for="cantidad_ejemplares">Cantidad de ejemplares:</label>
    <input type="number" name="cantidad_ejemplares" class="form-control" id="cantidad_ejemplares" required min="1">
</div>



<!-- Selección de la categoría -->
<label for="categoria_idv">Categoría:</label>
<select name="categoria_idv" class="form-control" required>
    <option value="">Selecciona la categoría</option>
    <?php foreach ($categorias as $categoria): ?>
        <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombrecategoria; ?></option>
    <?php endforeach; ?>
</select>

<!-- Selección de la editorial -->
<label for="editorial_idv">Editorial:</label>
<select name="editorial_idv" class="form-control" required>
    <option value="">Selecciona la editorial</option>
    <?php foreach ($editoriales as $editorial): ?>
        <option value="<?php echo $editorial->id; ?>"><?php echo $editorial->nombreeditorial; ?></option>
    <?php endforeach; ?>
</select>

<!-- Selección de los autores (múltiple) -->
<label for="autor_idv">Autores:</label>
<select name="autor_idv[]" class="form-control" multiple required>
    <?php foreach ($autores as $autor): ?>
        <option value="<?php echo $autor->id; ?>"><?php echo $autor->nombreautor; ?></option>
    <?php endforeach; ?>
</select>


<!-- Botón para enviar el formulario -->
<button type="submit" class="btn btn-success">Agregar libro</button>

<?php
    echo form_close();
?>
