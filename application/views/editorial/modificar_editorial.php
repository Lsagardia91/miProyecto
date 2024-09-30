
<h1>Editar Editorial</h1>
<br>  
<?php
      foreach($infoeditorial->result() as $row)
      {
 ?>  
 <?php
  echo form_open_multipart("Editorial_controlador/modificarbd");
   ?>
   <input type="hidden" name="ideditorial" value="<?php echo $row->id; ?>">

    <input type="text" class="form-control" name="nombreeditorialv" placeholder="
    escribe la editorial"value="<?php echo $row->nombreeditorial; ?>"required>

   

    <button type="submit" class="btn btn-success">Modificar Editorial</button>

<?php
echo form_close();
}
?>
