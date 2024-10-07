<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Ejemplar</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

<div class="container mt-5">
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <h2>Agregar Ejemplar para el Libro: <?php echo isset($libro->titulo) ? $libro->titulo : 'Libro no encontrado'; ?></h2>
    
    <?php echo form_open('Libros_controlador/agregarEjemplar/' . $libro->id); ?>
        <div class="form-group">
            <label>Código Ejemplar (opcional, se generará automáticamente)</label>
            <input type="text" class="form-control" name="codigoejemplar" value="<?php echo set_value('codigoejemplar'); ?>" readonly>
        </div>
        <div class="form-group">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option value="1">Disponible</option>
                <option value="0">No Disponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Ejemplar</button>
    <?php echo form_close(); ?>

    <h3 class="mt-5">Lista de Ejemplares</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código Ejemplar</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Última Actualización</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ejemplares as $ejemplar): ?>
                <tr>
                    <td><?php echo $ejemplar->codigoejemplar; ?></td>
                    <td><?php echo ($ejemplar->estado == 1) ? 'Disponible' : 'No Disponible'; ?></td>
                    <td><?php echo $ejemplar->fechacreacion; ?></td>
                    <td><?php echo $ejemplar->ultimaactualizacion; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</
