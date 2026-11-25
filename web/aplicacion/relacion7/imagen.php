<?php
include(dirname(__FILE__) . "/../../cabecera.php");


//prepara el envio al cliente como imagen
header("Content-Type: image/jpeg");
if (isset($_REQUEST["descargar"]))
    {
        $nombre="imagen.jpg";
        header('Content-Disposition:attachment;filename="'.$nombre.'"');
    }

$img=generarImagen($Puntos);
if (!$img)
    exit;

imagejpeg($img);

