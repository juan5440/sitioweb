<?php
session_start();
if($_POST){
    if(($_POST['usuario']=="Gabriel_Soto")&&($_POST['contrasenia']=="admin1")){
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="Gabriel_Soto";

        header('Location:inicio.php');

    }else{
        $mensaje="Error: El usuario o contrasenia son incorrectos";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador del sitio web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body {
        height: 400px;
        
        background-image: url("../img/a-book.jpg");
        background-size: cover;
        background-repeat:no-repeat;
        
       
  
}
</style>
<body>
    <br><br><br>
    <div class="container">
    <img />
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            
               <div class="card ">
                    <div class="card-header text-white bg-success">
                        Login
                    </div>
                    <div class="card-body">
                        <?php if(isset($mensaje)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                        <?php } ?>
                        <form method="POST">
                        <div class = "form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario"  placeholder="Escribe tu usuario" required>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="contrasenia">Contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu Contraseña" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Entrar al Administrador</button>
                        </form>
                        
                        

                    </div>
               </div>

            </div>
            
        </div>
    </div>
</body>
</html>