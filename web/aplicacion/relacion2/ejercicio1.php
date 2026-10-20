<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion2",
        "LINK" => "/aplicacion/relacion2"
    ],
    [
        "TEXTO" => "Ejercicio1",
        "LINK" => "/aplicacion/relacion2/ejercicio1.php"
    ]
];

// *********CONTROLADOR************

$nombre = "Gloria";
$edad = 30;

//creo una cadena con "
$cadena1 = "Hola, me llamo $nombre y tengo $edad años.";

//creo una cadena con '
$cadena2 = 'Hola, me llamo $nombre y tengo $edad años.';

//creo una cadena Heredoc
$cadena3 = <<<CAD
<h3>Bienvenido, $nombre</h1>
<p>Tienes $edad años</p>
<p>Caracteres especiales: &aacute;, é, &ntilde;, ", '</p>
CAD;

//creo una cadena Nowdoc
$cadena4 = <<<'CAD'
<h3>Bienvenido, $nombre</h1>
<p>Tienes $edad años</p>
<p>Caracteres especiales: á, é, ñ, ", '</p>
CAD;

$datos = [$cadena1, $cadena2, $cadena3, $cadena4];

inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($datos);
finCuerpo();

// *****************VISTA***********************

function cabecera() {}


function cuerpo(array $datos)
{
?>
    <h1>EJERCICIO 1:</h1>
<?php

    echo "<h2>CADENA CON \"</H2>".PHP_EOL;
    echo $datos[0].PHP_EOL;;
    echo "<h2>CADENA CON '</H2>".PHP_EOL;
    echo $datos[1].PHP_EOL;
    echo "<h2>CADENA HEREDOC</H2>".PHP_EOL;
    echo $datos[2].PHP_EOL;
    echo "<br>mostrando las entidades<br>".PHP_EOL;
    echo htmlentities($datos[2]).PHP_EOL;
    echo "<h2>CADENA NOWDOC</H2>".PHP_EOL;
    echo $datos[3].PHP_EOL;
    echo "<br>mostrando las entidades<br>".PHP_EOL;
    echo htmlentities($datos[3]).PHP_EOL;

}
