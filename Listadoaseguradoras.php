<?php require_once "vistas/parte_superior.php"?>
<?php 
include ('database.php');
$aseguradoras = new Database();
$listado=$aseguradoras->readaseguradora();
?>


<!doctype html>
<div class="container">
    <h1>SISTEMA TALLER BELLOSO</h1>
</div>


<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <title>Listado de aseguradoras</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    table thead{
        background-color: #0066ff;        
    }
    </style>
  </head>
  <body>  

    <h2 class="text-center">Listado de Aseguradoras</h2> 
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    
                        <th>ID ASEGURADORA</th>
                        <th>NOMBRE</th>
                        <th>DIRECCIÓN</th>
                        <th>TELÉFONO</th>
                        <th>ASESOR</th>
                        <th>ACCIONES</th>
                        
                    </tr>
                </thead>
                 
                

                <?php 
                    while ($row=mysqli_fetch_object($listado)){
                    $idase=$row->idAseguradora;
                    $nombre=$row->nombre;
                    $direccion=$row->direccion;
                    $telefono=$row->telefono;
                    $asesor=$row->asesor;

                ?>
                

                
                    <tr>
                    <td><?php echo $idase;?></td>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $direccion;?></td>
                    <td><?php echo $telefono;?></td>
                    <td><?php echo $asesor;?></td>
                    
                    <td>
                    <a href="Updateaseguradora.php?id=<?php echo $idase;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    
                    <a href="DeleteAseguradora.php?$id=<?php echo $idase;?>" class="edit" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xe14b;</i></a>
                    </td>
                    </tr>   
                <?php
}
?>

                <tbody>
            </table>  
         
           </div>
       </div> 
    </div>
   
    

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
            responsive: true
        });
    } );  
    
    </script>
      
      
  </body>
</html>

<?php require_once "vistas/parte_inferior.php"?>