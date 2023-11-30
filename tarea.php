<?php
class Tarea
{
    public string $titulo;
    public string $urgencia;
    public string $descripcion;

    function __construct(string $titulo, string $urgencia, string $descripcion)
    {
        $this->titulo = $titulo;
        $this->urgencia = $urgencia;
        $this->descripcion = $descripcion;
    }

    public static function fromBody()
    {
        $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
        $urgencia = isset($_POST['urgencia']) ? $_POST['urgencia'] : 'noUrgente';
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

        return new Tarea($titulo, $urgencia, $descripcion);
    }
}
