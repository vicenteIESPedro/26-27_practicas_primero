<?php

// LIBRERIA DE FUNCIONES QUE USARÉ EN LOS PROGRAMAS QUE DESARROLLE

/**
 * Funcion que devuelve una cadena con los errores formateados.
 * Los errores se pondrán dentre de una etiqueta del tipo indicado
 * a la que se colocará la clase
 *
 * @param array $errores  Array con todos los errores
 * @param string $etiqueta   Etiqueta a usar. Por defecto, div
 * @param string $clase   Clase a indicar dentro de la etiqueta. Por defecto clase error
 * @return string  Devuelve una cadena con los errores formateados.
 */
function mostrarErrores(array $errores, string $etiqueta="div", 
                         string $clase="error"):string
{
    $cadena="";

    if ($errores)
        {  //si hay errores

            //etiqueta de apertura
            $cadena.="<$etiqueta class=\"$clase\">"; 

            foreach($errores  as $campo =>$erroresCampo)
                foreach($erroresCampo as $err)
                {
                    //pone el error
                    $cadena.="$campo => $err <br>".PHP_EOL;
                }
            
            //etiqueta de cierre
            $cadena.="</$etiqueta >";
        }
    return $cadena;
}

/**
 * Función que devuelve una cadena con los errores correspondientes al campo indicado.
 * Se utiliza la etiqueta indicada para colocar el error. En esta etiqueta se
 * usa la clase indicada. 
 * Por último, se pondrá una sola etiqueta para todos los errores (unaSolaEtiqueta a true)
 * o una por error  
 *
 * @param string $campo  Campo para el que se mostrarán los errores
 * @param array $errores  Array con todos los errores de los campos
 * @param string $etiqueta  Etiqueta en la que se colocarán los errores  Por defecto, span
 * @param boolean $unaSolaEtiqueta Se definirá una sola etiqueta (O true) o una por error (false).
 *                                 Por defecto false
 * @param string $clase  Clase a usar en la etiqueta. Por defecto, error
 * @return string   Devuelve una cadena html con el código generado
 */
function mostrarErroresLinea(string $campo, array $errores, string $etiqueta="span", 
                        bool $unaSolaEtiqueta=false, string $clase="error"):string
{
    $cadena="";

    if (isset($errores[$campo]) && $errores[$campo])
        {  //si hay errores para el campo

            //si se pone una sola etiqueta
            if ($unaSolaEtiqueta)
                $cadena.="<$etiqueta class=\"$clase\">"; 

            foreach($errores[$campo]  as $err)
                {
                    //si se pone una etiqueta por error
                    if (!$unaSolaEtiqueta)
                        $cadena.="<$etiqueta class=\"$clase\">";

                    //se pone el error
                    $cadena.=$err;

                    //si se pone una etiqueta por error
                    if (!$unaSolaEtiqueta)
                        $cadena.="</$etiqueta >";
                    
                }

            //si se tiene una sola etiqueta
            if ($unaSolaEtiqueta)
                $cadena.="</$etiqueta >";
        }
    return $cadena;
}