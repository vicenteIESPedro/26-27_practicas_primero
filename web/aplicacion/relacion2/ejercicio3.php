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
        "TEXTO" => "Ejercicio3",
        "LINK" => "/aplicacion/relacion2/ejercicio3.php"
    ]
];

// *****************CONTROLADOR**************************

$caracteres = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

$cadena1 = "";
$cadena2 = "";

//genero la cadena caracter a caracter
for ($i = 0; $i < 20; $i++) {
    //en base al array
    $cadena1 .= $caracteres[mt_rand(0, count($caracteres) - 1)];

    //en base al codigo ASCII
    do
       $caracter=mt_rand(48, 122);
    while (($caracter >=58 &&$caracter<=64) ||
           ($caracter >=91 &&$caracter<=96));
    $cadena2 .= chr($caracter);
}

$datos = ['cadena1' => $cadena1, 'cadena2' => $cadena2];

inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 2", $barraUbi);
cuerpo($datos);
finCuerpo();

// **********************************************************

function cabecera() {}

/**
 * Funcion que se encarga de dibujar la vista
 *
 * @param array $datos datos a mostrar en la vista
 * @return void
 */
function cuerpo(array $datos):void
{
?>
    <h1>Ejercicio 3:</h1>
    <h3>a partir de un array con los caracteres correctos</h3>
    <?php

    echo $datos['cadena1'];

    ?>

    <h3>a partir del codigo ASCII quitando no válidos</h3>

<?php

    echo $datos['cadena2'];
}
