<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de Libros</title>
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
    <style>
        /* Estilo para ajustar el margen del contenido principal */
        .content-page-container {
            margin-left: 250px; /* Ajusta esto al ancho del menú lateral */
        }
        .navbar-lateral {
            width: 250px; /* Ajusta esto al ancho del menú lateral */
        }
    </style>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <!-- Menu lateral -->
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                sistema bibliotecario
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
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="<?php echo base_url('template/assets/img/user01.png'); ?>" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Admin Name</span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="index.html" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Sistema bibliotecario </h1>
            </div>
        </div>
    
        <div class="container-fluid">
            <h2 class="text-center all-tittles">Lista de libros disponibles</h2>
            <div class="table-responsive">
                <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
                    <button type="button" class="btn btn-warning">CERRAR SESIÓN</button>
                </a>
                <br><br>
                <a href="<?php echo base_url(); ?>index.php/usuarios/panel">
                    <button type="button" class="btn btn-warning">VOLVER</button>
                </a>
                <br><br>
                <a href="<?php echo base_url();?>index.php/C_libro/agregar">
                    <button type="button" class="btn btn-primary">AGREGAR LIBRO</button>
                </a>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>idLibro</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Isbn</th>
                            <th>Año de Publicación</th>
                            <th>Categoria</th>
                            <th>Ubicación</th>
                            <th>Editorial</th>
                            <th>Deway</th>
                            <th>Cutter</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 1;
                        foreach ($libross->result() as $row) {
                        ?>
                        <tr>
                            <td><?php echo $contador; ?></td>
                            <td><?php echo $row->titulo; ?></td>
                            <td><?php echo $row->autor; ?></td>
                            <td><?php echo $row->isbn; ?></td>
                            <td><?php echo $row->anioPublicacion; ?></td>
                            <td><?php echo $row->categoria; ?></td>
                            <td><?php echo $row->ubicacion; ?></td>
                            <td><?php echo $row->editorial; ?></td>
                            <td><?php echo $row->dewey; ?></td>
                            <td><?php echo $row->cutter ?></td>
                            <td>
                                <?php echo form_open_multipart("C_libro/modificar"); ?>
                                <input type="hidden" name="idlibro" value="<?php echo $row->idLibro; ?>">
                                <button type="submit" class="btn btn-primary">Editar</button>
                                <?php echo form_close(); ?>
                            </td>
                            <td>
                                <?php echo form_open_multipart("C_libro/eliminarbd"); ?>
                                <input type="hidden" name="idlibro" value="<?php echo $row->idLibro; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <?php echo form_close(); ?>
                            </td>
                        </tr>
                        <?php
                        $contador++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
