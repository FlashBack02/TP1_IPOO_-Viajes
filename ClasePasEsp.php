<?php
include 'ClasePasajero.php';
class PasajeroNecEsp extends Pasajero{
   //a clase Pasajeros con necesidades especiales se refiere a pasajeros 
   //que pueden requerir servicios especiales como sillas de ruedas, asistencia
   // para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias. 

   // los atributos son los atributos de Pasajero + $sillaRuedas, $comidaEsp y $alergia
   private  $sillaRuedas ;
   private $comidaEsp;
   private $alergia;
  
   public function  __construct($nombrePasajero, $apellidoPasajero, $nroAsiento, $nroTicket, $sillaRuedas, $comidaEsp, $alergia){
       // Metodo constructor
       parent :: __construct($nombrePasajero,$apellidoPasajero,$nroAsiento, $nroTicket);
       $this->sillaRuedas = $sillaRuedas;
       $this->comidaEsp = $comidaEsp;
       $this->alergia = $alergia;
   }

   // Métodos GETTER cuya principal responsabilidad es devolver el valor de una propiedad de la instancia de la clase
   public function getSillaRuedas(){
       return $this->sillaRuedas;
   }
   public function getComidaEsp(){
       return $this->comidaEsp;
   }
   public function getAlergia(){
    return $this->alergia;
    }
    // FIN Métodos GETTER


   // Método SETTER se utiliza para modificar el valor de una propiedad privada de una clase.
   public function setSillaRuedas($nuevoSillaRuedas){
       $this->sillaRuedas = $nuevoSillaRuedas ;
   }
   public function setComidaEsp($nuevoComidaEsp){
       $this->comidaEsp = $nuevoComidaEsp;
   }
   public function setAlergia($nuevoAlergia){
    $this->alergia = $nuevoAlergia;
    }

// FIN Método SETTER


//Si el pasajero tiene necesidades especiales y requiere silla de ruedas, 
//asistencia y comida especial entonces el pasaje tiene un incremento del 30%;
// si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
public function darPorcentajeIncremento() {
    $incremento = 0;
    if ($this->getSillaRuedas() && $this->getComidaEsp() && $this->getAlergia()) {
        $incremento = 30;
    } elseif ($this->getSillaRuedas() || $this->getComidaEsp() || $this->getAlergia()) {
        $incremento = 15;
    }
    return $incremento;
}

  
   public function __toString(){
    $cadena = parent :: __toString();
    $cadena .= "\n______________Utiliza silla de rueda: ". $this->getSillaRuedas(). "_________________\n";
    $cadena .= "\n______________Requiere comida especial: ". $this->getComidaEsp(). "_________________\n";
    $cadena .= "\n______________Alergias: ". $this->getAlergia(). "_________________\n";
    return $cadena;
   }
  
   public function __destruct(){
   }
}
?>