<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f0f2f5;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .progress-bar {
            background-color: #28a745;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .footer-logo {
            width: 80px;
        }
    </style>
</head>

<body style="background-color: #ecffef;">

<div class="container mt-5">
    <!-- Cuadro con sombra para el formulario -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="text-center mb-4">Restablecer Contraseña</h3>

                <!-- Barra de progreso del proceso -->
                <div class="progress" style="height: 30px;">
                    <!-- Primera etapa: completada -->
                    <div class="progress-bar bg-success" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
                        1. Verificar correo electrónico
                    </div>
                    <!-- Segunda etapa: en proceso -->
                    <div class="progress-bar bg-success" role="progressbar" style="width: 33%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
                        2. Restablecer la contraseña
                    </div>
                    <!-- Tercera etapa: pendiente -->
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 34%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        3. Finalizado
                    </div>
                </div>

                <!-- Mostrar mensajes de error -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulario de restablecimiento de contraseña -->
                <form action="<?php echo site_url('Usuarios_controlador/procesar_nueva_contrasena'); ?>" method="post">
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    
                    <div class="form-group">
                        <label for="new_password"><i class="fas fa-lock"></i> Nueva Contraseña</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password"><i class="fas fa-lock"></i> Confirmar Contraseña</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-custom btn-block"><i class="fas fa-check"></i> Restablecer Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pie de página moderno -->
<footer class="text-center mt-5 bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <!-- Sección de contacto -->
            <div class="col-sm-4 mb-3">
                <h5>Contacto</h5>
                <p>
                    <i class="fas fa-envelope"></i> 
                    <a href="mailto:info@gmail.com" class="text-light">info@gmail.com</a>
                </p>
                <p>
                    <i class="fas fa-phone"></i> 
                    <a href="tel:+1234567890" class="text-light">+591 63960834</a>
                </p>
            </div>
            <!-- Sección del logo -->
            <div class="col-sm-4 mb-3">
                <img src="<?php echo base_url(); ?>/adminlte/dist/img/logo.jpg" alt="Logo" class="footer-logo mb-3">
                <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
            </div>
            <!-- Sección de redes sociales -->
            <div class="col-sm-4 mb-3">
                <h5>Síguenos</h5>
                <a href="#" class="text-light mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-light mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-light mx-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-light mx-2">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Incluir Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<!-- Scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


