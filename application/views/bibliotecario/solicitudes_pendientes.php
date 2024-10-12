<h1>Solicitudes de Préstamo Pendientes</h1>

<?php if (!empty($prestamos_pendientes)): ?>
    <table>
        <thead>
            <tr>
                <th>Lector</th>
                <th>Carnet de Identidad</th>
                <th>Libro Solicitado</th>
                <th>Fecha de Solicitud</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestamos_pendientes as $prestamo): ?>
                <tr>
                    <td><?php echo $prestamo->nombres; ?></td>
                    <td><?php echo $prestamo->carnetidentidad; ?></td>
                    <td><?php echo $prestamo->titulo; ?></td>
                    <td><?php echo $prestamo->fechaprestamo; ?></td>
                    <td>
                        <a href="<?php echo base_url('Prestamo_controlador/prueba/' . $prestamo->id); ?>">
                            Procesar Préstamo
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No hay solicitudes pendientes.</p>
<?php endif; ?>
