<?php
ob_start();
include("../../config/database.php");
$CodigoCurso=(isset($_POST['CodigoCurso']))?$_POST['CodigoCurso']:"";
$NombreCurso=(isset($_POST['NombreCurso']))?$_POST['NombreCurso']:"";
$Duracion=(isset($_POST['Duracion']))?$_POST['Duracion']:"";
$AreaCurso=(isset($_POST['AreaCurso']))?$_POST['AreaCurso']:"";
$TipoCurso=(isset($_POST['TipoCurso']))?$_POST['TipoCurso']:"";
$CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";
if (isset($_POST['NombreCurso'])) {
    $NombreCurso = $_POST['NombreCurso'];
    $sqlCurso = "SELECT * FROM curso WHERE codigo_curso='$CodigoCurso'||nombre_curso = '$NombreCurso'";
    $resultadroCurso = mysqli_query($conexion, $sqlCurso);
    if (mysqli_num_rows($resultadroCurso) > 0) {
      $mensaje = '<script>alert("El codigo de estudiante existe en la base de datos");</script>'; // se guarda en mensaje el texto que quieras mostrar
      header("location: ../../formularios/agregar/cursos.php?Message=".urlencode($mensaje));
    } else {
        $sql="INSERT INTO `curso` (`codigo_curso`, `nombre_curso`, 
        `Duracion`, `area_curso`, `tipo_curso`, `codigo_usuario`, `statu_curso`) 
        VALUES ('$CodigoCurso','$NombreCurso', '$Duracion', '$AreaCurso', 
        '$TipoCurso', '$CodigoUsuario', '1')";
        $resultado=mysqli_query($conexion,$sql);

        if ($resultado){
            header('location: ../../lista_cursos.php');
        }else{
            header('location: ../../formularios/agregar/cursos.php');
        }
    }
}
?>