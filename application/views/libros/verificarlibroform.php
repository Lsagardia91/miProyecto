<h1>Verificar Libro</h1>

<form action="<?php echo base_url(); ?>index.php/Libros_controlador/verificar_libro" method="post">
    <label for="titulo">Título del libro:</label>
    <input type="text" name="titulo" id="titulo" required>

    <label for="isbn">ISBN del libro:</label>
    <input type="text" name="isbn" id="isbn" required>

    <button type="submit" class="btn btn-primary">Verificar</button>
</form>
