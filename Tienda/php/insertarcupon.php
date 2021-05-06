<?php

include "conexion.php";

if(isset($_POST['codigo']) && isset($_POST['tipo']) && isset($_POST['valor'])){

    $conexion -> query("INSERT INTO cupones (codigo, tipo, valor, estado, fecha_vencimiento)
                        VALUES (
                                '".$_POST['codigo']."', 
                                '".$_POST['tipo']."', 
                                '".$_POST['valor']."', 
                                'Activo',
                                '".$_POST['fecha']."')") or die($conexion->error);
                                header("Location: ../admin/cupones.php?success");
}
else{
    header("Location: ../admin/cupones.php?error=Favor de llenar todos los campos");
}
?>