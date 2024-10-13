<h1>Libros Prestados</h1>

<?php if (!empty($libros_prestados)): ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Lector</th>
                <th>Carnet de Identidad</th>
                <th>Título del Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros_prestados as $prestamo): ?>
                <tr>
                    <td><?php echo $prestamo->nombres; ?></td>
                    <td><?php echo $prestamo->carnetidentidad; ?></td>
                    <td><?php echo $prestamo->titulo; ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($prestamo->fechaprestamo)); ?></td>
                    <td>
                        <?php
                        if ($prestamo->fechadevolucion) {
                            echo date('d/m/Y H:i:s', strtotime($prestamo->fechadevolucion));
                        } else {
                            echo 'No devuelto';
                        }
                        ?>
                    </td>
                    <td>
                        <?php if (empty($prestamo->fechadevolucion)): ?>
                            <!-- Formulario para registrar la devolución -->
                            <form action="<?php echo site_url('Prestamo_controlador/devolverLibro'); ?>" method="post" style="display:inline;">
                                <input type="hidden" name="prestamo_id" value="<?php echo $prestamo->id; ?>">
                                <button type="submit" class="btn btn-warning" 
                                        onclick="return confirm('¿Estás seguro de que deseas marcar este libro como devuelto?');">
                                    Marcar como Devuelto
                                </button>
                            </form>
                        <?php else: ?>
                            Devuelto
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No hay libros prestados actualmente.</p>
<?php endif; ?>
