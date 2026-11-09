<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//_____________________
//____ Controlador ____

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
        "TEXTO"=>"Ejercicio 5",
        "LINK" =>""
    ]
];
/*
5.- Rellenar un array con el siguiente contenido.

    $vector=array();
    $vector[1]="esto es una cadena";
    $vector["posi1"]=25.67;
    $vector[]=false;
    $vector["ultima"]=array(2,5,96);
    $vector[56]=23;

  Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
    - posicion XXX contenido (tipo) YYYYY
    - Según el tipo del contenido
        o Si es un array mostrarlo mediante un foreach.
        o Si es un entero poner entero bonito valor SSS en binario BBBBB
        o Si es un real SSS que al cuadrado es QQQQ
        o Si es una cadena -CCCC-
        o Si es un booleano BBB y su opuesto XXX

Las palabras en mayúscula representan un valor concreto de lo pedido
El array se definirá en el controlador y se visualizará en la vista.
*/

$vector = array();

$vector[1] = "esto es una cadena";
$vector["posi1"] = 25.67;
$vector[] = false;
$vector["ultima"] = array(2, 5, 96);
$vector[56] = 23;




//______________________________________________________________________

//dibuja la plantilla de vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 5",$barraUbi);
cuerpo($vector); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo(array $vector)
{
?>
    <h2>Ejercicio 5</h2>

    <?php
    foreach ($vector as $key => $valor) {
        echo "Posición " .  $key . " contenido (tipo): " . gettype($valor);

        switch (gettype($valor)) {
            case "array": 
                    echo "<br>Contenido del array: ";
                    foreach ($valor as $aux) {
                        echo $aux . ", ";
                    }
                    echo "<br><br>".PHP_EOL;
                    break;
            case "integer": 
                    echo "<br>Entero bonito valor " . $valor . " en binario " . decbin($valor) . "<br><br>".PHP_EOL;
                    //echo "<br><u>Entero</u> valor " . $valor . " en binario " . decbin($valor) . "<br><br>";
                    break;
            case "double": 
                    echo "<br>Real " . $valor . " que al cuadrado es " . pow($valor, 2) . "<br><br>".PHP_EOL;
                    break;
            case "string": 
                    echo "<br>-" . $valor . "-<br><br>".PHP_EOL;
                    break;
            case "boolean": 
                    echo "<br>" . ($valor ? "true" : "false") . " su opuesto -> " . (!$valor ? "true" : "false") . "<br><br>".PHP_EOL;
                    break;
        }
    }
}


