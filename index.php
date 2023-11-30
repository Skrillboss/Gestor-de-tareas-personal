<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGT</title>
</head>


<body>
    <?php include_once 'cabecera.html' ?>

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

    <form method="POST" action="publicar.php">
        <fieldset>
            <legend>Agregar una nueva tarea</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $titulo ?>">

            <select name="urgecia" id="">
                <option value="urgente" <?php if ($urgencia == 'urgente') {
                                            echo 'selected';
                                        }  ?>>Urgente</option>
                <option value="noUrgente" <?php if ($urgencia == 'noUrgente') {
                                                echo 'selected';
                                            }  ?>>No Urgente</option>
            </select>

            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php echo $titulo ?>">
        </fieldset>
        <button type="submit">Agragar tarea</button>
    </form>


</body>

</html>