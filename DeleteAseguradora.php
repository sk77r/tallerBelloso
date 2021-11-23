<?php
include "../db/config.php";

$nombre = $_GET['$id'];
    $consulta = $con->query("DELETE  FROM aseguradoras WHERE idAseguradora='$nombre'");
    header('Location: Listadoaseguradoras.php');
?>