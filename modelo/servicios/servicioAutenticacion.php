<?php

class ServicioAutenticacion
{

    public static function verificar($nombre, $contrasena)
    {
        $respuestaBd = MySql::readQuery("SELECT contrasena FROM usuarios WHERE nombre = ?", $nombre);

        $hash = hash('sha256', $contrasena);

        return count($respuestaBd) === 1 && $respuestaBd[0]['contrasena'] === $hash;
    }
}
