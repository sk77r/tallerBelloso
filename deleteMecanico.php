<?php
include "../db/config.php";

$nombre = $_GET['$id'];
    $consulta = $con->query("DELETE  FROM empleados WHERE dui='$nombre'");
    header('Location: listadosMecanicos.php');
?>