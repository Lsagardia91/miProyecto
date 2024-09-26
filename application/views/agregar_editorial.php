<h1>Agregar Editorial</h1>
<?php echo form_open('Editorial_controlador/agregarEditorial'); ?>
    <div class="form-group">
        <label for="nombreeditorial">Nombre de la Editorial:</label>
        <input type="text" class="form-control" name="nombreeditorial" placeholder="Nombre de la Editorial" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Editorial</button>
<?php echo form_close(); ?>
