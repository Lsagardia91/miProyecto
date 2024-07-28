
<br><br>
<h1>Editar Libro</h1>
<br>  
<?php
      foreach($infolibro->result() as $row)
      {
 ?>  
 <?php
  echo form_open_multipart("C_libro/modificarbd");
   ?>
   <input type="hidden" name="idlibro" value="<?php echo $row->idlibro; ?>">

    <input type="text" class="form-control" name="titulov" placeholder="
    escribe el titulo"value="<?php echo $row->titulo; ?>"required>
    <input type="text" class="form-control" name="autorv" placeholder="
    escribe el autor"value="<?php echo $row->autor; ?>"required>
    <input type="text" class="form-control" name="isbnv" placeholder="
    escribe el isbn"value="<?php echo $row->isbn; ?>"required>  
    <input type="text" class="form-control" name="categoriav" placeholder="
    escribe la categoria"value="<?php echo $row->categoria; ?>"required>
    <input type="text" class="form-control" name="numeroPaginasv" placeholder="
    escribe la cantidad de numero de paginas"value="<?php echo $row->numeroPaginas; ?>"required>
    <input type="text" class="form-control" name="editorialv" placeholder="
    escribe la editorial"value="<?php echo $row->editorial; ?>"required>
    <input type="text" class="form-control" name="anioPublicacionv" placeholder="
    escribe el año de publicacion"value="<?php echo $row->anioPublicacion; ?>"required>

    <button type="submit" class="btn btn-success">Modificar libro</button>

<?php
echo form_close();
}
?>