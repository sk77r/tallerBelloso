<?php
include "../db/config.php";

$nombre = $_GET['$id'];
    $consulta = $con->query("DELETE  FROM vehiculos WHERE placa='$nombre'");
    header('Location: listadovehiculo.php');
?>