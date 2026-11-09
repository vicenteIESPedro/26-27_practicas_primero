<?php
/**
 * Clase persona con sus datos
 */
class Persona
{
    //propiedades de persona
    private string $_nombre;
    private string $_fecha_nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estado;

    /**
     * Constructor privado que inicializa la persona
     */
    private function __construct()
    {
        $this->_nombre = "prueba";
        $this->_fecha_nacimiento = "01/01/2000";
        $this->_domicilio = "carrera 12";
        $this->_localidad = "antequera";
        $this->_estado = EstadoCivil::SOLTERO;
    }

    /**
     * Cosntructor estatico que crea una persona
     *
     * @param string $nombre  Nombre de la persona
     * @param string $fecha_nacimiento  Fecha de nacimiento
     * @param string $domicilio Domicilio
     * @param string $localidad   Localidad
     * @param EstadoCivil $estado   Estado civil
     * @return static
     */
    static public function registrarPersona(
        string $nombre,
        string $fecha_nacimiento,
        string $domicilio,
        string $localidad,
        EstadoCivil $estado
    ): static 
    {
        $persona = new static();
        $persona->setNombre($nombre);
        $persona->setFechaNacimiento($fecha_nacimiento);
        $persona->setDomicilio($domicilio);
        $persona->setLocalidad($localidad);
        $persona->setEstado($estado);
        return $persona;
    }

    //métodos get/set
    public function getNombre(): string
    {
        return $this->_nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    public function getFechaNacimiento(): string
    {
        return $this->_fecha_nacimiento;
    }

    public function setFechaNacimiento(string $fecha_nacimiento): void
    {
        $this->_fecha_nacimiento = $fecha_nacimiento;
    }

    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio = $domicilio;
    }

    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    public function setLocalidad(string $localidad): void
    {
        $this->_localidad = $localidad;
    }

    public function getEstado(): EstadoCivil
    {
        return $this->_estado;
    }

    public function setEstado(EstadoCivil $estado): void
    {
        $this->_estado = $estado;
    }

    /**
     * Método mágico __toString
     *
     * @return string  Devuelve la descripción de la persona.
     */
    public function __toString(): string
    {
        return $this->getNombre() . " es una persona " . $this->getEstado()->descripcion() . " nacida en " . $this->getFechaNacimiento() . " y que vive en " . $this->getLocalidad();
    }
}
