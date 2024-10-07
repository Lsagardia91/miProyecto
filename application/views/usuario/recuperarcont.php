<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="<?php echo base_url('template/assets/css/bootstrap.min.css'); ?>">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-bottom: none;
            border-radius: 12px 12px 0 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control {
            border-radius: 8px;
        }
        .container {
            margin-top: 50px;
        }
        .card-footer a {
            color: #007bff;
        }
        .card-footer a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Recuperar Contraseña</h3>
                </div>
                <div class="card-body">
                    <p class="text-center">Introduce tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>
                    
                    <?php echo form_open('Usuarios_controlador/recuperarcontra'); ?>

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu correo electrónico" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Enviar enlace de recuperación</button>

                    <?php echo form_close(); ?>
                </div>
                <div class="card-footer text-center">
                    <a href="<?php echo base_url(); ?>index.php/Username/index">Volver a Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('template/assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
