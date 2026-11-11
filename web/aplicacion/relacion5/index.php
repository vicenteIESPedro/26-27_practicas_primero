<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once RUTABASE.'/scripts/librerias/validacion.php';
require_once (RUTABASE."/scripts/librerias/funcionesVarias.php");


$estados = [1 => 'Estudiante', 2 => 'En paro', 3 => 'Trabajando', 4 => 'Jubilado'];
$estudios = [ 0 => 'Sin estudios', 1 => 'Primaria', 2 => 'Secundaria', 
                3 => 'Bachillerato', 4 => 'Ciclo formativo', 5 => 'Universitarios'];

$meses=[1=>"enero","febrero","marzo","abril","mayo","junio",
                "julio","agosto","septiembre","octubre","noviembre","diciembre"];

// Controlador 

$barraUbi = [[
                "TEXTO" => "Inicio", 
                "LINK" => "/index.php"
                ],
            ["TEXTO" => "Relación 5", 
            "LINK" => "/aplicacion/relacion5"
            ]
];

$errores = []; //Array para guardar los mensajes de error de cada campo del formulario
$valores = [
        "nombre"=>'',
        "contrasenia"=>"",
        "rep_contrasenia"=>"",
        "nacimiento"=>"",
        "dia"=>1,
        "mes"=>1,
        "anio"=>2000,
        "carnet"=>"",
        "hora"=>"",
        "estado"=>-1,
        "estudios"=>[],
        "hermanos"=>0,
        "sueldo"=>1100
]; 

//Array para guardar los valores válidos que el usuario ha introducido
$mostrar=false;

