<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Previa</title>
</head>

<body>

    <?php

    $titulo = '';
    $urgencia = 'noUrgente';
    $descripcion = '';

    if (isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
    }
    if (isset($_POST['urgencia'])) {
        $urgencia = $_POST['urgencia'];
    }
    if (isset($_POST['titulo'])) {
        $descripcion = $_POST['descripcion'];
    }

    ?>


    <h1>Vista previa</h1>
    <form method="POST" action="publicar.php">
        <fieldset>
            <legend>Tarea</legend>
            <h2>Titulo:</h2>
            <h3><?php echo $titulo; ?></h3>

            <!-- aqui debo agragar una imagen '!' si es urgente o no -->

            <details>
                <summary>Descripcion</summary>
                <p><?php echo $descripcion; ?></p>
            </details>

        </fieldset>

        <input type="hidden" name="titulo" value="<?php echo $titulo; ?>">
        <input type="hidden" name="urgecia" value="<?php echo $urgencia; ?>">
        <input type="hidden" name="descripcion" value="<?php echo $descripcion; ?>">

        <button type="submit">Aceptar</button>
        <button type="submit" formaction="index.php">Cancelar</button>

    </form>

    <!-- aqui coloco un formulario oculto para poder mandarle a la pagina index.php, los valores que tenia antes de darle al boton de cancelar -->


</body>

</html>