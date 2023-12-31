<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Previa</title>

</head>

<body>

    <?php include_once 'menu.php' ?>

    <?php

    $tarea = Tarea::fromBody();

    ?>

    <form method="POST" action="publicar.php">
        <?php if (isset($_POST['aceptar'])) : ?>

            <h1>Tarea agregada</h1>

            <?php include 'modelo/visualizacion/verTarea.php' ?>

            <?php
            ServicioTareas::obtenerTarea();
            ServicioTareas::insertarOferta($tarea);
            ?>

            <a href="index.php">Volver al inicio</a>

        <?php else : ?>

            <h1>Vista previa</h1>

            <?php include 'modelo/visualizacion/verTarea.php' ?>

            <input type="hidden" name="titulo" value="<?php echo $tarea->titulo; ?>">
            <input type="hidden" name="urgencia" value="<?php echo $tarea->urgencia; ?>">
            <input type="hidden" name="descripcion" value="<?php echo $tarea->descripcion; ?>">

            <button type="submit" name="aceptar">Aceptar</button>
            <button type="submit" formaction="index.php">Cancelar</button>

        <?php endif; ?>

    </form>

</body>

</html>