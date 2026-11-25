<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");


//controlador
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion7"
    ]
];


$datos=[
    "x"=>0,
    "y"=>0,
    "color"=>array_keys(Punto::COLORES)[0],
    "grosor"=>array_keys(Punto::GROSORES)[0]
];

//posibles errores
$errores = [];
$erroresFichero=[];
$erroresGenerales=[];


//nuevo punto
if (isset($_POST["enviar"])) 
    {
        //creo un punto con valores por defecto
        $punto=new Punto(0,0,
                        array_keys(Punto::COLORES)[0],
                        array_keys(Punto::GROSORES)[0]);
                
        //verifico el valor indicado para x
        $x = $_POST["x"] ?? -1;
        if (!validaEntero($x,0,500,0))
            {
                $errores["x"][]="La coordenada X debe estar entre 0 y 500";
            }
        $datos["x"]=$x;
        $punto->setX($x);

        //verifico el valor indicado para y
        $y = $_POST["y"] ?? -1;
        if (!validaEntero($x,0,500,0))
            {
                $errores["y"][]="La coordenada Y debe estar entre 0 y 500";
            }
        $datos["y"]=$y;
        $punto->setY($y);

        //verifico el color introducido
        $color = $_POST["color"] ?? '';
        if (!$punto->setColor($color))
            {
                $errores["color"][]="El color indicado no es correcto";
            }
        $datos["color"]=$color;

        //verifico el grosor indicado
        $grosor = $_POST["grosor"] ?? -1;
        if (!$punto->setgrosor($grosor))
            {
                $errores["grosor"][]="El grosor indicado no es correcto";
            }
        $datos["grosor"]=$grosor;

        if (!$errores)
            {   //no hay errores, se puede guardar el punto
                
                //añado el punto
                $Puntos[]=$punto;
                
                //guardo los puntos en fichero
                if (!guardarPuntosAFichero($nombreFicheroPuntos,$Puntos))
                    {
                        $erroresGenerales[]="No se han guardado correctamente los puntos";

                    }

            }
    }

// borrado de punto
if (isset($_POST["borrar"]))
    {
        $indice = $_POST["punto_borrar"] ?? -1;
        if (isset($Puntos[$indice])) 
            {
                //borro el punto del array
                unset($Puntos[$indice]);

                //guardo los puntos en el fichero
                if (!guardarPuntosAFichero($nombreFicheroPuntos,$Puntos))
                    {
                        $erroresGenerales[]="No se han guardado correctamente los puntos";
                    }

            }
    }

//subir fichero
if (isset($_POST["subir"])) 
    {
        //verifico que me han indicado un fichero correcto
        $erroresFichero=[];
        if (!isset($_FILES["fichero"]))
            $erroresFichero[]="no se ha indicado un fichero";

        //verifico si ha habido errores en la subida
        if (!$erroresFichero && $_FILES["fichero"]["error"]!=0)
            {
              $erroresFichero[]="Se han producido errores al subir el fichero";
            }

        //verifico si el fichero tiene extension .dat o .txt
        if (!$erroresFichero)
            {
                if ($_FILES["fichero"]["type"]!="text/plain")
                      $erroresFichero[]="Solo se permiten ficheros de texto";
            }

        if (!$erroresFichero)
            {//si no hay errores, cargamos el fichero
                $p=[];
                if (leerPuntosDeFichero($_FILES["fichero"]["tmp_name"], $p))
                    {  //se ha leido correctamente
                        // se actualiza el array;
                        $Puntos=array_merge($Puntos,$p);

                        //guardo los puntos en el fichero
                        if (!guardarPuntosAFichero($nombreFicheroPuntos,$Puntos))
                            {
                                $erroresGenerales[]="No se han guardado correctamente los puntos";

                            }


                    }  
            }

    }










inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION", $barraUbi);

cuerpo($Puntos, $datos,  $errores, $erroresFichero,$erroresGenerales);
finCuerpo();



// **********************************************************

function cabecera() {}


function cuerpo(array $puntos, array $datos, array $errores, 
                array $erroresFichero, array $erroresGenerales)
{

?>
    <br>
    <br>
    <br>

<?php


    formulario($datos, $errores);
    formularioBorrar($puntos);
    mostrarResumen($puntos);
    formularioSubirPuntos($erroresFichero);
    mostrarImagen();

}

/**
 * Función que se encarga de mostrar errores de tipo 
 * general
 *
 * @param array $erroresGenerales  lista de errores
 * @return void
 */
