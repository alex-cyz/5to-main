<?php
require_once("../config/conexion.php");

class Vehiculos
{
    /* Obtener todos los vehículos */
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();

        // Traemos también los nombres del cliente
        $cadena = "SELECT v.*, c.nombres, c.apellidos 
                   FROM vehiculos v
                   INNER JOIN clientes c ON v.id_cliente = c.id
                   ORDER BY v.id DESC";

        $datos = mysqli_query($con, $cadena);
        return $datos;

        $con->close();
    }

    /* Obtener un vehículo por ID */
    public function uno($idVehiculo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();

        $cadena = "SELECT * FROM vehiculos WHERE id = $idVehiculo";
        $datos = mysqli_query($con, $cadena);
        return $datos;

        $con->close();
    }

    /* Insertar vehículo */
    public function Insertar($id_cliente, $marca, $modelo, $anio, $tipo_motor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();

        $cadena = "INSERT INTO vehiculos (id_cliente, marca, modelo, anio, tipo_motor)
                   VALUES ($id_cliente, '$marca', '$modelo', $anio, '$tipo_motor')";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return "Error al insertar vehículo";
        }

        $con->close();
    }

    /* Actualizar vehículo */
    public function Actualizar($idVehiculo, $id_cliente, $marca, $modelo, $anio, $tipo_motor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();

        $cadena = "UPDATE vehiculos SET
                    id_cliente = $id_cliente,
                    marca = '$marca',
                    modelo = '$modelo',
                    anio = $anio,
                    tipo_motor = '$tipo_motor'
                   WHERE id = $idVehiculo";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return "Error al actualizar";
        }

        $con->close();
    }

    /* Eliminar vehículo */
    public function Eliminar($idVehiculo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();

        $cadena = "DELETE FROM vehiculos WHERE id = $idVehiculo";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return "Error al eliminar";
        }

        $con->close();
    }
}