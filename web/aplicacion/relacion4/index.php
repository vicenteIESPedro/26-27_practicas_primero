<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//esta es la parte del controlador
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion4"
    ]
];

//crea un instrumento de viento
$instrumentoViento = new InstrumentoViento( 5, "Plástico");

//$flauta2=new Flauta();

//crea una flauta usando el constructor estático
$flauta1 = Flauta::CrearDesdeArray([
    'edad' => 3,
    'material' => 'Madera'
]);

//crea una flauta usando el constructor estático
// sin indicar la edad
$flauta2 = Flauta::CrearDesdeArray([
    'material' => 'Madera'
]);

//clona flauta1
$flauta3 = clone $flauta1;

//crea un nuevo estado civil aleatorio a partir de los estados posibles
$estados = EstadoCivil::casos();
$estadoCivil = $estados[array_rand($estados)];

//crea una nueva persona, con el estado civil indicado anteriormente
$persona = Persona::registrarPersona(
    "Juan Pérez",
    "15/08/1995",
    "Calle Falsa 123",
    "Antequera",
    $estadoCivil
);

//objeto creado con sobrecarga e implementación de Iterator
$Objeto = new ClaseMisPropiedades();
$Objeto->propPublica = "publica";
// $Objeto->_propPrivada = "privada"; // ERROR: no permitido (privada)
$Objeto->propiedad1 = 25;
$Objeto->propiedad2 = "cadena de texto";
$Objeto->propiedad3=true;
if (!isset($Objeto->propiedad2))
     $Objeto->propiedad3=false;

//$Objeto->_propPrivada=1000;


inicioCabecera("RELACION4");
finCabecera();

inicioCuerpo("RELACION4", $barraUbi);
cuerpo($instrumentoViento, $flauta1, 
                $flauta3, 
                $persona, 
               $Objeto);
finCuerpo();

function cuerpo(InstrumentoBase $instrumentoViento, 
                InstrumentoBase $flauta1, 
                InstrumentoBase $instrumentoViento2, 
                Persona $persona, 
                object $Objeto
    )
{
    //muestro los instrumentos
    echo "<h2>Instrumento de Viento</h2>";
    echo $instrumentoViento.PHP_EOL;
    echo "<h2>Flauta 1</h2>";
    echo $flauta1.PHP_EOL;
    echo "<h2>Instrumento de Viento 2</h2>";
    echo $instrumentoViento2.PHP_EOL;

    //muestro la persona
    echo "<h2>Persona</h2>";
    echo $persona.PHP_EOL;

    //muestro la serie de fibonacci
    echo "<h2>Serie Fibonacci</h2>";
    foreach (new SerieFibonacci(10) as $cla =>$numero) {
        echo "$cla => $numero <br> ".PHP_EOL;
    }

    echo "<h2>Serie Fibonacci con Generador</h2>";
    foreach (SerieFibonacci::funcFibonacci(10) as $cla=>$numero) {
         echo "$cla => $numero <br> ".PHP_EOL;
     }

     //muestro la clase especial
    echo "<h2>Clase Mis Propiedades</h2>";
    echo "La propiedad 1 vale " . $Objeto->propiedad1 . "<br>".PHP_EOL;
    foreach ($Objeto as $clave => $valor) {
        echo "$clave =>  $valor <br>".PHP_EOL;
    }
}
