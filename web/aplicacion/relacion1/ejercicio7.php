<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//_____________________
//____ Controlador ____


$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>"/aplicacion/relacion1/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 7",
        "LINK" =>""
    ]
];
/**
 * 7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie de funciones 
 *     para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime.
 *         - Mostrar la fecha actual en el formato “d/m/Y”
 *         - Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
 *         - Mostrar la hora actual en el formato “hh:mm:ss”
 *         - Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
 *         - Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
 *     Se definirán las fechas y se visualizarán directamente en la vista.
 */



/** ___ 1. Mostrar la fecha actual en el formato “d/m/Y” ___
 * Con date() establezco el formato en el que quiero que salga y luego le digo a que fecha quiero que se le aplique 
 * el formato que en este caso queremos la fecha actual la cual se saca con time()
 */



//______________________________________________________________________

//dibuja la plantilla de vista
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 7",$barraUbi);
cuerpo(); // llamo a la vista
finCuerpo();

// **********************************************************

// vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <h2>Ejercicio 7</h2>

<?php
    echo "<h4>Fechas con funciones</h4>";
    
    // 1.Mostrar la fecha actual en el formato “d/m/Y”
    $fechaHoy = date("d/m/Y", time());

    echo $fechaHoy . "<br><br>".PHP_EOL;

    // 2.Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
    $aFechFormLargo = (preg_split("/,+/", (date("d,F,Y,D", (time())))));
    

    // y ahora formo la cadena sacando los datos de la fecha    
    $cadFechaFormatoLargo = "Día " . $aFechFormLargo[0] . ", mes " . $aFechFormLargo[1] . ", año " . $aFechFormLargo[2] . ", día de la semana " . $aFechFormLargo[3];

    echo $cadFechaFormatoLargo . "<br><br>".PHP_EOL;

    // ___ 3. Mostrar la hora actual en el formato “hh:mm:ss” ___ 

    $hora = date("H:i:s", time());

    echo $hora . "<br><br>".PHP_EOL;

    // ___ 4. Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45 ___ 

    // Como en el apartado 1
    $fechaDada = mktime(0, 12, 45, 3, 29, 2024);
    $fechaCortaAp4 = date("d/m/Y", mktime(0, 0, 0, 3, 29, 2024));

    echo $fechaCortaAp4 . "<br><br>".PHP_EOL;

    // Como en el apartado 2
    $aFechLargAp4 = (preg_split("/[,]+/", (date("d,F,Y,D", $fechaDada))));
    $cadFechLargAp4 = "Día " . $aFechLargAp4[0] . ", mes " . $aFechLargAp4[1] . ", año " . $aFechLargAp4[2] . ", día de la semana " . $aFechLargAp4[3];

    echo $cadFechLargAp4 . "<br><br>".PHP_EOL;

    // Como en el apartado 3
    $horaAp4 = date("H:i:s", $fechaDada);

     echo $horaAp4 . "<br><br>".PHP_EOL;

    // ___ 5. Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas ___ 

    $fechaDeHace12dias4horas = time() - (12 * 24 * 60 * 60) - (4 * 60 * 60);
    $fechaCortaAp5 = date("d/m/Y", $fechaDeHace12dias4horas);

    echo $fechaCortaAp5 . "<br><br>".PHP_EOL;

    // Como en el apartado 2
    $aFechLargAp5 = (preg_split("/[,]+/", (date("d,F,Y,D", $fechaDeHace12dias4horas))));
    $cadFechLargAp5 = "Día " . $aFechLargAp5[0] . ", mes " . $aFechLargAp5[1] . ", año " . $aFechLargAp5[2] . ", día de la semana " . $aFechLargAp5[3];

    echo $cadFechLargAp5 . "<br><br>".PHP_EOL;

    // Como en el apartado 3
    $hora5 = date("H:i:s", $fechaDeHace12dias4horas);

    echo $hora5 . "<br><br>".PHP_EOL;


    //_________ Con la clase DateTime

    echo "<h4>Fechas con la clase DateTime</h4>";

    // 1.Mostrar la fecha actual en el formato “d/m/Y”
    $fechaActualDT = new DateTime();

    $fechaCortaDT = $fechaActualDT->format("d/m/Y");

    echo $fechaCortaDT . "<br><br>".PHP_EOL;


    // 2.Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.

    $fechaLargaDT = (preg_split("/[,]+/",($fechaActualDT-> format("d,F,Y,D"))));

    $cadFechLargDT = "Día " . $fechaLargaDT[0] . ", mes " . $fechaLargaDT[1] . ", año " . $fechaLargaDT[2] . ", día de la semana " . $fechaLargaDT[3];

    echo $cadFechLargDT . "<br><br>".PHP_EOL;

    // 3.Mostrar la hora actual en el formato “hh:mm:ss”

    $horaActualDT = $fechaActualDT->format("H:i:s");

    echo $horaActualDT . "<br><br>".PHP_EOL;

    // 4.Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.

    $fechaDadaDT =new DateTime("2024-03-29 12:45:00");
    $fechaDadaDT =DateTime::createFromFormat("d/m/Y H:i:s", "29/03/2025 12:45:00");

    // Como en el apartado 1

    $cadenafechaDadaCortaDT = $fechaDadaDT->format("d/m/Y");

    echo $cadenafechaDadaCortaDT . "<br><br>".PHP_EOL;

    // Como en el apartado 2
    $aFechaDadaLargaDT = (preg_split("/[,]+/",($fechaDadaDT-> format("d,F,Y,D"))));
    $cadenafechaDadaLargaDT = "Día " . $aFechaDadaLargaDT[0] . ", mes " . $aFechaDadaLargaDT[1] . ", año " . $aFechaDadaLargaDT[2] . ", día de la semana " . $aFechaDadaLargaDT[3];

    echo $cadenafechaDadaLargaDT . "<br><br>".PHP_EOL;

    // Como en el apartado 3
    $horaDadaDT =  $fechaDadaDT ->format("H:i:s");

    echo $horaDadaDT . "<br><br>".PHP_EOL;

    // 5.Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas

    $fechaDeHace12dias4horasDT = $fechaActualDT->sub(new DateInterval("P12DT4H"));

    // Como en el apartado 1

    $cadenafechaHace12d4h = $fechaDeHace12dias4horasDT->format("d/m/Y");

    echo $cadenafechaHace12d4h . "<br><br>".PHP_EOL;

    // Como en el apartado 2
    $aFechLargAp5DateTime = (preg_split("/[,]+/",($fechaDeHace12dias4horasDT-> format("d,F,Y,D"))));
    $cadFechLargAp5DT = "Día " . $aFechLargAp5DateTime[0] . ", mes " . $aFechLargAp5DateTime[1] . ", año " . $aFechLargAp5DateTime[2] . ", día de la semana " . $aFechLargAp5DateTime[3];

    echo $cadFechLargAp5DT . "<br><br>".PHP_EOL;

    // Como en el apartado 3
    $hora5DT =  $fechaDeHace12dias4horasDT ->format("H:i:s");

    echo $hora5DT . "<br><br>".PHP_EOL;
    
}
