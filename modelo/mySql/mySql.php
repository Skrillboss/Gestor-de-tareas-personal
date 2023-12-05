<?php

class MySql
{

    public static function consultaLectura($consulta)
    {
        $config = parse_ini_file(__DIR__ . '/../../config.ini');

        $conexion = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
        $recepcion = $conexion->query($consulta);
        $envio = array();
        while ($fila = $recepcion->fetch_assoc()) {
            array_push($envio, $fila);
        }

        return $envio;
    }
}
