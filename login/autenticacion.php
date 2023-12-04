<?php

include_once '../modelo/servicios/servicioAutenticacion.php';

class Autenticacion
{

    public static function autenticar($usuario, $contrasena)
    {
        return ServicioAutenticacion::verificar($usuario, $contrasena);
    }
}
