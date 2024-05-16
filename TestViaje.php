<?php
require_once 'ClaseViaje.php';
require_once 'ClasePasajero.php';
require_once 'ClasePasajeroVip.php';
require_once 'ClasePasEsp.php';
require_once 'ClaseResponsableV.php';

/** Función de menu sin parametros formales que retorna la opción elegida por el usuario
 * @return INT */
function menu(){
    // INT $rta
    echo "\n \n Ingrese una opción: \n";
    echo "1- Ingresar una cantidad definida de pasajeros/as \n";
    echo "2- Ingresa de a un pasajero hasta completar la cantidad solicitada. \n";
    echo "3- Ingresa un solo pasajero. \n";
    echo "4- Saber cuantos pasajeros llevo cargados \n";
    echo "5- Ver todos los datos del viaje \n";
    echo "6- Modificar los datos del Responsable del Viaje \n";
    echo "7- Modificar los datos de un pasajero\n";
    echo "8- Salir. \n";
    $rta = trim(fgets(STDIN));
    return $rta;
}

function crearPasajero() {
    echo "Ingrese el tipo de pasajero:\n";
    echo "1- Pasajero estándar\n";
    echo "2- Pasajero VIP\n";
    echo "3- Pasajero con necesidades especiales\n";
    $tipoPasajero = trim(fgets(STDIN));

    echo "Ingrese el nombre del pasajero/a:\n";
    $nombrePasajero = trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero/a:\n";
    $apellidoPasajero = trim(fgets(STDIN));
    echo "Ingrese el DNI del pasajero:\n";
    $dniPasajero = trim(fgets(STDIN));
    echo "Ingrese el TELEFONO del pasajero:\n";
    $telefonoPasajero = trim(fgets(STDIN));

    switch ($tipoPasajero) {
        case 1:
            return new Pasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero);
        case 2:
            echo "Ingrese el número de viajero frecuente:\n";
            $nroViajeroFrecuente = trim(fgets(STDIN));
            echo "Ingrese la cantidad de millas acumuladas:\n";
            $millasAcumuladas = trim(fgets(STDIN));
            return new PasajeroVIP($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero, $nroViajeroFrecuente, $millasAcumuladas);
        case 3:
            echo "¿Requiere silla de ruedas? (si/no):\n";
            $sillaDeRuedas = trim(fgets(STDIN)) == 'si';
            echo "¿Requiere asistencia para el embarque o desembarque? (si/no):\n";
            $asistencia = trim(fgets(STDIN)) == 'si';
            echo "¿Requiere comida especial? (si/no):\n";
            $comidaEspecial = trim(fgets(STDIN)) == 'si';
            return new PasajeroNecesidadesEspeciales($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero, $sillaDeRuedas, $asistencia, $comidaEspecial);
        default:
            echo "Tipo de pasajero no válido.\n";
            return null;
    }
}

function agregarMultiplesPasajeros($nroPasajerosAIngresar, $objViaje) {
    for ($i = 1; $i <= $nroPasajerosAIngresar; $i++) {
        $resultadoAgregar = -1;
        while ($resultadoAgregar == -1) {
            $objPasajero = crearPasajero();
            if ($objPasajero !== null) {
                $costoFinal = $objViaje->venderPasaje($objPasajero);
                if ($costoFinal !== false) {
                    echo "Pasajero agregado con éxito. Costo final del pasaje: $" . $costoFinal . "\n";
                    $resultadoAgregar = 1;
                } else {
                    echo "No se pudo agregar el pasajero. El viaje está completo.\n";
                    break;
                }
            }
        }
    }
}

echo "Ingrese un nuevo viaje. \n";
echo "Código de viaje: ";
$codigoViaje = trim(fgets(STDIN));
echo "\nDestino del viaje: ";
$destinoViaje = trim(fgets(STDIN));
echo "\n¿Cuál es la cantidad máxima de pasajeros?: ";
$cantMaxDePasajerosViaje = trim(fgets(STDIN));
echo "\nCosto del viaje: ";
$costoViaje = trim(fgets(STDIN));
echo "\nNombre de la persona encargada del viaje: ";
$nombreEncargadoViaje = trim(fgets(STDIN));
echo "\nApellido de la persona encargada del viaje: ";
$apellidoEncargadoViaje = trim(fgets(STDIN));
echo "\nNúmero de empleado del encargado del viaje: ";
$nroDeEmpleadoEncargadoViaje = trim(fgets(STDIN));
echo "\nLicencia del encargado del viaje: ";
$licenciaEncargadoViaje = trim(fgets(STDIN));

