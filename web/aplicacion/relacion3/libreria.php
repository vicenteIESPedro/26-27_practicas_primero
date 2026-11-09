<?php

/**
 * EJERCICIO 1-------------------------------------------------------------------
 * Metodo que añade como valor la variable $num1 a el array que le pasemos por parametros
 * para que despues de realizar la llamada al metodo nuestro array guarde correctamente toda la 
 * los valores y los mantengan debemos de pasarlo por parametros como referencia usando el simbolo &
 * esto quiere decir que:
 * en PHP realmente al llamar a un método que tiene variables referenciadas esto hacen que reciban 
 * la variable original, sin embargo si un parámetro no tiene referencia se creará una copia de 
 * la variable que le hayas pasado para poder usarla solo dentro de ese bloque de código y 
 * todo lo que hagas fuera no tiene repercusión en la variable original
 * 
 * @param array $array array al que se añadira la posicion asociativa
 * @param string $cad posicion asociativa
 * @param numeric $num1 valor a almacenar
 * @param numeric $num2 numero de ejecuciones de la funcion
 * @return boolean true si se ha hecho. False si da un error
 */
function cuentaVeces(array &$array, string $cad, int|float $num1,int &$num2):bool
{
    static $veces=0;  //contador del numero de ejecuciones
    $veces++;

    $num2=$veces; //Sumamos 1 a la llamada
    
    //Comprobamos si la cadena es errónea
    if($cad === "2daw"||$cad === "primera")
        return false; //hay error

    $array[$cad] = $num1;//Añadimos el valor al array
    return true;//Retornamos un true
}

/**
 * EJERCICIO 2---------------------------------------------------------------------
 * Método que genera una cadena de la cantidad de carácteres elegidos por parametro
 * en caso de que no se le pase nada el valor por defecto de la cadena será 10 carácteres
 * dependiendo del caso el método devolverá un boolean o un String con la cadena generada
 *
 * @param integer $longitudCad
 * @return string|boolean Devuelve la cadena o false en caso de error
 */
function generarCadena(int $longitudCad = 10):string|false
{

    $cadena="";
    $caracteres = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

    // Si la longitud es menor o igual a 0 
    if($longitudCad <= 0)
        return false;  //hay error

    for ($i=0; $i < $longitudCad; $i++)//si no entrará dentro del for y generara la cadena
        $cadena .= $caracteres[mt_rand(0,count($caracteres)-1)];

    return $cadena;//retornamos el string
}

/**
 * EJERCICIO 3-------------------------------------------------------------------------------
 * Método que al menos recibe 3 parámetros, dependiendo del primer parámetro se realizará una operacion
 * u otra, (1 --> suma ,2 --> resta ,3 --> multiplicacion, el resto sumará las posiciones pares y 
 * restará las impares)
 * mediante ...$resto podemos introducir todos los parámetros que necesitemos
 * este $resto recogería a partir del 3er parámetro todos los parámetros siguientes y los 
 * añadiría a un array, para que podamos acceder al valor de este simplemente lo recorremos
 * Dependiendo de la operacion devolverá un entero o un string (1,2,3 -> int y el resto un String) 
 *
 * @param integer $operacion Operacion a realizar
 * @param integer $valor1  Operando 1
 * @param integer $valor2  Operando 2
 * @param integer ...$resto  Otros operandos
 * @return integer Devuelve el resultado de las operaciones
 */
function Operaciones(int $operacion, int $valor1, int $valor2, int ...$resto):int{

    switch($operacion){

        case 1:{//Sumamos los valores 
            $suma = $valor1 + $valor2;
            foreach ($resto as  $valor) 
                $suma += $valor;

            return $suma;
        }

        case 2:{//Restamos los valores 
            $resta = $valor1 - $valor2;
            foreach ($resto as  $valor) 
                $resta -= $valor;
                
            return $resta;
        }

        case 3:{//Multiplicamos los valores 
            $multi = $valor1 * $valor2;
            foreach ($resto as  $valor) 
                $multi *= $valor;
                
            return $multi;
        }

        default:{//Sumamos las posiciones pares, restamos las impares y devolvemos una cadena
            $valores = "";
            $sumaImpar = $valor1;  //consideramos la primera posicion com 1
            $sumaPar = $valor2;

            for ($i=0; $i < count($resto); $i++) { 
                if($i % 2 === 0)//Si la pos es par entonces sumamos el valor de la pos del array
                    $sumaImpar += $resto[$i];
                else    //si es impar restamos el valor de la pos del array
                    $sumaPar += $resto[$i];   
            }

            $valores = $sumaPar-$sumaImpar;
            return $valores; 
        }
    }
}

