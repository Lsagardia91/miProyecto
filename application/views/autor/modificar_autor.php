
<h1>Editar Autor</h1>
<br>  
<?php
      foreach($infoautor->result() as $row)
      {
 ?>  
 <?php
  echo form_open_multipart("Autor_controlador/modificarbd");
   ?>
   <input type="hidden" name="idautor" value="<?php echo $row->id; ?>">

    <input type="text" class="form-control" name="nombreautorv" placeholder="
    escribe el titulo"value="<?php echo $row->nombreautor; ?>"required>

   

    <button type="submit" class="btn btn-success">Modificar libro</button>

<?php
echo form_close();
}
?>