function mostrarErroresGenerales(array  $erroresGenerales)
{
    if ($erroresGenerales) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($erroresGenerales as  $valor=>$error) 
            {
            
                    echo "$error <br>" . PHP_EOL;
            }
            
        echo "</div>";
    }
  
}

/**
 * Formulario para insertar un punto
 *
 * @param array $datos Datos actuales introducidos
 * @param array $errores  Errores
 * @return void
 */
function formulario(array $datos, array $errores)
{

    echo "<h2>Formulario</h2>";

    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as  $valor=>$error) {
            foreach ($error as  $texto)
                {
                    echo "$valor: $texto <br>" . PHP_EOL;
                }
            
        }
        echo "</div>";
    }

?>
    <form action="" method="post">

        <label for="x">Coordenada X: </label>
        <input type="text" name="x"  
                value="<?= $datos["x"]; ?>" maxlength="3" size="4"><br>

        <label for="y">Coordenada Y: </label>
        <input type="text" name="y" 
                value="<?= $datos["y"]; ?>" maxlength="3" size="4"><br>

        <label for="color">Color: </label>
        <select name="color" >
            <?php
                foreach (Punto::COLORES as $clave=>$valor)
                    {
                        $cadena="<option value=\"$clave\" ".($datos["color"]==$clave?"selected":"").">{$valor["nombre"]}</option>"; 
                        echo $cadena.PHP_EOL; 
                    }
                $cadena="<option value=\"125\" >Color inexistente</option>"; 
                echo $cadena.PHP_EOL;  
                ?>
        </select><br>

        <label for="grosor">Grosor: </label><br>
        <?php
            foreach (Punto::GROSORES as $clave=>$valor)
                {
                    $cadena="<input type=\"radio\" name=\"grosor\" value=\"$clave\" ";
                    if ($clave==$datos["grosor"])
                        $cadena.="checked";
                    $cadena.=">$valor<br>".PHP_EOL;
                    echo $cadena;
                }
            $cadena="<input type=\"radio\" name=\"grosor\" value=\"234\" >Grosor inexistente<br>";
            echo $cadena.PHP_EOL;
                      

        ?>
        <input type="submit" class="boton" value="Añadir punto" name="enviar">

    </form>

<?php
}

/**
 * función para mostrar un formulario de borrar punto
 *
 * @param array $puntos  Puntos existentes
 * @return void
 */
function formularioBorrar(array $puntos)
{
    echo "<h2>Borrar punto</h2>";
    ?>
    <form action="" method="post">
        <input type="hidden" name="accion" value="borrar">
        <select name="punto_borrar">
            <?php 
                foreach ($puntos as $i => $p)
                {
            ?>
                <option value="<?= $i ?>"><?= $p ?></option>
            <?php
                } 
            ?>
        </select>
        <input type="submit" name="borrar" value="Borrar">
    </form>
    <?php
}

/**
 * Función que dibuja un formulario para subir un fichero
 *
 * @return void
 */
function formularioSubirPuntos(array $erroresFichero)
{
    echo "<h2>Subir fichero de puntos</h2>";
    if ($erroresFichero) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($erroresFichero as  $valor=>$error) 
            {
            
                    echo "$error <br>" . PHP_EOL;
            }
            
        echo "</div>";
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
        <label>Fichero: </label><input type="file" name="fichero"><br>
        <input type="submit" name="subir" value="Subir">
    </form>
    <?php
}


/**
 * función que dibuja un resument de los puntos existentes
 *
 * @param array $puntos Puntos existentes
 * @return void
 */
function mostrarResumen(array $puntos)
{
    echo "<h2>Resumen de puntos</h2>";
    $texto = "";
    foreach ($puntos as $punto) {
        $texto .= "Punto-> X:".$punto->getX().", Y:".$punto->getY().
            ", color:".$punto->getColor().", grosor:".
            $punto->getGrosor().PHP_EOL;
    }
    echo "<textarea rows=\"7\" cols=\"50\">$texto</textarea>";
}

/**
 * función que muestra una imagen con los puntos y un enlace a la descarga
 *
 * @return void
 */
function mostrarImagen()
{
    echo "<h2>Imagen</h2>";
    echo "<img src='imagen.php' alt='Imagen de puntos'>";
    echo "<br><a href='imagen.php?descargar=true' target='_blank'>Descargar imagen</a>";
}


