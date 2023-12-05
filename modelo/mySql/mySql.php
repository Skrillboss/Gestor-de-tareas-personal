<?php

class MySql
{

    private static function conectar()
    {
        $config = parse_ini_file(__DIR__ . '/../../config.ini');

        return new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
    }

    public static function consultaLectura($consulta)
    {
        $conexion = self::conectar();
        $recepcion = $conexion->query($consulta);
        $envio = array();
        while ($fila = $recepcion->fetch_assoc()) {
            array_push($envio, $fila);
        }

        return $envio;
    }

    public static function consultaEscritura($consulta)
    {
        $conexion = self::conectar();

        $conexion->query($consulta);
    }
}
