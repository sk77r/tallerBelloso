<?php
                
                
                include "../db/config.php";
                 $nombre = $_POST['idcliente'];
                    
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>BUSQUEDA VEHICULO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body class="container">
<H1 style="text-align:center;">Taller Belloso</H1>

<h3 style="text-align:center;"> Resultado de busqueda </h3>

<table id="customers">
  <tr>
    <th>ID cliente</th>
    <th>Nombre Cliente</th>
    <th>Placa vehiculo</th>
    <th>Estado de reparación</th>
  </tr>

      <?php
      $consulta = $con->query("select * from clientes where id='$nombre'");
      
      while($row = $consulta->fetch_array()){
          $idClientes = $row['id']
          
      ?>


  <tr>
  <td><?php echo $row['id'];?></td>
	<td><?php echo $row['nombre'];}?></td>
    <?php $consulta2 = $con->query("SELECT Placa FROM vehiculos WHERE IdCliente ='$idClientes'"); 
    $row2 = $consulta2->fetch_array()?>

	<td><?php echo $row2['Placa'];?></td>
  <td><?php echo "Terminado"?></td>
  </tr>


</table>
<br>
<a href="consultaC.php" class="btn btn-success">¿NUEVA CONSULTA?</a>

</body>
</html>

<?php ?>


