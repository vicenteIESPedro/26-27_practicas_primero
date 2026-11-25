<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barra=[
     [
       "TEXTO"=> "inicio",
       "LINK" =>"/index.php",
     ],
       [ 
       "TEXTO"=> "pruebas"   
     ],  
];




//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>
    Elemento de pruebas
    <br><br>
    <a href="basicas.php">Funcionamiento básico</a><br>
    <a href="pasopar.php">Comunicacion controlador-vista</a><br>
    <a href="array.php">Array</a><br>
    <a href="cadenas.php">Cadenas</a><br>
    <a href="expresiones_regulares.php">Expresiones regulares</a><br>
    <a href="index_funciones.php">funciones</a><br>
    <a href="clases.php">clases</a><br>
    <a href="pagformulario.php">ejemplo de formulario</a><br>
    <a href="cargapagina.php">ejemplo de como cargar otra página</a><br>
    <a href="pruebaficheros.php">prueba de ficheros</a><br>
    <a href="pruebaimagen.php">prueba de imagen</a><br>
    <a href="pruebacookie-sesion.php">prueba de cookies y sesiones</a><br>

<?php
}
