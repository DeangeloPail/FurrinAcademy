<?php

session_start();
if(!isset($_SESSION['usuarioProfesor'])){
  session_start();
  session_destroy();
  header("location: ../login/login.php");
}else{
  if($_SESSION['usuarioProfesor']="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
      $idProfesor=$_SESSION["idProfesor"];
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="SistemaCursos ProYeid">
    
    <title>FurrinAcademy|Profe Dashboard </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header" ><a class="app-header__logo"  href="index.php" class="navbar-brand" ><img src="images/Logo Furrin.png" style="height: 4rem; margin-left: 10px;"/></a></a> 
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <!--<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i></a></li>-->
            <!---<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i></a></li>-->
            <li><a class="dropdown-item" href="../login/config/cerrarsesion.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
          </ul>
        </li>
      </ul>
    </header>

    <?php 
    require_once 'nav.php';

    ?>