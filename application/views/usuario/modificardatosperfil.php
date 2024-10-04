<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Perfil</title>
    <!-- Incluir tus archivos CSS, como Bootstrap o AdminLTE -->
    <link rel="stylesheet" href="<?php echo base_url('template/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('template/dist/css/adminlte.min.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Modificar Datos de Perfil</h1>
        
        <!-- Formulario para modificar perfil -->
        <form action="<?php echo base_url('index.php/Usuarios_controlador/actualizar_perfil'); ?>" method="post">
            <!-- Cargar los datos del usuario desde la base de datos -->
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo set_value('nombres', $usuario->nombres); ?>" required>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo set_value('apellidos', $usuario->apellidos); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $usuario->email); ?>" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value('direccion', $usuario->direccion); ?>">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono', $usuario->telefono); ?>">
            </div>

            <!-- Botón para actualizar perfil -->
            <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
        </form>
    </div>

    <!-- Incluir tus archivos JavaScript, como Bootstrap o AdminLTE -->
    <script src="<?php echo base_url('template/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
