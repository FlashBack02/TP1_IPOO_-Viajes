<?php
class Pasajero{
   // Representación de un pasajero

   // los atributos son: $nombrePasajero, $apellidoPasajero, $dniPasajero
   private  $nombrePasajero ;
   private $apellidoPasajero;
   private $dniPasajero;
   private $telefonoPasajero;

  
   public function  __construct($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero){
       // Metodo constructor de la clase Persona
       $this->nombrePasajero = $nombrePasajero;
       $this->apellidoPasajero = $apellidoPasajero;
       $this->dniPasajero = $dniPasajero;
       $this->telefonoPasajero = $telefonoPasajero;
   }

   // Métodos GETTER cuya principal responsabilidad es devolver el valor de una propiedad de la instancia de la clase
   public function getNombrePasajero(){
       return $this->nombrePasajero;
   }
   public function getApellidoPasajero(){
       return $this->apellidoPasajero;
   }
   public function getDniPasajero(){
       return $this->dniPasajero;
   }
   public function getTelefonoPasajero(){
    return $this->telefonoPasajero;
}
// FIN Métodos GETTER


   // Método SETTER se utiliza para modificar el valor de una propiedad privada de una clase.
   public function setNombrePasajero($nuevoNombrePasajero){
       $this->nombrePasajero = $nuevoNombrePasajero ;
   }
   public function setApellidoPasajero($nuevoApellidoPasajero){
       $this->apellidoPasajero = $nuevoApellidoPasajero;
   }
   public function setDniPasajero($nuevoDniPasajero){
       $this->dniPasajero = $nuevoDniPasajero;
   }
   public function setTelefonoPasajero($nuevoTelefonoPasajero){
    $this->telefonoPasajero = $nuevoTelefonoPasajero;
}

// FIN Método SETTER
  
   public function __toString(){
    return  $this->getNombrePasajero(). " ". $this->getApellidoPasajero() . " (DNI ". $this->getDniPasajero() . ") (Tel: ". $this->getTelefonoPasajero() . "\n";
   }
  
   public function __destruct(){
   }
}
?>