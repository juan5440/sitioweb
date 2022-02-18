<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb/administrador/" ?>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body >
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>  
    <div class="navbar-collapse collapse" id="navbarColor01" style="">
        <ul class="navbar-nav me-auto">
        <li class="nav-item active">
                <a class="nav-link" href="index.php">Sitio Web</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productos.php">Libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url;?>">Login</a>
            </li>
        </ul>
    </div>
    </div>
    </nav>
     <br>
    <div class="container ">
        <div class="row">