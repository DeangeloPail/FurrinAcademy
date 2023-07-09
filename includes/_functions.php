<?php
   
require_once ("../includes/Conexion.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;


		}

	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","db_proyectocursos");
		extract($_POST);
		$consulta="UPDATE usuario SET nombre_usuario = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","db_proyectocursos");
    extract($_POST);
    $id= $_POST['codigo_usuario'];
    $consulta= "DELETE FROM usuario WHERE codigo_usuario= $id";

    mysqli_query($conexion, $consulta);


    header('Location: administrador/index.php');

}

function acceso_user() {
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","","db_proyectocursos");
    $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../views/user.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../views/lector.php');
    }
    
    
    else{

        header('Location: login.php');
       
    }

  
}






