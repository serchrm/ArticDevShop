<?php
require_once "../inc/initialconfig.php";

$consulta = $conexionBD->query("SELECT TV.idProd,TV.cantidad,P.nombre FROM totalVentas TV JOIN producto P ON TV.idProd=P.idProd
 ORDER BY TV.cantidad DESC;
");

$arregloAsoc=array();
$i=0;

while ($fila=$consulta->fetch_assoc()){
    $arregloAsoc[$i]=$fila;
    if ($i<4){
        $i++;
    }else{
        break;
    }
}

echo json_encode($arregloAsoc);

