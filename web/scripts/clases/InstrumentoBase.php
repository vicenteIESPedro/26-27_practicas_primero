<?php
/**
 * Clase base de toda la jerarquía de instrumentos
 */
abstract class InstrumentoBase
{
    //propiedades de instancia
    private string $_descripcion;
    protected int $_edad=10;

    //contador de instancias que se han creado
    protected static int $_contador = 0;

    //posición de creación de la instancia
    protected int $_id;

    /**
     * Constructor de la clase base
     *
     * @param string $descripcion descripcion del instrumento
     * @param integer $edad Edad del instrumento. Por defecto 10
     */
    public function __construct(string $descripcion, int $edad = 10)
    {
        self::$_contador++;
        $this->_id = self::$_contador;
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
    }

    /**
     *  método para obtener la descripción
     *
     * @return string Devuelve la descripción
     */ 
    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    /**
     * Método para fijar la descripción
     *
     * @param string $descripcion Nueva descripción
     * @return void
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->_descripcion = $descripcion;
    }

    /**
     * Método para obtener la edad
     *
     * @return integer Devuelve la edad
     */
    public function getEdad(): int
    {
        return $this->_edad;
    }

    /**
     * Método que devuelve una cadena que representa el sonido
     *
     * @return string  Defuelve una cadena con el sonido
     */
    public abstract function sonido(): string;

    /**
     * Devuelve una cadena con los pasos para afinar el instrumento
     *
     * @return string  Devuelve una cadena con los pasos para afinar
     */
    public abstract function afinar(): string;

    /**
     * Método que añade un año a la edad del instrumento
     *
     * @return void
     */
    public function envejecer(): void
    {
        $this->_edad++;
    }

    /**
     * Método magico toString. Permite indicar una descripción
     * cuando el instrumento se convierte en cadena
     *
     * @return string Descripción  del instrumento
     */
    public function __toString(): string
    {
        return "Instrumento con descripción {$this->getDescripcion()}".
                ". Instancia {$this->_id} de un total de " . 
                self::$_contador . ". Tiene {$this->getEdad()} años.".
                " La clase es " . get_class($this).". ";
    }

    // desactiva la sobrecarga de propiedades
    public function __get(string $name):mixed
    {
        throw new Exception("La propiedad {$name} no existe o no es accesible.");
    }

    public function __set(string $name, mixed $value):void
    {
        throw new Exception("No se puede establecer la propiedad {$name}. No existe o no es accesible.");
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
