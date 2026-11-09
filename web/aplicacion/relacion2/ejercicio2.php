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
        "TEXTO" => "Ejercicio2",
        "LINK" => "/aplicacion/relacion2/ejercicio2.php"
    ]
];

// *********CONTROLADOR************

$cadena = "Está la niña en casa";
$datos = ['cadena' => $cadena];

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
    <h1>EJERCICIO 2:</h1>
    <h3>Con corchetes</h3>
    <?php
    //me da un resultado incorrecto por dos cosas,
    // el uso de strlen (no me cuenta bien el numero de caracteres)
    // y el uso de [] que no accede al caracter correco al ser
    // la pagina de codigos multibyte
    $cadena = $datos['cadena'];
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo "<p>";
        for ($j = 0; $j < $i; $j++) {
            echo "&nbsp;";
        }
        //o con str_repeat("&nbsp;",$i)
        
        echo $cadena[$i] . "</p>";
    }

    ?>

    <h3>Con substr</h3>

    <?php

    //mal por el uso de strlen 
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo "<p>";
        for ($j = 0; $j < $i; $j++) {
            echo "&nbsp;";
        }
        echo substr($cadena, $i, 1) . "</p>";
    }

    ?>

    <h3>Con mb_substr</h3>

    <?php
    //bien uso funciones multibyte mb_strlen y mb_substr
    for ($i = 0; $i < mb_strlen($cadena); $i++) {
        echo "<p>";
        echo str_repeat("&nbsp;",$i);

        echo mb_substr($cadena, $i, 1) . "</p>";
    }

    ?>

    <h3>Cadena en orden inverso</h3>

    <?php

    //extraigo los caracteres usando indices negativos para mb_substr 
    for ($i=1; $i<= mb_strlen($cadena); $i++) {
        echo "<p>";
        echo str_repeat("&nbsp;",$i-1);

        echo (($i % 2 == 0) ? (mb_strtoupper(mb_substr($cadena, -$i, 1))) : (mb_substr($cadena, -$i, 1)));
        echo "</p>";
    }

    ?>

    <h3>Cadena separada por partes</h3>

    <?php

    //divido la cadena usando la a
    $cadenaSeparada = explode("a", $cadena);
    $cadenaSeparada = preg_split("/a/", $cadena);
    
    //muestro las palabras obtenidas
    foreach ($cadenaSeparada as $key => $value) {
        echo "<p>$value</p>";
    }

    ?>

    <h3>Reemplazar caracter</h3>

<?php

    $posNina=mb_strpos($cadena,"niña");
    if ($posNina===false)
          echo "la palabra niña no se encuentra";
        else
        {  
            $posiEs=$posNina+mb_strlen("niña");
            $cadena1=mb_substr($cadena,0,$posiEs)."/mujer ".mb_substr($cadena,$posiEs+1);
            echo $cadena1;
        }
}
