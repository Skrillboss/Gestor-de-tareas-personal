<?php

class ServicioAutenticacion
{

    public static function verificar($nombre, $contrasena)
    {
        return $nombre === 'luis' && $contrasena === '12345';
    }
}
