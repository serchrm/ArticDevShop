<?php
require "../inc/initialconfig.php";

$nombre = trim(strtolower($_POST["nombCompReg"]));
$email = trim (strtolower($_POST["emailReg"]));
$passwr= $_POST["contrasReg"];
$nickname=trim($_POST["nombUsuar"]);

if($conexionBD->query("INSERT INTO usuario (nombre,email,pass_md5,nickname,blocked) VALUES('".$nombre."','".$email."',MD5('".$passwr."'),'".$nickname."',false)")){
    $ruta="Location: ../../index.php";
}else{
    $ruta="Location: errorScreen.php?error=".$conexionBD->error;
}
header($ruta);




