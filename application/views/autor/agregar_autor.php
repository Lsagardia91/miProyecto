
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #ecffef">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <!-- Título de la página -->

<h1>Agregar Autor</h1>
<?php echo form_open('Autor_controlador/agregarbd'); ?>
    <div class="form-group">
        <label for="nombreautor">Nombre del Autor:</label>
        <input type="text" class="form-control" name="nombreautorv" placeholder="Nombre del Autor" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Autor</button>
<?php echo form_close(); ?>
</div>