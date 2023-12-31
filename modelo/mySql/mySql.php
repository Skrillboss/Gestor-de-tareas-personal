<?php

class MySql
{

    private static function connect()
    {
        $connection = null;

        $config = parse_ini_file(__DIR__ . '/../../config.ini');

        if (!$connection) {
            $connection = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
        }
        return $connection;
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

    public static function readQuery($query, ...$parameters)
    {
        $connection = self::connect();

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

    public static function writeQuery($query, ...$parameters)
    {
        $connection = self::connect();

        $stmt = self::prepare($connection, $query, $parameters);

        $stmt->execute();
    }
}
