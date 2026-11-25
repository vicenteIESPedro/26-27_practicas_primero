<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once (RUTABASE."/scripts/librerias/funcionesVarias.php");

//controlador

$barra = [
    [
        "TEXTO" => "inicio",
        "LINK" => "/index.php",
    ],
    [
        "TEXTO" => "prue imagen"
    ],
];

$nombreFichero=RUTABASE."/imagenes/pruebaimagen.jpg";
$crear=false;

if ($crear)
    {
        $imagen=imagecreatetruecolor(250,250);

        //genero el color azul
        $color=imagecolorallocate($imagen,0,0,255);
        //rellena un rectangulo
        imagefilledrectangle($imagen, 10,10,190,190,$color);

        //dibujo una linea blanca
        $color=imagecolorallocate($imagen,255,255,255);
        imagefilledrectangle($imagen, 10,10,100,15,$color);

        imagejpeg($imagen,$nombreFichero);
    }

if (isset($_GET["descargar"]))
    {
        $imagen=imagecreatefromjpeg($nombreFichero);
        $color=imagecolorallocate($imagen,255,255,255);
        imagestring($imagen,2,10,150,"marca agua",$color);
        header('Content-Disposition:attachment;filename="imagen.jpg"');
        imagejpeg($imagen);
        exit;
    }

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("Prueba de ficheros", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera()
{
?>
    <!-- esto va en el head -->

<?php



}

//vista
function cuerpo()
{
?>
    <br><br>
        <img src="/imagenes/pruebaimagen.jpg" alt="Imagen">
        <a href="?descargar" > descargar</a>
<?php


}

