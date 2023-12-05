<?php

class ServicioTareas
{

    public static function obtenerTarea()
    {
        $resultado = MySql::consultaLectura('SELECT * FROM tareas');

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

        // INSERT INTO `tareas`(`urgencia`, `fecha`, `titulo`, `descripcion`) 
        // VALUES ('[value-2]','[value-3]','[value-4]','[value-5]')

        $urgencia = $tarea->urgencia === 'urgente' ? 0 : 1;

        $fecha = $tarea->fecha->format('c');

        $consulta = "INSERT INTO tareas (urgencia, fecha, titulo, descripcion)
        VALUES ('$urgencia','$fecha','$tarea->titulo','$tarea->descripcion')";

        MySql::consultaEscritura($consulta);
    }
}
