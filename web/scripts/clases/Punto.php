<?php

require_once dirname(__FILE__) .'/../librerias/validacion.php';

/**
 * Clase punto que almacena la información sobre un punto:
 * - pos X, pos Y, color y grosor.
 */
class Punto {
    // Constantes públicas
    public const COLORES = [
        "black" => ["nombre" => "negro", "rgb" => [0, 0, 0]],
        "red" => ["nombre" => "rojo", "rgb" => [255, 0, 0]],
        "green" => ["nombre" => "verde", "rgb" => [0, 255, 0]],
        "blue" => ["nombre" => "azul", "rgb" => [0, 0, 255]],
        "bluelight"=>["nombre" => "azul claro", "rgb" => [100, 100, 255]],
        "yellow"=>["nombre" => "amarillo", "rgb" => [255, 255, 0]]
    ];
    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso",
        4 => "muy grueso"
    ];

    // Propiedades privadas
    private int $_x=0;
    private int $_y=0;
    private string $_color;
    private int $_grosor;

    
    /**
     * Contructor de Punto
     *
     * @param integer $x  Coordenada X. Valor entre 0 y 2000
     * @param integer $y  Coordenada Y. Valor entre 0 y 2000
     * @param string $color  Color al dibujar el punto
     * @param integer $grosor  Grosor al dibujar el punto
     */
    public function __construct(int $x, int $y, string $color, int $grosor) {
        if (!$this->setX($x)) {
            throw new \InvalidArgumentException("Coordenada X debe estar entre 0 y 2000.");
        }
        if (!$this->setY($y)) {
            throw new \InvalidArgumentException("Coordenada Y debe estar entre 0 y 2000.");
        }
        if (!$this->setColor($color)) {
            throw new \InvalidArgumentException("Color inválido.");
        }
        if (!$this->setGrosor($grosor)) {
            throw new \InvalidArgumentException("Grosor inválido.");
        }
    }

    /**
     * Asigna coordenada X al punto
     *
     * @param integer $x coordenada X
     * @return boolean
     */
    public function setX(int $x): bool {
        if (validaEntero($x,0,20000,0)) {
            $this->_x = $x;
            return true;
        }
        return false;
    }

    /**
     * Asigna coordenada Y al punto
     *
     * @param integer $y  Coordenada Y
     * @return boolean
     */
    public function setY(int $y): bool {
        if (validaEntero($y,0,20000,0)) {
            $this->_y = $y;
            return true;
        }
        return false;
    }

    /**
     * Asigna el color al punto
     *
     * @param string $color  Color
     * @return boolean
     */
    public function setColor(string $color): bool {
        if (validaRango($color, self::COLORES,2)) {
            $this->_color = $color;
            return true;
        }
        return false;
    }

    /**
     * Asigna el grosor al punto
     *
     * @param integer $grosor   Grosor
     * @return boolean
     */
    public function setGrosor(int $grosor): bool {
        if (validaRango($grosor, self::GROSORES,2)) {
            $this->_grosor = $grosor;
            return true;
        }
        return false;
    }

    /**
     * Devuelve la coordenada X del punto
     *
     * @return integer
     */
    public function getX(): int {
        return $this->_x;
    }

    /**
     * Devuelve la coordenada Y del punto
     *
     * @return integer
     */
    public function getY(): int {
        return $this->_y;
    }

    /**
     * Devuelve el color del punto
     *
     * @return string
     */
    public function getColor(): string {
        return $this->_color;
    }

    /**
     * Devuelve el grosor del punto
     *
     * @return integer
     */
    public function getGrosor(): int {
        return $this->_grosor;
    }

    /**
     * Usado cuando se convierte el objeto en punto
     *
     * @return string
     */
    public function __toString(){
        return $this->getX().";".$this->getY().
            ";".$this->getColor().";".
            $this->getGrosor();
    }

    // Evita propiedades dinámicas
    public function __set(string $name, mixed $value) {
        throw new \Exception("No se encuentra la propiedad $name.");
    }

    public function __get(string $name):mixed {
        throw new \Exception("No se encuentra la propiedad $name.");
    }
    public function __isset(string $name):bool
    {
        return false;
    }

    public function __unset(string $name)
    {
       ; 
    }

}
