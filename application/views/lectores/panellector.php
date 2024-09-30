



<h1>Lista de libros disponibles</h1>
<br>



<table class="table">
    <thead>
        <th>idLibro</th>
        <th>Titulo</th>
        <th>Isbn</th>
        <th>Categoria id</th>
        <th>Editorial id</th>
        <th>Solicitar Préstamo</th> <!-- Nueva columna para el botón -->
    </thead>
    <tbody>
        <?php
        $contador = 1;
        foreach ($libros as $row) { // Asegúrate de que estás usando $libros
        ?>
        <tr>
            <td><?php echo $contador; ?></td>
            <td><?php echo $row->titulo; ?></td>
            <td><?php echo $row->isbn; ?></td>
            <td><?php echo $row->categoria_id; ?></td>
            <td><?php echo $row->editorial_id; ?></td>

            <td>
                <?php echo form_open('Lector_controlador/solicitarPrestamo/' . $row->id); ?>
                    <button type="submit" class="btn btn-success">Solicitar Préstamo</button>
                <?php echo form_close(); ?>
            </td>
        </tr>
        <?php
        $contador++;
        }
        ?>
    </tbody>
</table>
