<?php
class Viaje{
	// De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros 
    //y los pasajeros del viaje
	private $codigoViaje;
	private $destino;
    private $cantMaxPasajeros;
    private $objPasajero = [];
    private $objResponsableV;
    // los atributos son: $codigoViaje, $destino, $cantMaxPasajeros, $objPasajero, $objResponsableV.

    public function __construct($codigoViaje, $destino, $cantMaxPasajeros, $objResponsableV) {
        // Metodo constructor de la clase Persona
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->objResponsableV = $objResponsableV;
    }


    // Métodos GETTER cuya principal responsabilidad es devolver el valor de una propiedad de la instancia de la clase
    public function getCodigoViaje(){
        return $this->codigoViaje;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getObjPasajero(){
        return $this->objPasajero;
    }
    public function getObjPasajeroIndice($i){
        return $this->objPasajero[$i];
    }
    public function getObjResponsableV(){
        return $this->objResponsableV;
    }

    // Método SETTER se utiliza para modificar el valor de una propiedad privada de una clase.
    public function setCodigoViaje($nuevoCodigoViaje){
        $this->codigoViaje = $nuevoCodigoViaje ;
    }
    public function setDestino($nuevoDestino){
        $this->destino = $nuevoDestino ;
    }
    public function setCantMaxPasajeros($nuevaCantMaxPasajeros){
        $this->cantMaxPasajeros = $nuevaCantMaxPasajeros ;
    }
    public function setObjPasajero($nuevoObjPasajero){
        $this->objPasajero = $nuevoObjPasajero;
    }
    public function setObjPasajeroIndice($i, $nuevoObjPasajero){
        $this->objPasajero[$i] = $nuevoObjPasajero;
    }
    public function setObjResponsableV($nuevoObjResponsableV){
        $this->objResponsableV = $nuevoObjResponsableV ;
    }

    public function agregarPasajero($nuevoObjPasajero) {
        $incluido = 0;
        if (count($this->getObjPasajero()) < $this->getCantMaxPasajeros()) {
            foreach ($this->getObjPasajero() as $pasajero) {
                if ($pasajero->getDniPasajero() === $nuevoObjPasajero->getDniPasajero()) {
                    $incluido = -1;
                    break; // Añade un break para dejar de buscar si ya encontró un pasajero con el mismo DNI
                }
            }
            if ($incluido == 0) { // Asegúrate de agregar el pasajero solo si no fue encontrado en la lista
                $this->objPasajero[] = $nuevoObjPasajero;
                $incluido = 1;
            }
        } else {
            $incluido = 0; // Este caso maneja cuando el viaje está completo, aunque podrías no necesitar modificar esta línea
        }
        return $incluido;
    }

    public function cantidadPasajerosCargados() {
        return count($this->objPasajero);
    }

    public function imprimirPasajeros() {
        $infoPasajeros = ""; // Inicializa una cadena vacía
        $cantPasajeros = count($this->getObjPasajero());
        for ($i = 0; $i < $cantPasajeros; $i++) {
            // Concatena la información de cada pasajero a la cadena
            $infoPasajeros .= $this->getObjPasajeroIndice($i) . "\n";
        }
        return $infoPasajeros; // Retorna la cadena construida
    }


    public function __toString(){
        // Inicio de la cadena con la información básica del viaje
        $infoViaje = "Viaje (" . $this->getCodigoViaje(). ") a ". $this->getDestino(). "\n" .
                     "Cantidad máxima de pasajeros: " . $this->getCantMaxPasajeros(). "\n";
        $infoViaje .= "Pasajeros: \n" . $this->imprimirPasajeros();
        $infoViaje .= "RESPONSABLE DEL VIAJE: " . $this->getObjResponsableV()->__toString() . "\n";

        return $infoViaje;
    }
}
?>