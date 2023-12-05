<?php

class ServicioAutenticacion
{

    public static function verificar($nombre, $contrasena)
    {
        $respuestaBd = MySql::consultaLectura("SELECT contrasena FROM usuarios WHERE nombre = '$nombre'");

        return count($respuestaBd) === 1 && $respuestaBd[0]['contrasena'] === $contrasena;
    }
}
