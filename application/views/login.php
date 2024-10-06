<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eLibroCocha</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('template/dist/css/adminlte.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('template/custom/style.css'); ?>">

</head>
<body class="hold-transition colordefondo">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('template/index2.html'); ?>"><b>eLibroCocha</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card ">
    <div class="card-body login-card-body fondo">
      <p class="login-box-msg">Ingresa tu usuario y contraseña</p>

        <?php echo form_open('username/validarusuario'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username"placeholder="Ingresar usuario" required>
          <div class="input-group-append">
          <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Ingresar contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
    <!-- Botón para Iniciar Sesión -->
    <div class="col-6">
        <!-- Aquí podrías añadir algún contenido o dejar la columna vacía para diseño -->
    </div>
    <div class="col-6 d-flex flex-column align-items-center">
    <button type="submit" class="btn btn-custom btn-block mb-2">Iniciar Sesión</button>
    <a href="<?php echo base_url(); ?>index.php/Usuarios_controlador/recuperarcontra" class="btn btn-custom btn-block">Recuperar Contraseña</a>
</div>



    <!-- /.col -->

   
</div>

      </form>
      
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('template/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('template/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
