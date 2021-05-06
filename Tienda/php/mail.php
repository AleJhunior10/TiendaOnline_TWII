<?php
$to = $_POST['c_email_address'];
$subject = 'Gracias por su compra en SNICKERSTORE';
$from = 'tienda@midominio.com';

$header = 'From: SneakerStore@gmail.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'Content-type: text/html; charset=8859-1' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$message='<html>
<body>
    <h1>Gracias por su compra '. $_POST['c_fname']." ". $_POST['c_lname'].'</h1>
    <h3>Detalles de la compra</h3>
    <table>
        <thead>
            <tr>
                <td>Nombre del Producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <tbody>';
        $total = 0;
        $arregloCarrito = $_SESSION['carrito'];
        for ($i=0; $i<count($arregloCarrito); $i++) {
            $total =  $total + ($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);
            $message.= '<tr><td>'.$arregloCarrito[$i]['Nombre'].'</td>';
            $message.= '<td>'.$arregloCarrito[$i]['Precio'].'</td>';
            $message.= '<td>'.$arregloCarrito[$i]['Cantidad'].'</td>';
            $message.= '<td>'.($arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad']).'</td></tr>';
        }

$message.='</tbody></table>';
$message.='<h2>Total de la compra: '. $total .'</h2>';
$message.='<a href="http://localhost/Curso/Tienda/verpedido.php?id_venta='.$id_venta.'" style="background-color: cornflowerblue; color:white; padding: 10px;">Ver Estado del Pedido</a></body></html>';

if(mail($to, $subject, $message, $header)){
        //echo "Mensaje enviado corretamente";
    }
    else{
        //echo 'No se pudo enviar el mail';
    }
?>


            
        
   
    
    
