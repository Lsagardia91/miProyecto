

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #ecffef">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <!-- Título de la página -->
<h1>Editar Categoria</h1>
<br>  
<?php
      foreach($infocategoria->result() as $row)
      {
 ?>  
 <?php
  echo form_open_multipart("Categoria_controlador/modificarbd");
   ?>
   <input type="hidden" name="idcategoria" value="<?php echo $row->id; ?>">

    <input type="text" class="form-control" name="nombrecategoriav" placeholder="
    escribe la categoria"value="<?php echo $row->nombrecategoria; ?>"required>

    <input type="text" class="form-control" name="codigodeweyv" placeholder="
    escribe el codigo dewey"value="<?php echo $row->codigodewey; ?>"required>

   

    <button type="submit" class="btn btn-success">Modificar categoria</button>

<?php
echo form_close();
}
?>
