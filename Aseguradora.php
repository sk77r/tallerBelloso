<?php require_once "vistas/parte_superior.php";




?>
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
                    <div class="col-sm-8"><h2>Registro <b>Aseguradoras</b></h2></div>
                    
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
                
                include_once ("database.php");
                
                $aseguradora = new Database();
                if(isset($_POST) && !empty($_POST)){
                    //Aseguradora
                    
                    $nombre = $aseguradora->sanitize($_POST['nombre']);
                    $direccion = $aseguradora->sanitize($_POST['direccion']);
                    $telefono = $aseguradora->sanitize($_POST['telefono']);
                    $asesor = $aseguradora->sanitize($_POST['asesor']);
                    

                    $res = $aseguradora->createaseguradora($nombre, $direccion, $telefono, $asesor);
                    
                    if($res){
                        $message= "Datos insertados con éxito";
                        $class="alert alert-success";
                    }else{
                        $message="No se pudieron insertar los datos";
                        $class="alert alert-danger";
                    }
                    
                    ?>
                <div class="<?php echo $class?>">
                  <?php echo $message;?>
                </div>  
                    <?php
                }
    
            ?>

            <div class="row">
           
                <form method="post">
                
                <div class="col-md-6">
                    <label>Nombre de la empresa:</label>
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
                    <label>Asesor asignado:</label>
                    <input type="text" name="asesor" id="asesor" class='form-control' maxlength="64" required>
                
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

