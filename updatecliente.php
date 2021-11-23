<?php require_once "vistas/parte_superior.php"?>



<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ACTUALIZAR CLIENTE</title>
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
                    <div class="col-sm-8"><h2>Editar <b>Cliente</b></h2></div>
                    <div class="col-sm-10">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
                
                include ("database.php");
                $clientes= new Database();
                $id=0;
                
                
                if(isset($_GET) && !empty($_GET)){

                    
                    $id = $_GET['id'];


                }

                
                if(isset($_POST) && !empty($_POST)){

                    $nombre = $clientes->sanitize($_POST['nombre']);
                    $direccion = $clientes->sanitize($_POST['direccion']);
                    $telefono = $clientes->sanitize($_POST['telefono']);
                    $dui = $clientes->sanitize($_POST['dui']);
                    $licencia = $clientes->sanitize($_POST['licencia']);
    
                    $res = $clientes->update($nombre, $direccion, $telefono,$dui,$licencia,$id);
                    
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
                $datos_cliente=$clientes->single_record($id);
            ?>
            <div class="row">
                <form method="post">
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_cliente->nombre;?>">
                    
                </div>
                
                <div class="col-md-6">
                    <label>Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->direccion;?>">

                </div>
                <div class="col-md-6">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->telefono;?>">
                </div>
                <div class="col-md-6">
                    <label>DUI:</label>
                    <input type="text" name="dui" id="dui" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->dui;?>">
                
                </div>

                <div class="col-md-6">
                    <label>Licencia:</label>
                    <input type="text" name="licencia" id="licencia" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->licencia;?>">
                
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