
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Registar libro</h2>

      <?php echo form_open_multipart('Libros_controlador/registrarbd'); ?>

      <select name="idCategoria" class="form-control form-select form-select-lg" required>
        <option value="" disabled selected>Seleccione una...</option>
        <?php
        foreach ($infocategorias->result() as $row) {
          ?>
        <option value="<?php echo $row->idCategoria?>"><?php echo $row->nombre?></option>
          <?php
        }
        ?>
      </select>

      <input type="text" class="form-control" name="titulov" placeholder="Escribe el titulo" required>
      <input type="text" class="form-control" name="autorv" placeholder="Escribe los autores, separados por comas" required>
     <input type="text" class="form-control" name="isbnv" placeholder="Escribe isbn" required>
     <input type="number" class="form-control" name="anioPublicacionv" placeholder="Escribe cuando fue publicado" required>
     <input type="number" class="form-control" name="categoriav" placeholder="Escribe la categoria" required>
     <input type="text" class="form-control" name="ubicacionv" placeholder="Escribe la ubicacion" required>
     <input type="tex" class="form-control" name="editorialv" placeholder="Escribe la editorial" required>
     <input type="number" class="form-control" name="deweyv" placeholder="Escribe el codigo deway" required>
    <input type="text" class="form-control" name="cutterv" placeholder="Escribe el codigo cutter " required>
      
      <button type="submit" class="btn btn-primary">Registrar libro</button>

      <?php form_close(); ?>
      
    </div>
  </div>
</div>