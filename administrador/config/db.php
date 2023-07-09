<?php
$host="localhost";
$bd="proyectofabian";
$usuario="root";
$contraseña="";
try{
  $conexionJF=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contraseña);
  
}catch(Exeption $ex){
  echo $exe->getMessage();
}

?>