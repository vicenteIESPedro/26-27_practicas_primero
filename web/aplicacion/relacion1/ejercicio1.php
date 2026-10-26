<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//_____________________
//____ Controlador ____

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

inicioCuerpo("Ejercicio 1",$barraUbi);
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
    $num3 = 0.36;

    $numBin = 0b110010;
    $cadBin= "110010";
    $numOCT = 0o265701;
    $cadOct = "265701";
    $numHex = 0xa14f;
    $cadHex= "a14f";
    $numDec = 56;

    // __FUNCIÓN ROUND __
    echo "Prueba de la función ROUND.<br>";

    echo "<ul>
            <li>Número $num1: " . round($num1) . "</li>
            <li>Número $num2: " . round($num2) . "<br></li>
            <li>Número $num3: " . round($num3)  . "<br></li>
        </ul>";

    // ____FUNCIÓN FLOOR __
    echo "Prueba de la función FLOOR.<br>";

    echo "<ul>
            <li>Número $num1: " . floor($num1) . "</li>
            <li>Número $num2: " . floor($num2) . "<br></li>
            <li>Número $num3: " . floor($num3)  . "<br></li>
        </ul>";

    // ____FUNCIÓN POW __
    echo "Prueba de la función POW.<br>";

    echo "<ul>
            <li>Número 2<sup>7</sup>: " . pow(2, 7) . "</li>
            <li>Número 4<sup>23</sup>: " . pow(4, 23) . "<br></li>
            <li>Número 6<sup>3</sup>: " . pow(6, 3)  . "<br></li>
        </ul>";

    // ____FUNCIÓN SQRT __
    echo "Prueba de la función SQRT.<br>";

    echo "<ul>
            <li>Número 2: " . sqrt(2) . "</li>
            <li>Número 9: " . sqrt(9) . "<br></li>
            <li>Número 20: " . sqrt(20)  . "<br></li>
        </ul>";
    // ____FUNCIÓN ABS __
    echo "Prueba de la función ABS.<br>";

    echo "<ul>
            <li>Número $num1: " . abs($num1) . "</li>
            <li>Número $num2: " . abs($num2) . "<br></li>
            <li>Número $num3: " . abs($num3)  . "<br></li>
        </ul>";

    //entero a hexadecimal 
    $entero=47;
    echo "Prueba de la entero a hexadecimal.<br>";
    echo "<ul>
            <li>Número $entero, en hexadecimal " . dechex($entero). "</li>
            <li>Número ".($entero+20).": " . dechex($entero+20) . "<br></li>
        </ul>";
   
    // Base 4 a Base 8
    echo "De base 4 a base 8.<br>";

    $cadBase4="13210";
    echo "<ul>".
            "<li>Numero base 4 $cadBase4, en base 8  " . base_convert($cadBase4, 4, 8)."<br></li>".
          "</ul>";
    
        

    // ____FUNCIÓN BINARIO A DECIMAL __
    echo "De binario a decimal y al contrario.<br>";

    echo "<ul>".
            "<li>Numero decimal $numBin, en binario es  " . decbin($numBin)."<br></li>".
            "<li>Cadena Número binario " . $cadBin . ": es " . intval($cadBin,2) . " en decimal.<br></li>".
          "</ul>";
    
          // ____FUNCIÓN OCTAL A DECIMAL __
    echo "De octal a decimal y al contrario.<br>";

   echo "<ul> ".
        "    <li>Numero decimal $numDec : es " . decoct($cadOct) . " en octal.<br></li>".
        "    <li>Cadena numero en octal $cadOct: es " . octdec($cadOct) . " en decimal. <br></li>".
        "</ul>";

    // ____FUNCIÓN HEXADECIMAL A DECIMAL __
    echo "De hexadecimal a decimal y al contrario.<br>";
   echo "<ul> ".
        "    <li>Numero decimal $numHex : es " . dechex($numHex) . " en hexadecimal.<br></li>".
        "    <li>Cadena numero en hexadecimal $cadHex: es " . hexdec($cadHex) . " en decimal. <br></li>".
        "</ul>";
   
}
