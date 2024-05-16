<?php
class Pasajero{
   // Representación de un pasajero

   // los atributos son: $nombrePasajero,$apellidoPasajero, $nroAsiento, $nroTicket
   private  $nombrePasajero ;
   private $apellidoPasajero;
   private $nroAsiento;
   private $nroTicket;

  
   public function  __construct($nombrePasajero, $apellidoPasajero, $nroAsiento, $nroTicket){
       // Metodo constructor de la clase Persona
       $this->nombrePasajero = $nombrePasajero;
       $this->apellidoPasajero = $apellidoPasajero;
       $this->nroAsiento = $nroAsiento;
       $this->nroTicket = $nroTicket;
   }

   // Métodos GETTER cuya principal responsabilidad es devolver el valor de una propiedad de la instancia de la clase
   public function getNombrePasajero(){
       return $this->nombrePasajero;
   }
   public function getApellidoPasajero(){
       return $this->apellidoPasajero;
   }
   public function getNroAsiento(){
       return $this->nroAsiento;
   }
   public function getNroTicket(){
    return $this->nroTicket;
}
// FIN Métodos GETTER


   // Método SETTER se utiliza para modificar el valor de una propiedad privada de una clase.
   public function setNombrePasajero($nuevoNombrePasajero){
       $this->nombrePasajero = $nuevoNombrePasajero ;
   }
   public function setApellidoPasajero($nuevoApellidoPasajero){
       $this->apellidoPasajero = $nuevoApellidoPasajero;
   }
   public function setNroAsiento($nuevoNroAsiento){
       $this->nroAsiento = $nuevoNroAsiento;
   }
   public function setNroTicket($nuevoNroTicket){
    $this->nroTicket = $nuevoNroTicket;
}
//Implementar el método darPorcentajeIncremento() 
//que retorne el porcentaje que debe aplicarse como
// incremento según las características del pasajero. 
public function darPorcentajeIncremento(){
    //Pasajero común
    return 10;
}

// FIN Método SETTER
  
   public function __toString(){
    return  $this->getNombrePasajero(). " ". $this->getApellidoPasajero() . " (Nro. de asiento: ". $this->getNroAsiento() . ") (NRO. de Ticket: ". $this->getNroTicket() . ") \n";
   }
  
   public function __destruct(){
   }
}
?>