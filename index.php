<?php include_once 'tarea.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGT</title>
</head>

<!-- TENEMOS UN ERROR EN EL SELECT DEL URGENTE, NO SE CAMBIA AL DARLE CANCELAR  -->

<body>
    <?php include_once 'cabecera.html' ?>

    <?php
    $tarea = Tarea::fromBody();
    ?>

    <form method="POST" action="publicar.php">
        <fieldset>
            <legend>Agregar una nueva tarea</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $tarea->titulo ?>">

            <select name="urgencia" id="">
                <option value="urgente" <?php if ($tarea->urgencia === 'urgente') {
                                            echo 'selected';
                                        }  ?>>Urgente</option>
                <option value="noUrgente" <?php if ($tarea->urgencia === 'noUrgente') {
                                                echo 'selected';
                                            } ?>>No Urgente</option>
            </select>

            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php echo $tarea->descripcion ?>">
        </fieldset>
        <button type="submit">Agragar tarea</button>
    </form>


</body>

</html>