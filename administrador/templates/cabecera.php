<?php

session_start();
  if(!isset($_SESSION['usuario'])){
    header("Location:../index.php");
    
  }else{
      if($_SESSION['usuario']=="ok"){
          $nombreUsuario=$_SESSION["nombreUsuario"];
      }

  }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
  
  </head>
    <body>
    <?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb" ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>  
    <div class="navbar-collapse collapse" id="navbarColor01" style="">
        <ul class="navbar-nav me-auto">
        <li class="nav-link">
               <a class="nav-item nav-link active" href="#">Admin</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/productos.php">Libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web </a>
            </li>
            <li class="nav-item">
               <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar</a>
            </li>
        </ul>
    </div>
    </div>
    </nav>
       
        <div class="container">
            
            <div class="row">