<?php
session_start();
if ($_GET["captcha"]==$_SESSION["captcha_codigo"]){
    echo "true";
}else{
    echo "false";
}