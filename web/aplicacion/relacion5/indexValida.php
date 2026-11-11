<?php
require_once 'val_normal.php';
require_once 'val_filter.php';


include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador





$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion5",
        "LINK" => "/aplicacion/relacion5"
    ],
    [
        "TEXTO" => "Prueba funciones"
    ]
];



inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo();
finCuerpo();

// **********************************************************

function cabecera() {}


function cuerpo()
{
?>
    
<?php
    echo "<h1>LIBRERIA NORMAL</h1>".PHP_EOL;
    echo "<h3>Validación entero</h3>".PHP_EOL;
    $entero=16;
    $min=10;
    $max=50;
    echo "El número $entero";
    if (\VALNORMAL\validaEntero($entero,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $entero.<br>".PHP_EOL;

    $entero=70;
    $min=10;
    $max=50;
    echo "El número $entero";
    if (\VALNORMAL\validaEntero($entero,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $entero.<br>".PHP_EOL;

    echo "<h3>Validación numero real</h3>".PHP_EOL;
    $real=16.5;
    $min=10;
    $max=50;
    echo "El número $real";
    if (\VALNORMAL\validaReal($real,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $real.<br>".PHP_EOL;

    $real=16.5;
    $min=0;
    $max=15;
    echo "El número $real";
    if (\VALNORMAL\validaReal($real,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $real.<br>".PHP_EOL;

    echo "<h3>Validación fecha</h3>".PHP_EOL;
    $fecha="3/7/2026";
    echo "La fecha $fecha";
    if (\VALNORMAL\validaFecha($fecha, "01/01/2020"))
            echo " es válida. Queda como $fecha<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $fecha.<br>".PHP_EOL;

    $fecha="30/2/2026";
    echo "La fecha $fecha";
    if (\VALNORMAL\validaFecha($fecha, "01/01/2020"))
            echo " es válida. Queda como $fecha<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $fecha.<br>".PHP_EOL;

    echo "<h3>Validación hora</h3>".PHP_EOL;
    $hora="2:7:2";
    echo "La hora $hora";
    if (\VALNORMAL\validaHora($hora, "00:00:00"))
            echo " es válida. Queda como $hora<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $hora.<br>".PHP_EOL;

    $hora="2:7";
    echo "La hora $hora";
    if (\VALNORMAL\validaHora($hora, "00:00:00"))
            echo " es válida. Queda como $hora<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $hora.<br>".PHP_EOL;

    echo "<h3>Validación email</h3>".PHP_EOL;
    $email="vicente@pedrosa.es";
    echo "El email $email";
    if (\VALNORMAL\validaEmail($email, "direccion@pedrosa.es"))
            echo " es válido. <br>".PHP_EOL;
        else
            echo " no es válido. Queda como $email.<br>".PHP_EOL;

    $email="12vic@pedrosa.es";
    echo "El email $email";
    if (\VALNORMAL\validaEmail($email, "direccion@pedrosa.es"))
            echo " es válido. <br>".PHP_EOL;
        else
            echo " no es válido. Queda como $email.<br>".PHP_EOL;

    echo "<h3>Validación cadena</h3>".PHP_EOL;
    $cadena="IES pedrosa";
    echo "La cadena '$cadena'";
    if (\VALNORMAL\validaCadena($cadena,20, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    $cadena="La niña tiene dos hermanos y tres hermanas";
    echo "La cadena '$cadena'";
    if (\VALNORMAL\validaCadena($cadena,20, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    echo "<h3>Validación expresión regular</h3>".PHP_EOL;
    $cadena="IES pedrosa25";
    $expresion="/[0-9]+/";
    echo "La cadena '$cadena' con expresión '$expresion' ";
    if (\VALNORMAL\validaExpresion($cadena,$expresion, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    $cadena="IES pedrosa25";
    $expresion="/[0-9]+[a-z]+/i";
    echo "La cadena '$cadena' con expresión '$expresion' ";
    if (\VALNORMAL\validaExpresion($cadena,$expresion, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    echo "<h3>Validación rango</h3>".PHP_EOL;
    $valor="pos";
    $array=[
        1=> "lunes",
        "pos"=>"a la derecha",
        10=>234
    ];
    echo "El valor $valor en el array ";
    print_r($array);
    if (\VALNORMAL\validaRango($valor,$array,2))
            echo " está entre las claves. <br>".PHP_EOL;
        else
            echo " no está entre las claves.<br>".PHP_EOL;

            $valor="pos";
    $array=[
        1=> "lunes",
        "pos"=>"a la derecha",
        10=>234
    ];
    echo "El valor $valor en el array ";
    print_r($array);
    if (\VALNORMAL\validaRango($valor,$array,1))
            echo " está entre los valores. <br>".PHP_EOL;
        else
            echo " no está entre los valores.<br>".PHP_EOL;


    echo "<h1>LIBRERIA FILTER</h1>".PHP_EOL;
    echo "<h3>Validación entero</h3>".PHP_EOL;
    $entero=16;
    $min=10;
    $max=50;
    echo "El número $entero";
    if (\VALFILTER\validaEntero($entero,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $entero.<br>".PHP_EOL;

    $entero=70;
    $min=10;
    $max=50;
    echo "El número $entero";
    if (\VALFILTER\validaEntero($entero,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $entero.<br>".PHP_EOL;

    echo "<h3>Validación numero real</h3>".PHP_EOL;
    $real=16.5;
    $min=10;
    $max=50;
    echo "El número $real";
    if (\VALFILTER\validaReal($real,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $real.<br>".PHP_EOL;

    $real=16.5;
    $min=0;
    $max=15;
    echo "El número $real";
    if (\VALNORMAL\validaReal($real,$min,$max, $min))
            echo " está entre $min y $max<br>".PHP_EOL;
        else
            echo " no está entre $min y $max. Se le asigna valor por defecto $real.<br>".PHP_EOL;

    echo "<h3>Validación fecha</h3>".PHP_EOL;
    $fecha="3/7/2026";
    echo "La fecha $fecha";
    if (\VALFILTER\validaFecha($fecha, "01/01/2020"))
            echo " es válida. Queda como $fecha<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $fecha.<br>".PHP_EOL;

    $fecha="30/2/2026";
    echo "La fecha $fecha";
    if (\VALFILTER\validaFecha($fecha, "01/01/2020"))
            echo " es válida. Queda como $fecha<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $fecha.<br>".PHP_EOL;

    echo "<h3>Validación hora</h3>".PHP_EOL;
    $hora="2:7:2";
    echo "La hora $hora";
    if (\VALFILTER\validaHora($hora, "00:00:00"))
            echo " es válida. Queda como $hora<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $hora.<br>".PHP_EOL;

    $hora="2:7";
    echo "La hora $hora";
    if (\VALFILTER\validaHora($hora, "00:00:00"))
            echo " es válida. Queda como $hora<br>".PHP_EOL;
        else
            echo " no es válida. Queda como $hora.<br>".PHP_EOL;

    echo "<h3>Validación email</h3>".PHP_EOL;
    $email="vicente@pedrosa.es";
    echo "El email $email";
    if (\VALFILTER\validaEmail($email, "direccion@pedrosa.es"))
            echo " es válido. <br>".PHP_EOL;
        else
            echo " no es válido. Queda como $email.<br>".PHP_EOL;

    $email="12vic@pedrosa.es";
    echo "El email $email";
    if (\VALFILTER\validaEmail($email, "direccion@pedrosa.es"))
            echo " es válido. <br>".PHP_EOL;
        else
            echo " no es válido. Queda como $email.<br>".PHP_EOL;

    echo "<h3>Validación cadena</h3>".PHP_EOL;
    $cadena="IES pedrosa";
    echo "La cadena '$cadena'";
    if (\VALFILTER\validaCadena($cadena,20, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    $cadena="La niña tiene dos hermanos y tres hermanas";
    echo "La cadena '$cadena'";
    if (\VALFILTER\validaCadena($cadena,20, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    echo "<h3>Validación expresión regular</h3>".PHP_EOL;
    $cadena="IES pedrosa25";
    $expresion="/[0-9]+/";
    echo "La cadena '$cadena' con expresión '$expresion' ";
    if (\VALFILTER\validaExpresion($cadena,$expresion, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    $cadena="IES pedrosa25";
    $expresion="/[0-9]+[a-z]+/i";
    echo "La cadena '$cadena' con expresión '$expresion' ";
    if (\VALFILTER\validaExpresion($cadena,$expresion, "Por defecto"))
            echo " es válida. <br>".PHP_EOL;
        else
            echo " no es válida. Queda como '$cadena'.<br>".PHP_EOL;

    echo "<h3>Validación rango</h3>".PHP_EOL;
    $valor="pos";
    $array=[
        1=> "lunes",
        "pos"=>"a la derecha",
        10=>234
    ];
    echo "El valor $valor en el array ";
    print_r($array);
    if (\VALFILTER\validaRango($valor,$array,2))
            echo " está entre las claves. <br>".PHP_EOL;
        else
            echo " no está entre las claves.<br>".PHP_EOL;

            $valor="pos";
    $array=[
        1=> "lunes",
        "pos"=>"a la derecha",
        10=>234
    ];
    echo "El valor $valor en el array ";
    print_r($array);
    if (\VALFILTER\validaRango($valor,$array,1))
            echo " está entre los valores. <br>".PHP_EOL;
        else
            echo " no está entre los valores. <br>".PHP_EOL;        
}