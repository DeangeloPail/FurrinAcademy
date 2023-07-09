<?php
include ('includes/Conexion.php');
//validacion

$username = $_POST['username'];
$password = $_POST ['password'];

$consulta= "SELECT * FROM usuario where username= '$username' AND password='$password'";

$resultado = mysqli_query($conexion,$consulta);

if(mysqli_num_rows($resultado)>0) {

    $_SESSION["login"]=true;



    header("location: administrador/index.php");


}else{

    echo '
    <script>
    alert ("usurio no existe, por favor verifique los datos");
    window.location = "administrador/index.php";
    </script>
    ';
    exit;
}  


?>