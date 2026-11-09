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
        "TEXTO"=>"Ejercicio 6",
        "LINK" =>""
    ]
];
/* 6.- Con el array $vector=array("primera" =>12.56, 24=>true, 67 =>23.76);
    - Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de
    recorrido para mostrar tanto los índices como los valores del array anterior.

    - Simular el funcionamiento de foreach usando las funciones array_keys y array_values para
    mostrar tanto los índices como los valores del array anterior.

    El array se definirá en el controlador y se realizarán las operaciones en la vista.
*/

$vector = array("primera" => 12.56, 24 => true, 67 => 23.76);

//______________________________________________________________________

//dibuja la plantilla de vista
inicioCabecera("Ejercicio 6");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 6",$barraUbi);
cuerpo($vector); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo(array $vector)
{
?>
    <h2>Ejercicio 6</h2>

<?php
    echo "<br>";

    
    echo "<h3>Recorrido usando funciones de cursor</h3>";
    //pongo el puntero a la primera posicion
    reset($vector);
    while(key($vector) != NULL) 
        {
            //obtener clave y valor
            echo "Posición: " . key($vector) . " -> " . current($vector)."<br>";
            //incrementar posicion
            next($vector);
        }

   
    echo "<h3>Usando array_keys y array_values</h3>".PHP_EOL;
    
    $claves=array_keys($vector);
    $valores=array_values($vector);

    for ($cont=0;$cont<count ($claves);$cont++)
    {
        echo "Posición:  $claves[$cont] -> {$valores[$cont]} <br>".PHP_EOL;
        
    }

}