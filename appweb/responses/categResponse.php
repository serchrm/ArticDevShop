<?php
require_once "../inc/initialconfig.php";

$totalCateg=$_GET["total"];
$filtroConsulta="";
$response="";
$arrayasoc=array();
$indicAsoc=0;

if ($totalCateg=="all"){
    $filtroConsulta="AND TRUE";
}else{
    $filtroConsulta=" AND (";
    for ($i=0;$i<$totalCateg;$i++){
        $filtroConsulta.=(" P.idCateg=".$_GET['cat'.$i]." OR ");
    }
    $filtroConsulta=substr($filtroConsulta,0,strlen($filtroConsulta)-3);
    $filtroConsulta.=" ) ";

}

/*SELECT EG.IDProducto,EG.nombre,EG.Precio,P.idCateg FROM existenciaGeneral EG JOIN producto P ON EG.IDProducto=P.idProd  WHERE Existencia>0 ORDER BY IDProducto, Precio
 DESC;
*/
$firstBand=true;
$anterior="";


if ($queryProd=$conexionBD->query("SELECT EG.IDProducto,EG.nombre,EG.Precio,P.idCateg FROM existenciaGeneral EG JOIN producto P ON EG.IDProducto=P.idProd  WHERE Existencia>0 ".$filtroConsulta." ORDER BY IDProducto, Precio
 DESC;")){
    while ($row = $queryProd->fetch_assoc()){
        if ($firstBand){
            $anterior=$row;
            $firstBand=false;
            //Contenedor tarjeta de producto
            //ACCION A REALIZAR
            $arrayasoc[$indicAsoc]=$row;
            $indicAsoc++;
        }else{
            if (!($anterior["IDProducto"]===$row["IDProducto"])){
                $anterior=$row;
                //accion a realizar
                $arrayasoc[$indicAsoc]=$row;
                $indicAsoc++;
            }
        }

    }
}

$response=json_encode($arrayasoc);
echo $response;