

<br><br>
<h1>AGREGAR LIBRO</h1>
    <br>

    <!--  <form action=" < ?php echo base_url();?>index.php/c_libro/agregarbd">-->
 <?php
    echo form_open_multipart("C_libro/agregarbd");
    ?>
   
    <input type="text" class="form-control" name="titulov" placeholder="
    escribe el titulo"required>
    <input type="text" class="form-control" name="autorv" placeholder="
    escribe el autor"required>
    <input type="text" class="form-control" name="isbnv" placeholder="
    escribe el sbn"required>  
    <input type="text" class="form-control" name="anioPublicacionv" placeholder="
    escribe el año de publicacion"required>
    <input type="text" class="form-control" name="categoriav" placeholder="
    escribe la categoria"required>
    <input type="text" class="form-control" name="ubicacionv" placeholder="
    escribe la ubicacion"required>
    <input type="text" class="form-control" name="editorialv" placeholder="
    escribe la editorial"required>
    <input type="text" class="form-control" name="dewayv" placeholder="
    escribe el codigo deway"required>
    <input type="text" class="form-control" name="cutterv" placeholder="
    escribe el codigo cutter"required>
    

    <button type="submit" class="btn btn-success" >Agregar Libro</button>
   
   <!--  </form>
    <?php
      echo form_close();
    ?>


