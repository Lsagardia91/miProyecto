
<h1>Lista de libros disponibles</h1>
<br>

<a href="<?php echo base_url(); ?>index.php/Username/logout">
<button type="button" class="btn btn-warning">CERRAR SESION</button>
</a>
<br>
<?php echo form_open_multipart('Libros_controlador/registrar'); ?>
        <button type="submit" name="buton2" class="btn btn-success">Registro de libro</button>
      <?php echo form_close(); ?>

<br>
<a href="<?php echo base_url(); ?>index.php/Username/panel">
<button type="button" class="btn btn-warning">VOLVER</button>
</a>
<br>
<!-- <h2>hola< ?php echo $this->session->userdata('login');?></h2>
<h2>hola< ?php echo $this->session->userdata('tipo');?></h2>
<h2>hola< ?php echo $this->session->userdata('idUsuario');?></h2> -->
<br>
<?php
        $atributos=array('class'=>'classemail','target'=>'_blank');
        echo form_open_multipart('Libros_controlador/listapdf',$atributos);
      
        //echo form_open_multipart('estudiante/listapdf'); // CON ESTO SE GENERA EN LA MISMA PESTAÑA
        ?>
        <button type="submit" name="buton2" class="btn btn-success">Lista libros PDF</button>
       <?php echo form_close(); ?>
<!--< ?php
echo date('Y/m/d H:i:s');
?>-->
    <br>
    <a href="<?php echo base_url();?>index.php/Libros_controlador/agregar">
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
             echo form_open_multipart("Libros_controlador/modificar");
            ?>
			<input type="hidden" name="idlibro" value="<?php echo $row->idLibro; ?>">
			<button type=submit type="submit" class="btn btn-primary">Editar</button>
	        <?php
            echo form_close();
            ?>
			</td>

			<td>
			<?php
             echo form_open_multipart("Libros_controlador/eliminarbd");
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
