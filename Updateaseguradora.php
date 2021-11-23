<?php require_once "vistas/parte_superior.php"?>



<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ACTUALIZAR ASEGURADORA</title>
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
                    <div class="col-sm-8"><h2>Editar <b>Aseguradora</b></h2></div>
                    <div class="col-sm-10">
                        <a href="Listadoaseguradoras.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
                
                include ("database.php");
                $aseguradoras= new Database();
                $id=0;
                
                
                if(isset($_GET) && !empty($_GET)){

                    
                    $id = $_GET['id'];


                }

                
                // isset($_POST) && !empty($_POST)
                if((isset($_POST["botonA"]))){

                    $id2 = $aseguradoras->sanitize($id);
                    $nombre = $aseguradoras->sanitize($_POST['nombre']);
                    $direccion = $aseguradoras->sanitize($_POST['direccion']);
                    $telefono = $aseguradoras->sanitize($_POST['telefono']);
                    $asesor = $aseguradoras->sanitize($_POST['asesor']);
                   
    
                    $res = $aseguradoras->updateaseguradora($id2,$nombre, $direccion, $telefono,$asesor);
                    
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
                $datos_aseguradora=$aseguradoras->single_recordaseguradora($id);
            ?>
            <div class="row">
                <form method="post">
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_aseguradora->nombre;?>">
                    
                </div>
                
                <div class="col-md-6">
                    <label>Direccion:</label>
                    <input type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required value="<?php echo $datos_aseguradora->direccion;?>">

                </div>
                <div class="col-md-6">
                    <label>Telefono:</label>
                    <input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required value="<?php echo $datos_aseguradora->telefono;?>">
                </div>
                <div class="col-md-6">
                    <label>Asesor:</label>
                    <input type="text" name="asesor" id="asesor" class='form-control' maxlength="64" required value="<?php echo $datos_aseguradora->asesor;?>">
                
                </div>

                
                

                
                <div class="col-md-12 pull-right">
                <hr>
                    <button type="submit" name="botonA" class="btn btn-success">Actualizar datos</button>
                </div>
                </form>
            </div>
        </div>
    </div>     
</body>
</html>

<?php require_once "vistas/parte_inferior.php"?>