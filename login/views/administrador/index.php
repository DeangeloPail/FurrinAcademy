<?php
session_start();
if(!isset($_SESSION['usuarioAdministrador'])){
  session_start();
  session_destroy();
  header("location: ../../login.php");
}else{
  if($_SESSION['usuarioAdministrador']="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
  }
}
echo"$nombreUsuario";
echo "administrador";

?>