</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>elibroCocha</b> Iniciar Sesión</a>
  </div>
  <div id="validado"></div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresa con tu sesión</p>

      <form action="main.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" onclick="validarUsuario()" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>