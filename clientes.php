<?php require_once "vistas/parte_superior.php"?>
<style>
input {
  border: 1px solid currentcolor;
}
input:invalid {
  border: 1px dashed red;
}

}
</style>
<!--INICIO del cont principal-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Taller Belloso</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Agregar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>

            <?php
                
                include_once ("database.php");
                
                $clientes= new Database();
                if(isset($_POST) && !empty($_POST)){
                    //Cliente
                    $nombre = $clientes->sanitize($_POST['nombre']);
                    $direccion = $clientes->sanitize($_POST['direccion']);
                    $telefono = $clientes->sanitize($_POST['telefono']);
                    $dui = $clientes->sanitize($_POST['dui']);
                    $licencia = $clientes->sanitize($_POST['licencia']);
                    $anio = $clientes->sanitize($_POST['anio']);
                    //Vehiculo
                    $Vehiculos= new Database();
                    $Marca = $clientes->sanitize($_POST['Marca']);
                    $Modelo = $clientes->sanitize($_POST['Modelo']);
                    $NumeroDeChasis = $clientes->sanitize($_POST['NumeroDeChasis']);
                    $Placa = $clientes->sanitize($_POST['Placa']);
                    $Color = $clientes->sanitize($_POST['Color']);
                    $TipoDeVehiculo = $clientes->sanitize($_POST['TipoDeVehiculo']);
                    //ID
                    
                    $res = $clientes->create($nombre, $direccion, $telefono, $dui, $licencia,$anio,$Placa, $Marca, $Modelo, $NumeroDeChasis, $Placa, $Color, $TipoDeVehiculo);
                    //$res = $Vehiculos->createv($Placa, $Marca, $Modelo, $NumeroDeChasis, $Placa, $Color, $TipoDeVehiculo);
                    $id = new Database();
                    
                    $idrespuesta = $id->respuestaiD($nombre,$anio);
                    if($res){
                        $message= "Datos insertados con éxito, su ID es: ";
                        $class="alert alert-success";
                    }else{
                        $message="No se pudieron insertar los datos";
                        $class="alert alert-danger";
                    }
                    
                    ?>
                <div class="<?php echo $class?>">
                  <?php echo $message." ".strtoupper($idrespuesta);?>
                </div>  
                    <?php
                }

               
    
            ?>

            <div class="row">
                <form method="post">
                
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
                </div>
                <div class="col-md-6">
                    <label>Direccion:</label>
                    <input type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required>
                </div>

                <div class="col-md-6">
                    <label>Telefono:</label>
                    <input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required >
                </div>
                <div class="col-md-6">
                    <label>DUI:</label>
                    <input type="text" name="dui" id="dui" class='form-control' maxlength="64" required>
                
                </div>
                <div class="col-md-6">
                    <label>Licencia:</label>
                    <input type="text" name="licencia" id="licencia" class='form-control' maxlength="64" required>
                
                </div>
                <div class="col-md-6">
                    <label>Año:</label>
                    <input type="text" name="anio" id="anio" class='form-control' maxlength="100" required >
                </div>
                <div class="col-sm-8"><h2>Agregar <b>Carro</b></h2></div>
                <div class="col-md-6">
                    <label>Marca:</label>
                    <input type="text" name="Marca" id="Marca" class='form-control' maxlength="100" required>
                </div>

                <div class="col-md-6">
                    <label>Modelo:</label>
                    <input type="text" name="Modelo" id="Modelo" class='form-control' maxlength="15" required >
                </div>
                <div class="col-md-6">
                    <label>Chasis (numero):</label>
                    <input type="text" name="NumeroDeChasis" id="NumeroDeChasis" class='form-control' maxlength="64" required>
                
                </div>
                <div class="col-md-6">
                    <label>Placa:</label>
                    <input type="text" name="Placa" id="Placa" class='form-control' maxlength="64" required>
                
                </div>
                <div class="col-md-6">
                    <label>Color:</label>
                    <input type="text" name="Color" id="Color" class='form-control' maxlength="64" required>
                
                </div>
                <div class="col-md-6">
                    <label>Tipo vehiculo:</label>
                    <input type="text" name="TipoDeVehiculo" id="TipoDeVehiculo" class='form-control' maxlength="64" required>
                
                </div>
                
                <div class="col-md-12 pull-right">
                <hr>
                
                    <button type="submit" class="btn btn-success">Guardar datos</button>
                </div>
                </form>
            </div>
        </div>
        <!-- Fin de la primera tabla -->

  

                    
    
</body>
</html>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>

