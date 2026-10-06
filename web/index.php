<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador


//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!-- esto va en el head -->
     <?php   


}

//vista
function cuerpo()
{
?>
    <br><br>
   <a href="./aplicacion/pruebas/index.php">Acceso a pruebas</a>
   <br><br>
   <a href="./aplicacion/relacion1/index.php">Relacion1</a>
<?php
}
