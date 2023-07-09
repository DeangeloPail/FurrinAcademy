<?php
ob_start();
include("../../config/database.php");
$CodigoEstudia=(isset($_POST['CodigoEstudia']))?$_POST['CodigoEstudia']:"";
$NombreEstudia=(isset($_POST['NombreEstudia']))?$_POST['NombreEstudia']:"";
$ApellidoEstudia=(isset($_POST['ApellidoEstudia']))?$_POST['ApellidoEstudia']:"";
$Direccion=(isset($_POST['Direccion']))?$_POST['Direccion']:"";
$Telefono=(isset($_POST['Telefono']))?$_POST['Telefono']:"";
$CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";

    $sql="UPDATE `estudiante` SET `Nombre_estudiante` = '".$NombreEstudia."' ,
     `Apellido_estudiante` = '".$ApellidoEstudia."' , `Direccion` = '".$Direccion."' ,
      `Telefono` = '".$Telefono."' , `codigo_usuario` = '".$CodigoUsuario."'  
      WHERE `estudiante`.`Codigo_estudiante` = '".$CodigoEstudia."' ";
    $resultado=mysqli_query($conexion,$sql);
    
    if ($resultado){
        header('location: ../../lista_estu.php');
    }else{
        header('location: ../../formularios/agregar/estudiante.php?id="'.$CodigoEstudia.'"');
    }
?>