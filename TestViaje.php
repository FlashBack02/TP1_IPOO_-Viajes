<?php
include 'ClaseViaje.php';
include 'ClasePasajero.php';
include 'ClaseResponsableV.php';

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

function agregrarMultiplesPasajeros($nroPasajerosAIngresar){
    for ($i=1; $i <= $nroPasajerosAIngresar; $i++) {
        $resultadoAgregar = -1;
        while ($resultadoAgregar == -1) {
            echo "Ingrese el nombre del pasajero/a nº" . $i . ":\n";
            $nombrePasajero = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero/a nº" . $i . ":\n";
            $apellidoPasajero = trim(fgets(STDIN));
            echo "Ingrese el DNI del pasajero nº" . $i . ":\n";
            $dniPasajero = trim(fgets(STDIN));
            echo "Ingrese el TELEFONO del pasajero nº" . $i . ":\n";
            $telefonoPasajero = trim(fgets(STDIN)); 
            
            $objPasajero = new Pasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero);
                    
            $resultadoAgregar = $objViaje->agregarPasajero($objPasajero);
                    
            if ($resultadoAgregar == 1) {
                echo "Pasajero agregado con éxito.\n";
                // Si el pasajero se agregó con éxito, sale del bucle while.
            } elseif ($resultadoAgregar == -1) {
                echo "El pasajero con DNI " . $dniPasajero . " ya está incluido en el viaje. Por favor, ingrese otro pasajero.\n";
                // Si el pasajero ya está incluido, el bucle while se repetirá solicitando un nuevo pasajero.
            } else {
                echo "No se pudo agregar el pasajero. El viaje está completo.\n";
            break;
            }
        }
    }
}


echo "Ingrese un nuevo viaje. \n";
echo "Código de viaje: ";
$codigoViaje = trim(fgets(STDIN));
echo "\n Destino del viaje: ";
$destinoViaje = trim(fgets(STDIN));
echo "\n ¿Cuál es la cantidad máxima de pasajeros?: ";
$cantMaxDePasajerosViaje = trim(fgets(STDIN));
echo "\n Nombre de la persona encargada del viaje: ";
$nombreEncargadoViaje = trim(fgets(STDIN));
echo "\n Apellido de la persona encargada del viaje: ";
$apellidoEncargadoViaje = trim(fgets(STDIN));
echo "\n Número de empleado del encargado del viaje: ";
$nroDeEmpleadoEncargadoViaje = trim(fgets(STDIN));
echo "\n Licencia del encargado del viaje: ";
$licenciaEncargadoViaje = trim(fgets(STDIN));

$objEncargadoV = new ResponsableV($nroDeEmpleadoEncargadoViaje, $licenciaEncargadoViaje, $nombreEncargadoViaje, $apellidoEncargadoViaje);
$objViaje = new Viaje($codigoViaje, $destinoViaje, $cantMaxDePasajerosViaje, $objEncargadoV);


$res = menu();
while($res != 8){
    switch($res){
        case 1: 
            echo "\n \n ¿Cuántos pasajeros desea agregar?: ";
            $nroPasajerosAIngresar = trim(fgets(STDIN));
            while ($nroPasajerosAIngresar > $cantMaxDePasajerosViaje) {
                echo "No puede ingresar más de ". $cantMaxDePasajerosViaje. " porque supera el número de lugares \n";
                echo "Ingrese otra cantidad de pasajeros a cargar \n";
                $nroPasajerosAIngresar = trim(fgets(STDIN));
            } 
            agregrarMultiplesPasajeros($nroPasajerosAIngresar);
        break;
        case 2:
            $nroPasajerosAIngresar = $cantMaxDePasajerosViaje;
            agregrarMultiplesPasajeros($nroPasajerosAIngresar);
        break;
        case 3:
            $resultadoAgregar = -1;
                while ($resultadoAgregar == -1) {
                    echo "Ingrese el nombre del pasajero/a:\n";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero/a:\n";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el DNI del pasajero:\n";
                    $dniPasajero = trim(fgets(STDIN));
                    echo "Ingrese el TELEFONO del pasajero:\n";
                    $telefonoPasajero = trim(fgets(STDIN)); 
            
                    $objPasajero = new Pasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero);
                    
                    $resultadoAgregar = $objViaje->agregarPasajero($objPasajero);
                    
                    if ($resultadoAgregar == 1) {
                        echo "Pasajero agregado con éxito.\n";
                        // Si el pasajero se agregó con éxito, sale del bucle while.
                    } elseif ($resultadoAgregar == -1) {
                        echo "El pasajero con DNI " . $dniPasajero . " ya está incluido en el viaje. Por favor, ingrese otro pasajero.\n";
                        // Si el pasajero ya está incluido, el bucle while se repetirá solicitando un nuevo pasajero.
                    } else {
                        echo "No se pudo agregar el pasajero. El viaje está completo.\n";
                        break; // Sale del bucle for si el viaje ya está completo.
                    }
                }
                $nroPasajerosIngresados = $nroPasajerosIngresados + 1 ;
        break;
        case 4:
            echo "Cantidad de pasajeros cargados: " . $objViaje->cantidadPasajerosCargados() . "\n";
        break;
        case 5: 
            echo $objViaje;
        break;
        case 6: 
            echo "\nModificar datos del responsable del viaje:\n";
            // Solicitar los nuevos datos al usuario
            echo "Ingrese el nuevo nombre del responsable: ";
            $nuevoNombreResponsable = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido del responsable: ";
            $nuevoApellidoResponsable = trim(fgets(STDIN));
            echo "Ingrese el nuevo número de empleado del responsable: ";
            $nuevoNumeroEmpleadoResponsable = trim(fgets(STDIN));
            echo "Ingrese la nueva licencia del responsable: ";
            $nuevaLicenciaResponsable = trim(fgets(STDIN));
        
            // Obtener el objeto ResponsableV actual del viaje
            $responsableActual= new esponsableV($nuevoNumeroEmpleadoResponsable, $nuevaLicenciaResponsable, $nuevoNombreResponsable, $nuevoApellidoResponsable);
            $objViaje->setObjResponsableV( $responsableActual);
        break;
        case 7: 
            echo "\nIngrese el DNI del pasajero a modificar: ";
            $dniBuscado = trim(fgets(STDIN));
            $pasajeros = $objViaje->getObjPasajero();
            $pasajeroEncontrado = false;
        
            foreach ($pasajeros as $pasajero) {
                if ($pasajero->getDni() == $dniBuscado) {
                    $pasajeroEncontrado = true;
                    // Solicitar nuevos datos
                    echo "Ingrese el nuevo nombre del pasajero: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo "Ingrese el nuevo apellido del pasajero: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    echo "Ingrese el nuevo teléfono del pasajero: ";
                    $nuevoTelefono = trim(fgets(STDIN));
        
                    // Actualizar los datos del pasajero
                    $pasajero->setNombrePasajero($nuevoNombre);
                    $pasajero->setApellidoPasajero($nuevoApellido);
                    $pasajero->setTelefonoPasajero($nuevoTelefono);
        
                    echo "Los datos del pasajero han sido actualizados.\n";
                    break; // Salimos del bucle ya que encontramos al pasajero y lo modificamos
                }
            }
        
            if (!$pasajeroEncontrado) {
                echo "No se encontró un pasajero con el DNI proporcionado.\n";
            }
        break;
        default:
            echo "\n \n No existe esa opción X_X \n \n";
        break;
    }
    $res =  menu();
}



?>