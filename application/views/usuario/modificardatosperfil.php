<h1>Editar Usuario</h1>
<br>  
<?php
foreach($usuario as $row)
{
?>  
    <?php echo form_open_multipart("Usuarios_controlador/actualizar_perfil"); ?>
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

    <div class="form-group">
        <label for="carnetidentidad">Carnet de Identidad</label>
        <input type="text" class="form-control" id="carnetidentidad" name="carnetidentidadv" placeholder="Escribe el carnet de identidad" value="<?php echo set_value('carnetidentidadv', $row->carnetidentidad); ?>" required>
    </div>

    <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombresv" placeholder="Escribe el nombre" value="<?php echo set_value('nombresv', $row->nombres); ?>" required>
    </div>

    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidosv" placeholder="Escribe los apellidos" value="<?php echo set_value('apellidosv', $row->apellidos); ?>" required>
    </div>

    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccionv" placeholder="Escribe la dirección" value="<?php echo set_value('direccionv', $row->direccion); ?>" required>
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefonov" placeholder="Escribe el teléfono" value="<?php echo set_value('telefonov', $row->telefono); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="emailv" placeholder="Escribe tu correo electrónico" value="<?php echo set_value('emailv', $row->email); ?>" required>
    </div>

    <div class="form-group">
        <label for="coluniins">Colegio/Univ/Inst</label>
        <input type="text" class="form-control" id="coluniins" name="coluniinsv" placeholder="Escribe el estado" value="<?php echo set_value('coluniinsv', $row->coluniins); ?>" required>
    </div>

    <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" class="form-control" id="username" name="usernamev" placeholder="Escribe el usuario" value="<?php echo set_value('usernamev', $row->username); ?>" required>
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="passwordv" placeholder="Escribe la contraseña (dejar vacío si no se quiere cambiar)">
    </div>

    <div class="form-group">
        <label for="rol">Rol</label>
        <select class="form-control" id="rol" name="rolv" required>
            <option value="administrador" <?php echo ($row->rol == 'administrador') ? 'selected' : ''; ?>>Administrador</option>
            <option value="bibliotecario" <?php echo ($row->rol == 'bibliotecario') ? 'selected' : ''; ?>>Bibliotecario</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Modificar Usuario</button>

    <?php echo form_close(); ?>
<?php
}
?> 