$objEncargadoV = new ResponsableV($nroDeEmpleadoEncargadoViaje, $licenciaEncargadoViaje, $nombreEncargadoViaje, $apellidoEncargadoViaje);
$objViaje = new Viaje($codigoViaje, $destinoViaje, $cantMaxDePasajerosViaje, $objEncargadoV, $costoViaje);

$res = menu();
while ($res != 8) {
    switch ($res) {
        case 1:
            echo "\n\n¿Cuántos pasajeros desea agregar?: ";
            $nroPasajerosAIngresar = trim(fgets(STDIN));
            while ($nroPasajerosAIngresar > $cantMaxDePasajerosViaje) {
                echo "No puede ingresar más de " . $cantMaxDePasajerosViaje . " porque supera el número de lugares \n";
                echo "Ingrese otra cantidad de pasajeros a cargar \n";
                $nroPasajerosAIngresar = trim(fgets(STDIN));
            }
            agregarMultiplesPasajeros($nroPasajerosAIngresar, $objViaje);
            break;
        case 2:
            while ($objViaje->hayPasajesDisponible()) {
                $objPasajero = crearPasajero();
                if ($objPasajero !== null) {
                    $costoFinal = $objViaje->venderPasaje($objPasajero);
                    if ($costoFinal !== false) {
                        echo "Pasajero agregado con éxito. Costo final del pasaje: $" . $costoFinal . "\n";
                    } else {
                        echo "No se pudo agregar el pasajero. El viaje está completo.\n";
                        break;
                    }
                }
            }
            break;
        case 3:
            $resultadoAgregar = -1;
            while ($resultadoAgregar == -1) {
                $objPasajero = crearPasajero();
                if ($objPasajero !== null) {
                    $costoFinal = $objViaje->venderPasaje($objPasajero);
                    if ($costoFinal !== false) {
                        echo "Pasajero agregado con éxito. Costo final del pasaje: $" . $costoFinal . "\n";
                        $resultadoAgregar = 1;
                    } else {
                        echo "No se pudo agregar el pasajero. El viaje está completo.\n";
                        break;
                    }
                }
            }
            break;
        case 4:
            echo "Cantidad de pasajeros cargados: " . $objViaje->cantidadPasajerosCargados() . "\n";
            break;
        case 5:
            echo $objViaje;
            break;
        case 6:
            echo "\nModificar datos del responsable del viaje:\n";
            echo "Ingrese el nuevo nombre del responsable: ";
            $nuevoNombre = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido del responsable: ";
            $nuevoApellido = trim(fgets(STDIN));
            echo "Ingrese el nuevo número de empleado del responsable: ";
            $nuevoNumeroEmpleado = trim(fgets(STDIN));
            echo "Ingrese la nueva licencia del responsable: ";
            $nuevaLicencia = trim(fgets(STDIN));

            $responsableActual = new ResponsableV($nuevoNumeroEmpleado, $nuevaLicencia, $nuevoNombre, $nuevoApellido);
            $objViaje->setObjResponsableV($responsableActual);
            break;
        case 7:
            echo "\nIngrese el DNI del pasajero a modificar: ";
            $dniBuscado = trim(fgets(STDIN));
            $pasajeros = $objViaje->getObjPasajero();
            $pasajeroEncontrado = false;

            foreach ($pasajeros as $pasajero) {
                if ($pasajero->getDni() == $dniBuscado) {
                    $pasajeroEncontrado = true;
                    echo "Ingrese el nuevo nombre del pasajero: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo "Ingrese el nuevo apellido del pasajero: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    echo "Ingrese el nuevo teléfono del pasajero: ";
                    $nuevoTelefono = trim(fgets(STDIN));

                    $pasajero->setNombrePasajero($nuevoNombre);
                    $pasajero->setApellidoPasajero($nuevoApellido);
                    $pasajero->setTelefonoPasajero($nuevoTelefono);

                    echo "Los datos del pasajero han sido actualizados.\n";
                    break;
                }
            }

            if (!$pasajeroEncontrado) {
                echo "No se encontró un pasajero con el DNI proporcionado.\n";
            }
            break;
        default:
            echo "\n\nNo existe esa opción X_X\n\n";
            break;
    }
    $res = menu();
}
?>