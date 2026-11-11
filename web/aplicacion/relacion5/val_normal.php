<?php
namespace VALNORMAL;

/**
 * Esta función comprueba que $var contiene un entero cuyo valor está entre $min y $max.
 *
 * @param integer $var Valor a comprobar
 * @param integer $min Minimo
 * @param integer $max Maximo
 * @param integer $defecto Valor a asignar $var en caso de que falle la validacion
 * @return boolean Devuelve true y es correcto, false en caso contrario
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool 
{
    if ($var >= $min && $var <= $max)
        {
            return true;
        }
    $var = $defecto;
    return false;
}

/**
 * Esta función comprueba que un número real está dentro de un rango
 * Si no está le asigna al número el valor por defecto
 *
 * @param float $var  Número a comprobar
 * @param float $min  Mínimo del rango
 * @param float $max  Máximo del rango
 * @param float $defecto  Valor por defecto
 * @return boolean Devuelve true si el número está dentro del rango
 * . False en caso contrario
 */
function validaReal(float &$var, float $min, float $max, float $defecto):bool
{
    if ($var >= $min && $var <= $max) 
        {
            return true;
        }
    $var = $defecto;
    return false;
}

/**
 * Función que comprueba si una fecha es válida en el formato dd/mm/aaaa
 *
 * @param string $var Fecha a comprobar
 * @param string $defecto Valor a asignar a fecha en caso de no ser correcta
 * @return boolean Devuelve true si la fecha es válida. False en caso contrario
 */
function validaFecha(string &$var, string $defecto): bool
{
    $patron = '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/';

    if (preg_match($patron, $var, $arrayCoincidencias)) 
        {
            $dia = (int)$arrayCoincidencias[1];
            $mes = (int)$arrayCoincidencias[2];
            $año = (int)$arrayCoincidencias[3];

            
            // Validar rangos
            if (checkdate($mes,$dia,$año))
                {

                    // Saneamiento
                    $var = sprintf('%02d/%02d/%04d', $dia, $mes, $año);
                    return true;
                }
        }

    // Si no es válida, asignar valor por defecto
    $var = $defecto;
    return false;
}

/**
 * Funcion que comprueba si una hora  es válida.
 *
 * @param string $var  hora a comprobar
 * @param string $defecto  Hora por defecto
 * @return boolean  Devuelve true si la hora es correcta. False en caso contrario
 */
function validaHora(string &$var, string $defecto): bool
{
    $patron = '/^([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})$/';

    
    if (preg_match($patron, $var, $arrayCoincidencias)) 
        {
            $hora = (int)$arrayCoincidencias[1];
            $minutos = (int)$arrayCoincidencias[2];
            $segundos = (int)$arrayCoincidencias[3];

            // Validar rangos
            if ($hora >= 0 && $hora <= 23 &&
                $minutos >= 0 && $minutos <= 59 &&
                $segundos >= 0 && $segundos <= 59) 
                {

                    // Saneamiento
                    $var=mb_substr("0000$hora",-2).":".
                        mb_substr("0000$minutos",-2).":".
                        mb_substr("0000$segundos",-2);
                    return true;
                }
        }
    // Si no es válida, asignar valor por defecto
    $var = $defecto;
    return false;
}

/**
 * Funcion que comprueba si un correo electrónico es válido o no
 *
 * @param string $var  Correo a comprobar
 * @param string $defecto Valor a asignar en caso de que no sea valido
 * @return boolean  Devuelve true si es correcto el correo. False en caso contrario
 */
function validaEmail(string &$var, string $defecto):bool
{
    $patron = '/^[a-zA-Z][a-zA-Z0-9]*@[a-zA-Z][a-zA-Z0-9]*.[a-zA-Z]{2,3}$/';

    
    $ocurrencias=[];
    $valor=preg_match($patron, $var,$ocurrencias);
    if ($valor) {  //es correcto el correo
        return true;
    }

    // se asigna el valor por defecto
    $var = $defecto;
    return false;
}

/**
 * Función que comprueba si una cadena tiene una longitud
 * inferior a una dada 
 *
 * @param string $var Cadena a comprobar
 * @param integer $longitud  Longitud máxima
 * @param string $defecto Valor a asignar si no es correcta
 * @return boolean Devuelve true en caso de ser válida. False en caso contrario
 */
function validaCadena(string &$var, int $longitud, string $defecto):bool
{
    
    if(mb_strlen($var)<=$longitud)
        {
            return true;
            
        } 

    //no es válida, asigna valor por defecto    
    $var = $defecto;
    return false;
}

/**
 * Función que comprueba si una cadena cumple una expresión regular
 *
 * @param string $var   Cadena a comprobar 
 * @param string $expresion  Expresión regular
 * @param string $defecto Valor a asignar en caso de que no sea válida
 * @return boolean   Devuelve true si es válida. False en caso contrario
 */
function validaExpresion(string &$var, string $expresion, string $defecto): bool
{
    
    if (preg_match($expresion, $var)) {
        return true;
    }

    //no es correcta. Asigna valor por defecto.
    $var = $defecto;
    return false;
}

/**
 * Función que comprueba si un valor está en un rango. Si tipo es
 * es 1, comprueba que esté entre los valores. Si tipo es 2 comprueba que esté 
 * entre las claves
 *
 * @param mixed $var Valor a comprobar
 * @param array $posibles  Array con todos los valores posibles
 * @param integer $tipo 1: en los valores, 2 en las claves
 * @return boolean Devuelve true si el valor está. False en caso contrario
 */
function validaRango(mixed $var, array $posibles, int $tipo = 1): bool
{
    if ($tipo === 1) 
        {
            // Comprobar si $var está entre los valores del array
            return in_array($var, $posibles, true);
        } 
    if ($tipo === 2)
        {
            // Comprobar si $var está entre las claves del array
            return array_key_exists($var, $posibles);
        }

    return false;
}

