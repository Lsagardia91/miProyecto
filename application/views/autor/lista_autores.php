
<h1>Lista de autores</h1>
<br>

<a href="<?php echo base_url(); ?>index.php/Username/logout">
<button type="button" class="btn btn-warning">CERRAR SESION</button>
</a>
<br>
<!--// DESDE AQUI HICE LA TRANSACCION DE CATEGORIA //-->
<!--< ?php echo form_open_multipart('Autor_controlador/registrar'); ?>
        <button type="submit" name="buton2" class="btn btn-success">Registro de Autor</button>
      < ?php echo form_close(); ?> -->
<!--// HASTA AQUI AQUI HICE LA TRANSACCION DE CATEGORIA //-->
<br>
<a href="<?php echo base_url(); ?>index.php/Username/panel">
<button type="button" class="btn btn-warning">VOLVER</button>
</a>
<br>
<!-- <h2>hola< ?php echo $this->session->userdata('login');?></h2>
<h2>hola< ?php echo $this->session->userdata('tipo');?></h2>
<h2>hola< ?php echo $this->session->userdata('idUsuario');?></h2> -->
<br>
<!--< ?php
        $atributos=array('class'=>'classemail','target'=>'_blank');
        echo form_open_multipart('Autor_controlador/listapdf',$atributos);
      
        //echo form_open_multipart('estudiante/listapdf'); // CON ESTO SE GENERA EN LA MISMA PESTAÑA
        ?>
        <button type="submit" name="buton2" class="btn btn-success">Lista libros PDF</button>
       < ?php echo form_close(); ?> -->
<!--< ?php
echo date('Y/m/d H:i:s');
?>-->
    <br>
    <a href="<?php echo base_url();?>index.php/Autor_controlador/agregar">
    <button type="button" class="btn btn-primary">AGREGAR AUTOR</button>
    </a>
    <table class="table">
	<thead>
		<th>idAutor</th>
		<th>Nombre Autor</th>
        <th>Fecha Creacion</th>
        <th>Ultima Actualizacion</th>
        <th>Usuario Creador</th>
        <th>Modificar</th>
        <th>Eliminar</th>
	</thead>
    <tbody>
		<?php
		$contador=1;
		foreach($autoress->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $contador;?></td>
			<td><?php echo $row->nombreautor; ?></td>
			<td><?php echo $row->fechacreacion; ?></td>
			<td><?php echo $row->ultimaactualizacion; ?></td>
			<td><?php echo $row->usuariocreador ?></td>
       

			<td>
			<?php
             echo form_open_multipart("Autor_controlador/modificar");
            ?>
			<input type="hidden" name="idautor" value="<?php echo $row->id; ?>">
			<button type=submit type="submit" class="btn btn-primary">Editar</button>
	        <?php
            echo form_close();
            ?>
			</td>

			<td>
			<?php
             echo form_open_multipart("Autor_controlador/eliminarbd");
            ?>
			<input type="hidden" name="idautor" value="<?php echo $row->id; ?>">
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
