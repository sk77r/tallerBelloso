<?php require_once "vistas/parte_superior.php"?>



<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ACTUALIZAR VEHICULO</title>
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
                    <div class="col-sm-8"><h2>Editar <b>Vehiculo</b></h2></div>
                    <div class="col-sm-10">
                        <a href="listadovehiculo.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
                
                include ("database.php");
                $vehiculos= new Database();
                $id=0;
                
                
                if(isset($_GET) && !empty($_GET)){

                    
                    $id = $_GET['id'];


                }

                
                if(isset($_POST) && !empty($_POST)){


                    $marca = $vehiculos->sanitize($_POST['marca']);
                    $modelo = $vehiculos->sanitize($_POST['modelo']);
                    $chasis = $vehiculos->sanitize($_POST['chasis']);
                    $placa = $vehiculos->sanitize($_POST['placa']);
                    $color = $vehiculos->sanitize($_POST['color']);
                    $tipovehiculo = $vehiculos->sanitize($_POST['tipovehiculo']);
    
                    $res = $vehiculos->updatevehiculo($marca, $modelo, $chasis,$placa,$color,$tipovehiculo,$id);
                    
                    if($res){
                        $message= "Datos actualizados con éxito";
                        $class="alert alert-success";
                        
                    }else{
                        $message="No se pudieron actualizar los datos";
                        $class="alert alert-danger";
                    }
                    
                    ?>
                <div class="<?php echo $class?>">
                  <?php echo $message;?>
                </div> 

                    <?php
                }
                $datos_vehiculo=$vehiculos->single_recordvehiculo($id);
            ?>
            <div class="row">
                <form method="post">
                <div class="col-md-6">
                    <label>Marca:</label>
                    <input type="text" name="marca" id="marca" class='form-control' maxlength="100" required  value="<?php echo $datos_vehiculo->Marca;?>">
                    
                </div>
                
                <div class="col-md-6">
                    <label>Modelo:</label>
                    <input type="text" name="modelo" id="modelo" class='form-control' maxlength="100" required value="<?php echo $datos_vehiculo->Modelo;?>">

                </div>
                <div class="col-md-6">
                    <label>Chasis:</label>
                    <input type="text" name="chasis" id="chasis" class='form-control' maxlength="15" required value="<?php echo $datos_vehiculo->NumeroDeChasis;?>">
                </div>
                <div class="col-md-6">
                    <label>Placa:</label>
                    <input type="text" name="placa" id="placa" class='form-control' maxlength="64" required value="<?php echo $datos_vehiculo->Placa;?>">
                
                </div>

                <div class="col-md-6">
                    <label>Color:</label>
                    <input type="text" name="color" id="color" class='form-control' maxlength="64" required value="<?php echo $datos_vehiculo->Color;?>">
                
                </div>

                <div class="col-md-6">
                    <label>Tipo (Vehiculo):</label>
                    <input type="text" name="tipovehiculo" id="tipovehiculo" class='form-control' maxlength="64" required value="<?php echo $datos_vehiculo->TipoDeVehiculo;?>">
                
                </div>
                

                
                <div class="col-md-12 pull-right">
                <hr>
                    <button type="submit" class="btn btn-success">Actualizar datos</button>
                </div>
                </form>
            </div>
        </div>
    </div>     
</body>
</html>

<?php require_once "vistas/parte_inferior.php"?>