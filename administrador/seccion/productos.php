<?php include("../templates/cabecera.php") ?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtfecha=(isset($_POST['txtfecha']))?$_POST['txtfecha']:"";
$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";



$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/db.php");

switch($accion){
   
    case "Agregar":
        
        $sentenciaSQL= $conexion->prepare("INSERT INTO libros ( codigo, nombre, imagen, descripcion, fecha_alta) VALUES ( :codigo, :nombre, :imagen, :descripcion, :fecha);");
        $sentenciaSQL->bindParam(':codigo',$txtID);
        $sentenciaSQL->bindParam(':nombre',$txtNombre);

        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!=""){

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
        $sentenciaSQL->bindParam(':fecha',$txtfecha);
        $sentenciaSQL->execute();

        header("Location:productos.php");

        break;
    
    case "Modificar":
        
        $sentenciaSQL= $conexion->prepare("UPDATE libros SET codigo=:codigo, nombre=:nombre, descripcion=:descripcion, fecha_alta=:fecha_alta  WHERE id=:id");
        $sentenciaSQL->bindParam(':codigo',$txtID);
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
        $sentenciaSQL->bindParam(':fecha_alta',$txtfecha);
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();

        if($txtImagen!=""){

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtid);
            $sentenciaSQL->execute();
            $libronuevo=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if(isset($libronuevo["imagen"]) && ($libronuevo["imagen"]!="imagen.jpg")){
    
                if(file_exists("../../img/".$libronuevo["imagen"])){
                    unlink("../../img/".$libronuevo["imagen"]);
                }
    
            }




            $sentenciaSQL= $conexion->prepare("UPDATE libros SET imagen=:imagen   WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtid);
            $sentenciaSQL->execute();
        }
        header("Location:productos.php");
        break;

    case "Cancelar":
            header("Location:productos.php");
        break;

    case "Borrar":

        //borrando imagen
        $sentenciaSQL= $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
        if(isset($libro["imagen"]) && ($libro["imagen"]!="imagen.jpg")){

            if(file_exists("../../img/".$libro["imagen"])){
                unlink("../../img/".$libro["imagen"]);
            }

        }

        //borrando datos
        $sentenciaSQL= $conexion->prepare("DELETE FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;
    
    case "Seleccionar":
        $sentenciaSQL= $conexion->prepare("SELECT * FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtid=$libro['id'];
        $txtID=$libro['codigo'];
        $txtNombre=$libro['nombre'];
        $txtImagen=$libro['imagen'];
        $txtDescripcion=$libro['descripcion'];
        $txtfecha=$libro['fecha_alta'];

        break;
    

}

$sentenciaSQL= $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<div class="col-md-3">
        <div class="card text-center">
        <h4>Registro de Libro</h4>
        </div>
        <form method="POST" enctype="multipart/form-data" class="form-horizontal">
            
                <input type="hidden" name="txtid" id="txtid" value="<?php echo $txtid?>">
         
            <div class="mb-3">
                <label for="txtID" class="form-label">Código de Libro:</label>
                <input type="text" class="form-control" id="txtID" name="txtID" value="<?php echo $txtID ?>" placeholder="Código de Libro" required >
            </div>
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $txtNombre ?>" placeholder="Nombre del Libro" required >
            </div>
            <div class="mb-3">
                <label for="txtImagen"  class="form-label">Imagen:</label>
                <br>
           
                <?php if($txtImagen!=""){ ?>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen?>" width="50" alt=""/>
                <?php }?>

                <input type="file" class="form-control" id="txtImagen" name="txtImagen" placeholder="" >
            </div>
            <div class="form-group">
                <label for="txtDescripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" value="<?php echo $txtDescripcion ?>"  placeholder="Descripción de libro" required>
            </div>
            <br>
            <div class="form-group">
                <label for="txtfecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="txtfecha" name="txtfecha" value="<?php echo $txtfecha ?>" placeholder="" required>
            </div>
            <br>

            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="accion" value="Agregar" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> class="btn btn-primary">Agregar</button>
                <button type="submit" name="accion" value="Modificar" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> class="btn btn-warning">Modificar</button>
                <button type="submit" name="accion" value="Cancelar" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> class="btn btn-danger">Cancelar</button>
            </div>
        </form>

    

</div>

<div class="col-md-9">
    <table class="control table">

        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Fecha Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaLibros as $libros) { ?>
                <tr>
                    <td><?php echo $libros['codigo'];?></td>
                    <td><?php echo $libros['nombre'];?></td>
                    <td>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $libros['imagen']; ?>" width="75">
                    </td>
                    <td><?php echo $libros['descripcion'];?></td>
                    <td><?php echo $libros['fecha_alta'];?></td>

                    <td>
                   
                        <form method="POST">

                            <input type="hidden" name="txtid" id="txtid" value="<?php echo $libros['id'];?>">
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                            

                        </form>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>


</div>


<?php include('../templates/pie.php') ?>