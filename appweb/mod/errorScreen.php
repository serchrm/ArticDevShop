<!DOCTYPE html>

<html lang="es">
<head>
    <title>ArticDev Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/appweb/css/styleError.css">
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <!--Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/appweb/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/appweb/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/appweb/images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!--Favicon -->
</head>

<body>
<?php require_once "../inc/initialconfig.php";?>
<?php include "header.php" ?>
<div class="contenedor">
    <div class="cont-logo">
        <img src="/appweb/images/LogoPrincipal.png" alt="" class="logo">
    </div>
    <div class="cont-text">
        <h2 class="text">!Lo sentimos, ha ocurrido un error!</h2>
        <p class="error"><?php  echo $_GET["error"];?> :(</p>
        
    </div>
</div>
<?php include "footer.php";?>
<script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
</body>
</html>