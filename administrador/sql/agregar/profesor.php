<?php
ob_start();
include("../../config/database.php");
$ProfesorID=(isset($_POST['ProfesorID']))?$_POST['ProfesorID']:"";
$NombreProfesor=(isset($_POST['NombreProfesor']))?$_POST['NombreProfesor']:"";
$Direccion=(isset($_POST['Direccion']))?$_POST['Direccion']:"";
$CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";
if (isset($_POST['ProfesorID'])) {
    $ProfesorID = $_POST['ProfesorID'];
    $sqlID = "SELECT * FROM profesores WHERE codigo_profesor = '$ProfesorID'";
    $resultadroProfesor = mysqli_query($conexion, $sqlID);
    if (mysqli_num_rows($resultadroProfesor) > 0) {
      $mensaje = '<script>alert("El codigo de profesor  existe en la base de datos");</script>'; // se guarda en mensaje el texto que quieras mostrar
      header("location: ../../formularios/agregar/profesor.php?Message=".urlencode($mensaje));
    } else {
        $sql="INSERT INTO `profesores` (`codigo_profesor`, `Nombre_profe`, `Direccion`, `codigo_usuarioo`) 
        VALUES ('$ProfesorID', '$NombreProfesor', '$Direccion', '$CodigoUsuario')";
        $resultado=mysqli_query($conexion,$sql);

        if ($resultado){
            header('location: ../../lista_profe.php');
        }else{
            header('location: ../../formularios/agregar/profesor.php');
        }
    }
}
?>