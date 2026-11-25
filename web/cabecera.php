<?php 

error_reporting(0); 

date_default_timezone_set('Europe/Berlin');
        

define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO","desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO=="produccion")
    error_reporting(0);
    else 
        error_reporting(E_ALL);  

spl_autoload_register(function ($clase){
    $ruta=RUTABASE."/scripts/clases/";
    $fichero=$ruta."$clase.php";
    
    if (file_exists($fichero))
        {
            require_once($fichero);
        }
      else
        {
            throw new Exception("La clase $clase no se ha encontrado.");
        }
});

include(RUTABASE."/aplicacion/plantilla/plantilla.php");
include_once(RUTABASE."/scripts/librerias/funcionesVarias.php");
include_once(RUTABASE."/aplicacion/relacion7/funcionesRelacion7.php");


//creo todos los objetos que necesita mi aplicación

//defino el array de Puntos
$Puntos=[];
//genero el nombre para el fichero de puntos
$nombreFicheroPuntos=generarNombreFicheroPuntos($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);

// Cargar puntos desde fichero (crear si no existe)
cargaInicialDePuntos($nombreFicheroPuntos,$Puntos);