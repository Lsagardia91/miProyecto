<!DOCTYPE html>
<html lang="es">
<head>
    <title>Agregar Libro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo base_url('template/assets/icons/book.ico'); ?>" />
    <script src="<?php echo base_url('template/js/sweet-alert.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('template/css/sweet-alert.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/material-design-iconic-font.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/jquery.mCustomScrollbar.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/style.css'); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('template/js/jquery-1.11.2.min.js'); ?>"><\/script>')</script>
    <script src="<?php echo base_url('template/js/modernizr.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/main.js'); ?>"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <!-- Menú lateral -->
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                Sistema Bibliotecario
            </div>
            <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="<?php echo base_url('template/assets/img/logo.png'); ?>" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">Sistema Bibliotecario</p>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('index.php/home'); ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo base_url('index.php/institution'); ?>"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Datos institución</a></li>
                            <li><a href="<?php echo base_url('index.php/provider'); ?>"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo proveedor</a></li>
                            <li><a href="<?php echo base_url('index.php/category'); ?>"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría</a></li>
                            <li><a href="<?php echo base_url('index.php/section'); ?>"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva sección</a></li>
                        </ul>
                    </li>
                    <!-- Agrega más elementos de menú según sea necesario -->
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <!-- Barra superior -->
        </nav>
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Sistema Bibliotecario <small>Agregar Libro</small></h1>
            </div>
        </div>
        <div class="container-fluid" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Agregar Libro</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo form_open_multipart("C_libro/agregarbd"); ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="titulov" placeholder="Escribe el título" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="autorv" placeholder="Escribe el autor" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="isbnv" placeholder="Escribe el ISBN" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="anioPublicacionv" placeholder="Escribe el año de publicación" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="categoriav" placeholder="Escribe la categoría" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="ubicacionv" placeholder="Escribe la ubicación" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="editorialv" placeholder="Escribe la editorial" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="dewayv" placeholder="Escribe el código Dewey" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cutterv" placeholder="Escribe el código Cutter" required>
                            </div>
                            <button type="submit" class="btn btn-success">Agregar Libro</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Aquí puedes añadir el footer si es necesario -->
    </div>
</body>
</html>
