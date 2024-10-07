<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Actualizado</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h1>Perfil Actualizado</h1>
        <div class="alert alert-success">
            <strong>¡Éxito!</strong> Tu perfil ha sido actualizado correctamente.
        </div>
        <a href="<?php echo base_url('Usuarios_controlador/modificardatosperfil'); ?>" class="btn btn-primary">Volver a editar perfil</a>
        <a href="<?php echo base_url('Usuarios_controlador/m_listar'); ?>" class="btn btn-secondary">Ir al Dashboard</a>
    </div>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
