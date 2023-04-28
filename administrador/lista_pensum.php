<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Area Pedagogica</h1>
         

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="lista_pensum.php">Area Pedagogica</a></li>
        </ul>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
          <div class="tile-body">

          <div class="container text-center">
  <div class="row align-items-end">
    <div class="col">
    <div class="card" style="width: 18rem;">
  <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"  viewBox="0 0 16 16" style=" margin-left: 6.5pc; margin-top: 2px">
  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg>
  <div class="card-body">
    <h5 class="card-title">Unidades</h5>
    <p class="card-text">Administrar los Mododulos que conforman cada curso.</p>
    <a href="unidades.php" class="btn btn-primary">Administrar</a>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
    <svg xmlns="http://www.w3.org/2000/svg"  width="80" height="80" fill="currentColor"  viewBox="0 0 16 16" style=" margin-left: 6.5pc; margin-top: -4px">
  <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg>
  <div class="card-body">
    <h5 class="card-title">Contenidos</h5>
    <p class="card-text">Administrar las contenidos pedagogicos de cada Modulo.</p>
    <a href="contenidos.php" class="btn btn-primary">Administrar</a>
  </div>
</div>
    </div>
    
  </div>
</div>
<?php 

include('./template/cabecera.php');
?>
<?php
require_once 'includes/footer.php'
?>