//Si se ha enviado el formulario
if (isset($_POST["envio"])) 
    {
        //Nombre
        $nombre="";
        if (isset($_POST['nombre']))
            $nombre = mb_trim(mb_strtoupper($_POST['nombre']));
        if ($nombre=="")
                        {
                $errores['nombre'][] = "El nombre no puede estar vacío.";
                $nombre=mb_substr($nombre,0,25);
            } 
 
        if (validaCadena($nombre, 25, $nombre) == false) 
            {
                $errores['nombre'][] = "El nombre no puede tener mas de 25 caracteres.";
                $nombre=mb_substr($nombre,0,25);
            } 

        if (mb_substr($nombre,0,1)=='H') 
            {
                $errores['nombre'][] = "El nombre no puede empezar por H.";
                //$nombre="";
            } 
        
        $valores['nombre'] = $nombre; 

        //Contraseña
        $clave="";
        if (isset($_POST['contrasenia']))
            $clave = mb_trim($_POST['contrasenia']);
    
        if (!validaExpresion($clave,
                                '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\$_\-;<>@])[\$_\-;<>@a-zA-Z0-9]{8,15}$/', 
                                "")) 
            {
                $errores['contrasenia'][] = "La contraseña debe contener mayúsculas, minúsculas, numeros y simbolos especiales y tener entre 8 y 15 caracteres.";
                $clave="";
            } 
        $valores['contrasenia'] = $clave;

        //repetir contraseña
        $rep_clave="";
        if (isset($_POST['rep_contrasenia']))
            $rep_clave = mb_trim($_POST['rep_contrasenia']);
        
        if ($clave<>"" && $clave<>$rep_clave)
            {
                $errores['rep_contrasenia'][] = "Las contraseñas deben ser idénticas";
                $rep_clave="";
            }
        $valores['rep_contrasenia'] = $rep_clave;
    
    
        //Fecha de nacimiento
        $nacimiento="";
        if (isset($_POST['nacimiento']))
            $nacimiento = trim($_POST['nacimiento']);
        
        if (!validaFecha($nacimiento, '') ) 
            {
                $errores['nacimiento'][] = "Fecha de nacimiento inválida.";
            } 
        $valores['nacimiento'] = $nacimiento;

        
        // Fecha de carnet
        $carnet="";
        $dia=0;
        $mes=0;
        $anio=0;
        if (isset($_POST["carnet"]['dia'])  &&
                isset($_POST["carnet"]['mes'])&&
                isset($_POST["carnet"]['anio']))
            {
                $dia = intval($_POST["carnet"]['dia']);
                $mes = intval($_POST["carnet"]['mes']);
                $anio = intval($_POST["carnet"]['anio']);
                $carnet = "$dia/$mes/$anio"; //fecha del carnet en formato texto
            }

        if (!validaFecha($carnet, ''))
            {
                $errores['carnet'][] = "Fecha de carnet inválida";
                $dia=1;
                $mes=1;
                $anio=2000;
                $carnet = "$dia/$mes/$anio";
            } 
           else 
            {
                // Convertimos la fecha de nacimiento a objeto DateTime
                $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $valores['nacimiento']);

                // Convertimos la fecha del carnet a objeto DateTime
                $fechaCarnet = DateTime::createFromFormat('d/m/Y', $carnet);

                // Creamos una copia de la fecha del carnet y le restamos 18 años
                
                $fechaCarnet->sub(new DateInterval('P18Y'));

                // Comprobamos si esa fecha es anterior a la fecha de nacimiento
                if ($fechaCarnet < $fechaNacimiento) 
                    {
                        $errores['carnet'][] = "Debes tener al menos 18 años para tener carnet.";
                        $carnet = "$dia/$mes/$anio"; //fecha del carnet en formato texto
                        
                    } 
            }
        $valores['dia'] = $dia;     
        $valores['mes'] = $mes;
        $valores['anio'] = $anio;
        $valores["carnet"]=$carnet;

   
        // Hora
        $hora="";
        if (isset($_POST['hora']))
            $hora = trim($_POST['hora']);
        if (!validaHora($hora, '')) 
            {
                $errores['hora'][] = "Hora invalida.";
            } 
        $valores['hora'] = $hora;

        // Estado
        $estado = (int)($_POST['estado'] ?? 0);
        if (!validaRango($estado, $estados,2)) 
            {
                $errores['estado'][] = "Estado invalido.";
                $estado=-1;
            } 
        $valores['estado'] = $estado;

        
        // Estudios
        $estudiosLeido = $_POST['estudios'] ?? [];
        //paso los valores a entero
        $estudiosLeido = array_map('intval', $estudiosLeido);
        if (empty($estudiosLeido)) 
            {
                $errores['estudios'][] = "Selecciona al menos un estudio.";
                $estudiosLeido=[];
            } 
        if (isset($estudiosLeido[0]) && count($estudiosLeido) > 1) 
            {
                $errores['estudios'][] = "Has marcado la opcion Sin estudios, no puedes marcar mas.";
                $estudiosLeido=[0];
            } 
        if (!isset($errores['estudios']))
            {
                //verifico que las opciones sean correctas
                foreach ($estudiosLeido as $clave=>$valor)
                    if (!validaRango($valor,$estudios,2))
                            {
                              $errores['estudios'][] = "Se ha indicado una opcion incorrecta";
                              unset($estudiosLeido[$clave]);
                            }

                      
            }

        $valores['estudios'] = $estudiosLeido;

        // Hermanos
        $hermanos=0;
        if (isset($_POST['hermanos']))
            $hermanos = (int)$_POST['hermanos'];

        if (!validaEntero($hermanos, 0, 20, 0)) 
            {
                $errores['hermanos'][] = "Debe estar entre 0 y 20.";
            } 
        $valores['hermanos'] = $hermanos;

        // Sueldo
        $sueldo=0;
        if (isset($_POST['sueldo']))
            $sueldo = (float)$_POST['sueldo'];
        if (!validaReal($sueldo, 1000, 150000, 1100)) 
            {
                $errores['sueldo'][] = "Debe estar entre 1000 y 150000.";
            } 
        $valores['sueldo'] = $sueldo;
        
         // Resultado
        if (!$errores)
             {
                $mostrar=true;
            } 
        
    }




inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($valores,$errores,$mostrar,$estados,$estudios,$meses);
finCuerpo();

//____ Vista funciones ____

function cabecera() 
{
    ?>

    <style>
        label {
            margin-left: 5px;
        }
        label::before {
            content: "";
            display: block;
            margin-bottom: 5px; /* Espacio entre la línea y el texto del label */
        }
    </style>
    
    <?php
}

function cuerpo(array $valores,array $errores,bool $mostrarContenido, 
                array $estados, array $estudios, array $meses)
{
   if ($mostrarContenido)
        correcto($valores);
       else
        mostrarFormulario($valores,$errores,$estados, $estudios,$meses);
}


