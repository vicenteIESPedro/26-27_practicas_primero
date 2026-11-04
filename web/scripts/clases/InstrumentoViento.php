<?php

/**
 * Clase que representa un instrumento de viento
 * 
 */
class InstrumentoViento extends InstrumentoBase
{
    //define su propia propiedad
    protected string $_material="madera";

    /**
     * Constructor al que se pasa la edad y el material
     *
     * @param integer $edad  Edad del instrumento
     * @param string $material Material principal de fabricación
     */
    public function __construct(int $edad = 15, string $material = "Madera")
    {
        //llama al constructor padre indicando una constante para la descripción
        parent::__construct('instrumento de viento', $edad);
        
        $this->_material = $material;
    }

    //redefine método abstracto sonido
    public function sonido(): string
    {
        return "El instrumento de viento produce un sonido al hacer vibrar una columna de aire dentro de su cuerpo.";
    }

    // redefine método abstracto afinal
    final public function afinar(): string
    {
        return "Pasos para afinar el instrumento de viento: ".PHP_EOL.
                "    1. Verificar la embocadura".PHP_EOL.
                "    2. Ajustar las llaves o válvulas".PHP_EOL.
                "    3. Tocar notas de referencia".PHP_EOL.
                "    4. Realizar ajustes finos según sea necesario.";
    }

    //redefine el método mágico __toString
    public function __toString(): string
    {
        return parent::__toString() . " Instrumento de material {$this->_material}. ";
    }


}
