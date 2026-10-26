<?php

include "libreria.php";//Importamos la libreria dentro del index para poder usarla

include_once(dirname(__FILE__) . "/../../cabecera.php");

//esta es la parte del controlador
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion3"
    ]
];

//esta es la parte de la vista
inicioCabecera("RELACION 3");
cabecera();
finCabecera();
inicioCuerpo("RELACION 3",$barraUbi);
cuerpo();
finCuerpo();
// **********************************************************

function cabecera() 
{
   ?>


   <?php
}


function cuerpo()
{
/**
* EJERCICIO 1----------------------------------------------------------------------
*/

   echo("<h3>PRUEBA DE LA FUNCIÓN DEL EJERCICIO 1</h3>").PHP_EOL;

   $arrayEjer1 = [];//Array al cual añadiremos todos los valores
   $numeroContador = 0;//Variable donde llevaremos la cuenta de todas las llamadas

   echo cuentaVeces($arrayEjer1,"",43,$numeroContador) ? "Añadido correctamente<br>":"Error al añadir<br>".PHP_EOL;
   
   echo cuentaVeces($arrayEjer1,"pos",43,$numeroContador) ? "Añadido correctamente<br>":"Error al añadir<br>".PHP_EOL;
   
   if (cuentaVeces($arrayEjer1,"pos2",54,$numeroContador))
         echo "Añadido correctamente<br>".PHP_EOL;
      else
         echo  "Error al añadir<br>".PHP_EOL;


   echo cuentaVeces($arrayEjer1,"pos3",654,$numeroContador) ? "Añadido correctamente<br>":"Error al añadir<br>".PHP_EOL;

   //En estos dos no nos dejará ya que el valor de la cadena es primera y 2daw
   echo cuentaVeces($arrayEjer1,"primera",23,$numeroContador) ? "Añadido correctamente<br>":"Error al añadir<br>".PHP_EOL;
   echo cuentaVeces($arrayEjer1,"2daw",87,$numeroContador) ? "Añadido correctamente<br>":"Error al añadir<br>".PHP_EOL;

   echo "<br>";
   //Mostramos el array y la cantidad de llamadas que hemos realizado
   mostrarArray($arrayEjer1);
   echo("<br>Cantidad de llamadas realizadas al método -> " . $numeroContador ."<br>").PHP_EOL;


/**
 * EJERCICIO 2---------------------------------------------------------------------
 */
   echo("<h3>PRUEBA DE LA FUNCIÓN DEL EJERCICIO 2</h3>").PHP_EOL;

   $num=12;
   $res=generarCadena($num);
   if ($res!==false)
        echo "Cadena de $num carácteres generados: $res<br>".PHP_EOL;
      else
        echo "No se pueden indicar como parametro $num".PHP_EOL;
      
        
   echo "Cadena de 10 carácteres generados: " . generarCadena(10) . "<br>".PHP_EOL;
   echo generarCadena(0) ? "" :"No se puede generar una cadena de 0 o menos carácteres<br>".PHP_EOL;

/**
 * EJERCICIO 3----------------------------------------------------------------------
 */
   echo "<h3>PRUEBA DE LA FUNCIÓN DEL EJERCICIO 3</h3>".PHP_EOL;
   
   echo "Suma de los valores: " . Operaciones(1,1,2,3,4,5)."<br>".PHP_EOL;//Da 15
   echo("Resta de los valores: " . Operaciones(2,1,2,3,4,5)."<br>").PHP_EOL;//Da -13
   echo("Multiplicación de los valores: " . Operaciones(3,1,2,3,4,5)."<br>").PHP_EOL;//Da 120
   echo("Suma de los valores: " . Operaciones(1,5,5)."<br>").PHP_EOL;//Da 10
   echo("Resta de los valores: " . Operaciones(2,5,5)."<br>").PHP_EOL;//Da 0
   echo("Multiplicación de los valores: " . Operaciones(3,5,5)."<br>").PHP_EOL;//Da 25
   echo("Suma de pares y resta impares: " . Operaciones(4,5,5,3,3,4,7)."<br>").PHP_EOL;//15 - 12 =  3
   echo("Suma de pares y resta impares (pasando resto como array: " . Operaciones(4,5,5,...[3,3,4,7])."<br>").PHP_EOL;
   echo("Suma de pares y resta impares: " . Operaciones(...[4,5,5,3,3,4,7])."<br>").PHP_EOL;//15 - 12 =  3
   
   /**
    * EJERCICIO 4----------------------------------------------------------------------
    */
    
   echo("<h3>PRUEBA DE LA FUNCIÓN DEL EJERCICIO 4</h3>").PHP_EOL;
   
   $num1 = 2;
   echo("Valor de num1 es: " . $num1."<br>").PHP_EOL;

   echo("Realizamos la llamada al método(3 parámetros):<br>").PHP_EOL;
   echo("Valor producto:".devuelve($num1,3,4)."<br>").PHP_EOL;
   echo("Valor de num1 es: " . $num1."<br><br>").PHP_EOL;

   echo("Realizamos la llamada al método(1er parámetro):<br>").PHP_EOL;
   echo("Valor producto:".devuelve($num1)."<br>").PHP_EOL;
   echo("Valor de num1 es: " . $num1."<br><br>").PHP_EOL;

   echo("Realizamos la llamada al método(1er y 2º parámetro):<br>").PHP_EOL;
   echo("Valor producto:".devuelve($num1,3)."<br>").PHP_EOL;
   echo("Valor de num1 es: " . $num1."<br><br>").PHP_EOL;

   echo("Realizamos la llamada al método(1er y 3er parámetro):<br>").PHP_EOL;
   echo("Valor producto:".devuelve($num1,num3:4)."<br>").PHP_EOL;
   echo("Valor de num1 es: " . $num1."<br><br>").PHP_EOL;

   /**
    * EJERCICIO 5----------------------------------------------------------------------
    */
    
   echo("<h3>PRUEBA DE LA FUNCIÓN DEL EJERCICIO 5</h3>").PHP_EOL;
   
   echo("Prueba de suma: ". hacerOperacion("suma",3,4)."<br>").PHP_EOL;
   echo("Prueba de resta: ". hacerOperacion("resta",3,4)."<br>").PHP_EOL;
   echo("Prueba de multiplicación: ". hacerOperacion("multiplicacion",3,4)."<br>").PHP_EOL;
   echo("Prueba de fallo de función: ". hacerOperacion("division",3,4)."<br>").PHP_EOL;//da error
   
   /**
    * EJERCICIO6--------------------------------------------------------------------------
    */
   echo("<h3>PRUEBA DE LA FUNCIÓN DEL EJERCICIO 6</h3>").PHP_EOL;

   echo("Funcion que suma: " . llamadaAFuncion(2,4,fn(int $a, int $b) => $a+$b)."<br>").PHP_EOL;
   echo("Funcion que resta: " . llamadaAFuncion(2,4,fn(int $a, int $b) => $a-$b)."<br>").PHP_EOL;
   echo("Funcion que multiplica: " . llamadaAFuncion(2,4,fn(int $a, int $b) => $a*$b)."<br>").PHP_EOL;

   //llamadas con funciones anónimas, variable-función y definiendo una funcion aónima en la llamada

   $s= function (int $a, int $b){
      return $a+$b;
   };

   echo ("Funcion que suma (funcion anonima): " . llamadaAFuncion(2,4,$s)."<br>").PHP_EOL;

   $s="suma";
   echo ("Funcion que suma (variable-funcion): " . llamadaAFuncion(2,4,$s)."<br>").PHP_EOL;
   
   echo ("Funcion que suma (funcion anonima en parametro): " . 
            llamadaAFuncion(2,4,function (int $a, int $b){
                              return $a+$b;
                           })."<br>").PHP_EOL;
   

   /**
    * EJERICIO7-----------------------------------------------------------------------------
    */
   $arrayEjer7 = ["uno","grande","caminos","a"];
   
   echo("<h3>PRUEBA DE LA FUNCIÓN DEL EJERCICIO 7</h3>").PHP_EOL;

   echo("Antes de ordenar el array: <br>").PHP_EOL;
   mostrarArray($arrayEjer7);//Antes de ordenar
   
   ordenar($arrayEjer7);//Ordenamos el array
   
   echo("<br>Después de ordenar el array: <br>").PHP_EOL;
   mostrarArray($arrayEjer7);

   $arrayEjer7 = ["uno","grande","caminos","a"];
   
   echo("<br><br>Antes de ordenar el array: <br>").PHP_EOL;
   mostrarArray($arrayEjer7);//Antes de ordenar
   
   ordenar1($arrayEjer7);//Ordenamos el array
   
   echo("<br>Después de ordenar el array: <br>").PHP_EOL;
   mostrarArray($arrayEjer7);
}

//si necesito funciones adiciones las coloco a partir de aqui
function mostrarArray(array $array)
{
   foreach ($array as $clave=>$valor)
      echo "Array: $clave => $valor <br>".PHP_EOL;
}



    