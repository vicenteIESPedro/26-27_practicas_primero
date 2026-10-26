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
        "TEXTO"=>"Ejercicio 2",
        "LINK" =>""
    ]
];
/*
 2.- Simular el lanzamiento de un dado (6 veces) (usar un bucle for). 

 Además contar el número de veces que aparece cada lado si se hicieran N lanzamientos al estilo (N lo definiremos como constante). 
 Para generar el valor aleatorio usar mt_rand con parámetros (lanzamiento 6 veces) y mt_rand sin parámetros (N veces). 
 Se deben usar arrays para almacenar los resultados.
 Los datos se calcularán en el controlador y se visualizarán en la vista
*/

const N = 1000;

//obtengo las seis tiradas iniciales
$array1 = array_fill(1, 6, 0); 

for ($i = 1; $i <= 6; $i++) {
    $numAleatorio = mt_rand(1, 6); 
    $array1[$numAleatorio]++;
}


//obtengo las n tiradas

$array2 = array_fill(1, 6, 0);
$i=1; 
while ($i<=N)
    {
        
        $numAleatorio =mt_rand();
        $numAleatorio %= 6;
        $numAleatorio +=1;
        $numAleatorio = (mt_rand()  % 6) +1;
        $array2[$numAleatorio]++;
    
        $i++;
    }

$datos=[
    "a1"=>$array1,
    "a2"=>$array2
];

//______________________________________________________________________

//dibuja la plantilla de vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 2",$barraUbi);
cuerpo($datos); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo(array $dat)
{
?>
    <h2>LANZAMIENTO DE UN DADO</h2>

<?php
    echo "lanzamiento del dado 6 veces<br>";
    for ($cont=1;$cont<=count($dat["a1"]);$cont++)
            echo "Lanzamiento $cont, ha salido {$dat["a1"][$cont]}<br>".PHP_EOL;

    echo "<br>Lanzado el dado " . N . " veces<br>";

    for ($i = 1; $i <= count($dat["a2"]); $i++) {
        echo "El " . $i . " ha salido " . $dat["a2"][$i] . " veces, con un porcentaje del " . 
                    round(($dat["a2"][$i] * 100) / N) . "%<br>".PHP_EOL;
        
    }
    echo "<br>".PHP_EOL;

    for ($i = 1; $i <= count($dat["a2"]); $i++) {
        echo "El " . $i . " ha salido " . $dat["a2"][$i] . " veces, con un porcentaje del " . 
                    round(($dat["a2"][$i] * 100) / N) . "%<br>".PHP_EOL;
        
    }
    echo "<br>".PHP_EOL;

    $salir=false;
    $i=1;
    while (!$salir)
        {
            echo "El " . $i . " ha salido " . $dat["a2"][$i] . " veces, con un porcentaje del " . 
                    round(($dat["a2"][$i] * 100) / N) . "%<br>".PHP_EOL;
           
            $i++;
            if ($i>count($dat["a2"]))
                $salir=true;

        }
}