function mostrarFormulario(array $valores, array $errores, array $estados, array $estudios, array $meses)  
{
?>
    <a href="indexValida.php" target="_blank">Comprobación librerias</a><br><br>

    <?php 
        echo mostrarErrores($errores);
    ?>

    <form method="post">
        <label for="nombre">Nombre: </label>
        <!-- maxlength la he puesto a 30 para que comprobemos el error !--> 
        <input type="text" name="nombre" value="<?= ($valores['nombre']) ?>" maxlength="30" size="26">
        <?=  mostrarErroresLinea("nombre",$errores,unaSolaEtiqueta:false ) ?><br>
        
        <label for="contrasenia">Contraseña: </label>
        <input type="password" name="contrasenia" value="<?= ($valores['contrasenia']) ?>" maxlength="15" size="16">
        <?=  mostrarErroresLinea("contrasenia",$errores ) ?><br>
        
        <label for="rep_contrasenia">Repetir contraseña: </label>
        <input type="password" value="<?= ($valores['rep_contrasenia']) ?>" name="rep_contrasenia" maxlength="15" size="16">
        <?=  mostrarErroresLinea("rep_contrasenia",$errores ) ?><br>
        
        <label for="nacimiento">Fecha de nacimiento:</label>
        <input type="text" name="nacimiento" value="<?= $valores['nacimiento']; ?>" maxlength="10" size="11"
                placeholder="dd/mm/aaaa">
        <?=  mostrarErroresLinea("nacimiento",$errores ) ?><br>
        
        <label>Fecha de carnet: </label><br>
        Día: <input type="text" name="carnet[dia]" value="<?= $valores['dia']; ?>" maxlength="2" size="3">
        Mes: <select name="carnet[mes]">
            <?php
        
        foreach ($meses as $clave => $valor) {
            $selected = ($clave==$valores["mes"]) ? 'selected' : '';
            echo "<option value='$clave' $selected> $valor</option><br>";
        }?>
        </select>
        Año: <input type="text" name="carnet[anio]" value="<?= $valores['anio']; ?>" maxlength="4" size="5">
        <?=  mostrarErroresLinea("carnet",$errores ) ?><br>
        
        <label for="hora">Hora de levantarse: </label>
        <input type="text" name="hora" value="<?= ($valores['hora']); ?>" maxlength="8" size="9"
                placehoder="00:00:00">
        <?=  mostrarErroresLinea("hora",$errores ) ?><br>
        
        <label>Estado: </label><br>
        <?php
        //opcion incorrecta
        $estados[]='Incorrecta';

        foreach ($estados as $clave => $valor) 
            {
                $checked = ($valores['estado']) == $clave ? 'checked' : ''; //Esto comprueba si el valor que el usuario selecciono antes coincide con el boton actual
                echo "<input type='radio' name='estado' value='$clave' $checked> $valor<br>";
            }
        ?>
        <?=  mostrarErroresLinea("estado",$errores ) ?><br>
        
        <label>Estudios:</label><br>
        <?php
        //opcion incorrecta
        $estudios[6] ='Incorrecta';
        foreach ($estudios as $clave => $valor) {
            $checked = in_array($clave, $valores['estudios'] ?? []) ? 'checked' : '';
            echo "<input type='checkbox' name='estudios[$clave]' value='$clave' $checked> $valor<br>";
        }
        ?>
        <?=  mostrarErroresLinea("estudios",$errores ) ?><br>
        
        <label for="hermanos">Hermanos:</label>
        <input type="text" name="hermanos" value="<?= ($valores['hermanos'] ) ?>" maxlength="2" size="3">
        <?=  mostrarErroresLinea("hermanos",$errores ) ?><br>
        
        <label>Sueldo:</label>
        <input type="text" name="sueldo" value="<?= ($valores['sueldo'] ) ?>" maxlength="8" size="9">
        <?=  mostrarErroresLinea("sueldo",$errores ) ?><br>
        
        <br><input type="submit" value="Enviar" name="envio">
    </form>
<?php
}

function correcto(array $valores)
{
    echo "<h2>Resumen de datos válidos introducidos</h2>";
    foreach ($valores as $clave => $valor) {
        if ($clave === 'estudios') {
            echo "Estudios: " . implode(', ', $valor) . "<br>";
        } else {
            echo "$clave : $valor<br>";
        }
    }
}

