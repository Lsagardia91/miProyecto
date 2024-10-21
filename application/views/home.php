<!DOCTYPE html>
<html>
<head>
    <!-- Importa la fuente desde Google Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Spicy+Rice&display=swap');

        /* Define la clase para la fuente */
        .spicy-rice-regular {
            font-family: "Spicy Rice", serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="spicy-rice-regular">Bienvenido a eLibroCocha</h1>
    
    <div class="row">
        <div class="col-md-6">
            <!-- Botón para ingresar al sistema (login) -->
            <a href="<?php echo site_url('Username/login'); ?>" class="btn btn-primary btn-block">
                Ingresar al Sistema
            </a>
        </div>

        <div class="col-md-6">
            <!-- Botón para ver libros disponibles (vista lectores) -->
            <a href="<?php echo site_url('Lector_controlador/listalibros'); ?>" class="btn btn-success btn-block">
                Libros Disponibles
            </a>
        </div>
    </div>
</div>
</body>
</html>
