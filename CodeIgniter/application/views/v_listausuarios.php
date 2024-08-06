<?php
/*
 <h1>Lista de usuarios</h1>
<br>
<a href="<?php echo base_url(); ?>index.php/usuarios/logout">
<button type="button" class="btn btn-warning">CERRAR CESION</button>
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
    <a href="<?php echo base_url();?>index.php/C_usuario/agregar">
    <button type="button" class="btn btn-primary">AGREGAR USUARIO</button>
    </a>
    <table class="table">
	<thead>
		<th>idUsuario</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Dirección</th>
		<th>Teléfono</th>
        <th>Carnet de Identidad</th>
        <th>Genero</th>
        <th>Estado</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Rol</th>
	</thead>
    <tbody>
		<?php
		$contador=1;
		foreach($usuarios->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $contador;?></td>
			<td><?php echo $row->nombres; ?></td>
			<td><?php echo $row->apellidos; ?></td>
			<td><?php echo $row->direccion; ?></td>
            <td><?php echo $row->telefono; ?></td>
            <td><?php echo $row->carnetIdentidad; ?></td>
            <td><?php echo $row->genero; ?></td>
            <td><?php echo $row->estado; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->password; ?></td>
            <td><?php echo $row->rol; ?></td>

			<td>
			<?php
             echo form_open_multipart("C_usuario/modificar");
            ?>
			<input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
			<button type=submit type="submit" class="btn btn-primary">Editar</button>
	        <?php
            echo form_close();
            ?>
			</td>

			<td>
			<?php
             echo form_open_multipart("C_usuario/eliminarbd");
            ?>
			<input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
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
*/
?>