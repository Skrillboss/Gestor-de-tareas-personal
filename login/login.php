<?php include_once 'autenticacion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php

    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {

        if (Autenticacion::autenticar($_POST['usuario'], $_POST['contrasena'])) {
            header('Location: ../index.php');
        } else {
            echo 'Usuario o contraseña incorrectos';
        }
    }

    ?>

    <h1>BIENVENIDO AL SISTEMA GESTOR DE TAREAS</h1>

    <form action="login.php" method="POST">
        <fieldset>
            <legend>Inicio de sesion</legend>
            <label for="usuario"></label>
            <input type="text" id="usuario" name="usuario">

            <label for="contrasena"></label>
            <input type="password" id="contrasena" name="contrasena">

        </fieldset>
        <button type="submit">Iniciar sesion</button>
    </form>

</body>

</html>