<html>

    <head>
        <title>ArticDev Shop</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/appweb/css/styles.css">
        <link rel="stylesheet" href="/appweb/css/prodIndivid.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
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
        <?php
            if (isset($_GET["idProd"])&&!empty($_GET["idProd"])){
                if ($resQuery = $conexionBD->query("SELECT E.IDProducto AS 'id',E.nombre as 'name',MAX(E.Precio) as 'precio',P.descripcion as 'desc' from existenciaGeneral E JOIN producto P ON (E.IDProducto=P.idProd) WHERE IDProducto=".$_GET["idProd"]." AND E.Existencia>0 GROUP BY E.IDProducto;")){
                    while ($row=$resQuery->fetch_assoc()){
                        $namePr=$row["name"];
                        $idPr=$row["id"];
                        $precPr=$row["precio"];
                        $desPr=$row["desc"];
                    }
                }else{
                    header("Location: errorScreen.php?error='El producto no existe'");
                }
            }else{
                header("Location: errorScreen.php?error='referencia no encontrada'");
            }
        ?>
        <div id="contenedorPadre">
            <div id="contCentral">
                <div id="contenImagen">
                    <img src="/appweb/images/prodPics/<?php echo $idPr;?>.png" width="700">
                </div>
                <div id="contLater">
                    <h1 id="nombProd"><?php echo $namePr; ?></h1>
                    <p id="precProd">Desde $ <?php echo $precPr;?></p>
                    <p id="promoProd"><span><img style="color: #97CADB;" src="/appweb/images/iconoFlight.png"></span> Con envíos Artic-Dev recibe tu producto al instante</p>
                    <p id="descrProd"><?php echo $desPr;?></p>
                    <div id="botonCarrito">
                        <p>Añadir al carrito</p>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php";?>
        <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    </body>

</html>