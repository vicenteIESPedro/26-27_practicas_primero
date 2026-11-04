<?php


/**
 * Clase que implementa la serie de Fibonacci
 * La clase implementa la interfaz iterable
 */
class SerieFibonacci implements Iterator
{
    //propiedades
    private int $_limite;
    private int $_claveActual;

    /**
     * constructor
     *
     * @param integer $limite Valor que indica hasta el número
     *                          que se genera la serie
     */
    public function __construct(int $limite)
    {
        $this->_limite=($limite<0?0:$limite);
        //$this->_limite = $limite;
        $this->_claveActual = 0;
    }

    /**
     * Función que implementa current de la interfaz.
     * Devuelve el valor actual en la iteración
     *
     * @return integer
     */
    public function current(): int
    {
        return $this->fibonacci($this->_claveActual);
    }

    /**
     * Función que implementa key de la interfaz.
     * Devuelve la clave actual
     *
     * @return integer
     */
    public function key(): int
    {
        return $this->_claveActual;
    }

    /**
     * Función que implementa next de la interfaz.
     * Pone el puntero al siguiente elemento
     *
     * @return void
     */
    public function next(): void
    {
        $this->_claveActual++;
    }

    /**
     * Función que implementa current de la interfaz.
     * Pone el puntero en la primera posición
     *
     * @return void
     */
    public function rewind(): void
    {
        $this->_claveActual = 0;
    }

    /**
     * Función que implementa valid de la interfaz.
     * Devuelve true si la posición del puntero es válida
     * (no se ha llegado al final)
     *
     * @return boolean
     */
    public function valid(): bool
    {
        return $this->_claveActual <= $this->_limite;
    }

    /**
     * Función privada para obtener el valor de fibonacci en 
     * la iteración $n
     *
     * @param integer $n  Iteración
     * @return integer  Devuelve el valor de fibonacci en la iteración n
     */
    private function fibonacci(int $n): int
    {
        //implementación recursiva
        /*return match ($n) {
            0 => 0,
            1 => 1,
            default => $this->fibonacci($n - 1) + $this->fibonacci($n - 2)
        };  */

        //implementación en base a la función
        if ($n==0 )  //son los casos bases
                $valor=0;
            elseif ($n==1)
                        $valor=1;  
                    else
                        $valor=(int)round((1 / sqrt(5) * pow(((1 + sqrt(5)) / 2), $n)) - (1 / sqrt(5) * pow(((1 - sqrt(5)) / 2), $n)));
        return $valor;   
    }

    /**
     * método estático que genera la serie de fibonacci a partir de 
     * un generador
     *
     * @param integer $n Numero máximo de iteraciones
     * @return iterable
     */
     static public function funcFibonacci(int $n):iterable
     {
         for ($i = 0; $i <= $n; $i++) {
             if ($i==0 )  //son los casos bases
                    $valor=0;
               elseif ($i==1)
                            $valor=1;  
                        else
                            $valor=(int)round((1 / sqrt(5) * pow(((1 + sqrt(5)) / 2), $i)) - (1 / sqrt(5) * pow(((1 - sqrt(5)) / 2), $i)));
            yield $i=>$valor;   //devuelve clave=>valor en la iteración      
         }
     }
}
