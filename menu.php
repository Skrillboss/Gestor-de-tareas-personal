<?php include_once 'modelo/entidades/tarea.php' ?>
<?php include_once 'modelo/servicios/servicioTareas.php' ?>
<?php include_once 'login/autenticacion.php' ?>
<?php include_once 'modelo/servicios/servicioAutenticacion.php' ?>
<?php include_once './modelo/mySql/mySql.php'; ?>
<?php session_start(); ?>
<a href="login/logout.php">Cerrar sesion</a>
<?php echo Autenticacion::obtenerNombreUsuario(); ?>
<?php include_once 'cabecera.html' ?>