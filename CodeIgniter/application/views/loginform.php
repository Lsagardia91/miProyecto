<!--<h1>ingreso de usuarios</h1>
<br>

< ?php
echo form_open_multipart("usuarios/validarusuario");
?>

<input type="text" class="form-control" name="username" placeholder="Escribe login" required>
<input type="password" class="form-control" name="password" placeholder="Escribe password"  required>


<button type="submit" class="btn btn-success">Ingresar</button>
	
< ?php
echo form_close();
?>