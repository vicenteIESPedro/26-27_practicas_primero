<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//_____________________
//____ Controlador ____

// Barra de ubicación

/**
 * Cada elemento es un array de dos posiciones asociativas
 * TEXTO: testo a mostrar en el elemento
 * LINK: LINK a la pagina. Si esta vaciono tiene LINK
 */
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>""
    ]
];

//dibuja la plantilla de vista
inicioCabecera("RELACIÓN 1");
cabecera();
finCabecera();

inicioCuerpo("RELACIÓN 1",$barraUbi);




cuerpo(); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <ul>
        <li><a href="ejercicio1.php">Ejercicio 1</a></li>
        <li><a href="ejercicio2.php">Ejercicio 2</a></li>
        <li><a href="ejercicio3.php">Ejercicio 3</a></li>
        <li><a href="ejercicio4.php">Ejercicio 4</a></li>
        <li><a href="ejercicio5.php">Ejercicio 5</a></li>
        <li><a href="ejercicio6.php">Ejercicio 6</a></li>
        <li><a href="ejercicio7.php">Ejercicio 7</a></li>
    </ul>
    
<?php

}
