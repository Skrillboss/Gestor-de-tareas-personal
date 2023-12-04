<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGT</title>
</head>

<body>

    <?php include_once 'menu.php' ?>

    <?php
    $tarea = Tarea::fromBody();

    session_start();

    $tareas = ServicioTareas::obtenerTarea()

    ?>

    <form method="POST" action="publicar.php">
        <fieldset>
            <legend>Agregar una nueva tarea</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $tarea->titulo ?>">

            <select name="urgencia" id="">
                <option value="urgente" <?php if ($tarea->urgencia === 'urgente') {
                                            echo "selected";
                                        }  ?>>Urgente</option>
                <option value="noUrgente" <?php if ($tarea->urgencia === 'noUrgente') {
                                                echo "selected";
                                            } ?>>No Urgente</option>
            </select>
            <div></div>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php echo $tarea->descripcion ?>">
        </fieldset>
        <button type="submit">Agregar tarea</button>
    </form>

    <?php if ($tareas) : ?>
        <h2>Tareas agregadas</h2>
        <section class="lista">
            <?php
            foreach ($tareas as $tarea) {
                include 'modelo/visualizacion/verTarea.php';
            }

            ?>
        </section>

    <?php endif; ?>

</body>

</html>