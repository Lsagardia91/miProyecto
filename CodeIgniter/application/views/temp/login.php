<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo base_url('template/assets/icons/book.ico');?>" />
    <script src="<?php echo base_url('template/js/sweet-alert.min.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('template/css/sweet-alert.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/material-design-iconic-font.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/normalize.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/jquery.mCustomScrollbar.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/login.css');?>"/>
    <script src="<?php echo base_url('template/ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');?>"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('template/js/jquery-1.11.2.min.js');?>"><\/script>')</script>
    <script src="<?php echo base_url('template/js/modernizr.js');?>"></script>
    <script src="<?php echo base_url('template/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('template/js/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?php echo base_url('template/js/main.js');?>"></script>
</head>
<body class="full-cover-background" style="background-image:url('<?php echo base_url('template/assets/img/portada.jpg');?>');">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
           <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
       </p>
       <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>
       <?php
       echo form_open_multipart("usuarios/validarusuario");
       ?>
            <div class="group-material-login">
              <input type="text" class="material-login-control" name="login" placeholder="Escribe login" required>
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-account"></i> &nbsp; USUARIO</label>
            </div><br>
            <div class="group-material-login">
              <input type="password" class="material-login-control" name="password" placeholder="Escribe password" required>
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; CONTRASEÑA</label>
            </div>
            <button class="btn-login" type="submit">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
       <?php
       echo form_close();
       ?>
    </div>  
</body>
</html>




