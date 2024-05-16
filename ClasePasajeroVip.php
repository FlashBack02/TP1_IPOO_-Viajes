<?php

class PasajeroVip extends Pasajero{
   //La clase "PasajeroVIP" tiene como atributos adicionales 
   //el número de viajero frecuente y cantidad de millas de pasajero

   // los atributos son los atributos de Pasajero + $nroViajeroFrec y $cantMillas
   private  $nroViajeroFrec ;
   private $cantMillas;
  
   public function  __construct($nombrePasajero, $apellidoPasajero, $nroAsiento, $nroTicket, $nroViajeroFrec, $cantMillas){
       // Metodo constructor
       parent :: __construct($nombrePasajero,$apellidoPasajero,$nroAsiento, $nroTicket);
       $this->nroViajeroFrec = $nroViajeroFrec;
       $this->cantMillas = $cantMillas;
   }

   // Métodos GETTER cuya principal responsabilidad es devolver el valor de una propiedad de la instancia de la clase
   public function getNroViajeroFrec(){
       return $this->nroViajeroFrec;
   }
   public function getCantMillas(){
       return $this->cantMillas;
   }
    // FIN Métodos GETTER


   // Método SETTER se utiliza para modificar el valor de una propiedad privada de una clase.
   public function setNroViajeroFrec($nuevoNroViajeroFrec){
       $this->nroViajeroFrec = $nuevoNroViajeroFrec ;
   }
   public function setCantMillas($nuevoCantMillas){
       $this->cantMillas = $nuevoCantMillas;
   }

// FIN Método SETTER

    //Pasajero Vip Para un pasajero VIP se incrementa el importe un 35% 
    //y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%
    public function darPorcentajeIncremento() {
        $incremento = 35; // Incremento base para pasajeros VIP
        if ($this->cantidadMillas > 300) {
            $incremento += 30; // Incremento adicional si las millas son superiores a 300
        }
        return $incremento;
    }
    
  
   public function __toString(){
    $cadena = parent :: __toString();
    $cadena .= "\n______________Número de viajer frecuente: ". $this->getNroViajeroFrec(). "_________________\n";
    $cadena .= ". . . . . . Cantidad de millas: ". $this->getCantMillas() ." . . . . . . . . . \n";
    return $cadena;
   }
  
   public function __destruct(){
   }
}
?>