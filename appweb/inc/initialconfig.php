<?php
    define ("USER_DB","moy");
    define("NAME_DB","shop");
    define("PASS_DB","Ddefec25bd");
    define("SERVER_DB","localhost");
    define("DEBUG",true);

    if(DEBUG == "true"){
        ini_set('display_errors', 1);
    }else{
        ini_set('display_errors', 0);
    }

    require_once "tools.php";

    $conexionBD = new mysqli(SERVER_DB,USER_DB,PASS_DB,NAME_DB);   //NUESTRA VARIABLE CON EL OBJETO DE CONEXION A LA BD
    if ($conexionBD->connect_errno){                                                            //MUESTRA ERRORES
        echo "Failed to connect to MySQL: INITIAL CONFIG LINE 18 " . $conexionBD -> connect_error;
        echo "<script>alert('ERROR AL CONECTAR A BASE DE DATOS: ".$conexionBD->connect_error."')</script>";
        die();
    }

