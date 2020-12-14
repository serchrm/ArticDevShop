<?php
require "../inc/initialconfig.php";

$varEmail= $_GET["mailUs"];

if (isset($varEmail)&&!empty($varEmail)){
    $resultado=$conexionBD->query("SELECT * FROM usuario WHERE email='".$varEmail."'");
    if ($resultado->fetch_assoc()){
        echo "false";
    }else{
        echo "true";
    }
}else{
    echo "Error de conexion al servidor";
}
