<?php
class Viaje {
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $objPasajero = [];
    private $objResponsableV;
    private $costoViaje;
    private $sumaCostosAbonados;

    public function __construct($codigoViaje, $destino, $cantMaxPasajeros, $objResponsableV, $costoViaje) {
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->objResponsableV = $objResponsableV;
        $this->costoViaje = $costoViaje;
        $this->sumaCostosAbonados = 0;
    }

    public function getCodigoViaje() {
        return $this->codigoViaje;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }
    public function getObjPasajero() {
        return $this->objPasajero;
    }
    public function getObjPasajeroIndice($i) {
        return $this->objPasajero[$i];
    }
    public function getObjResponsableV() {
        return $this->objResponsableV;
    }
    public function getCostoViaje() {
        return $this->costoViaje;
    }
    public function getSumaCostosAbonados() {
        return $this->sumaCostosAbonados;
    }

    public function setCodigoViaje($nuevoCodigoViaje) {
        $this->codigoViaje = $nuevoCodigoViaje;
    }
    public function setDestino($nuevoDestino) {
        $this->destino = $nuevoDestino;
    }
    public function setCantMaxPasajeros($nuevaCantMaxPasajeros) {
        $this->cantMaxPasajeros = $nuevaCantMaxPasajeros;
    }
    public function setObjPasajero($nuevoObjPasajero) {
        $this->objPasajero = $nuevoObjPasajero;
    }
    public function setObjPasajeroIndice($i, $nuevoObjPasajero) {
        $this->objPasajero[$i] = $nuevoObjPasajero;
    }
    public function setObjResponsableV($nuevoObjResponsableV) {
        $this->objResponsableV = $nuevoObjResponsableV;
    }
    public function setCostoViaje($nuevoCostoViaje) {
        $this->costoViaje = $nuevoCostoViaje;
    }
    public function setSumaCostosAbonados($nuevaSumaCostosAbonados) {
        $this->sumaCostosAbonados = $nuevaSumaCostosAbonados;
    }

    public function hayPasajesDisponible() {
        return count($this->objPasajero) < $this->cantMaxPasajeros;
    }

    public function venderPasaje($objPasajero) {
        if ($this->hayPasajesDisponible()) {
            $this->objPasajero[] = $objPasajero;
            $costoFinal = $this->costoViaje * (1 + $objPasajero->darPorcentajeIncremento() / 100);
            $this->sumaCostosAbonados += $costoFinal;
            return $costoFinal;
        } else {
            return false; // Indica que no hay espacio disponible
        }
    }

    public function imprimirPasajeros() {
        $infoPasajeros = "";
        foreach ($this->objPasajero as $pasajero) {
            $infoPasajeros .= $pasajero->__toString() . "\n";
        }
        return $infoPasajeros;
    }

    public function __toString() {
        $infoViaje = "Viaje (" . $this->codigoViaje . ") a " . $this->destino . "\n" .
                     "Cantidad máxima de pasajeros: " . $this->cantMaxPasajeros . "\n";
        $infoViaje .= "Pasajeros: \n" . $this->imprimirPasajeros();
        $infoViaje .= "RESPONSABLE DEL VIAJE: " . $this->objResponsableV->__toString() . "\n";
        $infoViaje .= "Costo del viaje: $" . $this->costoViaje . "\n";
        $infoViaje .= "Suma de los costos abonados: $" . $this->sumaCostosAbonados . "\n";

        return $infoViaje;
    }
}
?>