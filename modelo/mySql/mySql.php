<?php

class MySql
{

    public static function consultaLectura($consulta)
    {

        $conexion = new mysqli('localhost', 'root', '', 'gtp');
        $recepcion = $conexion->query($consulta);
        $envio = array();
        while ($fila = $recepcion->fetch_assoc()) {
            array_push($envio, $fila);
        }

        return $envio;
    }
}
