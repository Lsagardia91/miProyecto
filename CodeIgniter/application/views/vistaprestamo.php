<br><br>
<h1>Agregar libro</h1>
<br>

<?php
echo form_open_multipart("Prestamo_controlador/agregarbd");
?>


<h2>BOLETA DE PEDIDO</h2>


<input type="text" class="form-control" name="autorv" placeholder="Escribe el nombre del autor" required>

<input type="text" class="form-control" name="titulov" placeholder="Escribe el título del libro" required>

<input type="text" class="form-control" name="nombreLectorv" placeholder="Escribe el nombre del lector" required>

<input type="text" class="form-control" name="direccionv" placeholder="Escribe la dirección" required>

<input type="text" class="form-control" name="colegioUnivv" placeholder="Escribe el nombre del colegio/universidad" required>

<input type="text" class="form-control" name="cursov" placeholder="Escribe el curso" required>

<input type="text" class="form-control" name="civ" placeholder="Escribe el número de carnet de identidad" required>

<input type="date" class="form-control" name="fechav" placeholder="Escribe la fecha del préstamo" required>

<button type="submit" class="btn btn-success">Registrar Préstamo</button>

<?php
echo form_close();
?>
