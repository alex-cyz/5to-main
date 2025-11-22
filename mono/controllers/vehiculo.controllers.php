<?php
require_once("../config/conexion.php");
require_once("../models/vehiculo.models.php");

$vehiculos = new Vehiculos();

switch ($_GET["op"]) {

    case "todos":
        $datos = $vehiculos->todos();
        $lista = array();

        while ($row = mysqli_fetch_assoc($datos)) {
            $lista[] = $row;
        }
        echo json_encode($lista);
        break;

    case "insertar":
        $resp = $vehiculos->Insertar(
            $_POST["id_cliente"],
            $_POST["marca"],
            $_POST["modelo"],
            $_POST["anio"],
            $_POST["tipo_motor"]
        );
        echo json_encode($resp);
        break;

    case "actualizar":
        $resp = $vehiculos->Actualizar(
            $_POST["idVehiculo"],
            $_POST["id_cliente"],
            $_POST["marca"],
            $_POST["modelo"],
            $_POST["anio"],
            $_POST["tipo_motor"]
        );
        echo json_encode($resp);
        break;

    case "uno":
        $datos = $vehiculos->uno($_POST["idVehiculo"]);
        $resultado = mysqli_fetch_assoc($datos);
        echo json_encode($resultado);
        break;

    case "eliminar":
        $resp = $vehiculos->Eliminar($_POST["idVehiculo"]);
        echo json_encode($resp);
        break;
}