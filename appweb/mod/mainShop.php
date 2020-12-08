<!DOCTYPE html>

<html>
<head>
    <title>ArticDev Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
</head>

<body>
<?php require_once "../inc/initialconfig.php";?>
<?php include "header.php" ?>
<div id="areaTienda">
<?php
    //GENERAR AREA CATEGORIAS
    /*CONSULTA EXISTENCIA: SELECT SUM(I.cantidad-if(ISNULL(IV.cantidad),0,I.cantidad)), I.idProd FROM inventario I LEFT JOIN inventario_venta IV ON I.numLote=IV.numLote GROUP BY I.idProd;
    */
    echo "<div id='areaCateg'><ul>";
    if ($resQuery = $conexionBD->query("SELECT nombre FROM categoria")){
        while ($row = $resQuery->fetch_assoc()){
            echo "<li><a href='/appweb/mod/mainShop.php?categ=".$row["nombre"]."'>".$row["nombre"]."</a></li>";
        }
    }else{
        header("Location: /appweb/mod/errorScreen.php?error='error en la consulta'");
    }
    echo "</ul></div>";
    //GENERAR AREA PRODUCTOS
    echo "<div id='areaProductos'>";
    if (!isset($_GET["categ"])||empty($_GET["categ"])){
        $categ="*";
    }else{
        $categ=$_GET["categ"];
    }
    
    echo "</div>";
?>
</div>

<?php include "footer.php";?>
<script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
</body>
</html>
