<br><br>
<h1>Editar Libro</h1>
<br>  

<?php
if ($infolibro->num_rows() > 0) {
    $row = $infolibro->row(); // Obtén el primer (y único) resultado
?>

<?php echo form_open_multipart("Libros_controlador/modificarbd"); ?>
<input type="hidden" name="idlibro" value="<?php echo $row->id; ?>">

<!-- Campo para ingresar el título del libro -->
<label for="titulov">Título:</label>
<input type="text" class="form-control" name="titulov" placeholder="Escribe el título" value="<?php echo $row->titulo; ?>" required>

<!-- Campo para ingresar el ISBN del libro -->
<label for="isbnv">ISBN:</label>
<input type="text" class="form-control" name="isbnv" placeholder="Escribe el ISBN" value="<?php echo $row->isbn; ?>" required>  

<!-- Campo para ingresar la ubicación del libro -->
<label for="ubicacionv">Ubicación:</label>
<input type="text" class="form-control" name="ubicacionv" placeholder="Escribe la ubicación" value="<?php echo $row->ubicacion; ?>" required>

<!-- Campo para ingresar el código Cutter -->
<label for="codigocutterv">Código Cutter:</label>
<input type="text" class="form-control" name="codigocutterdeweyv" placeholder="Escribe el código Cutter" value="<?php echo $row->codigocutterdewey; ?>" required>

<!-- Selección de la categoría -->
<label for="categoria_idv">Categoría:</label>
<select name="categoria_idv" class="form-control" required>
    <option value="">Selecciona la categoría</option>
    <?php foreach ($categorias as $categoria): ?>
        <option value="<?php echo $categoria->id; ?>" <?php echo ($row->categoria_id == $categoria->id) ? 'selected' : ''; ?>>
            <?php echo $categoria->nombrecategoria; ?>
        </option>
    <?php endforeach; ?>
</select>

<!-- Selección de la editorial -->
<label for="editorial_idv">Editorial:</label>
<select name="editorial_idv" class="form-control" required>
    <option value="">Selecciona la editorial</option>
    <?php foreach ($editoriales as $editorial): ?>
        <option value="<?php echo $editorial->id; ?>" <?php echo ($row->editorial_id == $editorial->id) ? 'selected' : ''; ?>>
            <?php echo $editorial->nombreeditorial; ?>
        </option>
    <?php endforeach; ?>
</select>

<!-- Selección de los autores (múltiple) -->
<label for="autor_idv">Autores:</label>
<select name="autor_idv[]" class="form-control" multiple required>
    <?php foreach ($autores as $autor): ?>
        <option value="<?php echo $autor->id; ?>" <?php echo in_array($autor->id, array_column($autoresSeleccionados, 'id')) ? 'selected' : ''; ?>>
            <?php echo $autor->nombreautor; ?>
        </option>
    <?php endforeach; ?>
</select>


<!-- Botón para enviar el formulario -->
<button type="submit" class="btn btn-success">Modificar libro</button>

<?php
echo form_close();
} else {
    echo "<p>No se encontró el libro que deseas modificar.</p>";
}
?>
