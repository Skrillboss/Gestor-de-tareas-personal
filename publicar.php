<?php include_once 'tarea.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Previa</title>

</head>

<body>

    <?php

    $tarea = Tarea::fromBody();

    ?>

    <form method="POST" action="publicar.php">
        <?php if (isset($_POST['aceptar'])) : ?>

            <h1>Tarea agregada</h1>

            <fieldset>
                <legend>Tarea</legend>
                <h2>Titulo:</h2>
                <h3><?php echo $tarea->titulo; ?></h3>
                <?php echo $tarea->titulo; ?>
                <?php echo $tarea->titulo; ?>

                <!-- aqui debo agragar una imagen '!' si es urgente o no -->

                <details>
                    <summary>Descripcion</summary>
                    <p><?php echo $tarea->descripcion; ?></p>
                </details>

            </fieldset>
            <a href="index.php">Volver al inicio</a>

        <?php else : ?>

            <h1>Vista previa</h1>

            <fieldset>
                <legend>Tarea</legend>
                <h2>Titulo:</h2>
                <h3> <?php echo $tarea->titulo; ?></h3>

                <!-- aqui debo agragar una imagen '!' si es urgente o no -->

                <details>
                    <summary>Descripcion</summary>
                    <p><?php echo $tarea->descripcion; ?></p>
                </details>

            </fieldset>

            <input type="hidden" name="titulo" value="<?php echo $tarea->titulo; ?>">
            <input type="hidden" name="urgecia" value="<?php echo $tarea->urgencia; ?>">
            <input type="hidden" name="descripcion" value="<?php echo $tarea->descripcion; ?>">

            <button type="submit" name="aceptar">Aceptar</button>
            <button type="submit" formaction="index.php">Cancelar</button>

        <?php endif; ?>

    </form>

</body>

</html>