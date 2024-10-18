

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #ecffef">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <!-- Título de la página -->


<h1>Libros Devueltos</h1>

<?php if (!empty($libros_devueltos)): ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Título del Libro</th>
                <th>Nombre del Lector</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros_devueltos as $devuelto): ?>
                <tr>
                    <td><?php echo $devuelto->titulo; ?></td>
                    <td><?php echo $devuelto->nombres . ' ' . $devuelto->apellidos; ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($devuelto->fechaprestamo)); ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($devuelto->fechadevolucion)); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No hay libros devueltos en este momento.</p>
<?php endif; ?>
