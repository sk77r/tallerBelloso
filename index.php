<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" type="image/png" href="recursos/car.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

     <div class="col-md-3" style="position: fixed;top: 0;z-index:9999">
        <div> 
            <table class="table table-striped">
  <thead>
    <tr>
      <th >Manual</th>
      <th>Base SQL</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><a href="recursos/manuaBelloso.pdf" download="manuaBelloso.pdf">
Descargar Archivo
</a></th>
      <th><a href="recursos/taller.sql" download="taller.sql">
Descargar Archivo</td>
      
    </tr>
  
   
  </tbody>
</table>
        </div>  
    </div>
  </head>
  <body class="text-center">

<main class="form-signin">
<p class="fs-1">TALLER BELLOSO</p> <a class="enlace" href="taller/consultaC.php">¿Eres cliente? Da clic aqui</a>
  <form  method="post">
    <img class="mb-4" src="assets/brand/car.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Por favor, registrese</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="txt_usuario" name="txt_usuario" placeholder="name@example.com">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="txt_contrasena" name="txt_contrasena" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>
      <p class="fs-6">Seleccione su rol</p>
      <select name="miselector" id="miselector" class="form-select" aria-label="Default select example">
      <option selected>Secretaria</option>
      <option value="1">Mecanico</option>
      <option value="2">Asesor</option>
      <option value="2">Gerente</option>
      <option value="2">Jefe</option>
    </select>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Recuerdame
      </label>
    </div>
      




    <button class="btn btn-success" name="botonEntrar" type="submit"  id="botonEntrar">Entrar</button>
    <br>
  </form>
  
<br>
  <p class="mt-5 mb-3 text-muted">&copy; Analisis de sistemas - grupo 2</p>
     </main>

     


    
  </body>
   



<?php

include "db/config.php";

if(isset($_POST['botonEntrar'])){

  $uname = mysqli_real_escape_string($con,$_POST['txt_usuario']);
  $password = mysqli_real_escape_string($con,$_POST['txt_contrasena']);


  if ($uname != "" && $password != ""){

      $sql_query = "select count(*) as cntUser from rol where usuarioEmpleado='".$uname."' and contrasenaEmpleado='".$password."'";
      $result = mysqli_query($con,$sql_query);
      $row = mysqli_fetch_array($result);
      $count = $row['cntUser'];
      
      if($count > 0){
        session_start();
         
        
        $_SESSION['usuario'] = $_REQUEST['txt_usuario'];
        header('Location: taller/');
      }else{
        echo "Invalid username and password";
      }

  }

}
?>

</html>
