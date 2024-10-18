<?php $this->load->view('inc/header'); ?>
<?php $this->load->view('inc/menu'); ?>

<style>
  .small-box .inner h3 {
    font-size: 28px !important; /* Forzar el tamaño del texto en el título */
  }
  .small-box .inner p {
    font-size: 18px !important; /* Forzar el tamaño del texto en el párrafo */
  }
  .small-box-footer {
    font-size: 16px !important; /* Forzar el tamaño del texto en el enlace "More info" */
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo isset($total_libros) ? $total_libros : 0; ?><sup style="font-size: 10px"></sup></h3>
                <p>Todos los libros</p> <!-- Añadir descripción -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo isset($total_prestamos) ? $total_prestamos : 0; ?><sup style="font-size: 20px"></sup></h3>
                <p>Préstamos totales</p> <!-- Añadir descripción -->
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo isset($total_devoluciones) ? $total_devoluciones : 0; ?><sup style="font-size: 20px"></sup></h3>
                <p>Devoluciones</p> <!-- Añadir descripción -->
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo isset($total_lectores) ? $total_lectores : 0; ?><sup style="font-size: 20px"></sup></h3>
                <p>Usuarios</p> <!-- Añadir descripción -->
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php $this->load->view('inc/footer'); ?>
