<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//_____________________
//____ Controlador ____
/* 3.- Array.
    -Se quiere:
        a) Crear una variable de tipo array.
        b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
        c) Añadir el valor 34 al final
        d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
        e) Rellenar la posición “ultima” con el array (1,34,”nueva”);

    - Hacer lo anterior creando y rellenando el array usando varias sentencias.
    - Hacer lo anterior usando una sola sentencia con array;
    - Hacer lo anterior usando una sola sentencia con []
    - Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados

Los arrays se definirán en el controlador y se visualizarán en la vista.
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
        "TEXTO"=>"Ejercicio 3",
        "LINK" =>""
    ]
];

// a) Crear una variable de tipo array.
$array1 = array();

// b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
$array1[1] = 12;
$array1[16] = 9;
$array1[54] = -5;
$array1[]=34;
$array1["uno"]="cadena";
$array1["dos"]=true;
$array1["tres"]=1.345;
$array1["ultima"][0]=1;
$array1["ultima"][1]=34;
$array1["ultima"][2]="nueva";

// Hacer lo anterior usando una sola sentencia con array;

$array2 = array(1 => 12, 16 => 9, 54 => -5,34,
                    "uno"=>"cadena", "dos" =>true,
                "tres"=>1.345, "ultima"=>array(1,34,"nueva"));


// Hacer lo anterior usando una sola sentencia con [];
$array3 = [1 => 12, 16 => 9, 54 => -5,34,
                    "uno"=>"cadena", "dos" =>true,
                "tres"=>1.345, "ultima"=>[1,34,"nueva"]];

$datos= ["arr1" => $array1,
        "arr2" => $array2,
        "arr3" => $array3
];

//______________________________________________________________________

//dibuja la plantilla de vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 3",$barraUbi);
cuerpo($datos); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo(array $datos)
{
?>
    <h2>Ejercicio Arrays</h2>

<?php
    echo "<hr>recorro array 1</h3>".PHP_EOL;

    foreach ($datos["arr1"] as $posicion =>$contenido) {
        if (!is_array($contenido))
              echo "en posicion {$posicion}, valor {$contenido} <br>".PHP_EOL;
            else
              {
                echo "en posicion $posicion, array con valores <br>".PHP_EOL;
                foreach ($contenido as $elemento)
                     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$elemento <br>".PHP_EOL;

              }   
               

    }

    echo "<br><br><h3>recorro array 2</h3>".PHP_EOL;

    foreach ($datos["arr2"] as $posicion =>$contenido) {
        if (!is_array($contenido))
              echo "en posicion {$posicion}, valor {$contenido} <br>".PHP_EOL;
            else
              {
                echo "en posicion $posicion, array con valores <br>".PHP_EOL;
                foreach ($contenido as $elemento)
                     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$elemento <br>".PHP_EOL;

              }   
               

    }

    echo "<br><br><h3>recorro array 3</h3>".PHP_EOL;

    foreach ($datos["arr3"] as $posicion =>$contenido) {
        if (!is_array($contenido))
              echo "en posicion {$posicion}, valor {$contenido} <br>".PHP_EOL;
            else
              {
                echo "en posicion $posicion, array con valores <br>".PHP_EOL;
                foreach ($contenido as $elemento)
                     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$elemento <br>".PHP_EOL;

              }   
               

    }


}


function creaArrayV1()
{


    return $array1;
}

function creaArrayV2()
{
    // Hacer lo anterior usando una sola sentencia con array;

    return $array2;
}

function creaArrayV3()
{
    
    return $array3;
}

