<?php

//defino la ruta para guardar los puntos
define("RUTABASEPUNTOS",dirname(__FILE__) . "/../../imagenes/puntos");

// Crear directorio si no existe
if (!is_dir(RUTABASEPUNTOS)) 
    {
        mkdir(RUTABASEPUNTOS);
    }

/**
 * Función que se encarga de cargar en el array los puntos que hay en el fichero 
 * indicado. En caso de no existir el fichero crea uno con tres puntos
 *
 * @param string $fichero
 * @param array $puntos
 * @return void
 */
function cargaInicialDePuntos(string $fichero, array &$puntos)
{
    if (file_exists($fichero)) 
        {
            if (!leerPuntosDeFichero($fichero, $puntos))
                {
                    ;
                }
        } 
    else 
        {
            // Inicializar con 3 puntos y crear el fichero
            $puntos = [
                new Punto(100, 100, "black", 1),
                new Punto(200, 150, "red", 2),
                new Punto(300, 200, "blue", 3)
            ];
            if (!guardarPuntosAFichero($fichero,$puntos))
                {

                }

        }

}



/**
 * Función que dada una dirección IP y una cadena de UserAgent
 * me devuelve un nombre para un fichero de puntos
 *
 * @param string $dirip   Direccion IP
 * @param string $userAgent Cadena que identifica el navegador
 * @return string
 */
function generarNombreFicheroPuntos(string $dirIP, string $userAgent): string 
{
    $nombre=RUTABASEPUNTOS."/puntos_" . generarNombre($dirIP,$userAgent) . ".txt";
    return $nombre;
}


/**
 * Función que devuelve el nombre en base a la direccion IP y al navegador 
 * 
 *
 * @param string $dirIP direccion IP 
 * @param string $userAgent cadena que identifica el navegador
 * @return string
 */
function generarNombre(string $dirIP, string $userAgent): string
{
    $dirIP = str_replace(['.', ':'], '_', $dirIP);

    $ua = mb_strtolower($userAgent);
    if (mb_strpos($ua, 'chrome') !== false) 
        {
            $nav = 'chrome';
        }
        elseif (mb_strpos($ua, 'firefox') !== false) 
        {
            $nav = 'firefox';
        } 
        elseif (mb_strpos($ua, 'safari') !== false && mb_strpos($ua, 'chrome') === false) 
        {
            // Safari puro (no Chrome)
            $nav = 'safari';
        } 
        elseif (mb_strpos($ua, 'edge') !== false) 
        {
            $nav = 'edge';
        } 
        else 
        {
            $nav = 'otro';
        }

    $nombre=$dirIP . '_' . $nav;
    return $nombre;
}


/**
 * Funcion que lee los puntos del fichero indicado 
 * guardandolos en el array $puntos 
 *
 * @param string $fichero  Fichero que contiene los puntos
 * @param array $puntos Array donde se guardarán los puntos
 * @return boolean Devuelve true si se ha hecho la operación correctamente
 */
function leerPuntosDeFichero(string $fichero, array &$puntos):bool
{
    $fic = @fopen($fichero, "r");
    if (!$fic) 
        return false;

    //leo el fichero linea a linea 
    while ($linea = fgets($fic)) 
    {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);
        if ($linea != "") 
            {
                $valPunto = array_map("mb_trim",explode(";", $linea));
                if(count($valPunto)==4)
                    { 
                        [$x,$y,$color,$grosor]=$valPunto;
                        //genero un punto con valores por defecto
                        $punto=new Punto(0,0,
                                        array_keys(Punto::COLORES)[0],
                                        array_keys(Punto::GROSORES)[0]);
                        //verifico que son correctos todos los valores leidos
                        if (validaEntero($x,0,500,0) &&
                            validaEntero($y,0,500,0) &&
                            $punto->setColor($color??'') &&
                            $punto->setGrosor($grosor??''))
                            {
                                $punto->setX($x);
                                $punto->setY($y);
                                $puntos[]=$punto;
                            }
                    }
            }
    }
    //se cierra el fichero 
    fclose($fic);

    return true;
}

/**
 * Función que guarda los puntos en un fichero 
 *
 * @param string $fichero   Nombre del fichero donde se guardarán los puntos
 * @param array $puntos     Puntos a guardar
 * @return boolean
 */
function guardarPuntosAFichero(string $fichero, array $puntos):bool
{
    //abro el fichero en modo escritura (borro el contenido)
    $fic = @fopen($fichero, "w");
    if (!$fic) 
        return false;

    //leo el fichero linea a linea 
    foreach ($puntos as $punto) 
        {
            $linea="$punto".PHP_EOL;
            fputs($fic, $linea);
        }


    //se cierra el fichero 
    fclose($fic);

    return true;
}

/**
 * Funcion que genera un regurso gd con los puntos
 *
 * @param array $puntos Puntos a dibujar
 * @return GdImage|false
 */
function generarImagen(array $puntos):GdImage|false
{
    $margen=5;
    $prod=2;

    //creo la imagen
    $img=imagecreatetruecolor(500,500);
    if (!$img)
        return false;

    //creo un marco azul sobre el fondo blanco
    $color=imagecolorallocate($img,0,0,255);
    if (!$img)
        return false;

    imagefilledrectangle($img,0,0,500,500,$color);
    if (!$img)
        return false;


    $colorBlanco=imagecolorallocate($img,255,255,250);
    if (!$colorBlanco)
        return false;
    imagefilledrectangle($img,$margen,$margen,500-$margen,500-$margen,$colorBlanco);
    if (!$img)
        return false;

    
    //pinto los puntos
    foreach($puntos as $punto)
        {
            $x=$punto->getX();
            $y=$punto->getY();
            $valColor=Punto::COLORES[$punto->getColor()]["rgb"];
            $grosor=$punto->getGrosor();
            $color=imagecolorallocate($img,$valColor[0],$valColor[1],$valColor[2]);

            //dibuja una cruz que representa el punto con el grosor de la linea indicado
            imagesetthickness($img,$grosor);
            imageline($img, $x-$prod*$grosor,$y-$prod*$grosor
                        ,$x+$prod*$grosor,$y+$prod*$grosor, $color);
            imageline($img, $x-$prod*$grosor,$y+$prod*$grosor
                        ,$x+$prod*$grosor,$y-$prod*$grosor, $color);

            imagefilledellipse($img,$x,$y,$grosor+1,$grosor+1,$colorBlanco);
        }

    return $img;
}


