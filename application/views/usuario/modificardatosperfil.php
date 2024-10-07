<h1>Editar Usuario</h1>
<br>
<?php
// Verifica si hay datos para mostrar
if (empty($usuario)) {
    echo "<p>No se encontró el usuario.</p>";
    return;
}

// Mostrar mensajes de error
echo validation_errors('<div class="alert alert-danger">', '</div>');

// Abrir el formulario para la actualización del perfil
echo form_open_multipart("Usuarios_controlador/actualizar_perfil"); 
?>
<input type="hidden" name="id" value="<?php echo $usuario->id; ?>">

<div class="form-group">
    <label for="carnetidentidad">Carnet de Identidad</label>
    <input type="text" class="form-control" id="carnetidentidad" name="carnetidentidad" placeholder="Escribe el carnet de identidad" value="<?php echo set_value('carnetidentidad', $usuario->carnetidentidad); ?>" required>
</div>

<div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escribe el nombre" value="<?php echo set_value('nombres', $usuario->nombres); ?>" required>
</div>

<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escribe los apellidos" value="<?php echo set_value('apellidos', $usuario->apellidos); ?>" required>
</div>

<div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Escribe la dirección" value="<?php echo set_value('direccion', $usuario->direccion); ?>" required>
</div>

<div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Escribe el teléfono" value="<?php echo set_value('telefono', $usuario->telefono); ?>" required>
</div>

<div class="form-group">
    <label for="email">Correo Electrónico</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu correo electrónico" value="<?php echo set_value('email', $usuario->email); ?>" required>
</div>

<div class="form-group">
    <label for="coluniins">Colegio/Univ/Inst</label>
    <input type="text" class="form-control" id="coluniins" name="coluniins" placeholder="Escribe el estado" value="<?php echo set_value('coluniins', $usuario->coluniins); ?>" required>
</div>

<div class="form-group">
    <label for="username">Usuario</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Escribe el usuario" value="<?php echo set_value('username', $usuario->username); ?>" required>
</div>

<div class="form-group">
    <label for="rol">Rol</label>
    <select class="form-control" id="rol" name="rol" required>
        <option value="administrador" <?php echo ($usuario->rol == 'administrador') ? 'selected' : ''; ?>>Administrador</option>
        <option value="bibliotecario" <?php echo ($usuario->rol == 'bibliotecario') ? 'selected' : ''; ?>>Bibliotecario</option>
    </select>
</div>
<!-- Nuevo campo para la foto -->
<div class="form-group">
    <label for="foto">Foto de Perfil</label>
    <input type="file" class="form-control" id="foto" name="foto">
</div>

<button type="submit" class="btn btn-success">Modificar Usuario</button>
<?php echo form_close(); ?>
