<h1>Solicitudes de Préstamo Pendientes</h1>

<?php if (!empty($prestamos_pendientes)): ?>


       <!-- Verifica qué datos estás obteniendo-->
    <!--< ?php 
var_dump($prestamos_pendientes);
?> -->
    <table class="table table-bordered table-striped">
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
                    <td><?php echo date('d/m/Y H:i:s', strtotime($prestamo->fechaprestamo)); ?></td>
                    <td>
                        <?php echo form_open('Prestamo_controlador/procesarPrestamo'); ?>
                            
                        <input type="hidden" name="prestamo_id" value="<?php echo $prestamo->id; ?>">
                            <button type="submit" class="btn btn-success" 
                                onclick="return confirm('¿Estás seguro de que deseas procesar este préstamo?');">
                                Procesar Préstamo
                            </button>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No hay solicitudes pendientes.</p>
<?php endif; ?>
