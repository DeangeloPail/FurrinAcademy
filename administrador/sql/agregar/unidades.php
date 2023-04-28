<?php
ob_start();
include("../../config/database.php");

$Unidad=(isset($_POST['Unidad']))?$_POST['Unidad']:"";
$UnidadID=(isset($_POST['UnidadID']))?$_POST['UnidadID']:"";
$Curso=(isset($_POST['Curso']))?$_POST['Curso']:"";

if (isset($_POST['UnidadID'])) {
    $UnidadID = $_POST['UnidadID'];
    $sqlUnidadID = "SELECT * FROM unidad_curso WHERE id_unidad = '$UnidadID'";
    $resultadoUnidadID = mysqli_query($conexion, $sqlUnidadID);
    if (mysqli_num_rows($resultadoUnidadID) > 0) {
      $mensaje = '<script>alert("El usuario existe en la base de datos");</script>'; // se guarda en mensaje el texto que quieras mostrar
      header("location: ../../formularios/agregar/unidades.php?Message=".urlencode($mensaje));
    } else {

        $sql="INSERT INTO `unidad_curso` (`id_unidad`, `Unidad`, `codigo_curso`)
        VALUES ('$UnidadID', '$Unidad', '$Curso')";
        $resultado=mysqli_query($conexion,$sql);

        if ($resultado){
            header('location: ../../unidades.php');
        }else{
            header('location: ../../formularios/agregar/unidades.php');
        }
    }
}

?>