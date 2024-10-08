<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #ecffef">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-12 align-items-center">
            <!-- Título de la página -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Disabled</label>
                  <select class="form-control select2" disabled="disabled" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Multiple</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            
            <!-- /.row -->
          </div>
      
        </div>
      
       
      </div>
      <!-- /.container-fluid -->
    </section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Usuario</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <?php echo form_open_multipart("Usuarios_controlador/agregarbd"); ?>
                    <div class="card-body">
 
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="carnetIentidad">Carnet de Identidad</label>
                            <input type="text" class="form-control" id="carnetidentidad" name="carnetidentidadv" placeholder="Escribe el carnet de identidad" required>
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombresv" placeholder="Escribe el nombre" required>
                        </div>
                    </div>
            </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidosv" placeholder="Escribe los apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccionv" placeholder="Escribe la dirección" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefonov" placeholder="Escribe el teléfono" required>
                        </div>

                        <div class="form-group">
                            <label for="correoElectronico">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="emailv" placeholder="Escribe tu correo electrónico" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Colegio/Univ/Inst</label>
                            <input type="text" class="form-control" id="coluniins" name="coluniinsv" placeholder="Escribe el estado" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" id="username" name="usernamev" placeholder="Escribe el usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="passwordv" placeholder="Escribe la contraseña" required>
                        </div>
                        
                        <div class="form-group">
                           <label for="rol">Rol</label>
                          <select class="form-control" id="rol" name="rolv">
                          <option value="administrador">Administrador</option>
                          <option value="bibliotecario">Bibliotecario</option>
                          </select>
                        </div>

                        <!-- Nuevo campo para la foto del usuario -->
                        <div class="form-group">
                        <label for="foto">Foto del Usuario</label>
                        <input type="file" class="form-control" name="fotov" id="foto">
                       </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Agregar Usuario</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>