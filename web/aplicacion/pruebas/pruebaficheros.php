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
        "TEXTO" => "prue ficheros"
    ],
];


$datos = [
    [
        "nombre",
        "vicente",
        16
    ],
    [
        "noemi",
        "ordenador",
        1234,
        12
    ]
];

/*if (!escribirAFichero("datos.txt",$datos))
    {
        paginaError("No se han podido guardar los datos");
        exit;
    }
*/
$errores=[];

if (isset($_POST["descargar"]))
    {
        $nombreSalida="datossssss.pdf";
        header('Content-Type:'.'application/pdf');
        header('Content-Disposition:attachment;filename="'.$nombreSalida.'"');
        $ruta = RUTABASE . "/ficheros/ej2.pdf";
        echo file_get_contents($ruta);
        //echo "esto es lo que va en la respuesta".PHP_EOL;
        //echo "y por tanto en el fichero";
        exit;
    }

if (isset($_POST["subida"]))
    {
        //recojo el nombre
        $nombre="";
        if (isset($_POST["nombre"]))
            $nombre=mb_strtolower(mb_trim($_POST["nombre"]));

        if ($nombre=="")
            $nombre="defecto";

        //recojo el fichero
        $erroresFichero=false;
        if (!isset($_FILES["archivo"]))
            {
                $errores["archivo"][]="no se ha indicado fichero";
                $erroresFichero=true;
            } 
        
        //compruebo si hay errores en la subida
        if (!$erroresFichero && $_FILES["archivo"]["error"]!=0)
            {
                $errores["archivo"][]="El fichero indicado no es correcto";
                $erroresFichero=true;
            }
                
        //compruebo el tipo de fichero
        if (!$erroresFichero)
            {
                $extension=mb_strtolower(pathinfo($_FILES["archivo"]["name"],PATHINFO_EXTENSION));
                
                if ($extension!="pdf")
                    {
                        $erroresFichero=true;
                      $errores["archivo"][]="Solo se permiten archivos PDF";
           
                    }
            }  

        if (!$errores)
            {
                $nombreSubida = RUTABASE . "/ficheros/";
                $nombreSubida = $nombreSubida . "$nombre.pdf";
                if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $nombreSubida)) 
                    {
                        $errores["archivo"][]="El archivo no se ha podido subir";

                    } 
            }
    }

$datos = ["c2daw"];
if (!leerDeFichero("datos.txt", $datos)) {
    paginaError("No se han podido guardar los datos");
    exit;
}

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("Prueba de ficheros", $barra);
cuerpo($errores);  //llamo a la vista
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
function cuerpo(array $errores)
{
        echo mostrarErrores($errores);
?>
    <br><br>
    <form enctype="multipart/form-data" action="" method="POST">
        <!--MAX_FILE_SIZE debe preceder al campo de entrada de archivo-->
        <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
        <!-- El nombre del elemento de entrada determina el nombre en el array
$_FILES -->
        Enviar este archivo:
        <input name="archivo" type="file" /><br>
        <input type="text" name="nombre"/><br><br>
        <input type="submit" value="Enviar fichero" name="subida"/>
        <input type="submit" value="descargar" name="descargar"/>
        
    </form>
<?php


}

/**
 * funcion para escribir en un fichero
 * @param string $nombre nombre del fichero
 * @param mixed $datos valores
 * @return bool devuelve si ejecuta correctamente o hay algún error
 */
function escribirAFichero(string $nombre, ?array $datos = null): bool
{
    //ruta en la que se guardará el fichero
    $ruta = RUTABASE . "/ficheros";
    //si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);
    $ruta .= "/$nombre";

    if (!isset($datos))
        return false;

    //se abre el fichero para escritura
    //si existe se borra el contenido
    $fic = fopen($ruta, "w");
    if (!$fic)
        return false;



    //se recorre el array con los datos
    foreach ($datos as $fila) {
        $linea = "";
        foreach ($fila as $columna) {
            $linea .= $columna . ",";
        }
        $linea .= "\r\n";
        //se escribe en el fichero una linea
        fputs($fic, $linea);
    }
    //se cierra el fichero
    return true;
}

/**
 * funcion para leer de un fichero
 * @paramstring $nombre nombre del fichero
 * @parammixed $datos valores
 * @returnbool devuelve si ejecuta correctamente o hay algún error
 */
function leerDeFichero(string $nombre, array &$datos): bool
{
    //ruta en la que se guardará el fichero
    $ruta = RUTABASE . "/ficheros";
    //si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);
    $ruta .= "/$nombre";

    //se abre el fichero para lectura
    //debe existir
    $fic = fopen($ruta, "r");
    if (!$fic)
        return false;

    //borro el contenido del array
    foreach ($datos as $pos => $valor) {
        unset($datos[$pos]);
    }
    //leo el fichero linea a linea
    while ($linea = fgets($fic)) {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);
        if ($linea != "") {
            $linea = explode(",", $linea);
            $datos[] = $linea;
        }
    }
    //se cierra el fichero
    fclose($fic);
    return true;
}
