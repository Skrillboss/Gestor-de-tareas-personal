<?php

class MySql
{

    private static function conectar()
    {
        $config = parse_ini_file(__DIR__ . '/../../config.ini');

        return new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
    }

    private static function prepare($connection, $query, $parameters)
    {

        $stmt = $connection->prepare($query);

        if ($parameters) {
            $type = "";
            foreach ($parameters as $parameter) {
                $type .= is_integer($parameter) ? "i" : "s";
            }
            $stmt->bind_param($type, ...$parameters);
        }
        return $stmt;
    }

    public static function consultaLectura($query, ...$parameters)
    {
        $connection = self::conectar();

        $return = array();

        if ($connection->connect_error) {
            die('Coneccion fallida: ' . $connection->connect_error);
        }
        $stmt = self::prepare($connection, $query, $parameters);

        $stmt->execute();

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
