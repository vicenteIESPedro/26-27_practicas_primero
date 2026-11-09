<?php

/**
 * Clase Flauta que hereda de InstrumentoBase.
 * Implementa la herencia múltiple mediante la implementación de la
 * interfaz IFabricable
 */
final class Flauta extends InstrumentoViento implements IFabricable
{

    //redefino elc constructor como privado

    private function __construct(int $edad = 15, string $material = "Madera")
    {
        parent::__construct($edad, $material);

    }

    /**
     * Método estático que actua como costructor de la clase Flauta
     *
     * @param array $datos   Array con posiciones asociativas edad y material
     * @return static  Devuelve una instancia de la clase Flauta.
     */
    static public function CrearDesdeArray(array $datos): static
    {
        //creación de una instancia de flauta
        return new static( $datos["edad"] ?? 15, $datos["material"] ?? "Madera");
    }

    /**
     * Método mágico que se llama una vez clonado el objeto, en la nueva instancia
     *
     * @return void
     */
    public function __clone()
    {

        $this->_edad=0;
        self::$_contador++;
        $this->_id=self::$_contador;   
    }

    //redefine método de la interfaz
    public function metodoFabricacion(): string
    {
        return "La flauta se fabrica moldeando el plástico en la forma deseada y ensamblando las partes necesarias.";
    }

    //redefine método de la interfaz
    public function metodoReciclado(): string
    {
        return "El reciclado de la flauta implica separar el plástico de otros materiales y procesarlo para su reutilización.";
    }
}
