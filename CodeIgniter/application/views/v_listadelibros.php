
<h1>Lista de libros disponibles</h1>
<br>

<a href="<?php echo base_url(); ?>index.php/usuarios/logout">
<button type="button" class="btn btn-warning">CERRAR SESION</button>
</a>
<br>
<br>
<a href="<?php echo base_url(); ?>index.php/usuarios/panel">
<button type="button" class="btn btn-warning">VOLVER</button>
</a>
<!-- <h2>hola< ?php echo $this->session->userdata('login');?></h2>
<h2>hola< ?php echo $this->session->userdata('tipo');?></h2>
<h2>hola< ?php echo $this->session->userdata('idUsuario');?></h2> -->
<br>

<!--< ?php
echo date('Y/m/d H:i:s');
?>-->
    <br>
    <a href="<?php echo base_url();?>index.php/C_libro/agregar">
    <button type="button" class="btn btn-primary">AGREGAR LIBRO</button>
    </a>
    <table class="table">
	<thead>
		<th>idLibro</th>
		<th>Titulo</th>
		<th>Autor</th>
		<th>Isbn</th>
		<th>Año de Publicación</th>
		<th>Categoria</th>
        <th>Ubicación</th>
        <th>Editorial</th>
        <th>Deway</th>
        <th>Cutter</th>
        <th>Modificar</th>
        <th>Eliminar</th>
	</thead>
    <tbody>
		<?php
		$contador=1;
		foreach($libross->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $contador;?></td>
			<td><?php echo $row->titulo; ?></td>
			<td><?php echo $row->autor; ?></td>
			<td><?php echo $row->isbn; ?></td>
            <td><?php echo $row->anioPublicacion; ?></td>
            <td><?php echo $row->categoria; ?></td>
            <td><?php echo $row->ubicacion; ?></td>
            <td><?php echo $row->editorial; ?></td>
            <td><?php echo $row->dewey; ?></td>
            <td><?php echo $row->cutter ?></td>


			<td>
			<?php
             echo form_open_multipart("C_libro/modificar");
            ?>
			<input type="hidden" name="idlibro" value="<?php echo $row->idLibro; ?>">
			<button type=submit type="submit" class="btn btn-primary">Editar</button>
	        <?php
            echo form_close();
            ?>
			</td>

			<td>
			<?php
             echo form_open_multipart("C_libro/eliminarbd");
            ?>
			<input type="hidden" name="idlibro" value="<?php echo $row->idLibro; ?>">
			<button type=submit type="submit" class="btn btn-danger">Eliminar</button>
	        <?php
            echo form_close();
            ?>
			</td>

			<?php
             echo form_open_multipart("C_libro/eliminarbd");
            ?>
			<input type="hidden" name="idlibro" value="<?php echo $row->idLibro; ?>">
			<button type=submit type="submit" class="btn btn-danger">Eliminar</button>
	        <?php
            echo form_close();
            ?>
			</td>
		

		</tr>
		<?php
		$contador++;
			}
		?>
	</tbody>
</table>
