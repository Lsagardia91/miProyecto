
<h1>Lista de usuarios</h1>
<br>
<a href="<?php echo base_url(); ?>index.php/Username/logout">
<button type="button" class="btn btn-warning">CERRAR CESION</button>
</a> 
<br>
<br>
<a href="<?php echo base_url(); ?>index.php/Username/panel">
<button type="button" class="btn btn-warning">VOLVER</button>
</a> 
<br>
<!-- <h2>hola< ?php echo $this->session->userdata('login');?></h2>
<h2>hola< ?php echo $this->session->userdata('tipo');?></h2>
<h2>hola< ?php echo $this->session->userdata('idUsuario');?></h2> -->
<br>

<?php echo form_open_multipart('Usuarios_controlador/deshabilitados'); ?>
        <button type="submit" name="buton2" class="btn btn-warning">VER USUARIOS DESHABILITADOS</button>
      <?php echo form_close(); ?>

<!--< ?php
echo date('Y/m/d H:i:s');
?>-->
    <br>
    <a href="<?php echo base_url();?>index.php/Usuarios_controlador/agregar">
    <button type="button" class="btn btn-primary">AGREGAR USUARIO</button>
    </a>
    <table class="table">
	<thead>
		<th>idUsuario</th>
        <th>Carnet de Identidad</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Dirección</th>
		<th>Teléfono</th>    
        <th>Correo Electronico</th>
        <th>Colegio/Univ/Inst</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Estado</th>
        <th>Fecha Creacion</th>
        <th>Ultima Actualizacion</th>
        <th>Usuario Creador</th>
        <th>Tipo de Usuario</th>
	</thead>
    <tbody>
		<?php
		$contador=1;
		foreach($usuarios->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $contador;?></td>
            <td><?php echo $row->carnetidentidad; ?></td>
			<td><?php echo $row->nombres; ?></td>
			<td><?php echo $row->apellidos; ?></td>
			<td><?php echo $row->direccion; ?></td>
            <td><?php echo $row->telefono; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->coluniins; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->password; ?></td>
            <td><?php echo $row->estado; ?></td>
            <td><?php echo $row->fechacreacion; ?></td>
            <td><?php echo $row->ultimaactualizacion; ?></td>
            <td><?php echo $row->usuariocreador; ?></td>
            <td><?php echo $row->tipousuario_id; ?></td>

			<td>
			<?php
             echo form_open_multipart("Usuarios_controlador/modificar");
            ?>
			<input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
			<button type=submit type="submit" class="btn btn-primary">Editar</button>
	        <?php
            echo form_close();
            ?>
			</td>

			<td>
			<?php
             echo form_open_multipart("Usuarios_controlador/eliminarbd");
            ?>
			<input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
			<button type=submit type="submit" class="btn btn-danger">Eliminar</button>
	        <?php
            echo form_close();
            ?>
			</td>

            <td>  
              <?php echo form_open_multipart("Usuarios_controlador/deshabilitarbd"); ?>
              <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
              <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-warning">
             <?php echo form_close(); ?>
            </td>
		
		</tr>
		<?php
		$contador++;
			}
		?>
	</tbody>
</table> 


