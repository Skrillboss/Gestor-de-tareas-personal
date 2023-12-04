<?php if (isset($tarea)) : ?>
    <fieldset>
        <legend>Tarea</legend>
        <h2>Titulo:</h2>
        <h3><?php echo $tarea->titulo; ?></h3>

        <?php if ($tarea->urgencia == 'urgente') : ?>
            <img src="img/importante.png" alt="">
        <?php endif; ?>

        <div class="fechaDePublicacion">Fecha: <?php echo $tarea->fecha->format('d/M/y || H:m') ?></div>

        <details>
            <summary>Descripcion</summary>
            <p><?php echo $tarea->descripcion; ?></p>
        </details>

    </fieldset>
<?php endif; ?>