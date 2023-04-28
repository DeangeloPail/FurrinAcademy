<?php
ob_start();
include("../../config/database.php");
$CodigoEstudia=(isset($_POST['CodigoEstudia']))?$_POST['CodigoEstudia']:"";
$NombreEstudia=(isset($_POST['NombreEstudia']))?$_POST['NombreEstudia']:"";
$ApellidoEstudia=(isset($_POST['ApellidoEstudia']))?$_POST['ApellidoEstudia']:"";
$Direccion=(isset($_POST['Direccion']))?$_POST['Direccion']:"";
$Telefono=(isset($_POST['Telefono']))?$_POST['Telefono']:"";
$CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";
if (isset($_POST['CodigoEstudia'])) {
    $CodigoEstudia = $_POST['CodigoEstudia'];
    $sqlID = "SELECT * FROM estudiante WHERE Codigo_estudiante = '$CodigoEstudia'";
    $resultadroProfesor = mysqli_query($conexion, $sqlID);
    if (mysqli_num_rows($resultadroProfesor) > 0) {
      $mensaje = '<script>alert("El codigo de estudiante existe en la base de datos");</script>'; // se guarda en mensaje el texto que quieras mostrar
      header("location: ../../formularios/agregar/estudiante.php?Message=".urlencode($mensaje));
    } else {
        $sql="INSERT INTO `estudiante` (`Codigo_estudiante`, 
        `Nombre_estudiante`, `Apellido_estudiante`, `Direccion`, `Telefono`, `codigo_usuario`)
         VALUES('$CodigoEstudia', '$NombreEstudia','$ApellidoEstudia', '$Direccion',
         '$Telefono', '$CodigoUsuario')";
        $resultado=mysqli_query($conexion,$sql);

        if ($resultado){
            header('location: ../../lista_estu.php');
        }else{
            header('location: ../../formularios/agregar/estudiante.php');
        }
    }
}
?>