<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de Usuarios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo base_url('template/assets/icons/user.ico'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('template/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('template/css/style.css'); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url('template/js/bootstrap.min.js'); ?>"></script>
    <style>
        /* Estilo para el menú lateral */
        .navbar-lateral {
            width: 250px; /* Ancho del menú lateral */
            position: fixed; /* Fijo a la izquierda */
            height: 100%; /* Ocupa toda la altura */
            top: 0;
            left: 0;
            background-color: #f8f9fa; /* Color de fondo del menú lateral */
            /* Puedes agregar más estilos aquí */
        }
        
        /* Estilo para la página principal */
        .content-page-container {
            margin-left: 250px; /* Ancho del menú lateral */
            padding: 20px; /* Espacio interno para el contenido */
        }
    </style>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <!-- Menú lateral -->
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
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Sistema bibliotecario</h1>
            </div>
        </div>
        <div class="container-fluid">
            <h2 class="text-center all-tittles">Lista de usuarios</h2>
            <div class="table-responsive">
                <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
                    <button type="button" class="btn btn-warning">CERRAR SESIÓN</button>
                </a>
                <br><br>
                <a href="<?php echo base_url(); ?>index.php/usuarios/panel">
                    <button type="button" class="btn btn-warning">VOLVER</button>
                </a>
                <br><br>
                <a href="<?php echo base_url();?>index.php/C_usuario/agregar">
                    <button type="button" class="btn btn-primary">AGREGAR USUARIO</button>
                </a>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>idUsuario</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Carnet de Identidad</th>
                            <th>Genero</th>
                            <th>Estado</th>
                            <th>UserName</th>
                            <th>Password</th>
                            <th>Rol</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 1;
                        foreach ($usuarios->result() as $row) {
                        ?>
                        <tr>
                            <td><?php echo $contador; ?></td>
                            <td><?php echo $row->nombres; ?></td>
                            <td><?php echo $row->apellidos; ?></td>
                            <td><?php echo $row->direccion; ?></td>
                            <td><?php echo $row->telefono; ?></td>
                            <td><?php echo $row->carnetIdentidad; ?></td>
                            <td><?php echo $row->genero; ?></td>
                            <td><?php echo $row->estado; ?></td>
                            <td><?php echo $row->username; ?></td>
                            <td><?php echo $row->password; ?></td>
                            <td><?php echo $row->rol; ?></td>
                            <td>
                                <?php echo form_open("C_usuario/modificar"); ?>
                                <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                                <button type="submit" class="btn btn-primary">Editar</button>
                                <?php echo form_close(); ?>
                            </td>
                            <td>
                                <?php echo form_open("C_usuario/eliminarbd"); ?>
                                <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
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
