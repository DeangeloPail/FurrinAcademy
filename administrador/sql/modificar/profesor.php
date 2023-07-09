<?php
ob_start();
include("../../config/database.php");
$ProfesorID=(isset($_POST['ProfesorID']))?$_POST['ProfesorID']:"";
$NombreProfesor=(isset($_POST['NombreProfesor']))?$_POST['NombreProfesor']:"";
$Direccion=(isset($_POST['Direccion']))?$_POST['Direccion']:"";
$CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";

    $sql="UPDATE profesores SET Nombre_profe = '".$NombreProfesor."', 
    Direccion = '".$Direccion."', codigo_usuarioo = '".$CodigoUsuario."'
    WHERE profesores.codigo_profesor = '".$ProfesorID."'";
    $resultado=mysqli_query($conexion,$sql);
    
    if ($resultado){
        header('location: ../../lista_profe.php');
    }else{
        header('location: ../../formularios/editar/profesor.php?id="'.$ProfesorID.'"');
    }
?>