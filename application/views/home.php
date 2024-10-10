<div class="container">
    <h1>Bienvenido a eLibroCocha</h1>
    
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
