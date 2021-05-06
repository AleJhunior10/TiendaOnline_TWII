<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./admin/dashboard/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="./admin/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="./admin/dashboard/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="./index.php"><b>Tienda</b></a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar Sesion</p>

        <form action="./php/check.php" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Correo Electronico" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recordar Usuario
                </label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>

            <br>
            <br>
            <?php
            if (isset($_GET['error'])) {
              echo '<div class="col-12 alert alert-danger">' . $_GET['error'] . '</div>';
            }
            ?>
          </div>
        </form>
      </div>

    </div>
  </div>

  <script src="./admin/dashboard/plugins/jquery/jquery.min.js"></script>
  <script src="./admin/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./admin/dashboard/dist/js/adminlte.min.js"></script>

</body>

</html>