<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//_____________________
//____ Controlador ____

/*
4- Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se
debe generar usando bucles for.
        1
        2 2
        3 3 3
        4 4 4 4
        5 5 5 5 5
Declarar la constante FILAS que se rellenará con el número de filas que se deben crear. Repetir
lo anterior usando FILAS para crear el array y visualizarlo.

Los datos se definirán en el controlador y se visualizarán en la vista. */

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>"/aplicacion/relacion1/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 4",
        "LINK" =>""
    ]
];
const FILAS = 12;


//genero el array usando un valor
$array1 = array();
for ($fil = 1; $fil <= 5; $fil++) {
    for ($col = 1; $col <= $fil; $col++) {
        $array1[$fil][$col] = $fil;
    }
    
}


//genero el array usando la constante
$array2 = array();
for ($fil = 1; $fil <= FILAS; $fil++) {
    for ($col = 1; $col <= $fil; $col++) {
        $array2[$fil][$col] = $fil;
    }
    
}

$datos=[
    "a1"=> $array1,
    "a2"=> $array2
];

//______________________________________________________________________

//dibuja la plantilla de vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 4",$barraUbi);

cuerpo($datos); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo(array $datos)
{
?>
    <h2>Ejercicio de bucles</h2>

<?php
    //recorro el array
    
    echo "<h3>Recorro básico</h3>".PHP_EOL;
    foreach ($datos["a1"] as $fila)
         {
           foreach($fila as $valor) {
                echo $valor. " ";
        }
        echo "<br>".PHP_EOL;
    }
    
    echo "<h3>Recorro con constante FILAS</h3>".PHP_EOL;

    for ($fil = 1; $fil <= FILAS; $fil++) {
        for ($col = 1; $col <= $fil; $col++) {
            echo $datos["a2"][$fil][$col]. " ";
        }
        echo "<br>".PHP_EOL;
    }
    
}
