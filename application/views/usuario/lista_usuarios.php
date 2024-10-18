

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #ecffef">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <!-- Título de la página -->
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
		<th>No</th>
        <th>Imagen</th>
        <th>Subir</th>
        <th>Carnet de Identidad</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Dirección</th>
		<th>Teléfono</th>    
        <th>Correo Electrónico</th>
        <th>Colegio/Univ/Inst</th>
        <th>Username</th>
        <th>Fecha Creación</th>
        <th>Última Actualización</th>
        <th>Tipo de usuario</th>

	</thead>
    <tbody>
		<?php
		$contador=1;
		foreach($usuarios->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $contador;?></td>
            <td>
				<?php
				$foto=$row->foto;

				if($foto=="")
				{
					?>
					<img src="<?php echo base_url();?>/uploads/usuarios/perfil.png"
					width="100">
					<?php
				}
				else
				{
					//echo $foto;
					?>
					<img src="<?php echo base_url();?>/uploads/usuarios/<?php echo $foto; ?>"
					width="100">
					<?php
				}
				?>
			</td>
            <td> <!-- subir foto -->
			<?php
             echo form_open_multipart("Usuarios_controlador/subirfoto");
              ?>
            <input type="hidden" name="idusuario" value="<?php echo $row->id; ?>">
             <button type="submit" class="btn btn-primary">Subir</button>
              <?php
             echo form_close();
               ?>
			</td> <!-- subir foto -->

            <td><?php echo $row->carnetidentidad; ?></td>
			<td><?php echo $row->nombres; ?></td>
			<td><?php echo $row->apellidos; ?></td>
			<td><?php echo $row->direccion; ?></td>
            <td><?php echo $row->telefono; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->coluniins; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->fechacreacion; ?></td>
            <td><?php echo $row->ultimaactualizacion; ?></td>
            <td><?php echo $row->rol; ?></td>

			<td>
			<?php echo form_open_multipart("Usuarios_controlador/modificar"); ?>
			<input type="hidden" name="idusuario" value="<?php echo $row->id; ?>">
			<button type="submit" class="btn btn-primary">Editar</button>
	        <?php echo form_close(); ?>
			</td>

			<td>
			<?php echo form_open_multipart("Usuarios_controlador/eliminarbd"); ?>
			<input type="hidden" name="idusuario" value="<?php echo $row->id; ?>">
			<button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar este usuario?');">Eliminar</button>
	        <?php echo form_close(); ?>
			</td>

            <td>  
              <?php echo form_open_multipart("Usuarios_controlador/deshabilitarbd"); ?>
              <input type="hidden" name="idusuario" value="<?php echo $row->id; ?>">
              <button type="submit" class="btn btn-warning">Deshabilitar</button>
                 <!-- < ?php echo ($row->estado == 1) ? 'Deshabilitar' : 'Habilitar'; ?> -->
              </button>
             <?php echo form_close(); ?>
            </td>
		</tr>
		<?php
		$contador++;
		}
		?>
	</tbody>
</table>