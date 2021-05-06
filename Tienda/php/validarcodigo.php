<?php

include "conexion.php";

if(isset($_POST['codigo'])){
    $repuesta = $conexion -> query("SELECT * FROM cupones WHERE codigo='".$_POST['codigo']."'");
    if(mysqli_num_rows($repuesta) == 0){
        echo "Codigo no valido";
    }
    else{
        $datos = mysqli_fetch_row($repuesta);
        if($datos[2] == 'Activo'){
            $arreglo = array(
                'id' => $datos[0],
                'codigo' => $datos[1],
                'estado' => $datos[2],
                'tipo' => $datos[3],
                'valor' => $datos[4],
                'fecha_vencimiento' => $datos[5]
            );
            echo json_encode($arreglo);
        }
        else{
            echo "error";
        }
    }
}
else{
    echo "error";
}
?>