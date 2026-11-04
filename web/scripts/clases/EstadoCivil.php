<?php

/**
 * Tipo enumerado que indica los posibles estados
 * civiles de una persona: Soltero, casado, pareja y viudo
 * Cada estado lleva enlazado un valor numérico
 */
enum EstadoCivil: int
{
    case SOLTERO = 10;
    case CASADO = 20;
    case PAREJA = 30;
    case VIUDO = 40;

    /**
     * Método que devuelve la descripción de 
     * estado
     *
     * @return string mombre del estado sivol
     */
    public function descripcion(): string
    {
       return  $this->name;
    }

    /**
     * Método que devuelve el valor del estado
     *
     * @return integer  devuelve el valor del estado
     */
    public function valor(): int
    {
        return $this->value;
    }

    /**
     * Método que devuelve un array con los casos posibles
     *
     * @return array Devuelve el array con todos los casos posibles
     */
    static public function casos():array
    {
        return EstadoCivil::cases();
    }
}
