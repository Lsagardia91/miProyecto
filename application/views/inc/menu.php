<!-- Main Sidebar Container -->


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url('template/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">eLibroCocha</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('template/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Biblioteca Jesús Lara</a>
      </div>
    </div> 

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

 

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Menu item -->

        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Ver Contenido
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Usuarios_controlador/m_listar'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Libros_controlador/m_listar'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista libros</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Autor_controlador/m_listar'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista Autores</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Editorial_controlador/m_listar'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista de Editoriales</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Categoria_controlador/m_listar'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista categoria</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Prestamo_controlador/solicitudesPendientes'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Solicitudes de Prestamos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Prestamo_controlador/librosPrestados'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Libros Prestados</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/Prestamo_controlador/librosDevueltos'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Libros Devueltos</p>
              </a>
            </li>






          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
</aside>
