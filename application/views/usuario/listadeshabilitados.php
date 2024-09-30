
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <a href="<?php echo base_url(); ?>index.php/Username/logout">
<button type="button" class="btn btn-warning">CERRAR CESION</button>
</a> 
<br>
<br>
<a href="<?php echo base_url(); ?>index.php/Username/panel">
<button type="button" class="btn btn-warning">VOLVER</button>
</a> 
<br>

      <h1>Lista de usuarios deshabilitados</h1>

      <?php echo form_open_multipart('Usuarios_controlador/m_listar'); ?>
        <button type="submit" name="buton2" class="btn btn-primary">VER USUARIOSS HABILITADOS</button>
      <?php echo form_close(); ?>


      <br>


      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Carnet Identidad</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">direccion</th>
            <th scope="col">telefono</th>    
            <th scope="col">Correo Electronico</th>
            <th scope="col">Cole/Uni/Inst</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">rol</th>
            <th scope="col">Habilitar</th>
          </tr>
        </thead>
        <tbody>

      <?php
      $indice=1;
      foreach ($usuario->result() as $row)
      {
        ?>
          <tr>
            <th scope="row"><?php echo $indice; ?></th>
            <td><?php echo $row->carnetidentidad; ?></td>
            <td><?php echo $row->nombres; ?></td>
            <td><?php echo $row->apellidos; ?></td>
            <td><?php echo $row->direccion; ?></td>
            <td><?php echo $row->telefono; ?></td>    
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->coluniins; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->password; ?></td>
            <td><?php echo $row->rol; ?></td>
            <td>

              
              <?php echo form_open_multipart("Usuarios_controlador/habilitarbd"); ?>
              <input type="hidden" name="idusuario" value="<?php echo $row->id; ?>">
              <input type="submit" name="buttonz" value="Habilitar" class="btn btn-warning">
              <?php echo form_close(); ?>
              
            </td>
          </tr>
        <?php
        $indice++;
      }
      ?>




        </tbody>
      </table>

    </div>
  </div>
</div>