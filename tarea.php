<?php
class Tarea
{
    public string $titulo;
    public string $urgencia;
    public string $descripcion;
    public DateTime $fecha;

    function __construct(string $titulo, string $urgencia, string $descripcion, DateTime $fecha)
    {
        $this->titulo = $titulo;
        $this->urgencia = $urgencia;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
    }

    public static function fromBody()
    {
        $fecha = new DateTime;
        $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
        $urgencia = isset($_POST['urgencia']) ? $_POST['urgencia'] : 'noUrgente';
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

        return new Tarea($titulo, $urgencia, $descripcion, $fecha);
    }
}
