<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Usuario</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <?php echo form_open_multipart("Usuarios_controlador/agregarbd"); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="carnetIentidad">Carnet de Identidad</label>
                            <input type="text" class="form-control" id="carnetidentidad" name="carnetidentidadv" placeholder="Escribe el carnet de identidad" required>
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombresv" placeholder="Escribe el nombre" required>
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
                            
                        <input type="hidden" class="form-control" name="idusuario" value="<?php echo $arrayidusuario;?>">
                        <input type="file" name="userfile">
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
