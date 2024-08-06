<?php
/*
<br><br>
<h1>Editar Usuario</h1>
<br>  
<?php
      foreach($infousuario->result() as $row)
      {
 ?>  
 <?php
  echo form_open_multipart("C_usuario/modificarbd");
   ?>
   <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">

    <input type="text" class="form-control" name="nombresv" placeholder="
    escribe el nombre"value="<?php echo $row->nombres; ?>"required>

    <input type="text" class="form-control" name="apellidosv" placeholder="
    escribe los apellidos"value="<?php echo $row->apellidos; ?>"required>

    <input type="text" class="form-control" name="direccionv" placeholder="
    escribe la direccion"value="<?php echo $row->direccion; ?>"required>  

    <input type="text" class="form-control" name="telefonov" placeholder="
    escribe el telefono"value="<?php echo $row->telefono; ?>"required>

    <input type="text" class="form-control" name="carnetIdentidadv" placeholder="
    escribe el carnet de identidad"value="<?php echo $row->carnetIdentidad; ?>"required>

    <input type="text" class="form-control" name="generov" placeholder="
    escribe el genero"value="<?php echo $row->genero; ?>"required>

    <input type="text" class="form-control" name="estadov" placeholder="
    escribe el estado"value="<?php echo $row->estado; ?>"required>

    <input type="text" class="form-control" name="userNamev" placeholder="
    escribe el username"value="<?php echo $row->username; ?>"required>

    <input type="text" class="form-control" name="passwordv" placeholder="
    escribe el password"value="<?php echo $row->password; ?>"required>

    <input type="text" class="form-control" name="rolv" placeholder="
    escribe el rol"value="<?php echo $row->rol; ?>"required>

    <button type="submit" class="btn btn-success">Modificar Usuario</button>

<?php
echo form_close();
}
?>
*/
?>