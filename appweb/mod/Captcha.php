<?php
session_start();

Captcha::Mostrar();

class Captcha
{
    public static function Mostrar()
    {
        // La cantidad de caracteres que va a mostrar el captcha
        $longitud = 5;

        // Los caracteres que nuestro captcha va a considerar
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // El catpcha creado
        $captcha = "";

        for ($i = 0; $i < $longitud; $i++) {
            $captcha .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

        // Guardamos el catpcha en sesion para validar
        $_SESSION['captcha_codigo'] = strtolower($captcha);

        // Creamos la imagen

        // Creamos una imagen con forma de rectangulo por las medidas definidas a continuación
        $ancho = 600;
        $alto = 180;
        $fuente_tamano = 80;
        $fuente = '../otherResources/font.ttf';

        $img = imagecreatetruecolor($ancho, $alto);

        // Agregamos el texto
        $blanco = ImageColorAllocate($img, 255, 255, 255); // BLANCO

        // Coordenadas de donde va a ir el texto
        $x = $fuente_tamano+$fuente_tamano*0.5;
        $y = ($alto / 2) + 25;

        // El texto blanco
        imagettftext($img, $fuente_tamano, 0, $x, $y, $blanco, $fuente, $captcha);

        // Generamos la imagen
        ImageJpeg($img,"../otherResources/imagenCaptcha.jpeg");
        header("Content-Type: image/jpeg");
        ImageDestroy($img);
        echo "CAPTCHA OKAY";
    }

    public static function Valida($valor)
    {
        if (!isset($_SESSION['captcha_codigo'])) return false;
        return $_SESSION['captcha_codigo'] == $valor;
    }
}

