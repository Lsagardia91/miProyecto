<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('template/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('template/plugins/summernote/summernote-bs4.min.css'); ?>">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?php echo base_url('template/custom/style.css'); ?>">

</head>
<body>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url('template/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"> <i class="fas fa-bars"></i> </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url('index.php/Usuarios_controlador/index'); ?>" class="nav-link">Catalogo</a>
      </li>
  
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- PARA EL USUARIO -->
       <!-- User Account Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i> <!-- Ícono de usuario -->
          <span><?php echo $this->session->userdata('nombres'); ?></span> <!-- Mostrar nombre del usuario -->
          <i class="fas fa-caret-down ml-1"></i> <!-- Ícono de desplegable -->
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="<?php echo base_url('index.php/Usuarios_controlador/modificardatosperfil'); ?>" class="dropdown-item">
            <i class="fas fa-user-edit mr-2"></i> Actualizar Perfil
          </a>
          <a href="<?php echo base_url('index.php/Usuarios_controlador/cambiarcontrasena'); ?>" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Cambiar Contraseña
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('index.php/Login_controlador/cerrarsesion'); ?>" class="dropdown-item text-danger">
            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
          </a>
        </div>
      </li>
      <!-- End of User Account Dropdown -->
       <!-- -----------PARA EL USUARIO -->
    </ul>
  </nav>
  <!-- /.navbar -->
</div>
<!-- ./wrapper -->

<!-- Include JavaScript files here -->

</body>
</html>

