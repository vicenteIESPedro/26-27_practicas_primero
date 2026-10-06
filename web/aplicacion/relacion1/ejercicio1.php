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
        "TEXTO"=>"Ejercicio 1",
        "LINK" =>""
    ]
];

//dibuja la plantilla de vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 1", $barraUbi);
cuerpo(); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <p> 1.- Mostrar el funcionamiento de diversas funciones Matemáticas (round, floor, pow, sqrt, entero a
        hexadecimal, de base 4 a base 8 y al menos dos funciones mas distintas de las anteriores).
    </p>

<?php
    //____ Variables ____

    $num1 = 12.87;
    $num2 = -12.87;
    $num3 = 0.5;

    $numBin = 0b110010;
    $cadBin= "110010";
    $numOCT = 0o265701;
    $cadOct = "265701";
    $numHex = 0xa14f;
    $cadHex= "a14f";
    $numDec = 56;

    // FUNCIÓN ROUND 
    echo "Función ROUND.<br>";

    echo "<ul>
            <li>Número $num1: " . round($num1) . "</li>
            <li>Número $num2: " . round($num2) . "<br></li>
            <li>Número $num3: " . round($num3)  . "<br></li>
        </ul>";

    // _FUNCIÓN FLOOR 
    echo "Función FLOOR.<br>";

    echo "<ul>
            <li>Número $num1: " . floor($num1) . "</li>
            <li>Número $num2: " . floor($num2) . "<br></li>
            <li>Número $num3: " . floor($num3)  . "<br></li>
        </ul>";

    // FUNCIÓN POW 
    echo "Función POW.<br>";

    echo "<ul>
            <li>Número 2<sup>7</sup>: " . pow(2, 7) . "</li>
            <li>Número 4<sup>23</sup>: " . pow(4, 23) . "<br></li>
            <li>Número 6<sup>3</sup>: " . pow(6, 3)  . "<br></li>
        </ul>";

    // FUNCIÓN SQRT 
    echo "Función SQRT.<br>";

    echo "<ul>
            <li>Número 2: " . sqrt(2) . "</li>
            <li>Número 9: " . sqrt(9) . "<br></li>
            <li>Número 20: " . sqrt(20)  . "<br></li>
        </ul>";
    // FUNCIÓN ABS 
    echo "Función ABS.<br>";

    echo "<ul>
            <li>Número $num1: " . abs($num1) . "</li>
            <li>Número $num2: " . abs($num2) . "<br></li>
            <li>Número $num3: " . abs($num3)  . "<br></li>
        </ul>";

    // FUNCIÓN BINARIO A DECIMAL 
    echo "De binario a decimal y al contrario.<br>";

    echo "<ul>
            <li>Numero $numBin, cadena " . $cadBin . ": es " . bindec($cadBin) . " en decimal.<br></li>
            <li>Número " . $cadBin . ": es " . intval($cadBin,2) . " en decimal.<br></li>
            <li>Número " . $numDec . ": es " . decbin($numDec) . " en binario.<br></li>
            
        </ul>";
    // FUNCIÓN OCTAL A DECIMAL 
    echo "De octal a decimal y al contrario.<br>";

   echo "<ul>
            <li>$numOCT Número (octal) " . $cadOct . ": es " . octdec($cadOct) . " en decimal.<br></li>
            <li>$numOCT Número (octal) " . $cadOct . ": es " . intval($cadOct,8) . " en decimal.<br></li>
            <li>Número " . $numDec . ": es " . decoct($numDec) . " en octal. <br></li>
        </ul>";

    // FUNCIÓN HEXADECIMAL A DECIMAL
    echo "De hexadecimal a decimal y al contrario.<br>";
   
    echo "<ul>
            <li>Número " . $numDec . ": es " . dechex($numDec) . " en hexadecimal.<br></li>
            <li>$numHex Número (hexadecimal)" . $cadHex . ": es " . hexdec($cadHex) . " en decimal.<br></li>
        </ul>";
}