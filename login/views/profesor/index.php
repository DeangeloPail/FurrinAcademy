<?php
session_start();
if(!isset($_SESSION['usuarioProfesor'])){
  session_start();
  session_destroy();
  header("location: ../../login.php");
}else{
  if($_SESSION['usuarioProfesor']="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
  }
}
echo"$nombreUsuario";

?>