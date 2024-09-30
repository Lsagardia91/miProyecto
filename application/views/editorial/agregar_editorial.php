<h1>Agregar Editorial</h1>
<?php echo form_open('Editorial_controlador/agregarbd'); ?>
    <div class="form-group">
        <label for="nombreeditorial">Nombre de la Editorial:</label>
        <input type="text" class="form-control" name="nombreeditorialv" placeholder="Nombre de la editorial" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Editorial</button>
<?php echo form_close(); ?>
