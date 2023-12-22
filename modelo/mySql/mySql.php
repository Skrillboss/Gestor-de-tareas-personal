<?php

class MySql
{

    private static function conectar()
    {
        $config = parse_ini_file(__DIR__ . '/../../config.ini');

        return new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
    }

    public static function consultaLectura($consulta, ...$parametros)
    {
        $connection = self::conectar();

        $return = array();

        if ($connection->connect_error) {
            die('Coneccion fallida: ' . $connection->connect_error);
        }
        $stmt = $connection->prepare($consulta);

        if ($parametros) {
            $type = "";
            foreach ($parametros as $parametro) {
                $type .= is_integer($parametro) ? "i" : "s";
            }
            $stmt->bind_param($type, ...$parametros);
        }
        $stmt->execute();

        if ($stmt->errno) {
            die('Error en la ejecucion de la consulta: ' . $stmt->error);
        }

        $answer = $stmt->get_result();

        while ($row = $answer->fetch_assoc()) {
            array_push($return, $row);
        }
        return $return;
    }

    public static function consultaEscritura($consulta)
    {
        $connetion = self::conectar();

        $connetion->query($consulta);
    }
}
