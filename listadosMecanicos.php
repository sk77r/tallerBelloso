<?php require_once "vistas/parte_superior.php"?> 
<?php

include('database.php');
include "../db/config.php";
$mecanicos = new Database();
$listado = $mecanicos->readmecanicos();
?>


<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Mecanicos</title>
</head>

<body>
<div class="col-md-12 border">
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a class="navbar-brand">Listado Mecanicos</a>
                        <form method="post" class="form-inline">
                            <input name="PalabraClave" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                            <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
                            <button class="btn btn-outline-success my-2 my-sm-0" name="btnLogC" type="submit">Buscar</button>
                        </form>
                    </nav>
                    <p>Buscador de mecanicos, por NOMBRE O Competencias </p>
                    <?php



                    if (isset($_POST["btnLogC"])) {
                        $aKeyword = explode(" ", $_POST['PalabraClave']);
                        $query = "SELECT * FROM empleados WHERE nombre like '%" . $aKeyword[0] . "%' OR competencias like '%" . $aKeyword[0] . "%'";

                        for ($i = 1; $i < count($aKeyword); $i++) {
                            if (!empty($aKeyword[$i])) {
                                $query .= " OR competencias like '%" . $aKeyword[$i] . "%'";
                            }
                        }

                        $result = $con->query($query);
                        echo "<br>Has buscado la palabra clave:<b> " . $_POST['PalabraClave'] . "</b>";

                        if (mysqli_num_rows($result) > 0) {
                            $row_count = 0;
                            echo "<br><br>Resultados encontrados: ";
                            echo "<br><table  class='table table-striped col-sm-12'>";
                            while ($row = $result->fetch_assoc()) {
                                $row_count++;
                                $id = $row['dui'];
                                echo "<tr class='col-sm-10'><th>Cantidad</th><th>Nombre</th><th>DUI</th><th>Competencias</th><th>Accion</th></tr>";
                                echo "<tr class='col-sm-10'><td>" . $row_count . " </td><td>" . $row['nombre']. "</td><td>" . $row['dui']. "</td><td>" . $row['competencias'] . "</td><td>" . '<a href="deleteMecanico.php?$id='.$id.'" class="btn btn-danger" >Eliminar</a>'. "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<br>Resultados encontrados: Ninguno";
                        }
                    }

                    ?>

                </div>

</body>

</html>

<?php require_once "vistas/parte_inferior.php"?>