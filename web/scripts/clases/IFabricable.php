<?php

/**
 * Interfaz IFabricable para simular la herencia múltiple
 */
interface IFabricable
{
    /**
     * Metodo que devuelve una cadena que indica los 
     * pasos para fabricar el instrumento
     *
     * @return string  Cadena con los pasos
     */
    public function metodoFabricacion(): string;
    
    /**
     * Método que devuelve una cadena que explica como se recicla el
     * instrumento
     *
     * @return string Cadena que indica el método de reciclado
     */
    public function metodoReciclado(): string;
}
