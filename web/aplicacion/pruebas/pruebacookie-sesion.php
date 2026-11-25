<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once (RUTABASE."/scripts/librerias/funcionesVarias.php");

//controlador

$barra = [
    [
        "TEXTO" => "inicio",
        "LINK" => "/index.php",
    ],
    [
        "TEXTO" => "prue cookies y sesiones"
    ],
];


//setcookie("numero",mt_rand(1,100),time()+60*60*24*2);
$valor=0;
//$valor=$_COOKIE["numero"];

session_start();

//$_SESSION["nombre"]="vicente";


//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("Prueba de cookies", $barra);
cuerpo($valor);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera()
{
?>
    <!-- esto va en el head -->

<?php



}

//vista
function cuerpo(int $valor)
{
?>
    <br><br>

<?php
    echo "leido la cookie con valor $valor";

}

