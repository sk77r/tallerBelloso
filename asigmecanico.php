<?php require_once "vistas/parte_superior.php" ?>
<?php
include('database.php');
include "../db/config.php";
$clientes = new Database();
$vehiculos = new Database();
$listadoV = $vehiculos->readvehiculo();
$listado = $clientes->readmecanicos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    

      
    <script>
    $(document).ready(function() {
        
        $('#example').DataTable({
            responsive: true,
            lengthMenu: [[1], [1]],
            language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                },
                "bInfo" : false
        });
    });  
    
    </script>

    <title>Asignar mecanico</title>
   
</head>

<body>

    <body>

        <div id="container" class="container">
            <h1>ASIGNAR MECANICOS</h1>
            <div class="row">
                <div class="col-md-6 border">
                   <?php require_once "busquedaVe.php" ?>
                    
                </div>
                  <div class="col-md-6 border">
                    <h1 class="h2"><b>MECANICOS</b></h1>
                    <p>Busqueda por Nombre O competencias</p>
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th>Nombre</th>
                                <th>Competencia</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>

                        <?php
                        while ($row = mysqli_fetch_object($listado)) {
                            $id = $row->idempleados;
                            $nombre = $row->nombre;
                            $competencias = $row->competencias;




                        ?>
                            <tr>


                                <td >
                                    
                                    <input class="col-sm-10 border-0"  type="text" id="idmecanicotext" disabled value="<?php echo $id; ?>">

                                </td>
                                <td>
                                    <p id="nombreMecanico"><?php echo $nombre; ?></p>
                                </td>
                                <td>
                                    <p id="competenciaMecanico"><?php echo $competencias; ?></p>
                                    
                                </td>
                                <td>
                                <button class="btn btn-outline-success my-2 my-sm-0"  id="botonText" onclick="enviarTexto()" type="submit">ASIGNAR</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                        <tbody>
                    </table>
                </div>

                <?php require_once "insermecanico.php" ?>

        <script>
        
           

           function enviarTexto(){
            var texto = document.getElementById("idmecanicotext").value;
            console.log(texto);
           document.getElementById("idmecanicotext2").value=texto;
           }

           function enviarTexto2(){
            var texto2 = document.getElementById("placa").value;
            
           document.getElementById("placa2").value=texto2;
           }
        </script>



</html>

<?php require_once "vistas/parte_inferior.php" ?>