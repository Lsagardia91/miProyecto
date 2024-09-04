<br><br>
<h1>Editar Libro</h1>
<br>  
<?php
      foreach($infolibro->result() as $row)
      {
 ?>  
 <?php
  echo form_open_multipart("Libros_controlador/modificarbd");
   ?>
   <input type="hidden" name="idlibro" value="<?php echo $row->idLibro; ?>">

    <input type="text" class="form-control" name="titulov" placeholder="
    escribe el titulo"value="<?php echo $row->titulo; ?>"required>
    <input type="text" class="form-control" name="autorv" placeholder="
    escribe el autor"value="<?php echo $row->autor; ?>"required>
    <input type="text" class="form-control" name="isbnv" placeholder="
    escribe el isbn"value="<?php echo $row->isbn; ?>"required>  
    <input type="text" class="form-control" name="anioPublicacionv" placeholder="
    escribe el año de publicacion"value="<?php echo $row->anioPublicacion; ?>"required>
    <input type="text" class="form-control" name="categoriav" placeholder="
    escribe la categoria"value="<?php echo $row->categoria; ?>"required>
    <input type="text" class="form-control" name="ubicacionv" placeholder="
    escribe la ubicacion"value="<?php echo $row->ubicacion; ?>"required>
    <input type="text" class="form-control" name="editorialv" placeholder="
    escribe la editorial"value="<?php echo $row->editorial; ?>"required>
    <input type="text" class="form-control" name="deweyv" placeholder="
    escribe el codigo deway"value="<?php echo $row->dewey; ?>"required>
    <input type="text" class="form-control" name="cutterv" placeholder="
    escribe el codigo cutter"value="<?php echo $row->cutter; ?>"required>

    <button type="submit" class="btn btn-success">Modificar libro</button>

<?php
echo form_close();
}
?>