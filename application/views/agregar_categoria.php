<h1>Agregar Categoría</h1>
<?php echo form_open('Categoria_controlador/agregarCategoria'); ?>
    <div class="form-group">
        <label for="nombrecategoria">Nombre de la Categoría:</label>
        <input type="text" class="form-control" name="nombrecategoria" placeholder="Nombre de la Categoría" required>
    </div>
    <div class="form-group">
        <label for="codigodewey">Código Dewey:</label>
        <input type="text" class="form-control" name="codigodewey" placeholder="Código Dewey">
    </div>
    <button type="submit" class="btn btn-primary">Agregar Categoría</button>
<?php echo form_close(); ?>
