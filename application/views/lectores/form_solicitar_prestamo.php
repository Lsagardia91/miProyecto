<h1>Solicitud de Préstamo</h1>

<p>Por favor, llene sus datos para completar la solicitud de préstamo.</p>

<?php echo form_open('Lector_controlador/procesarSolicitudPrestamo'); ?>
    <input type="hidden" name="libro_id" value="<?php echo $libro_id; ?>" />

    <div class="form-group">
        <label for="nombre_lector">Nombre Completo</label>
        <input type="text" class="form-control" id="nombre_lector" name="nombre_lector" required />
    </div>

    <div class="form-group">
        <label for="ci_lector">Carnet de Identidad</label>
        <input type="text" class="form-control" id="ci_lector" name="ci_lector" required />
    </div>

    <div class="form-group">
        <label for="email_lector">Correo Electrónico</label>
        <input type="email" class="form-control" id="email_lector" name="email_lector" required />
    </div>

    <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
<?php echo form_close(); ?>
