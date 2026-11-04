<?php

/**
 * Clase que implementa la sobrecarga y la iteración sobre las propiedades sobrecargadas
 */
class ClaseMisPropiedades implements Iterator
{
    //propiedades
    private array $_propiedades = [];  //para almacenar las propiedades dinamicas
    public mixed $propPublica=0;
    private mixed $_propPrivada = 25;
    private int $_pos=0;

    /**
     * método mágico para asignar la propiedad sobrecargada
     *
     * @param string $name   propiedad
     * @param mixed $value   valor
     * @return void
     */
    public function __set(string $name, mixed $value): void
    {
        if ($name === '_propPrivada') {
            throw new Exception("La propiedad {$name} no existe.");
        }

        $this->_propiedades[$name] = $value;
    }

    /**
     * método mágico para devolver una propiedad sobrecargada
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        // Impedir lectura externa directa de la privada pedida
        if ($name === '_propPrivada') {
            throw new Exception("La propiedad {$name} no es accesible.");
        }

        // Devolver dinámicas si existen
        if (array_key_exists($name, $this->_propiedades)) {
            return $this->_propiedades[$name];
        }

        // No existe ni fue asignada previamente
        throw new Exception("La propiedad {$name} no existe.");
    }

    /**
     * Método mágico que comprueba si existe una propiedad
     *
     * @param string $name  propiedad
     * @return boolean  devuelve si existe o no
     */
    public function __isset(string $name):bool
    {
        return (isset($this->_propiedades["$name"]));
    }

    /**
     * Metodo que quita la asignación de una propiedad
     *
     * @param string $name propiedad
     * @return void
     */
    public function __unset(string $name):void
    {
        if (isset($this->_propiedades["$name"]))
            unset($this->_propiedades["$name"]);
    }

    //implementación de la interfaz iterable
    public function rewind(): void
    {
        $this->_pos = 0;
        
    }

    public function current(): mixed
    {
        if ($this->_pos==count($this->_propiedades))
            return $this->propPublica;
        if ($this->_pos==count($this->_propiedades)+1)
            return $this->_propPrivada;

        $valores=array_values($this->_propiedades);
        return ($valores[$this->_pos]);
    }

    public function key(): mixed
    {
        if ($this->_pos==count($this->_propiedades))
            return "oi_propPublica";
        if ($this->_pos==count($this->_propiedades)+1)
            return "oi_propPrivada";

        $claves=array_keys($this->_propiedades);
        return ("oi_".$claves[$this->_pos]);
    }

    public function next(): void
    {
        $this->_pos++;
    }

    public function valid(): bool
    {
        return ($this->_pos <= count($this->_propiedades)+1);
    }
}