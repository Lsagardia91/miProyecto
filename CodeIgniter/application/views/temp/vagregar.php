<br><br>
<h1>Agregar libro</h1>
<br>

<?php
echo form_open_multipart("C_libro/agregarbd");
?>

<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Nuevo libro</div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <legend><strong>Información básica</strong></legend><br>
                <div class="group-material">
                    <span>Categoría</span>
                    <select class="tooltips-general material-control" name="categoriav" data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro" required>
                        <option value="" disabled="" selected="">Selecciona una categoría</option>
                        <option value="categoria1">Categoría 1</option>
                        <option value="categoria2">Categoría 2</option>
                        <option value="categoria3">Categoría 3</option>
                    </select>
                </div>
                <div class="group-material">
                    <input type="text" class="tooltips-general material-control" name="titulov" placeholder="Escribe aquí el título o nombre del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del libro">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Título</label>
                </div>
                <div class="group-material">
                    <input type="text" class="tooltips-general material-control" name="autorv" placeholder="Escribe aquí el autor del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del autor del libro">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Autor</label>
                </div>
                <div class="group-material">
                    <input type="text" class="tooltips-general material-control" name="isbnv" placeholder="Escribe aquí el ISBN" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="Escribe el ISBN del libro">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>ISBN</label>
                </div>
                <div class="group-material">
                    <input type="text" class="tooltips-general material-control" name="numeroPaginasv" placeholder="Escribe aquí la cantidad de páginas" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Escribe la cantidad de páginas">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Número de Páginas</label>
                </div>
                <div class="group-material">
                    <input type="text" class="tooltips-general material-control" name="editorialv" placeholder="Escribe aquí la editorial del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe la editorial del libro">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Editorial</label>
                </div>
                <div class="group-material">
                    <input type="text" class="tooltips-general material-control" name="anioPublicacionv" placeholder="Escribe aquí el año de publicación" required="" pattern="[0-9]{4}" maxlength="4" data-toggle="tooltip" data-placement="top" title="Escribe el año de publicación, sólo números">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Año de Publicación</label>
                </div>
                <p class="text-center">
                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                    <button type="submit" class="btn btn-success"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Agregar Libro</button>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
echo form_close();
?>