/**
 * EJERCICIO 4------------------------------------------------------------------------------
 * Funcion en la que realizamos la suma de los tres parámetros y devolvemos el resultado 
 * al primer parámetro, para conseguir esto, este parámetro se pasará por referencia,
 * para que así el resultado de la suma no se borre, asimismo la funcion retorna 
 * el producto de los tres parametros
 * El único parametro obligatorio es el primero que es donde se guardará el result por defecto
 * el resto de parametros tiene valores por defecto 
 *
 * @param integer &$num1 //Numero referencia donde pasaremos el resultado de la suma
 * @param integer $num2 segundo numero
 * @param integer $num3 tercer numero
 * @return integer  devolvemos la multiplicacion de los 3 numeros
 */
function devuelve(int &$num1, int $num2 = 10, int $num3 = 20): int{

    $aux = $num1;
    $num1 += $num2 + $num3; //Realizamos la suma de los valores y lo guardamos en el primer param

    return $aux * $num2 * $num3; //Calculamos el producto de los 3 numeros
}

/**
 * EJERCICIO5---------------------------------------------------------------------------
 * Este método nos permite realizar operaciones básicas como sumar,restar o multiplicar
 * mediante el uso de una cadena y dos operandos, el funcionamiento es el siguiente
 * la cadena le dice a la funcion que operacion queremos realizar y mediante el uso de 
 * las funciones variables simplemete en cada caso llamamos a la variable y le pasamos 
 * los operadores a la variable.
 * esto quiere decir que: si nosotros le pasamos una cadena como suma,el valor de la variable $var
 * será suma, esto lo que hace es "referenciar"(Por así decirlo) a la función suma y si
 * llamamos a $var y le pasamos los parámetros de la funcion suma ésta realizará la operacion
 * 
 * @param string $cad tipo de operacion a realizar: suma, resta, multiplicacion
 * @param integer $op1 primer operando
 * @param integer $op2 segundo operando
 * @return int|false Devuelve el resultado de la operación o false si hay error
 */
function hacerOperacion(string $cad, int $op1, int $op2):int|false{
    $var = "";

    //verificamos la operacion
    switch($cad){
        case "suma":
        case "resta":
        case "multiplicacion":{
            return $cad($op1,$op2);
            break;
        }
        default:{
            return false;
        }
    }

    //return $var($op1,$op2);
}
/**
 * FUNCIONES QUE REFERENCIAREMOS MEDIANTE LA VARIABLE $VAR
 */
function suma(int $num1, int $num2):int{
    return $num1 + $num2;
}
function resta(int $num1, int $num2):int{
    return $num1 - $num2;
}
function multiplicacion(int $num1, int $num2):int{
    return $num1 * $num2;
}

/**
 * EJERICICIO6-----------------------------------------------------------------------------
 */
/**
 * En esta funcion nos permite hacer lo que le pongamos mediante la funcion que 
 * tenemos por parámetros es decir, que a la hora de llamar a la funcion llamadaAFuncion()
 * tendremos que pasarle una funcion anonima con el funcionamiento de esta
 * POR Ejemplo:
 * echo("Funcion que suma: " . llamadaAFuncion(2,4,fn($a,$b) => $a+$b)."<br>").PHP_EOL
 * 
 * Como vemos en este caso hemos llamado a la funcion llamada a funcion y le pasamos dos
 * numeros, además de esto le pasamos una funcion anonima que es la que realmente se va a
 * encargar del funcionamiento del método
 * 
 * @param integer $num operando primero
 * @param integer $num2 operando segundo
 * @param callable $funcion que recibe 2 parametros(Los parámetros de la misma funcion)
 * @return int devuelve el resultado de la operacion
 */
function llamadaAFuncion(int $num, int $num2, callable $funcion):int
{

     return $funcion($num,$num2);
}

/**
 * EJERCICIO7-------------------------------------------------------------------------------
 * Esta función nos permite ordenar un array de cadenas desde la más larga a la mas corta
 * es decir en orden descendente, para ello simplemente usamos el método usort de los array
 * que recibe por parámetros el array a ordenar y una funcion por la que se regirá el método
 * para ordenarlo, es decir dependiendo como desarrollemos esta función se ordenará de una forma
 * u otra, (PARECIDO A EL ARRAY.SORT DE JAVA QUE LE PODIAMOS PASAR UNA FUNCION ANONIMA DE COMPARE
 * Y ASÍ PODER ORDENARLA COMO LO NECESITASEMOS EN ESE MOMENTO)
 * Como podemos ver el parametro que le pasamos al metodo es una referencia del array que vamos a ordenar
 * para que así se aplique la ordenación al array elegido.
 *
 * @param array $arraySinOrden Array a ordenar
 * @return bool 
 */
function ordenar(array &$arraySinOrden):bool{

   return usort($arraySinOrden, fn(string $cad1,string $cad2) => mb_strlen($cad2) - mb_strlen($cad1));
}

/**
 * función semejante a ordena en la que se usa el operador binario
 * <=>
 *
 * @param array $arraySinOrden Array a ordenar
 * @return boolean  Devuelve el array ordenado de mayor a menor longitud
 */
function ordenar1(array &$arraySinOrden):bool{

    return usort($arraySinOrden, function(string $cad1, string $cad2):int{
                return (mb_strlen($cad2) <=> mb_strlen($cad1));
    });
 }
?> 