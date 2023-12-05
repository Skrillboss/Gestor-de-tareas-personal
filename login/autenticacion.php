<?php


class Autenticacion
{

    const usuario = 'usuario';
    const cookieUsuario = 'usuario';
    const contrasena = 'contrasena';

    public static function autenticar($usuario, $contrasena)
    {
        $_SESSION[self::usuario] = $usuario;
        $_SESSION[self::contrasena] = $contrasena;

        setcookie(self::cookieUsuario, $usuario);

        return ServicioAutenticacion::verificar($usuario, $contrasena);
    }

    public static function estaAutenticado()
    {
        if (isset($_SESSION[self::usuario])) {
            return self::autenticar($_SESSION[self::usuario], $_SESSION[self::contrasena]);
        }
    }

    public static function obtenerNombreUsuario()
    {
        if (isset($_SESSION[self::usuario])) {
            return $_SESSION[self::usuario];
        } else {
            return '';
        }
    }


    public static function obtenerCookieUsuario()
    {
        if (isset($_COOKIE[self::cookieUsuario])) {
            return $_COOKIE[self::cookieUsuario];
        }
    }
}
