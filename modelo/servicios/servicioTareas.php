<?php

class ServicioTareas
{

    public static function obtenerTarea()
    {
        $resultado = MySql::readQuery('SELECT * FROM tareas');

        $retorno = array();

        foreach ($resultado as $filas) {

            $urgencia = $filas['urgencia'] ? 'urgente' : 'noUrgente';

            $fecha = new DateTime($filas['fecha']);

            $tareas = new Tarea($filas['titulo'], $urgencia, $filas['descripcion'], $fecha);

            array_push($retorno, $tareas);
        }
        return $retorno;
    }

    public static function insertarOferta($tarea)
    {

        $urgencia = $tarea->urgencia === 'urgente' ? 0 : 1;

        $fecha = $tarea->fecha->format('c');

        $consulta = "INSERT INTO tareas (urgencia, fecha, titulo, descripcion)
        VALUES (?,?,?,?)";

        MySql::writeQuery($consulta, $urgencia, $fecha, $tarea->titulo, $tarea->descripcion);
    }
}
