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
        "TEXTO" => "Ejercicio5",
        "LINK" => "/aplicacion/relacion2/ejercicio5.php"
    ]
];

// ***************** CONTROLADOR **************************

$texto = <<<HTML
<h1>Hola Mundo</h1>  <h1>Hola Mundo</h1> ssdfsdf
<p>Esto es un texto con números como 123 y 45.34 56. hola</p>
<div>y correos electronicos ejemplo@mail.com o prueba@empresa.es</div>
HTML;

//patrones
$patronEtiquetas = "/<.+?>/";
$patronNumeros   = "/\d+(\.\d+)?/";
$patronEmail     = "/[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}/";

//ocurrencias
preg_match_all($patronEtiquetas, $texto, $etiquetas, PREG_OFFSET_CAPTURE);
preg_match_all($patronNumeros, $texto, $numeros, PREG_OFFSET_CAPTURE);
preg_match_all($patronEmail, $texto, $emails, PREG_OFFSET_CAPTURE);

// *******************************************************

inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION",$barraUbi);
cuerpo($texto, $etiquetas, $numeros, $emails);
finCuerpo();

// **********************************************************

function cabecera() {}

function cuerpo(string $texto, array $etiquetas, array $numeros, array $emails)
{
?>
    <h1>Ejercicio 5:</h1>

    <h2>Texto original:</h2>
    <pre><?= htmlspecialchars($texto) ?></pre>

    <h2>Etiquetas encontradas:</h2>
    <ul>
        <?php 
            foreach ($etiquetas[0] as $etiqueta)
                {
                    echo "<li>Posición {$etiqueta[1]}:".htmlspecialchars($etiqueta[0])."</li>".PHP_EOL;
                } ?>
    </ul>

    <h2>Números encontrados:</h2>
    <ul>
        <?php 
            foreach ($numeros[0] as $numero)
            {
               echo "<li>Posición $numero[1] : $numero[0] </li>".PHP_EOL;
            } ?>
    </ul>

    <h2>Emails encontrados:</h2>
    <ul>
        <?php 
            foreach ($emails[0] as $email)
            {
                echo "<li>Posición $email[1] : $email[0]</li> ".PHP_EOL;
            }
         ?>
    </ul>
<?php
}
