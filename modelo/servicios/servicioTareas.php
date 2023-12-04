<?php

class ServicioTareas
{

    private static function comprovarExistencia()
    {
        if (!isset($_SESSION['tareas'])) {
            $_SESSION['tareas'] = array();
        }
    }

    public static function obtenerTarea()
    {
        self::comprovarExistencia();
        return $_SESSION['tareas'];
    }

    public static function insertarOferta($tarea)
    {
        self::comprovarExistencia();
        array_push($_SESSION['tareas'], $tarea);
    }
}
