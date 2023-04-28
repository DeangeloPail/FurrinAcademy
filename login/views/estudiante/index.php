<?php
session_start();
if(!isset($_SESSION['usuarioEstudiante'])){
  session_start();
  session_destroy();
  header("location: ../../login.php");
}else{
  if($_SESSION['usuarioEstudiante']="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
  }
}
echo"$nombreUsuario";
echo "estudiante";

?>