
<br><br>
<h1>Agregar Usuario</h1>
    <br>

    <!--  <form action=" < ?php echo base_url();?>index.php/c_libro/agregarbd">-->
 <?php
    echo form_open_multipart("C_usuario/agregarbd");
    ?>
   
    <input type="text" class="form-control" name="nombresv" placeholder="
    escribe el nombre"required>
    <input type="text" class="form-control" name="apellidosv" placeholder="
    escribe los apellidos"required>
    <input type="text" class="form-control" name="direccionv" placeholder="
    escribe la direccion"required>  
    <input type="text" class="form-control" name="telefonov" placeholder="
    escribe el telefono"required>
    <input type="text" class="form-control" name="carnetIdentidadv" placeholder="
    escribe el carnet de identidad"required>
    <input type="text" class="form-control" name="generov" placeholder="
    escribe el genero"required>
    <input type="text" class="form-control" name="estadov" placeholder="
    escribe el estado"required>
    <input type="text" class="form-control" name="userNamev" placeholder="
    escribe el usuario"required>
    <input type="text" class="form-control" name="passwordv" placeholder="
    escribe el password"required>
    <input type="text" class="form-control" name="rolv" placeholder="
    escribe el rol"required>

    <button type="submit" class="btn btn-success" >Agregar Usuario</button>
    <button type="submit" class="btn btn-success" >Agregar Usuario</button>
    <button type="submit" class="btn btn-success" >Agregar Usuario</button>
   
   <!--  </form>
    <?php
      echo form_close();
    ?>

  
  