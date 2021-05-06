<?php
session_start();
if (!isset($_SESSION['carrito'])) {
  header('Location: ./index.php');
}
$arreglo = $_SESSION['carrito'];
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
  <script src="https://www.paypal.com/sdk/js?client-id=ASGf0cdrfS4wcNYfku6hkSOQHI5Ub67WHjqb3b7MwQrF48-ANsdybbS2PeBsZ2YuhHHbKUrsSjD-fhEj">
  </script>
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?>
    <form action="./gracias.php" method="POST">
      <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Detalles de Factura</h2>
              <div class="p-3 p-lg-5 border">
                <div class="form-group">
                  <label for="c_country" class="text-black">Ciudad: <span class="text-danger">*</span></label>
                  <select id="c_country" class="form-control" name="country">
                    <option value="1">Seleccione su ciudad</option>
                    <option value="2">Cochabamba</option>
                    <option value="3">Santa Cruz</option>
                    <option value="4">La Paz</option>
                    <option value="5">Sucre</option>
                    <option value="6">Oruro</option>
                    <option value="7">Potosi</option>
                    <option value="7">Tarija</option>
                    <option value="8">Pando</option>
                    <option value="9">Beni</option>
                  </select>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nombre: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Apellido: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                  </div>
                </div>



                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Direccion <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Direccion de su vivienda">
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Numero de casa (opcional)">
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_state_country" class="text-black">Provincia: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                  </div>

                </div>

                <div class="form-group row mb-5">
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Correo Electronico: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Telefono <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Numero de Telefono">
                  </div>
                </div>

                <div class="form-group">
                  <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Crear una cuenta ?</label>
                  <div class="collapse" id="create_an_account">
                    <div class="py-2">
                      <p class="mb-3">Registre su cuenta en nuestra Tienda Virtual.</p>
                      <div class="form-group">
                        <label for="c_account_password" class="text-black">Contraseña:</label>
                        <input type="password" class="form-control" id="c_account_password" name="c_account_password" placeholder="Ingrese su contraseña">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">

              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Codigo de Cupon</h2>
                  <div class="p-3 p-lg-5 border">

                    <label for="c_code" class="text-black mb-3">Ingrese el codigo de su cupon.</label>
                    <div class="input-group w-75" id="formCupon">
                      <input type="text" class="form-control" id="c_code" placeholder="Codigo de Cupon" aria-label="Coupon Code" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Aplicar</button>
                        <br>
                      </div>
                    </div>
                    <h2 id="error" style="display:none" class="text-danger">Cupon no valido</h2>
                    <div class="input-group w-75" id="datosCupon" style="display: none;">
                      <h2 id="textoCupon" class="text-success h5"></h2>
                    </div>
                  </div>
                  <input type="hidden" name="id_cupon" id="id_cupon">

                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Su Compra</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Productos</th>
                        <th>Total</th>
                      </thead>
                      <tbody>
                        <?php
                        $total = 0;
                        for ($i = 0; $i < count($arreglo); $i++) {
                          $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);

                        ?>
                          <tr>
                            <td><?php echo $arreglo[$i]['Nombre']; ?></td>
                            <td>Bs <?php echo number_format($arreglo[$i]['Precio'], 2, '.', ''); ?></td>
                          </tr>
                        <?php } ?>
                        <tr>
                          <td>Subtotal</td>
                          <td>Bs <?php echo number_format($total, 2, '.', ''); ?></td>
                        </tr>
                        <tr>
                          <td class="text-success">Descuento</td>
                          <td id="tdTotal">0</td>
                        </tr>
                        <tr>
                          <td><b>Total Final</b></td>
                          <td id="tdTotalFinal" data-total="<?php echo $total; ?>"><?php echo number_format($total, 2, '.', ''); ?> Bs</td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="border p-3 mb-5">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal / Tarjeta Bancaria</a></h3>

                      <div class="collapse" id="collapsepaypal">
                        <div class="py-2">
                        </div>
                        <div id="paypal-button-container"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Realizar Pedido</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '500'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          console.log(details);
          alert('Transaction completed by ' + details.payer.name.given_name);
        });
      }
    }).render('#paypal-button-container');
  </script>

  <script>
    $(document).ready(function() {
      $("#button-addon2").click(function() {
        var codigo = $("#c_code").val();
        $.ajax({
          url: "./php/validarcodigo.php",
          data: {
            codigo: codigo
          },
          method: 'POST'
        }).done(function(respuesta) {
          if (respuesta == "error" || respuesta == "Codigo no valido") {
            $("#error").show();
            $("#id_cupon").val("");
          } else {
            var arreglo = JSON.parse(respuesta);
            if (arreglo.tipo == "moneda") {
              $("#textoCupon").text("Usted tiene un descuento de " + arreglo.valor + " Bs");
              $("#tdTotal").text(arreglo.valor + " Bs");
              var total = parseFloat($("#tdTotalFinal").data('total')) - arreglo.valor;
              $("#tdTotalFinal").text(total.toFixed(2) + " Bs");
            } else {
              $("#textoCupon").text("Usted tiene un descuento de " + arreglo.valor + " %");
              $("#tdTotal").text(arreglo.valor + " %");
              var total = parseFloat($("#tdTotalFinal").data('total')) - ((arreglo.valor / 100) * parseFloat($("#tdTotalFinal").data('total')));
              $("#tdTotalFinal").text(total.toFixed(2) + " Bs");
            }
            $("#formCupon").hide();
            $("#datosCupon").show();
            $("#id_cupon").val(arreglo.id);
          }
        })
      });
      $("#c_code").keyup(function() {
        $("#error").hide();
      });
    });
  </script>

</body>

</html>