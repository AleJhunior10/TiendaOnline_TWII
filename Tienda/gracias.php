<?php
session_start();
include './php/conexion.php';

if (!isset($_SESSION['carrito'])) {
  header("Location: ./index.php");
}
$arreglo = $_SESSION['carrito'];
$total = 0;
for ($i = 0; $i < count($arreglo); $i++) {
  $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}

$password = "";
if (isset($_POST['c_account_password'])) {
  if ($_POST['c_account_password'] != "") {
    $password = $_POST['c_account_password'];
  }
}

$re = $conexion->query("SELECT id, email FROM usuario WHERE email = '" . $_POST['c_email_address']."'") or die($conexion->error);
$id_usuario = 0;
if (mysqli_num_rows($re) > 0) {
  $fila = mysqli_fetch_row($re);
  $id_usuario = $fila[0];
} else {
  $conexion->query("INSERT INTO usuario (nombre, telefono, email, password)
                    VALUES ('" . $_POST['c_fname'] . " " . $_POST['c_lname'] . "',
                    '" . $_POST['c_phone'] . "',
                    '" . $_POST['c_email_address'] . "',
                    '" . sha1($password) . "'
                    )") or die($conexion->error);
  //Ultimo registro de base datos
  $id_usuario = $conexion->insert_id;
}

$fecha = date('Y-m-d h:m:s');
$conexion->query("INSERT INTO ventas(id_usuario, total, fecha) VALUES($id_usuario, $total, '$fecha')") or die($conexion->error);
$id_venta = $conexion->insert_id;

for ($i = 0; $i < count($arreglo); $i++) {
  $conexion->query("INSERT INTO productos_venta (id_venta, id_producto, cantidad, precio, subtotal) 
  VALUES ($id_venta, 
  " . $arreglo[$i]['Id'] . ", 
  " . $arreglo[$i]['Cantidad'] . ", 
  " . $arreglo[$i]['Precio'] . ",
  " . $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'] . ")")
    or die($conexion->error);

  $conexion->query("update productos set inventario = inventario - " . $arreglo[$i]['Cantidad'] . " where id = " . $arreglo[$i]['Id']) or die($conexion->error);
}
$conexion->query("INSERT INTO envios(ciudad, direccion, estado, id_venta)
                    VALUES (
                      '" . $_POST['country'] . "',
                      '" . $_POST['c_address'] . "',
                      '" . $_POST['c_state_country'] . "',
                      $id_venta
                    )") or die($conexion->error);

if (isset($_POST['id_cupon'])) {
  if ($_POST['id_cupon'] != "") {
    $conexion->query("UPDATE cupones SET estado = 'utilizado' WHERE id=" . $_POST['id_cupon']) or die($conexion->error);
    $conexion->query("UPDATE ventas SET id_cupon = " . $_POST['id_cupon'] . " WHERE id=" . $id_venta) or die($conexion->error);
  }
}

include "./php/mail.php";
unset($_SESSION['carrito']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tienda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias por su Compra!</h2>
            <p class="lead mb-5">Su pedido fue completado exitosamente.</p>
            <p><a href="verpedido.php?id_venta=<?php echo $id_venta ?>" class="btn btn-sm btn-primary">Ver Pedido</a></p>
          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

</body>

</html>