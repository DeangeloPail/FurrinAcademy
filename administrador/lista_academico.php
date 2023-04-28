<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Area Academica</h1>
         

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="lista_academico.php">Area Academica</a></li>
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
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"  viewBox="0 0 16 16" style=" margin-left: 6.5pc">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
</svg>
  <div class="card-body">
    <h5 class="card-title">Matricular Estudiantes</h5>
    <p class="card-text">Inscribir Estudiante a un Curso</p>
    <a href="lista_matriestu.php" class="btn btn-primary">Administrar</a>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"  viewBox="0 0 16 16" style=" margin-left: 6.5pc">
  <path d="M9.186 4.797a2.42 2.42 0 1 0-2.86-2.448h1.178c.929 0 1.682.753 1.682 1.682v.766Zm-4.295 7.738h2.613c.929 0 1.682-.753 1.682-1.682V5.58h2.783a.7.7 0 0 1 .682.716v4.294a4.197 4.197 0 0 1-4.093 4.293c-1.618-.04-3-.99-3.667-2.35Zm10.737-9.372a1.674 1.674 0 1 1-3.349 0 1.674 1.674 0 0 1 3.349 0Zm-2.238 9.488c-.04 0-.08 0-.12-.002a5.19 5.19 0 0 0 .381-2.07V6.306a1.692 1.692 0 0 0-.15-.725h1.792c.39 0 .707.317.707.707v3.765a2.598 2.598 0 0 1-2.598 2.598h-.013Z"/>
  <path d="M.682 3.349h6.822c.377 0 .682.305.682.682v6.822a.682.682 0 0 1-.682.682H.682A.682.682 0 0 1 0 10.853V4.03c0-.377.305-.682.682-.682Zm5.206 2.596v-.72h-3.59v.72h1.357V9.66h.87V5.945h1.363Z"/>
</svg>
  <div class="card-body">
    <h5 class="card-title">Matricular Docentes</h5>
    <p class="card-text">Asignar Docente a un Curso</p>
    <a href="lista_matripro.php" class="btn btn-primary">Administrar</a>
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
