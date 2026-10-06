<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

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

const N = 1000;
$datosTiradas = [];

//dibuja la plantilla de la vista
inicioCabecera("RELACION 1");
cabecera();
finCabecera();
inicioCuerpo("RELACION1", $barraUbi);
cuerpo(N, $datosTiradas); //llamo a la vista
finCuerpo();
// **********************************************************



//vista
function cabecera() {}
//vista
function cuerpo($N, $datosTiradas)
{
?>
    <h2>LANZAMIENTO DE UN DADO</h2>
<?php

$datosTiradas = array_fill(0, 6, 0);

for ($i=1; $i<=6; $i++){
        $numDado = mt_rand(1,6);
        echo "Lanzamiento " .$i. " del dado: " . $numDado . "<br>";
    }


echo "<br>";
echo "lanzado el dado " . $N . " veces <br>";

for ($i=1; $i<=$N; $i++){
        $numDado = mt_rand(1,6);
        $datosTiradas[$numDado -1] = $datosTiradas[$numDado -1] + 1;
    }

for($i=0; $i<count($datosTiradas); $i++){
    echo "el " . ($i+1) . " ha salido ". $datosTiradas[$i] . " con un porcentaje de " . (($datosTiradas[$i] / $N) * 100) . "%";
    echo "<br>";
}


}