<?php
class ResponsableV{
   // Representación del responsable del viaje
   // los atributos son: $nroEmpleado, $nroLicencia, $nombreResponsable, $apellidoResponsable
   private $nroEmpleado;
   private $nroLicencia;
   private  $nombreResponsable ;
   private $apellidoResponsable;
   

  
   public function  __construct($nroEmpleado, $nroLicencia, $nombreResponsable, $apellidoResponsable){
       // Metodo constructor de la clase Persona
       $this->nroEmpleado = $nroEmpleado;
       $this->nroLicencia = $nroLicencia;
       $this->nombreResponsable = $nombreResponsable;
       $this->apellidoResponsable = $apellidoResponsable;
   }

   // Métodos GETTER cuya principal responsabilidad es devolver el valor de una propiedad de la instancia de la clase
   public function getNroEmpleado(){
       return $this->nroEmpleado;
   }
   public function getNroLicencia(){
       return $this->nroLicencia;
   }
   public function getNombreResponsable(){
       return $this->nombreResponsable;
   }
   public function getApellidoResponsable(){
    return $this->apellidoResponsable;
}
// FIN Métodos GETTER


   // Método SETTER se utiliza para modificar el valor de una propiedad privada de una clase.
   public function setNroEmpleado($nuevoNroEmpleado){
       $this->nroEmpleado = $nuevoNroEmpleado ;
   }
   public function setNroLicencia($nuevoNroLicencia){
       $this->nroLicencia = $nuevoNroLicencia;
   }
   public function setNombreResponsable($nuevoNombreResponsable){
       $this->nombreResponsable = $nuevoNombreResponsable;
   }
   public function setApellidoResponsable($nuevoApellidoResponsable){
    $this->apellidoResponsable = $nuevoApellidoResponsable;
}

// FIN Método SETTER
  
   public function __toString(){
    return $this->getNombreResponsable(). " ". $this->getApellidoResponsable()."\n".
    "nro. de empleado: ". $this->getNroEmpleado(). "\n". 
    "Licencia: ". $this->getNroLicencia(). "\n";
   }
  
   public function __destruct(){
   }
}
?>