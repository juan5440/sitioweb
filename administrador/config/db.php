<?php

$host="localhost";
$bd="librosweb";
$usuario="root";
$contrasenia="";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
    if($conexion){ echo " ";}
} catch (Exeption $ex) {
    echo $ex->getMessage();
}
?>