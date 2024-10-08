

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #ecffef">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <!-- Título de la página -->


<h1>Agregar Categoria</h1>
<?php echo form_open('Categoria_controlador/agregarbd'); ?>
    <div class="form-group">
        <label for="nombrecategoria">Nombre de categoria:</label>
        <input type="text" class="form-control" name="nombrecategoriav" placeholder="Nombre de categoria" required>
        <label for="nombrecategoria">Codigo Dewey</label>
        <input type="text" class="form-control" name="codigodeweyv" placeholder="Codigo dewey" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Categoria</button>
<?php echo form_close(); ?>
