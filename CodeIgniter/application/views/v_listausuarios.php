<h1>Lista de usuarios</h1>
<br>

<a href="<?php echo base_url(); ?>index.php/usuarios/logout">
<button type="button" class="btn btn-warning">CERRAR SESION</button>
</a>
<!-- <h2>hola< ?php echo $this->session->userdata('login');?></h2>
<h2>hola< ?php echo $this->session->userdata('tipo');?></h2>
<h2>hola< ?php echo $this->session->userdata('idUsuario');?></h2> -->
<br>

<?php
echo date('Y/m/d H:i:s');
?>
    <br>
    <a href="<?php echo base_url();?>index.php/C_usuario/agregar">
    <button type="button" class="btn btn-primary">Agregar libro</button>
    </a>
    <table class="table">
	<thead>
		<th>idUsuario</th>
		<th>Nombres</th>
		<th>PrimerApellido</th>
		<th>SegundoApellido</th>
		<th>Dirección</th>
		<th>Teléfono</th>
        <th>Carnet de Identidad</th>
        <th>Sexo</th>
        <th>Login</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Fecha de Registro</th>
        <th>Fecha de Actualización</th>
        <th>Usuario Registrador</th>
        <th>Modificar</th>
        <th>Eliminar</th>
        <th>Deshabilitar</th>
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
            <td><?php echo $row->categoria; ?></td>
            <td><?php echo $row->numeroPaginas; ?></td>
            <td><?php echo $row->editorial; ?></td>
            <td><?php echo $row->anioPublicacion; ?></td>
            <td><?php echo $row->estado; ?></td>
            <td><?php echo $row->fechaRegistro ?></td>
            <td><?php echo $row->usuarioRegistrador; ?></td>
            <td><?php echo $row->ultimaActualizacion; ?></td>

			<td>
			<?php
             echo form_open_multipart("C_libro/modificar");
            ?>
			<input type="hidden" name="idlibro" value="<?php echo $row->idlibro; ?>">
			<button type=submit type="submit" class="btn btn-primary">Editar</button>
	        <?php
            echo form_close();
            ?>
			</td>

			<td>
			<?php
             echo form_open_multipart("C_libro/eliminarbd");
            ?>
			<input type="hidden" name="idlibro" value="<?php echo $row->idlibro; ?>">
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